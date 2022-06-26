<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PerfilController extends Controller{
    public function editar(Request $request, $id){
        $viewData[] = [];
        $viewData['user'] = User::where('id', $id)->get();
        return view('auth.editar')->with("viewData", $viewData);
    }

    public function editarPassword(Request $request, $id){
        $viewData[] = [];
        $idAluno = Auth::user()->getId();
        $senhaAluno = Auth::user()->getPassword();

        $request->validate([
            'senhaAtual' => 'required',
            'senhaNova' => 'required',
            'confirmacaoSenha' => 'required'
        ]);
        
        if(!Hash::check($request->senhaAtual, $senhaAluno)){
            return back()->with('Senha de confirmação invalida');
        }

        if($request->confirmacaoSenha != $request->senhaNova){
            return back()->with("A senha de confirmação é diferente da senha nova");
        }

        User::whereId($idAluno)->update([
            'password' => Hash::make($request->senhaNova)
        ]);    

        return back();
    }

    public function editarFoto(Request $request, $id){
        $viewData[] = [];
        $idAluno = Auth::user()->getId();

        $request->validate([
            'photo' => 'required'
        ]);

        $nomeArquivo = Auth::user()->getProntuario().".".$request->file('photo')->extension();
        
        Storage::disk('public')->put(
            $nomeArquivo,
            file_get_contents($request->file('photo')->getRealPath())
        );

        User::whereId($idAluno)->update([
            'photo' => $nomeArquivo
        ]);

        return back();
    }

    public function deletarFoto(Request $request, $id){

        $nomeArquivo = Auth::user()->getImagem();

        User::whereId(Auth::user()->getId())->update([
            'photo' => ''
        ]);

        Storage::delete($nomeArquivo);

        return back();
    }
}
?>