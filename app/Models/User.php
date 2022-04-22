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
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contém a chave primária (id)
     * $this->attributes['name'] - string - contém o nome do usuário
     *
    */

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

    public function getName(){
        return $this->attributes['name'];
    }

    public function setName($name){
        return $this->attributes['name'] = $name;
    }

    public function getPassword(){
        return $this->attributes['password'];
    }

    private function setPassword($password){
        return $this->attributes['password'] = $password;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }

    public function getProntuario()
    {
        return $this->attributes['prontuario'];
    }

    public function setProntuario($prontuario)
    {
        $this->attributes['prontuario'] = $prontuario;
    }

    public function getCurso()
    {
        return $this->attributes['id_curso'];
    }

    public function setCurso($id_curso)
    {
        $this->attributes['id_curso'] = $id_curso;
    }

    public function getFuncao()
    {
        return $this->attributes['funcao'];
    }

    public function setFuncao($funcao)
    {
        $this->attributes['funcao'] = $funcao;
    }

    // Relacionamento entre horas complementares e usuário
    public function horasComplementares()
    {
        return $this->hasMany(HorasComplementares::class);
    }

    public function getHorasComplementares()
    {
        return $this->horas;
    }

    public function setHorasComplementares($horas)
    {
        $this->horas = $horas;
    }
}
