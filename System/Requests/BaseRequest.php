<?php
namespace System\Requests;

use InvalidArgumentException;

abstract class BaseRequest
{
    protected array $data = [];
    protected array $rules = [];

    public function setData(array $data) 
    {
        $this->data = $data;
        $this->validate();
    }

    abstract protected function rules(): array;

    protected function validate(): void
    {
        $rules = $this->rules();

        foreach ($rules as $field => $ruleSet) {
            $value = $this->data[$field] ?? null;

            foreach (explode('|', $ruleSet) as $rule) {
                // Required
                if ($rule === 'required' && ($value === null || $value === '')) {
                    throw new InvalidArgumentException("O campo {$field} é obrigatório.");
                }

                // Skip other validations if value is null and not required
                if ($value === null) {
                    continue;
                }

                // Min length
                if (str_starts_with($rule, 'min:')) {
                    $min = (int) substr($rule, 4);
                    if (is_string($value) && strlen($value) < $min) {
                        throw new InvalidArgumentException("O campo {$field} deve ter no mínimo {$min} caracteres.");
                    }
                }

                // Max length
                if (str_starts_with($rule, 'max:')) {
                    $max = (int) substr($rule, 4);
                    if (is_string($value) && strlen($value) > $max) {
                        throw new InvalidArgumentException("O campo {$field} deve ter no máximo {$max} caracteres.");
                    }
                }

                // Email
                if ($rule === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    throw new InvalidArgumentException("O campo {$field} deve ser um endereço de e-mail válido.");
                }

                // Numeric
                if ($rule === 'numeric' && !is_numeric($value)) {
                    throw new InvalidArgumentException("O campo {$field} deve ser numérico.");
                }

                // Integer
                if ($rule === 'integer' && !filter_var($value, FILTER_VALIDATE_INT)) {
                    throw new InvalidArgumentException("O campo {$field} deve ser um número inteiro.");
                }

                // Boolean
                if ($rule === 'boolean' && !filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
                    throw new InvalidArgumentException("O campo {$field} deve ser um valor booleano (true/false, 1/0).");
                }

                // URL
                if ($rule === 'url' && !filter_var($value, FILTER_VALIDATE_URL)) {
                    throw new InvalidArgumentException("O campo {$field} deve ser uma URL válida.");
                }

                // In (enum-like)
                if (str_starts_with($rule, 'in:')) {
                    $allowedValues = explode(',', substr($rule, 3));
                    if (!in_array($value, $allowedValues)) {
                        throw new InvalidArgumentException("O campo {$field} deve ser um dos seguintes valores: " . implode(', ', $allowedValues) . ".");
                    }
                }

                // Date (basic check, can be expanded with more robust date validation)
                if ($rule === 'date') {
                    if (!strtotime($value)) {
                        throw new InvalidArgumentException("O campo {$field} deve ser uma data válida.");
                    }
                }
            }
        }
    }

    public function validated(): array
    {
        return $this->data;
    }
}
