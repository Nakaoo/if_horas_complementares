<?php

namespace App\Models;

use App\Traits\HasClassicSetter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Categoria extends Model{
     /**
     * CATEGORIA DAS HORAS COMPLEMENTARES ATRIBUTOS
     * ATRIBUTOS
     * $this->attributes['id'] - int - contém a chave primaria (id)
     * $this->attributes['name'] - string - contém o nome da categoria da hora complementar
     */

    protected $fillable = [
        'name',
        'descricao',
        'carga_min',
        'carga_max',
        'carga_total'
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

    public function getCargaMin(){
        return $this->attributes['carga_min'];
    }

    public function setCargaMin($carga_min){
        return $this->attributes['carga_min'] = $carga_min;
    }

    public function getCargaMax(){
        return $this->attributes['carga_min'];
    }

    public function setCargaMax($carga_max){
        return $this->attributes['carga_max'] = $carga_max;
    }

    public function getCargaTotal(){
        return $this->attributes['carga_min'];
    }

    public function setCargaTotal($carga_total){
        return $this->attributes['carga_total'] = $carga_total;
    }

    // Relacionamento entre categoria e horas complementares
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

    // Relacionamento entre categoria e documento
    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }

    public function getDocumento()
    {
        return $this->documento;
    }

    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    public function getDocumentoId()
    {
        return $this->attributes['id_documento'];
    }

    public function setDocumentoId($id_documento)
    {
        $this->attributes['id_documento'] = $id_documento;
    }
}

?>
