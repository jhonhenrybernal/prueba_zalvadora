<?php
namespace App\Domains\Companies\Repositories;

use App\Domains\Companies\Models\Company;

interface CompanyRepositoryInterface
{
    public function findById(int $id): ?Company;
    public function save(Company $company): void;
}
