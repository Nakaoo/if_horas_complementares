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

        $viewData["hora"] = HorasComplementares::findOrFail($idHoras);
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

        // pegar o usuario aluno
        $idAluno = HorasComplementares::where('id', $request->only('id_horas'))->select('id_aluno')->value('id_aluno');
        $valor = (int) $request->only('carga_horaria');
        $incrementar = DB::table('users')->where('id', $idAluno)->increment('carga_cumprida', $valor);
    }
}
?>
