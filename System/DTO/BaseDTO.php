<?php
namespace System\DTO;

abstract class BaseDTO
{
    /**
     * Create a DTO instance from an associative array.
     * Ignores keys that do not match defined class properties.
     */
    public static function fromArray(array $data): static
    {
        $dto = new static();
        $allowed = array_keys(get_class_vars(static::class));

        foreach ($allowed as $key) {
            if (array_key_exists($key, $data)) {
                $dto->$key = $data[$key];
            }
        }

        return $dto;
    }

    /**
     * Convert all public properties to an associative array.
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
