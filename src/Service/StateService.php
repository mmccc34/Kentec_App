<?php

namespace Sthom\App\Service;

class StateService{
    public static function getColor(int $id){
        switch($id){
            case(1): return(["#7a6f82","#ffffff"]);
            case(2): return(["#ffca28","#212121"]);
            case(3): return(["#66bb6a","#ffffff"]);
            case(4): return(["#ef5350","#ffffff"]);
        }
    }

}