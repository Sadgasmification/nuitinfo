<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        if($request) {
            if ($request->input('name')) {
                $meteo = json_decode(file_get_contents('https://opendata-nuit.herokuapp.com/api/meteo/'.$request->input('name')));
            }
            elseif ($request->input('lat') && $request->input('lon')) {
                $meteo = json_decode(file_get_contents('https://opendata-nuit.herokuapp.com/api/meteo?lat='.$request->input('lat').'&lon='.$request->input('lon')));
            }
            else {
                $meteo = json_encode('Error');
            }
            if ($request->input('lat') && $request->input('lon')) {
                $traffic = json_decode(file_get_contents('https://opendata-nuit.herokuapp.com/api/traficinfo?lat='.$request->input('lat').'&lon='.$request->input('lon')));
            }
            else {
                $traffic = json_encode('Error');
            }
        }
        else {
            $meteo = json_encode('Error');
            $traffic = json_encode('Error');
        }

        return view('welcome')->with('meteo',$meteo)->with('traffic',$traffic);
        return view('welcome');
    }

    public function meteo(Request $request)
    {
        if ($request->input('name')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://opendata-nuit.herokuapp.com/api/meteo/'.$request->input('name'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $return = curl_exec($ch);
            curl_close($ch);
            // $return = json_decode(file_get_contents('https://opendata-nuit.herokuapp.com/api/meteo/'.$request->input('meteo')['name']));
        }
        elseif ($request->input('lat') && $request->input('lon')) {
            $url = 'https://opendata-nuit.herokuapp.com/api/meteo?lat='.$request->input('lat').'&lon='.$request->input('lon');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $return = curl_exec($ch);
            curl_close($ch);
            // dd($url);
            // $return = json_decode(file_get_contents(');
        }
        else {
            $return = json_encode('Error');
        }
        return $return;
    }

    public function traffic(Request $request)
    {
        // dd($request->all());
        if ($request->input('lat')!=null && $request->input('lon')!=null) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://opendata-nuit.herokuapp.com/api/traficinfo?lat='.$request->input('lat').'&lon='.$request->input('lon'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $return = curl_exec($ch);
            curl_close($ch);
            // $return = json_decode(file_get_contents(');
        }
        else {
            $return = json_encode('Error');
        }
        return $return;
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
}
