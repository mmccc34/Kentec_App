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
        "ROLES"=>["ROLE_ADMIN"],
    ],
    "/register" => [
        "CONTROLLER" => "AuthController",
        "METHOD" => "register",
        "HTTP_METHODS" => ["GET","POST"],
        "REQUIRED_AUTH"=>false,
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
    "/users/list" => [
        "CONTROLLER" => "UsersController",
        "METHOD" => "list",
        "HTTP_METHODS" => "GET",
        "ROLES"=>["ROLE_ADMIN"],
        "REQUIRED_AUTH"=>true,
    ],
    "/user" => [
        "CONTROLLER" => "UsersController",
        "METHOD" => "detail",
        "HTTP_METHODS" => "GET",
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["ROLE_ADMIN"],

    ],
    "/api/user" => [
        "CONTROLLER" => "UsersController",
        "METHOD" => "userToJson",
        "HTTP_METHODS" => "GET",
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["ROLE_ADMIN"],

    ],
    "/client/create" => [
        "CONTROLLER" => "ClientController",
        "METHOD" => "create",
        "HTTP_METHODS" => ["GET","POST"],
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["admin"],
    ],
    "/client/update" => [
        "CONTROLLER" => "ClientController",
        "METHOD" => "update",
        "HTTP_METHODS" => ["GET","POST"],
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["ROLE_ADMIN"],

    ],


 
    
];
