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


    // debut des routes pour le client
    "/client/create" => [
        "CONTROLLER" => "ClientController",
        "METHOD" => "create",
        "HTTP_METHODS" => ["GET","POST"],
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["ROLE_ADMIN"],
    ],
    "/client/update" => [
        "CONTROLLER" => "ClientController",
        "METHOD" => "update",
        "HTTP_METHODS" => ["GET","POST"],
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["ROLE_ADMIN"],
    ],
    "/client/delete" => [
        "CONTROLLER" => "ClientController",
        "METHOD" => "delete",
        "HTTP_METHODS" => ["GET","POST"],
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["ROLE_ADMIN"],
    ],
    "/client/list" => [
        "CONTROLLER" => "ClientController",
        "METHOD" => "list",
        "HTTP_METHODS" => ["GET","POST"],
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["ROLE_ADMIN"],
    ],
    "/client" => [
        "CONTROLLER" => "clientController",
        "METHOD" => "detail",
        "HTTP_METHODS" => "GET",
        "REQUIRED_AUTH"=>true,
        "ROLES"=>["ROLE_ADMIN"],
    ],
    "/users/create" => [
        "CONTROLLER" => "UsersController",
        "METHOD" => "create",
        "HTTP_METHODS" => ["GET", "POST"],
        "REQUIRED_AUTH" => true,
        "ROLES" => ["ROLE_ADMIN"],
    ],

    "/users/update" => [
        "CONTROLLER" => "UsersController",
        "METHOD" => "update",
        "HTTP_METHODS" => ["GET", "POST"],
        "REQUIRED_AUTH" => true,
        "ROLES" => ["ROLE_ADMIN"],
    ],

    "/users/delete" => [
        "CONTROLLER" => "UsersController",
        "METHOD" => "delete",
        "HTTP_METHODS" => ["GET", "POST"],
        "REQUIRED_AUTH" => true,
        "ROLES" => ["ROLE_ADMIN"],
    ],

    // fin des routes pour les clients
];
