<?php

// Função para achatar arrays multidimensionais (como Laravel faz)
if (!function_exists('flattenArray')) {
    function flattenArray(array $array, string $prefix = ''): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            $fullKey = $prefix ? "{$prefix}.{$key}" : $key;

            if (is_array($value)) {
                $result += flattenArray($value, $fullKey);
            } else {
                $result[$fullKey] = $value;
            }
        }

        return $result;
    }
}

// Diretório onde estão os arquivos PHP de idiomas
$langDir = __DIR__;

// Nome do script atual para ignorar na leitura dos arquivos
$currentScript = basename(__FILE__);

// Diretório base onde gerar os arquivos JSON (ajuste conforme sua estrutura)
$jsonBaseDir = __DIR__ . '/../../../front/src/components/utils/langs/';

// Encontra todos os arquivos PHP na pasta de idiomas, exceto este script
$langFiles = array_filter(
    glob($langDir . '/*.php'),
    fn($file) => basename($file) !== $currentScript
);

if (empty($langFiles)) {
    die("Nenhum arquivo de idioma PHP encontrado na pasta {$langDir}\n");
}

foreach ($langFiles as $phpLangFile) {
    // Obtém o nome do idioma a partir do nome do arquivo (ex: en.php -> en)
    $langCode = pathinfo($phpLangFile, PATHINFO_FILENAME);

    // Define o caminho do arquivo JSON de saída
    $jsonLangFile = $jsonBaseDir . $langCode . '.json';

    // Carrega o arquivo de tradução PHP
    $translations = include $phpLangFile;

    // Garante que o carregamento foi um array
    if (!is_array($translations)) {
        echo "Arquivo de idioma inválido: {$phpLangFile}\n";
        continue;
    }

    // Converte o array em JSON formatado
    $jsonContent = json_encode(flattenArray($translations), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // Garante que o diretório de destino existe
    $destinoDir = dirname($jsonLangFile);
    if (!is_dir($destinoDir)) {
        mkdir($destinoDir, 0777, true);
    }

    // Salva o JSON no arquivo
    file_put_contents($jsonLangFile, $jsonContent);

    echo "Arquivo JSON gerado com sucesso: {$jsonLangFile}\n";
}
