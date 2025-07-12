<?php
namespace App\Domains\Companies\Services;

use App\Domains\Companies\Models\Company;

class CompanyService
{
    public function canAddUser(Company $company): bool
    {
        $subscription = $company->activeSubscription()->with('plan')->first();
        if (!$subscription) return false;
        $limit = $subscription->plan->user_limit;
        return $company->users()->count() < $limit;
    }
}
