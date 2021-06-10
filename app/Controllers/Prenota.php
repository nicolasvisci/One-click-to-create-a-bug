<?php

namespace App\Controllers;

class Prenota extends BaseController {

    // this function receive ajax request and return closest providers
    function closest_locations(){

        $location = json_decode(preg_replace('/\\\"/',"\"",$_POST['data']));
        $lan=$location->longitude;
        $lat=$location->latitude;
        $email=$location->email;
        $base = base_url();
        $laboratori= $this->PosizioneModel->get_closest_locations($lan,$lat,$email);
        $indexed_laboratori = array_map('array_values', $laboratori);
        // this loop will change retrieved results to add links in the info window for the provider
        $x = 0;
        foreach($indexed_laboratori as $array => &$array){
            foreach($array as $key => &$value){
                if($key === 1){
                    $pieces = explode(",", $value);
                    $value = "$pieces[1]<a href='$base$pieces[0]'>More..</a>";
                }

                $x++;
            }
        }
        echo json_encode($indexed_laboratori,JSON_UNESCAPED_UNICODE);

    }
}