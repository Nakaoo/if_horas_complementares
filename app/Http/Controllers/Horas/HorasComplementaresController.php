<?php
namespace App\Http\Controllers\Horas;

use App\Models\HorasComplementares;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HorasComplementaresController extends Controller{
    public function todasHoras(){
        $viewData = [];
        $viewData["horas"] = HorasComplementares::all();
        return view('horas_complementares.todas')->with("viewData", $viewData);
    }

    public function exibir(){

    }
    public function cadastrar(){
        return view('horas_complementares.cadastrar');
    }

    public function cadastrarPost(Request $request){
        $request->validate([
            "name" => "required|max:100",
            "data_atividade" => "required",
            "carga_horaria" => "required",
            "informacoes" => ""
        ]);

        $newHoras = new HorasComplementares;
        $userId = Auth::user()->getId();
        $newHoras -> setName($request->input("name"));
        $newHoras -> setDataAtividade($request->input('data_atividade'));
        $newHoras -> setCargaHoraria($request->input('carga_horaria'));
        $newHoras -> setCargaHoraria($request->input('carga_horaria'));
        $newHoras -> setArquivo('');
        $newHoras -> setInformacoes($request->input('informacoes'));
        $newHoras -> setUserId($userId);
        $newHoras -> setIdCategoria('');
        $newHoras -> saveOrFail();

        return back();
    }
}
?>
