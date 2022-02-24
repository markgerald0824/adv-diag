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
        $scriptController = new ScriptController();
        $scripts = $scriptController->getScripts();

        if ( count( $scripts ) > 0 ) {
            $checkExistingScript = $this->checkExistingScript( $scripts );
            if ( ! $checkExistingScript ) $scriptController->saveScript();

        } else {
            $addScript = $scriptController->addScript();
            if ( $addScript ) $scriptController->saveScript();
        }
    }

    public function checkExistingScript( $scripts ) {
        $hasScript = false;

        foreach ( $scripts as $script ) {
            if ( $script->src == $this->scriptName() ) $hasScript = true;
        }

        return $hasScript;
    }
}
