<?php
namespace App\Http\Controllers\Horas;

use App\Models\HorasComplementares;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class HorasComplementaresController extends Controller{
    public function todasHoras(){
        $viewData = [];
        $viewData["horas"] = HorasComplementares::where('id_aluno', Auth::user()->getId())->get();
        return view('horas_complementares.todas')->with("viewData", $viewData);
    }

    public function cadastrar(){
        $viewData = [];
        $viewData["categorias"] = Categoria::all();
        return view('horas_complementares.cadastrar')->with("viewData", $viewData);
    }

    public function cadastrarPost(Request $request){
        $request->validate([
            "name" => "required|max:100",
            "data_atividade" => "required",
            "carga_horaria" => "required",
            "arquivo" => "required",
            "informacoes" => ""
        ]);

        $newHoras = new HorasComplementares;
        $userId = Auth::user()->getId();
        $newHoras -> setName($request->input("name"));
        $newHoras -> setDataAtividade($request->input('data_atividade'));
        $newHoras -> setCargaHoraria($request->input('carga_horaria'));
        if($request->hasFile('arquivo')){
            $nomeArquivo = $newHoras->getName().".".$request->file('arquivo')->extension();
            Storage::disk('public')->put(
                $nomeArquivo,
                file_get_contents($request->file('arquivo')->getRealPath())
            );
            $newHoras -> setArquivo($nomeArquivo);
        }
        $newHoras -> setInformacoes($request->input('informacoes'));
        $newHoras -> setUserId($userId);
        $newHoras -> setIdCategoria($request->input('id_categoria'));
        $newHoras -> saveOrFail();

        return back();
    }

    public function editar($id){
        $viewdata = [];
        $viewData["categorias"] = Categoria::all();
        $viewData["hora"] = HorasComplementares::findOrFail($id);
        return view('horas_complementares.editar')->with("viewData", $viewData);
    }

    public function editarPut(Request $request, $id){
        $hora = HorasComplementares::findOrFail($id);
        $hora -> setName($request->input("name"));
        $hora -> setDataAtividade($request->input('data_atividade'));
        $hora -> setCargaHoraria($request->input('carga_horaria'));
        if($request->hasFile('arquivo')){
            $nomeArquivo = $newHoras->getName().".".$request->file('arquivo')->extension();
            Storage::disk('public')->put(
                $nomeArquivo,
                file_get_contents($request->file('arquivo')->getRealPath())
            );
            $newHoras -> setArquivo($nomeArquivo);
        }
        $hora -> setInformacoes($request->input('informacoes'));
        $hora -> setIdCategoria($request->input('id_categoria'));
        $hora -> save();

        return back();
    }

    public function deletar($id)
    {
        HorasComplementares::destroy($id);
        return back();
    }
}
?>
