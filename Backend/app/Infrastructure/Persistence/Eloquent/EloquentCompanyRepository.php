<?php
namespace App\Infrastructure\Persistence\Eloquent;

use App\Domains\Companies\Models\Company;
use App\Domains\Companies\Repositories\CompanyRepositoryInterface;

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
