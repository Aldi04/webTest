<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;
use Response;
use Session;

class CityController extends Controller
{
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('GET','http://backend-dev.cakra-tech.co.id/api/city',[
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        $result['city'] = json_decode($req->getBody()->getContents(), true);
        
        $client1 = new \GuzzleHttp\Client();
        $req1 = $client1->request('GET','http://backend-dev.cakra-tech.co.id/api/province',[
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        $result['province'] = json_decode($req1->getBody()->getContents(), true);

        return view('city.index', compact('result'));
    }

    public function insert(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('POST','http://backend-dev.cakra-tech.co.id/api/city',[
            'form_params' =>[
                'city_code' => $request->city_code,
                'city_name' => $request->city_name,
                'province_id' => $request->province_id,
            ],
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        $result = json_decode($req->getBody()->getContents(), true);
        
        return redirect('/city');
    }

    public function show($id)
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('POST','http://backend-dev.cakra-tech.co.id/api/city/'.$id,[
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        
        return redirect('/city');
    }

    public function edit(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('PUT','http://backend-dev.cakra-tech.co.id/api/city',[
            'form_params' =>[
                'id' => $request->id,
                'city_code' => $request->city_code,
                'city_name' => $request->city_name,
                'province_id' => $request->province_id,
            ],
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        $result = json_decode($req->getBody()->getContents(), true);
        
        return redirect('/city');
    }
    public function delete($id)
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('delete','http://backend-dev.cakra-tech.co.id/api/city/'.$id,[
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        
        return redirect('/city');
    }
}
