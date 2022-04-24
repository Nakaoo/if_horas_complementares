<?php

namespace App\Models;

use App\Traits\HasClassicSetter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Documento extends Model{
     /**
     * CATEGORIA DAS HORAS COMPLEMENTARES ADICIONADAS
     * ATRIBUTOS
     * $this->attributes['id'] - int - contém a chave primaria (id)
     * $this->attributes['nome'] - string - contém o nome da categoria da hora complementar
     */

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

    // Relacionamento entre documento e categoria
    public function categoria()
    {
        return $this->hasMany(Categoria::class);
    }

    public function getCategoria()
    {
        return $this->categoria;
    }
}
