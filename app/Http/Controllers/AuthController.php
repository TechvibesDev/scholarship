<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'confirmed',
        ], ["email.unique" => "Email already exists"]);
        if ($validator->fails()) {
            return $this->response(201, $this->fmtErr($validator->errors()->toArray()), [], 201);
        }
        $save = User::create($input);
        if ($save)
            return $this->response(200, "You have successfully register, you can now login", [], 200);
        return $this->response(201, "Registration failed please try again later", [], 200);
    }
    public function login(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], ["email.required" => "Username is required"]);
        if ($validator->fails()) {
            return $this->response(201, $this->fmtErr($validator->errors()->toArray()), [], 201);
        }
        if (Auth::attempt($input)) {
            $request->session()->regenerate();
            return $this->response(200, "Login succeed", auth()->user()->role == '100' ? route('home.index') : route('home.index'), 200);
        }
        return $this->response(201, "Invalid username or password", [], 200);
    }
    public function logout(){
        Session::flush();
        
        Auth::logout();

        return redirect('auth/login');
    }
}
