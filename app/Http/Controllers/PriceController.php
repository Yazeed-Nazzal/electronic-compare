<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PriceController extends Controller
{
    public function changePrice  (Request $request,$currency){
        switch ($currency){
            case "dollar":
//                Session::set('price',1);
//                Session::set('price-sign',"$");
                $request->session()->start();
                $request->session()->put('price',1);
                $request->session()->put('price-sign',"$");
//                $_SESSION['price'] = 1;
//                $_SESSION['price-sign'] = "$";
                break;
            case "euro":
             $request->session()->start();
                $request->session()->put('price',0.84);
                $request->session()->put('price-sign',"EU");
                break;
            case "dinar":
                $request->session()->start();
                $request->session()->put('price',0.71);
                $request->session()->put('price-sign',"JO");
                break;
            default:
                abort('404');
        }
        return back();

    }

}
