<?php

namespace App\Http\Controllers\Dashboard\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'pageTitle' => 'Minha conta',
            'user' => auth()->user()
        ];
        return view('dashboard/user/index', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = [
            'pageTitle' => 'Minha conta',
            'user' => auth()->user()
        ];
        return view('dashboard/user/edit', $data);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|email'
        ]);

        if(auth()->user()->user_id != $id){
            $msg = [
                'type' => 'danger',
                'text' => 'Erro'
            ];
            return redirect()->route('user.index')->with('msg', $msg);
        }

        try{

            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();

            $msg = [
                'type' => 'success',
                'text' => 'Usuário atualizado com sucesso.'
            ];
        } catch(Exception $e){
            $msg = [
                'type' => 'danger',
                'text' => 'Erro ao atualizar usuário'
            ];
        }

        return redirect()->route('user.index')->with('msg', $msg);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPassword()
    {
        $data = [
            'pageTitle' => 'Minha conta',
            'user' => auth()->user()
        ];
        return view('dashboard/user/editPassword', $data);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|string',
            'confirm_password' => 'required|string|same:password'
        ]);

        if(auth()->user()->user_id != $id){
            $msg = [
                'type' => 'danger',
                'text' => 'Erro'
            ];
            return redirect()->route('user.index')->with('msg', $msg);
        }

        try{
            $user = User::find($id);
            $user->password = bcrypt($request->input('password'));
            $user->save();

            $msg = [
                'type' => 'success',
                'text' => 'Senha atualizada com sucesso.'
            ];
        } catch(Exception $e){
            $msg = [
                'type' => 'danger',
                'text' => 'Erro ao atualizar senha'
            ];
        }
        return redirect()->route('user.index')->with('msg', $msg);
    }
}
