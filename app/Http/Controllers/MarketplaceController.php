<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarketplaceVendedor;
use App\Models\MarketplaceProduto;

class MarketplaceController extends Controller
{
    //

    public function index(){
        return view("marketplace.index");
    }

    public function produtos(){
        return view("marketplace.produtos");
    }

    public function produto($slug, MarketplaceProduto $produto){
        return view("marketplace.produto", ["produto" => $produto]);
    }

    public function vendedor($slug){
        $vendedor = MarketplaceVendedor::where("slug", $slug)->first();
        if($vendedor){
            return view("marketplace.vendedor", ["vendedor" => $vendedor]);
        }else{
            return abort(404);
        }
    }
}
