<?php
namespace App\Domains\Companies\ValueObjects;

class CompanyName
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException("El nombre de la compañía no puede estar vacío.");
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
