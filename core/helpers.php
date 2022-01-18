<?php

function requireFiles($path){
    if(file_exists($path)){
        foreach (glob($path.DIRECTORY_SEPARATOR."*.php") as $file){
            require_once $file;
        }
    }
}

function requireExceptions(){
    requireFiles("./core/Exceptions");
}

function requireControllers(){
    requireFiles("./Controllers");
}
function requireModels(){
    requireFiles("./Models");
}

function requireRequests(){
    requireFiles("./FormRequests");
}