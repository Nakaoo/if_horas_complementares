<?php

namespace App\Models;

use App\Traits\HasClassicSetter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Avaliacoes extends Model{
     /**
     * AVALIAÇÃO ATRIBUTOS
     * ATRIBUTOS
     * $this->attributes['id'] - int - contém a chave primaria (id)
     * $this->attributes['feedback'] - string - contém o texto sobre a avaliação concedido por um avaliador
     * $this->attributes['carga_horaria'] - int - contém o total de horas complementares que o avaliador concededu
     * $this->attributes['id_status'] - Status - contém o id do status que o avaliador concedeu, sendo (1 - pendente, 2 - aprovado, 3 - rejeitado)
     * $this->attributes['id_avaliador'] - User - contém o id do avaliador que inseriu a avaliação
     */

    protected $fillable = [
        'feedback',
        'carga_horaria',
        'id_status',
        'id_avaliador',
        'id_horas'
    ];

    protected $appends = ['id'];

    public static function validate($request)
    {
        $request->validate([

        ]);
    }

    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        return $this->attributes['id'] = $id;
    }

    public function getCargaHoraria(){
        return $this->attributes['carga_horaria'];
    }

    public function setCargaHoraria($id){
        return $this->attributes['carga_horaria'] = $carga_horaria;
    }

    // Relacionamento entre status e avaliacao
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function getIdStatus()
    {
        return $this->attributes['id_status'];
    }

    public function setIdStatus($id_avaliacao)
    {
        $this->attributes['id_avaliacao'] = $id_avaliacao;
    }

    // Relacionamento entre categoria e horas complementares
    public function horasComplementares()
    {
        return $this->hasMany(HorasComplementares::class);
    }

    public function getIdHorasComplementares()
    {
        return $this->attributes['id_horas'];
    }

    public function setIdHorasComplementares($id_horas)
    {
        $this->attributes['id_horas'] = $id_horas;
    }
}
?>
