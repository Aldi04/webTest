<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;
use Response;
use Session;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerAction(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('POST','http://backend-dev.cakra-tech.co.id/api/register',[
            'form_params' =>[
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
            ]
        ]);
        return redirect('/login');
    }

    public function login()
    {
        return view('login');
    }

    public function loginAction(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('POST','http://backend-dev.cakra-tech.co.id/api/login',[
            'form_params' =>[
                'email' => $request->email,
                'password' => $request->password,
            ]
        ]);
        $result = json_decode($req->getBody()->getContents(), true);
        $token = $result['token'];
        Session::put('token', $token);
        
        return redirect('/home');
    }

    public function home()
    {
        return view('home');
    }

    public function changePassword(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('POST','http://backend-dev.cakra-tech.co.id/api/change-password',[
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ],
        
            'form_params' =>[
                'oldPassword' => $request->oldPassword,
                'newPassword' => $request->newPassword,
            ],
        ]);
        $result = json_decode($req->getBody()->getContents(), true);

        return redirect('/login');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
