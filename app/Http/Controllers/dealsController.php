<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Deals;

class dealsController extends Controller
{
    //

    function deals(){
        $data = [
            0 => [
              "internalName"=> "COLLAPSE",
              "title"=> "Collapse!",
              "metacriticLink"=> "/game/pc/collapse",
              "dealID"=> "9hzJBWH3Zmyu2lBmbUG%2FdIXFiafNs0s9G5Qa5ccRjV0%3D",
              "storeID"=> "1",
              "gameID"=> "106086",
              "salePrice"=> "1.99",
              "normalPrice"=> "19.99",
              "isOnSale"=> "1",
              "savings"=> "90.045023",
              "metacriticScore"=> "0",
              "steamRatingText"=> "Mostly Positive",
              "steamRatingPercent"=> "71",
              "steamRatingCount"=> "455",
              "steamAppID"=> "289620",
              "releaseDate"=> 1611532800,
              "lastChange"=> 1625531581,
              "dealRating"=> "9.4",
              "thumb"=> "https://cdn.cloudflare.steamstatic.com/steam/apps/289620/capsule_sm_120.jpg?t=1618414871"
            ],

            1 => [
                "internalName"=> "THEORANGEBOX",
                "title"=> "The Orange Box",
                "metacriticLink"=> "/game/pc/the-orange-box",
                "dealID"=> "TZdIf%2BhNCxhdhp2S69CaIwYmzVwD2n3OR%2BiLDGnURRo%3D",
                "storeID"=> "1",
                "gameID"=> "94081",
                "salePrice"=> "3.99",
                "normalPrice"=> "60",
                "isOnSale"=> "1",
                "savings"=> "80.040020",
                "metacriticScore"=> "96",
                "steamRatingText"=> "Very Positive",
                "steamRatingPercent"=> "94",
                "steamRatingCount"=> "990909",
                "steamAppID"=> "469",
                "releaseDate"=> 1191974400,
                "lastChange"=> 1625001348,
                "dealRating"=> "9.3",
                "thumb"=> "https://cdn.cloudflare.steamstatic.com/steam/subs/469/capsule_sm_120.jpg?t=1577609887"
            ],

            2 => [
                "internalName"=> "THEORANGEBOX",
                "title"=> "The Orange Box",
                "metacriticLink"=> "/game/pc/the-orange-box",
                "dealID"=> "TZdIf%2BhNCxhdhp2S69CaIwYmzVwD2n3OR%2BiLDGnURRo%3D",
                "storeID"=> "1",
                "gameID"=> "94081",
                "salePrice"=> "3.99",
                "normalPrice"=> "60",
                "isOnSale"=> "1",
                "savings"=> "80.040020",
                "metacriticScore"=> "96",
                "steamRatingText"=> "Very Positive",
                "steamRatingPercent"=> "94",
                "steamRatingCount"=> "990909",
                "steamAppID"=> "469",
                "releaseDate"=> 1191974400,
                "lastChange"=> 1625001348,
                "dealRating"=> "9.3",
                "thumb"=> "https://cdn.cloudflare.steamstatic.com/steam/subs/469/capsule_sm_120.jpg?t=1577609887"
            ],
            
        ];

        // foreach (request()->query() as $query => $value){
        //     $attribute = $transformer::originalAttribute($query);

        //     if(isset($attribute, $value)){
        //         $collection = $collection->where($attribute, $value);
        //     }
        // }

        // return $collection;

        
        if(request()->has('sort_by')){
            $attribute = request()->sort_by;

            $collection = collect($data)->filter(function($deal) use ($attribute){

                return $deal["internalName"] === $attribute;
            });

            return $collection;

            
        }

        if(request()->has('q')){

            $attribute = request()->q;
          
            
            $collection = collect($data)->filter(function ($q) use ($attribute) {
                return Str::startsWith($q['title'], $attribute);
            });
            return $collection;
       
        }


        if(request()->has('precio')){

            $attribute = request()->precio;
          

            $collection = collect($data)->where('normalPrice', '>', 30);

           return $collection;

       
        }

        
    }

    public function views(){

        return view('deals');

    }

    public function backenddeals(){

        $deals = Deals::all();

        return view('backend.deals')->with('deals', $deals);
    }


    public function backendcreate(){
        return view('backend.dealsform');
    }


    public function backendupdate($id){

        $deal = Deals::find($id);

        return view('backend.dealsformedit')->with( 'id' , $id )->with( 'deal', $deal);
    }

    public function post(){

      $deals = new Deals;
      $deals->fill($_POST);
      $deals->save();

      return Deals::all();

    }

    public function update($id){

      $deals = Deals::find($id);
      $deals->fill($_POST);
      $deals->save();

      return Deals::all();
    }

    protected function delete_deals($id){

        $clientes = Deals::find($id);
        $clientes->delete();
  
        return Deals::all();
  
    }

    protected function subirdeals(){
        $file = $request->file('file');
        var_dump($file);
        
    }

}
