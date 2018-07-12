<?php
namespace App\Http\Controllers;
use App\Models\User;

class LandingController extends Controller
{
    public function index()
	{
		$user = User::find(1);
		return view('landing', array('user' => $user));
	}
}
