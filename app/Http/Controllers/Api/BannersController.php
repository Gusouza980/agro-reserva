<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    public function index(){
        return response()->json(HomeBanner::all());
    }
}
