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
        return Auth::user()->id;
    }

    /**
     * @description Get the Shop api
     */
    public function shop() {
        return Auth::user()->api();
    }

    /**
     * @description Get value from shopify-app.php
     */
    public function appConfig( $file, $key ) {
        $value = config( "{$file}.{$key}" );
        return $value ?? null;
    }

    /**
     * @description Initialize the shopify admin api + version
     */
    public function adminApi() {
        $apiVersion = $this->appConfig( 'shopify-app', 'api_version' );
        return "/admin/api/{$apiVersion}/";
    }

    /**
     * @description Initialize the value of the script to append to storefront
     */
    public function scriptName() {
        $appUrl = $this->appConfig( 'app', 'url' );
        $scriptUrl = $appUrl . "/assets/js/adv-diag.js";

        return $scriptUrl;
    }
}
