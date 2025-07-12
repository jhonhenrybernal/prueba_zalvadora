<?php
namespace App\Application\Companies\UseCases;

use App\Domains\Companies\Repositories\CompanyRepositoryInterface;
use App\Domains\Companies\Models\Company;

class CreateCompany
{
    protected CompanyRepositoryInterface $repo;

    public function __construct(CompanyRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function execute(array $data): Company
    {
        $company = new Company($data);
        $this->repo->save($company);
        return $company;
    }
}
