<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'prontuario',
        'id_curso'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        return $this->attributes['id'] = $id;
    }

    public function horasComplementares()
    {
        return $this->hasMany(HorasComplementares::class);
    }

    public function getHorasComplementares()
    {
        return $this->horas;
    }

    public function setHorasComplementares($orders)
    {
        $this->orders = $orders;
    }
}
