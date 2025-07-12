<?php
namespace App\Domains\Users\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Domains\Companies\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\UserFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['company_id', 'name', 'email', 'password'];

    protected static function newFactory()
    {
        return UserFactory::new();
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
