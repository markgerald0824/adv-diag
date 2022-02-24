<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function listThemes() {
        $shop = Auth::user();
        $apiVersion = $this->appConfig( 'api_version' );
        $themeUrl = "/admin/api/{$apiVersion}/themes.json";
        $request = $shop->api()->rest( 'GET', $themeUrl );

        \Log::info( json_encode( $request['body']['themes'] ) );
        return true;
    }
}
