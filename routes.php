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
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["admin"],
    ],
    "/user" => [
        "CONTROLLER" => "UsersController",
        "METHOD" => "detail",
        "HTTP_METHODS" => "GET",
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["admin"],
    ],
    "/api/user" => [
        "CONTROLLER" => "UsersController",
        "METHOD" => "userToJson",
        "HTTP_METHODS" => "GET",
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["admin"],
    ],
    // debut des routes pour le client
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
        "ROLES"=>["admin"],
    ],
    "/client/delete" => [
        "CONTROLLER" => "ClientController",
        "METHOD" => "delete",
        "HTTP_METHODS" => ["GET","POST"],
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["admin"],
    ],
    "/client/list" => [
        "CONTROLLER" => "ClientController",
        "METHOD" => "list",
        "HTTP_METHODS" => ["GET","POST"],
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["admin"],
    ],
    "/client" => [
        "CONTROLLER" => "clientController",
        "METHOD" => "detail",
        "HTTP_METHODS" => "GET",
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["admin"],
    ],


    // fin des routes pour les clients
    
];
