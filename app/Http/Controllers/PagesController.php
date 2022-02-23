<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $assetController = new AssetController();
        $assetController->init();
        
        return view( 'welcome' );
    }
}
