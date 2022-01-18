<?php

class HomeController extends Controller
{
    public function index(){
        echo json_encode(["result" => "welcome to home page"]);
    }
}