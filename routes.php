<?php
const ROUTES = [
    "/" => [
        "CONTROLLER" => "HomeController",
        "METHOD" => "index",
        "HTTP_METHODS" => "GET",
    ],
    "/state/list" => [
        "CONTROLLER" => "StateController",
        "METHOD" => "list",
        "HTTP_METHODS" => "GET",
    ],
    "/login" => [
        "CONTROLLER" => "AuthController",
        "METHOD" => "login",
        "HTTP_METHODS" => ["GET","POST"],
    ],
    "/logout" => [
        "CONTROLLER" => "AuthController",
        "METHOD" => "logout",
        "HTTP_METHODS" => "GET",
    ],

    
];
