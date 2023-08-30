<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Deals;
use Illuminate\Support\Facades\Http;

class dealsController extends Controller
{

    function deals(){

        $path = storage_path().'/deals.json' ;// ie: /var/www/laravel/app/storage/json/filename.json
        
        $collection = json_decode(file_get_contents($path), true);



        foreach (request()->query() as $query => $value){

            
            $arrayUrl = explode(',',$value);
            

            foreach($arrayUrl as $value){
                

                if(str_contains($value, ':')){
                    
                    $findBy = explode( ': ', $value);
                   
                    $attribute = $findBy[1];
                   
                    $collection = collect($collection)->filter(function ($q) use ($attribute){
                        return Str::startsWith($q['title'], $attribute);
                    })->toArray();
                    

                }
                if(str_contains($value, '=')){
                    $findBy = explode('= ', $value);
                    $collection = collect($collection)->where('title', '=', $findBy[1])->toArray();
                }
                if(str_contains($value, '<')){
                    $findBy = explode( '< ', $value);
                   
                    $collection = collect($collection)->where('salePrice', '<', (int)$findBy[1])->toArray();
                }
                if(str_contains($value, '>')){
                    $findBy = explode('> ', $value);
                       
                    $collection = collect($collection)->where('salePrice', '>', (int)$findBy[1])->toArray();
                }
            }
        }
        return $collection;

        
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

}
