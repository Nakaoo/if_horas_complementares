<?php
namespace App\Http\Controllers\Horas;

use App\Models\HorasComplementares;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class HorasComplementaresController extends Controller{
    public function dashboard(){
        $viewData = [];
        $idAluno = Auth::user()->getId();
        $viewData["horas"] = HorasComplementares::where('id_aluno', $idAluno);
        $viewData["contagem"] = HorasComplementares::where('id_aluno', $idAluno)->count();
        $viewData["horasNecessarias"] = User::where('users.id', $idAluno)->join('curso', 'users.id_curso', '=', 'curso.id')
                                        ->value('carga_prevista');
        $viewData["carga_cumprida"] = User::where('id', $idAluno)->value('carga_cumprida');
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
            $newHoras['arquivo'] = $this->arquivo($request, $newHoras, $id);
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

        $hora = $request->only(['name', 'data_atividade', 'carga_horaria', 'informacoes', 'id_categoria']);

        if($request->hasFile('arquivo'))
            $hora['arquivo'] = $this->arquivo($request, $hora, $id);

        HorasComplementares::where('id', $id)->update($hora);

        return back();
    }

    public function deletar($id){
        HorasComplementares::destroy($id);
        return back();
    }

    public function arquivo(Request $request, $hora, $id){
            $nomeArquivo = $hora['name'].".".$request->file('arquivo')->extension();

            Storage::disk('public')->put(
                $nomeArquivo,
                file_get_contents($request->file('arquivo')->getRealPath())
            );
            return $nomeArquivo;
    }
}

?>
