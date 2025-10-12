<?php
namespace System\Responses;
class JsonResponse
{
    /**
     * Retorna uma resposta JSON formatada.
     *
     * @param mixed $data Os dados a serem retornados.
     * @param int $statusCode Código HTTP da resposta (padrão: 200).
     * @param ?string $message Mensagem opcional.
     */
    public static function send($data = [], int $statusCode = 200, ?string $message = null)
    {
        header('Content-Type: application/json');
        http_response_code($statusCode);

        echo json_encode([
            'status' => $statusCode < 400 ? 'success' : 'error',
            'message' => $message,
            'data' => $data,
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        exit;
    }

    /**
     * Retorna uma resposta de erro.
     *
     * @param string $message Mensagem do erro.
     * @param int $statusCode Código HTTP (padrão: 400).
     */
    public static function error(array $data)
    {
        self::send(
            isset($data['data']) ? $data['data'] : [], 
            isset($data['statusCode'])? $data['statusCode'] : 400, 
            isset($data['message'])? $data['message'] : ''
        );
    }

    /**
     * Retorna uma resposta de sucesso.
     *
     * @param mixed $data Os dados de resposta.
     * @param ?string $message Mensagem opcional.
     */
    public static function success($data = [], ?string $message = null)
    {
        self::send($data, 200, $message);
    }

     /**
     * Retorna uma resposta de não autorizado (401).
     *
     * @param ?string $message Mensagem opcional.
     */
    public static function unauthorized(?string $message = 'Unauthorized')
    {
        self::send([], 401, $message);
    }
}
