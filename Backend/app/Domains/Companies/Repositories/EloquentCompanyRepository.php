<?php
namespace App\Domains\Companies\Repositories;

use App\Domains\Companies\Models\Company;

class EloquentCompanyRepository implements CompanyRepositoryInterface
{
    public function findById(int $id): ?Company
    {
        return Company::find($id);
    }

    public function save(Company $company): void
    {
        $company->save();
    }
}
