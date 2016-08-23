<?php
class LoginController extends BaseController {

	public function getIndex()
	{
		if (Auth::check())
		{
			return Redirect::to('admin.Principal');
		}else{
			return View::make('admin.login');
		}
	}

	public function postLogin()
	{
		$login=Input::get('username');
		$password=Input::get('password');
		$remember=(Input::has('remember'))?true:false;

		if (Auth::attempt(array('login'=>$login, 'password'=>$password),$remember)) {
			return Redirect::to('Principal');
		} else {
			return Redirect::to('login')
			->with('message', 'Usuario o contraseña incorrecta')
			->withInput();
		}
	}
	function getLogout()
	{
		Auth::logout();
		return Redirect::to('login');
	}

}