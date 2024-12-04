<?php
const ROUTES = [
    "/" => [
        "CONTROLLER" => "HomeController",
        "METHOD" => "index",
        "HTTP_METHODS" => "GET",
        "REQUIRED_AUTH"=>true,
    ],
    "/state/list" => [
        "CONTROLLER" => "StateController",
        "METHOD" => "list",
        "HTTP_METHODS" => "GET",
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["admin"],
    ],
    "/login" => [
        "CONTROLLER" => "AuthController",
        "METHOD" => "login",
        "HTTP_METHODS" => ["GET","POST"],
        "REQUIRED_AUTH"=>false,
    ],
    "/logout" => [
        "CONTROLLER" => "AuthController",
        "METHOD" => "logout",
        "HTTP_METHODS" => "GET",
        "REQUIRED_AUTH"=>true,
    ],

    
];
