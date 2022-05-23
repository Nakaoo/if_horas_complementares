<?php

namespace App\Models;

use App\Traits\HasClassicSetter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HorasComplementares extends Model
{
    use HasClassicSetter;
    /**
     * HORAS COMPLEMENTARES ATRIBUTOS
     * ATRIBUTOS
     * $this->attributes['id'] - int - contém a chave primaria (id)
     * $this->attributes['name'] - string - contém o nome da atividade
     * $this->attributes['data_atividade'] - date - contém a data que foi realizada o atividade
     * $this->attributes['carga_horaria'] - int - contém a quantidade de horas complementares da atividade
     * $this->attributes['file'] - string - contém o arquivo inserido pelo usuario
     * $this->attributes['informacoes'] - string - contém as informacoes da atividade
     * $this->user - User - contém o usuário associado
     * $this->categoria - Categoria - contém a categoria associada
     * $this->avaliacao - Avaliacao - contém as informações sobre a avaliação
     */

    protected $fillable = [
        'name',
        'data_atividade',
        'carga_horaria',
        'arquivo',
        'informacoes',
        'id_aluno',
        'id_categoria'
    ];

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

    public function getName(){
        return $this->attributes['name'];
    }

    public function setName($name){
        return $this->attributes['name'] = $name;
    }

    public function getDataAtividade(){
        return $this->attributes['data_atividade'];
    }

    public function setDataAtividade($data_atividade){
        return $this->attributes['data_atividade'] = $data_atividade;
    }

    public function getCargaHoraria(){
        return $this->attributes['carga_horaria'];
    }

    public function setCargaHoraria($carga_horaria){
        return $this->attributes['carga_horaria'] = $carga_horaria;
    }

    public function getArquivo(){
        return $this->attributes['arquivo'];
    }

    public function setArquivo($arquivo){
        return $this->attributes['arquivo'] = $arquivo;
    }

    public function getInformacoes(){
        return $this->attributes['informacoes'];
    }

    public function setInformacoes($informacoes){
        return $this->attributes['informacoes'] = $informacoes;
    }

    public function getCargaCumprida(){
        return $this->attributes['carga_cumprida'];
    }

    public function setCargaCumprida($carga_cumprida){
        return $this->attributes['carga_cumprida'] = $carga_cumprida;
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

    // Relacionamento entre o aluno e as horas complementares
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getUserId()
    {
        return $this->attributes['id_aluno'];
    }

    public function setUserId($userId)
    {
        $this->attributes['id_aluno'] = $userId;
    }

    public function getProntuario()
    {
        return $this->attributes['prontuario'];
    }

    // Relacionamento entre categoria e horas complementares
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function getIdCategoria()
    {
        return $this->attributes['id_categoria'];
    }

    public function setIdCategoria($id_categoria)
    {
        $this->attributes['id_categoria'] = $id_categoria;
    }

    // Relacionamento entre avaliacao e horas complementares
    public function avaliacao()
    {
        return $this->belongsTo(Avaliacao::class);
    }

    public function getIdAvaliacao()
    {
        return $this->attributes['id_avaliacao'];
    }

    public function setIdAvaliacao($id_avaliacao)
    {
        $this->attributes['id_avaliacao'] = $id_avaliacao;
    }
}
