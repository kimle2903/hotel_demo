<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class TestController extends Controller
{
    public function index(){
        $client = new Client();
        $response = $client->get('http://127.0.0.1:8000/api/item');
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $client = new Client();
     
      try {
            $client->request("POST", 'http://127.0.0.1:8000/api/item?title='.$request->title.'&body='.$request->body);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
               $smg = $e->hasResponse();
            }else{
                $smg = "The item can't create";
            }

            return redirect('test/create')->with("error", $smg);
        }

        return redirect('test/create')->with("success", "Created Succesful");
    }

    public function edit($id){
          $client = new Client();
          $item = $client->get("http://127.0.0.1:8000/api/item/".$id);
          $item = json_decode($item->getBody()->getContents());
        //   dd($item);
          return view('edit', compact('item'));
    }

    public function update(Request $request, $id){
        $client = new Client();
        try {
            $client->request("POST", 'http://127.0.0.1:8000/api/item/'.$id.'?title='.$request->title.'&body='.$request->body.'&_method=PUT');
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
               $smg = $e->hasResponse();
            }else{
                $smg = "The item can't update";
            }

            return redirect('test')->with("error", $smg);
        }

        return redirect('test')->with("success", "Update Succesful");
    }

    public function destroy($id){
        $client = new Client();
       
        if($client->get("http://127.0.0.1:8000/api/item/".$id."?_method=DELETE")){
            return redirect('test')->with("success", "Delete Succesful");
        }
         return redirect('test')->with("error", "Delete Fail");
    }

    public function searchTravelMoney(){
       

        return view("travel_money.search");
    }

    public function processSearch(Request $request){
        $arrItem = collect();
        $item = collect(
            [
                'currency' => $request->currency,
                'price_euros'=>$request->price_euros,
                'price_currency'=>$request->price_currency,
                'time_travelling'=>$request->time_travelling,
                'location' => $request->location,
            ]
            );
        $arrItem->push($item);
        dd($arrItem);
    }
}

