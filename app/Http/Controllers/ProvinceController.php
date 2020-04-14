<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;
use Response;
use Session;

class ProvinceController extends Controller
{
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('GET','http://backend-dev.cakra-tech.co.id/api/province',[
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        $result['province'] = json_decode($req->getBody()->getContents(), true);

        $client1 = new \GuzzleHttp\Client();
        $req1 = $client1->request('GET','http://backend-dev.cakra-tech.co.id/api/country',[
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        $result['country'] = json_decode($req1->getBody()->getContents(), true);
        return view('province.index', compact('result'));
    }

    public function insert(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('POST','http://backend-dev.cakra-tech.co.id/api/province',[
            'form_params' =>[
                'province_code' => $request->province_code,
                'province_name' => $request->province_name,
                'country_id' => $request->country_id,
            ],
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        $result = json_decode($req->getBody()->getContents(), true);
    
        return redirect('/province');
    }

    public function show($id)
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('POST','http://backend-dev.cakra-tech.co.id/api/province/'.$id,[
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        
        return redirect('/province');
    }

    public function edit(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('PUT','http://backend-dev.cakra-tech.co.id/api/province',[
            'form_params' =>[
                'id' => $request->id,
                'province_code' => $request->province_code,
                'province_name' => $request->province_name,
                'country_id' => $request->country_id,
            ],
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        $result = json_decode($req->getBody()->getContents(), true);
        
        return redirect('/province');
    }
    public function delete($id)
    {
        $client = new \GuzzleHttp\Client();
        $req = $client->request('delete','http://backend-dev.cakra-tech.co.id/api/province/'.$id,[
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        
        return redirect('/province');
    }
}
