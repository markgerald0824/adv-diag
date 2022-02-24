<?php

namespace App\Http\Controllers;

use App\Models\InitializeAsset;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    public function getScripts() {
        $request = $this->shop()->rest( "GET", $this->adminApi() . "script_tags.json" );
        if ( $request['status'] !== 200 ) return [];

        return $request['body']['script_tags'];
    }

    public function addScript() {
        $script = array( "script_tag" => array(
            "event" => "onload",
            "src" => $this->scriptName()
        ) );

        $request = $this->shop()->rest( "POST", $this->adminApi() . "script_tags.json", $script );
        $status = $request['status'];
        return ( $status == 200 || $status == 201 ) ? true : false;
    }

    public function saveScript() {
        InitializeAsset::firstOrCreate([
            'user_id' => $this->userId(),
            'has_script' => true
        ]);
    }

    public function deleteScript( $ids = [] ) {
        if ( count( $ids ) > 0 ) {
            foreach( $ids as $id ) {
                $this->shop()->rest( "DELETE", $this->adminApi() . "script_tags/{$id}.json" );
            }
        }
    }
}
