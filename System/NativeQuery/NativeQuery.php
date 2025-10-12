<?php

namespace System\NativeQuery;

class NativeQuery
{
    protected $db;
    protected $query;
    protected $bindings = [];
    protected $table;
    protected $perPage = 15; // Número padrão de itens por página
    protected $currentPage = 1; // Página atual

    public function __construct(\PDO $pdo)
    {
        $this->db = $pdo;

        // Se a classe filha (Model) tiver a propriedade $table, usa ela
        if (property_exists($this, 'table')) {
            $this->table = $this->table;
        }
    }

    // Método para definir o número de itens por página
    public function perPage($perPage)
    {
        $this->perPage = $perPage;
        return $this;
    }

    // Método para definir a página atual
    public function currentPage($page)
    {
        $this->currentPage = $page ? $page : $this->currentPage;
        return $this;
    }

    public function select(...$columns)
    {
        if (empty($columns)) {
            $columns = ['*']; // Caso não passe colunas, usa o asterisco (*)
        }

        // Junta os parâmetros passados em uma string separada por vírgulas
        $this->query = "SELECT " . implode(", ", $columns) . " FROM {$this->table}";
        return $this;
    }

    public function where($field, $operator, $value = null)
    {
        if ($value === null) {
            $value = $operator;
            $operator = '=';
        }

        $condition = "{$field} {$operator} ?";
        $this->bindings[] = $value;

        if (strpos($this->query ?? '', 'WHERE') === false) {
            $this->query .= " WHERE {$condition}";
        } else {
            $this->query .= " AND {$condition}";
        }

        return $this;
    }

    public function orderBy($field, $direction = 'ASC')
    {
        $this->query .= " ORDER BY {$field} {$direction}";
        return $this;
    }

    // Método para adicionar o LIMIT e o OFFSET para a paginação
    public function paginate()
    {
        $offset = ($this->currentPage - 1) * $this->perPage;

        // Adiciona o limite e o offset à consulta SQL
        $this->query .= " LIMIT {$this->perPage} OFFSET {$offset}";

        return $this;
    }

    // Método que retorna os resultados paginados
    public function get()
    {
        $stmt = $this->db->prepare($this->query);
        $stmt->execute($this->bindings);

        // Retorna os resultados paginados
        $results = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        // Retorna um array com os resultados e informações de paginação
        return (object) [
            'data' => $results,
            'current_page' => $this->currentPage,
            'per_page' => $this->perPage,
            'total' => $this->count(), // Total de registros
            'last_page' => ceil($this->count() / $this->perPage)
        ];
    }

    public function count()
    {
        if (!$this->query || stripos($this->query, 'FROM') === false) {
            return 0;
        }

        // Verifica se a query tem WHERE (indica que há filtros)
        $hasWhere = stripos($this->query, 'WHERE') !== false;

        if ($hasWhere) {
            // Remove LIMIT e OFFSET da query antes de contar
            $countQuery = preg_replace('/\s+LIMIT\s+\d+\s*(OFFSET\s+\d+)?/i', '', $this->query);
            $countQuery = preg_replace('/SELECT\s+(.*?)\s+FROM/i', 'SELECT COUNT(*) as total FROM', $countQuery, 1);
        } else {
            // Se não houver WHERE, conta todos os registros da tabela
            $countQuery = "SELECT COUNT(*) as total FROM {$this->table}";
        }

        if (!$countQuery) {
            return 0;
        }

        $stmt = $this->db->prepare($countQuery);
        $stmt->execute($hasWhere ? $this->bindings : []);
        $result = $stmt->fetch(\PDO::FETCH_OBJ);

        return $result ? (int) $result->total : 0;
    }

    // Métodos antigos para compatibilidade com o Model
    public function all()
    {
        return $this->select()->get();
    }

    public function find($id)
    {
        return $this->where('id', $id)->first();
    }

    public function findBy($field, $value)
    {
        return $this->where($field, $value)->first();
    }

     // Método para consulta crua
    public function rawQuery($sql, $bindings = [])
    {
        // Prepara a consulta SQL
        $stmt = $this->db->prepare($sql);
 
        // Executa a consulta passando os bindings
        $stmt->execute($bindings);
 
        // Retorna os resultados como um array de objetos
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function first()
{
    // Adiciona o limite 1 para pegar apenas o primeiro resultado
    $this->query .= " LIMIT 1";

    // Executa a consulta
    $stmt = $this->db->prepare($this->query);
    $stmt->execute($this->bindings);

    // Retorna o primeiro resultado ou null
    return $stmt->fetch(\PDO::FETCH_OBJ) ?: null;
}


    // Iniciar uma transação
    public function beginTransaction()
    {
        $this->db->beginTransaction();
    }
 
    // Confirmar a transação
    public function commit()
    {
        $this->db->commit();
    }

    // Reverter a transação
    public function rollBack()
    {
        $this->db->rollBack();
    }

    public function like($field, $value)
    {
        $condition = "{$field} LIKE ?";
        $this->bindings[] = "%{$value}%"; // Adiciona o curinga "%" ao redor do valor de busca

        if (strpos($this->query, 'WHERE') === false) {
            $this->query .= " WHERE {$condition}";
        } else {
            $this->query .= " AND {$condition}";
        }

        return $this;
    }

    public function insert(array $data)
    {
        try {
            // Adicionar timestamp de criação e atualização, se necessário
            if ($this->timestamps) {
                $data['created_at'] = date('Y-m-d H:i:s'); // Corrigir o formato da data
            }

            // Substituir valores booleanos por 1 ou 0
            foreach ($data as $key => $list) {
                // Substituindo 'true' por 1 e 'false' por 0
                if ($list === true) {
                    $data[$key] = 1;
                } elseif ($list === false) {
                    $data[$key] = 0;
                }
                
                $fields[] = $key;
                $values[] = $list;
            }

            $fields = implode(", ", $fields);
            $values = "'" . implode("','", $values) . "'";

            // Montar a consulta SQL
            $query = "INSERT INTO {$this->table} ({$fields}) VALUES ({$values})";

            // Executar a consulta
            if (!$this->db->query($query)) {
                // Se falhar, lançar uma exceção
                throw new \Exception("Erro ao executar a consulta: {$query}");
            }

            return $this->lastId();

        } catch (\Exception $e) {
            // Lançar exceção com a mensagem de erro
            throw new \Exception("Erro ao inserir dados na tabela {$this->table}: " . $e->getMessage());
        }
    }

    public function lastId()
    {
        return $this->db->lastInsertId();
    }
    
    public function update($id, array $data)
    {
        $setClause = implode(", ", array_map(fn($key) => "{$key} = ?", array_keys($data)));
        
        $sql = "UPDATE {$this->table} SET {$setClause} WHERE id = ?";
        
        $stmt = $this->db->prepare($sql);
        $success = $stmt->execute([...array_values($data), $id]);

        return $success;
    }

}
