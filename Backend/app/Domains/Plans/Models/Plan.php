<?php
namespace App\Domains\Plans\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Subscriptions\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'monthly_price', 'user_limit', 'features'];
    protected $casts = [
        'features' => 'array',
    ];
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    protected static function newFactory()
    {
        return \Database\Factories\PlanFactory::new();
    }
}
