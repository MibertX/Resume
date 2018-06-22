<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password',
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAgeAttribute()
    {
        $nowDate = new \DateTime("Now");
        $birthDate = new \DateTime($this->birthdate);
        return $nowDate->diff($birthDate)->y;
    }
}
