<?php

use Core\Session;

    function assets($assetName){
        return URL.'public/'.$assetName;
    }

    function redirect($url){

        header('Location:'.URL.$url);
    }

    function _link($url = null){

        return URL.$url;
    }

    function _sessionNames($name){
        return Session::getSession($name);
    }

?>