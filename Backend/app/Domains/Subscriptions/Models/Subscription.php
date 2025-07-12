<?php
namespace App\Domains\Subscriptions\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Companies\Models\Company;
use App\Domains\Plans\Models\Plan;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;
     protected $fillable = [
        'company_id', 'plan_id', 'starts_at', 'ends_at',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public static function newFactory()
    {
        return \Database\Factories\SubscriptionFactory::new();
    }
}
