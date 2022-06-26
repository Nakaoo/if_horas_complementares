<?php
namespace App\Http\Controllers\Avaliacao;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Avaliacoes;
use App\Models\HorasComplementares;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AvaliacaoController extends Controller{
    public function dashboard(){
        $viewData = [];
        $idAvaliador = Auth::user()->getId();
        $turmaAvaliador = Auth::user()->getCurso();

        $viewData['atividades_avaliadas'] = Avaliacoes::where('id_avaliador', $idAvaliador)->count();
        $viewData['atividades_pendentes'] = HorasComplementares:: whereNull('id_avaliacao')->
                                           leftJoin('users', 'users.id', '=', 'horas_complementares.id_aluno')->where('users.id_curso', '=', $turmaAvaliador)->
                                           select('horas_complementares.*', 'users.prontuario')->
                                           get();

        return view('avaliacao.dashboard')->with("viewData", $viewData);
    }

    public function avaliar($idHoras){
        $viewData = [];

        $viewData["hora"] = HorasComplementares::whereId($idHoras)->first();
        $viewData["nomeCategoria"] = DB::table('categorias')
        ->join('horas_complementares', 'horas_complementares.id_categoria', '=', 'categorias.id')
        ->where("horas_complementares.id", '=', $idHoras)
        ->value("categorias.name");

        return view('avaliacao.avaliar')->with("viewData", $viewData);
    }

    public function avaliacaoPost(Request $request){
        Avaliacoes::validate($request);

        $idAvaliador = Auth::user()->getId();

        $avaliacao = $request->only(['id', 'feedback', 'carga_horaria', 'id_status', 'id_horas']);
        $avaliacao['id_avaliador'] = $idAvaliador;

        $data = Avaliacoes::create($avaliacao);
        $id = $data->id;

        // atualizar horas complementares com o id da avaliação
        HorasComplementares::whereIn('id', $request->only('id_horas'))->update(['id_avaliacao' => $id]);

        return view('avaliacao.avaliar')->with("viewData", $viewData);
    }

    public function avaliarAtividades(Request $request){
        $viewData = [];
        $idAvaliador = Auth::user()->getId();

        $viewData["avaliacoes"] = DB::table('avaliacoes')->where('id_avaliador', $idAvaliador)->join('horas_complementares', 'horas_complementares.id', '=', 'avaliacoes.id_horas')->
                    join('users', 'users.id', '=', 'horas_complementares.id_aluno')->select('horas_complementares.id as id_horas', 'users.photo', 'users.prontuario', 'avaliacoes.feedback', 'avaliacoes.id', 'avaliacoes.id_status', 'horas_complementares.name', 'users.id as id_aluno')->get();

        return view('avaliacao.avaliaratividades')->with("viewData", $viewData);
    }
    
    public function editarAvaliacao(Request $request, $id){
        $viewData = [];

        $viewData["atividade"] = DB::table('avaliacoes')->where('avaliacoes.id', $id)->join('horas_complementares', 'horas_complementares.id', '=', 'avaliacoes.id_horas')
        ->join('users', 'users.id', '=', 'horas_complementares.id_aluno')
        ->join('categorias', 'categorias.id', '=', 'horas_complementares.id_categoria')->
        select('horas_complementares.arquivo', 'horas_complementares.informacoes', 'categorias.name as name_categoria', 'horas_complementares.name','horas_complementares.id as id_horas', 'users.photo', 'users.prontuario', 'avaliacoes.feedback', 'avaliacoes.id', 'avaliacoes.id_status', 'horas_complementares.name', 'users.id as id_aluno', 'horas_complementares.data_atividade', 'avaliacoes.carga_horaria', 'horas_complementares.carga_horaria as hora_carga')->get()->first();

        return view('avaliacao.editar')->with("viewData", $viewData);
    }

    public function editarPost(Request $request){
        $atividade = $request->only(['feedback', 'id_status', 'carga_horaria']);

        Avaliacoes::where('id', $request->id_atividade)->update($atividade);

        return back();
    }

    public function todasAtividades(){
        $idAvaliador = Auth::user()->getId();
        $turmaAvaliador = Auth::user()->getCurso();

        $viewData = [];
        $viewData["atividades"] = DB::table('horas_complementares')
        ->join('users', 'users.id', '=', 'horas_complementares.id_aluno')
        ->where('horas_complementares.id_avaliacao', '=',  null)->select('horas_complementares.data_atividade', 'horas_complementares.informacoes', 'horas_complementares.name', 'horas_complementares.id as id_horas', 'users.prontuario', 'horas_complementares.name', 'users.id as id_aluno')->get();
        
        return view('avaliacao.todas')->with("viewData", $viewData);
    }
}
?>
