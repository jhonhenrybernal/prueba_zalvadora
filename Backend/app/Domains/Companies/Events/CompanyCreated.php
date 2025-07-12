<?php
namespace App\Domains\Companies\Events;

use App\Domains\Companies\Models\Company;

class CompanyCreated
{
    public Company $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }
}
