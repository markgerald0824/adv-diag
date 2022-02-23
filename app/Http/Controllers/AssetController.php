<?php

namespace App\Http\Controllers;

use App\Models\InitializeAsset;
use App\Http\Controllers\ThemeController;
use Illuminate\Http\Request;
use Log;

class AssetController extends Controller
{
    public function init() {
        $initAssets = InitializeAsset::where( 'user_id', $this->userId() )->first();

        if ( ! $initAssets ) $this->addAsset();
    }

    public function addAsset() {
        $themeController = new ThemeController();
        echo json_encode( $themeController->listThemes() );
    }
}
