<?php
namespace App\Http\Controllers\Horas;

use App\Models\HorasComplementares;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class HorasComplementaresController extends Controller{
    public function dashboard(){
        $viewData = [];
        $viewData["horas"] = HorasComplementares::where('id_aluno', Auth::user()->getId())->get();
        return view('horas_complementares.dashboard')->with("viewData", $viewData);
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

        $newHoras = $request->only(['name', 'data_atividade', 'carga_horaria', 'informacoes', 'id_categoria']);
        $newHoras['arquivo'] = '1';
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
        $hora = HorasComplementares::findOrFail($id);
        $hora -> setName($request->input("name"));
        $hora -> setDataAtividade($request->input('data_atividade'));
        $hora -> setCargaHoraria($request->input('carga_horaria'));
        if($request->hasFile('arquivo')){
            $nomeArquivo = $hora->getName().".".$request->file('arquivo')->extension();
            Storage::disk('public')->put(
                $nomeArquivo,
                file_get_contents($request->file('arquivo')->getRealPath())
            );
            $hora -> setArquivo($nomeArquivo);
        }
        $hora -> setInformacoes($request->input('informacoes'));
        $hora -> setIdCategoria($request->input('id_categoria'));
        $hora -> saveOrFail();

        return back();
    }

    public function deletar($id)
    {
        HorasComplementares::destroy($id);
        return back();
    }
}
?>
