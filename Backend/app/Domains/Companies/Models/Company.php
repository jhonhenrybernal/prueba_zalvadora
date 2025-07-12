<?php
namespace App\Domains\Companies\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Subscriptions\Models\Subscription;
use App\Domains\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function activeSubscription()
    {
        return $this->hasOne(Subscription::class)->where('is_active', true);
    }

    protected static function newFactory()
    {
        return \Database\Factories\CompanyFactory::new();
    }
}
