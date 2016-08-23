<?php
class UsuariosController extends BaseController {



    public function getIndex()
    {
        return View::make("admin.usuarios");
    }

    public function getCreate()
    {
        return View::make("Usuarios.create");
    }

    public function postCreate()
    {
        $user=new Usuarios;

        $user->login=Input::get("login");
        $user->password=Hash::make(Input::get("password"));
        $user->nombre=Input::get("nombre");
        $user->apaterno=Input::get("apaterno");
        $user->amaterno=Input::get("amaterno");
        $user->email=Input::get("email");
        $user->nivel=Input::get("nivel");
        $user->area=Input::get("area");
        $user->save();

        return Redirect::to("Usuarios");
    }

    public function getDelete($login)
    {
        $user=Usuarios::find($login);

        if(is_null($user))
        {
            return Redirect::to('Usuarios');
        }

        $user->delete();
        return Redirect::to('Usuarios');
    }

    public function getUpdate($login)
    {
        $user=Usuarios::find($login);
        if(is_null($user))
        {
            return Redirect::to('Usuarios');
        }
        return View::make("usuarios.update")->with('user',$user);
    }

    public function postUpdate($login)
    {
        $user=Usuarios::find($login);
        if(is_null($user))
        {
            return Redirect::to('Usuarios');
        }

        $user->nombres=Input::get('nombre');
        $user->apellidos=Input::get('apaterno');

        if(Input::has('password'))
        {
            $user->password=Input::get('password');
        }
        $user->save();
        return Redirect::to('Usuarios');
    }



}