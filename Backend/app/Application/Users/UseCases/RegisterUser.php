<?php
namespace App\Application\Users\UseCases;

use App\Domains\Companies\Services\CompanyService;
use App\Domains\Users\Models\User;

class RegisterUser
{
    protected CompanyService $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function execute(array $data): User
    {
        $company = \App\Domains\Companies\Models\Company::findOrFail($data['company_id']);

        if (! $this->companyService->canAddUser($company)) {
            throw new \Exception("Límite de usuarios alcanzado");
        }

        return User::create($data);
    }
}
