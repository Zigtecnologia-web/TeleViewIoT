<?php

namespace App\Http\Requests;

use System\Requests\BaseRequest;
use App\Traits\RequestsTrait;

class StoreTelemetryRequest extends BaseRequest
{
    use RequestsTrait;

    public string $apiKey;
    public string $deviceId;
    public array $fields;

    public function __construct()
    {
        $data = $this->getRequest();
        parent::setData($data);

        $normalized = $this->validated();

        $this->apiKey = $normalized['apiKey'];
        $this->deviceId = $normalized['deviceId'];
        $this->fields = $normalized['fields'];
    }

    protected function rules(): array
    {
        return [
            'device_id' => 'required|min:10',
        ];
    }

    public function validated(): array
    {
        parent::validated();
        return $this->normalize($this->data);
    }

    protected function normalize(array $data): array
    {
        $ignored = ['api_key', 'device_id'];

        $fields = array_filter(
            $data,
            fn($key) => !in_array($key, $ignored),
            ARRAY_FILTER_USE_KEY
        );

        return [
            'apiKey' => $data['api_key'] ?? null,
            'deviceId' => $data['device_id'] ?? null,
            'fields' => $fields,
        ];
    }
}
