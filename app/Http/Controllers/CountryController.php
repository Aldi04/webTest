<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;
use Response;
use Session;

class CountryController extends Controller
{
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('GET','http://backend-dev.cakra-tech.co.id/api/country',[
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        $result = json_decode($req->getBody()->getContents(), true);
        return view('country.index', compact('result'));
    }

    public function insert(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('POST','http://backend-dev.cakra-tech.co.id/api/country',[
            'form_params' =>[
                'country_code' => $request->country_code,
                'country_name' => $request->country_name
            ],
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        $result = json_decode($req->getBody()->getContents(), true);
        
        return redirect('/country');
    }

    public function show($id)
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('POST','http://backend-dev.cakra-tech.co.id/api/country/'.$id,[
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        
        return redirect('/country');
    }

    public function edit(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('PUT','http://backend-dev.cakra-tech.co.id/api/country',[
            'form_params' =>[
                'id' => $request->id,
                'country_code' => $request->country_code,
                'country_name' => $request->country_name
            ],
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        $result = json_decode($req->getBody()->getContents(), true);
        
        return redirect('/country');
    }
    public function delete($id)
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('delete','http://backend-dev.cakra-tech.co.id/api/country/'.$id,[
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        
        return redirect('/country');
    }
}
