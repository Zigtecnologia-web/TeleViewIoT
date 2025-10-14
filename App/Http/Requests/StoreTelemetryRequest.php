<?php
namespace App\Http\Requests;

use System\Requests\BaseRequest;

class StoreTelemetryRequest extends BaseRequest
{
    public array $fields = [];

    protected function rules(): array
    {
        return [
            'device_id' => 'required|min:10',
        ];
    }

    public function set(array $data): self
    {
        parent::setData($data);
        $this->fields = $this->validated();
        return $this;
    }
}
