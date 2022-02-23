<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @description Get Shop Id
     */
    public function userId() {
        return Auth::user()->name;
    }

    /**
     * @description Get value from shopify-app.php
     */
    public function appConfig( $key ) {
        $value = config( "shopify-app.{$key}" );
        return $value ?? null;
    }
}
