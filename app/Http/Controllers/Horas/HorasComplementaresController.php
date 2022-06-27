<?php
namespace App\Http\Controllers\Horas;

use App\Models\HorasComplementares;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Avaliacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HorasComplementaresController extends Controller{
    public function dashboard(){
        $viewData = [];
        $idAluno = Auth::user()->getId();

        $viewData["horas"] = HorasComplementares::where('id_aluno', $idAluno)->where('id_avaliacao', '=', null)->get();
        $viewData["contagem"] = HorasComplementares::where('id_aluno', $idAluno)->count();
        $viewData["horasNecessarias"] = User::where('users.id', $idAluno)->join('curso', 'users.id_curso', '=', 'curso.id')
                                        ->value('carga_prevista');
        $viewData["carga_cumprida"] = DB::table('avaliacoes')->join('horas_complementares', 'horas_complementares.id_avaliacao', '=', 'avaliacoes.id')
                                     ->join('users', 'users.id', '=', 'horas_complementares.id_aluno')->where('avaliacoes.id_status', '=', '2')->sum('avaliacoes.carga_horaria');
        $viewData["avaliadas"] = HorasComplementares::where('id_aluno', $idAluno)->join('avaliacoes', 'horas_complementares.id_avaliacao', '=', 'avaliacoes.id')->take(5)->get();

        return view('horas_complementares.dashboard')->with("viewData", $viewData);
    }

    public function cadastrar(){
        $viewData = [];
        $viewData["categorias"] = Categoria::all();
        return view('horas_complementares.cadastrar')->with("viewData", $viewData);
    }

    public function cadastrarPost(Request $request){
        HorasComplementares::validate($request);

        $newHoras = $request->only(['name', 'data_atividade', 'carga_horaria', 'informacoes', 'id_categoria']);
        if($request->hasFile('arquivo'))
            $newHoras['arquivo'] = $this->arquivo($request, $newHoras);
        $newHoras['id_aluno'] = Auth::user()->getId();
        HorasComplementares::create($newHoras);

        return back();
    }

    public function editar($id){
        $viewdata = [];
        $viewData["categorias"] = Categoria::all();
        $viewData["hora"] = HorasComplementares::findOrFail($id);
        return view('horas_complementares.editar')->with("viewData", $viewData);
    }

    public function editarPut(Request $request, $id){
        HorasComplementares::validate($request);

        $hora = $request->only(['id', 'name', 'data_atividade', 'carga_horaria', 'informacoes', 'id_categoria']);

        if($request->hasFile('arquivo'))
            $hora['arquivo'] = $this->arquivo($request, $hora);

        HorasComplementares::where('id', $id)->update($hora);

        return back();
    }

    public function deletar($id){
        HorasComplementares::destroy($id);
        return back();
    }

    public function avaliados(){
        $idAluno = Auth::user()->getId();

        $viewData[] = [];
        $viewData["horas"] = HorasComplementares::where('id_aluno', $idAluno)->join('avaliacoes', 'horas_complementares.id_avaliacao', '=', 'avaliacoes.id')
                                                  ->join('users', 'avaliacoes.id_avaliador', '=', 'users.id')
                                                  ->select('horas_complementares.id', 'horas_complementares.name', 'horas_complementares.informacoes', 'users.photo', 'horas_complementares.id_avaliacao', 'avaliacoes.feedback', 'avaliacoes.id_status')->get();

        return view('horas_complementares.avaliados')->with("viewData", $viewData);
    }


    public function feedback($id){
        $viewData[] = [];

        $viewData["hora"] = HorasComplementares::where('horas_complementares.id', $id)->join('avaliacoes', 'horas_complementares.id_avaliacao', '=', 'avaliacoes.id')
                                                ->join('users', 'avaliacoes.id_avaliador', '=', 'users.id')
                                                ->select('horas_complementares.id', 'horas_complementares.name', 'horas_complementares.informacoes', 'users.photo', 'horas_complementares.id_avaliacao', 'avaliacoes.id_status')->first();

        return view('horas_complementares.feedback')->with("viewData", $viewData);
    }

    public function arquivo(Request $request, $hora){
            $nomeArquivo = $hora['name'].".".$request->file('arquivo')->extension();

            Storage::disk('public')->put(
                $nomeArquivo,
                file_get_contents($request->file('arquivo')->getRealPath())
            );
            return $nomeArquivo;
    }
}

?>
