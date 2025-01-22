<?php
const ROUTES = [
    "/" => [
        "CONTROLLER" => "HomeController",
        "METHOD" => "index",
        "HTTP_METHODS" => "GET",
        "AUTH" => ["ROLE_ADMIN", "ROLE_DEV", "ROLE_CHEF"],
    ],
    "/state/list" => [
        "CONTROLLER" => "StateController",
        "METHOD" => "list",
        "HTTP_METHODS" => "GET",
        "AUTH" => ["ROLE_ADMIN"],
    ],
    "/register" => [
        "CONTROLLER" => "AuthController",
        "METHOD" => "register",
        "HTTP_METHODS" => ["GET", "POST"],
    ],
    "/login" => [
        "CONTROLLER" => "AuthController",
        "METHOD" => "login",
        "HTTP_METHODS" => ["GET", "POST"],
    ],
    "/logout" => [
        "CONTROLLER" => "AuthController",
        "METHOD" => "logout",
        "HTTP_METHODS" => "GET",
        "AUTH" => ["ROLE_ADMIN", "ROLE_DEV", "ROLE_CHEF"],

    ],
    "/users/list" => [
        "CONTROLLER" => "UsersController",
        "METHOD" => "list",
        "HTTP_METHODS" => "GET",
        "AUTH" => ["ROLE_ADMIN"],
    ],
    "/user/{id}" => [
        "CONTROLLER" => "UsersController",
        "METHOD" => "detail",
        "HTTP_METHODS" => "GET",
        "AUTH" => ["ROLE_ADMIN"],

    ],
    "/api/user" => [
        "CONTROLLER" => "UsersController",
        "METHOD" => "userToJson",
        "HTTP_METHODS" => "GET",
        "AUTH" => ["ROLE_ADMIN"],

    ],

// oublie pas de changer les routes dans ce fichier :) 
    // debut des routes pour le client
    "/client/create" => [
        "CONTROLLER" => "ClientController",
        "METHOD" => "create",
        "HTTP_METHODS" => ["GET", "POST"],
        "AUTH" => ["ROLE_ADMIN"],
    ],
    "/client/update/{id}" => [
        "CONTROLLER" => "ClientController",
        "METHOD" => "update",
        "HTTP_METHODS" => ["GET", "POST"],
        "AUTH" => ["ROLE_ADMIN"],
    ],
    "/client/delete/{id}" => [
        "CONTROLLER" => "ClientController",
        "METHOD" => "delete",
        "HTTP_METHODS" => ["GET", "POST"],
        "AUTH" => ["ROLE_ADMIN"],
    ],

    // crétion de route avec api pour utiliser l'asynchrone  "fetch()"

    "/api/client/delete/{id}" => [
        "CONTROLLER" => "ClientController",
        "METHOD" => "deleteApi",
        "HTTP_METHODS" => ["DELETE"],
        "AUTH" => ["ROLE_ADMIN"],
    ],

    "/client/list" => [
        "CONTROLLER" => "ClientController",
        "METHOD" => "list",
        "HTTP_METHODS" => ["GET", "POST"],
        "AUTH" => ["ROLE_ADMIN"],
    ],
    "/client/{id}" => [
        "CONTROLLER" => "ClientController",
        "METHOD" => "detail",
        "HTTP_METHODS" => "GET",
        "AUTH" => ["ROLE_ADMIN"],
    ],
    "/users/create" => [
        "CONTROLLER" => "UsersController",
        "METHOD" => "create",
        "HTTP_METHODS" => ["GET", "POST"],
        "AUTH" => ["ROLE_ADMIN"],
    ],

    "/users/update/{id}" => [
        "CONTROLLER" => "UsersController",
        "METHOD" => "update",
        "HTTP_METHODS" => ["GET", "POST"],
        "AUTH" => ["ROLE_ADMIN"],
    ],

    "/users/delete/{id}" => [
        "CONTROLLER" => "UsersController",
        "METHOD" => "delete",
        "HTTP_METHODS" => ["GET", "POST"],
        "AUTH" => ["ROLE_ADMIN"],
    ],

    // fin des routes pour les clients


    // Début des routes pour les projects 
    "/project/create" => [
        "CONTROLLER" => "ProjectController",
        "METHOD" => "create",
        "HTTP_METHODS" => ["GET", "POST"],
        "AUTH" => ["ROLE_ADMIN", "ROLE_CHEF"],
    ],
    "/project/update/{id}" => [
        "CONTROLLER" => "ProjectController",
        "METHOD" => "update",
        "HTTP_METHODS" => ["GET", "POST"],
        "AUTH" => ["ROLE_ADMIN", "ROLE_CHEF"],
    ],
    "/project/delete/{id}" => [
        "CONTROLLER" => "ProjectController",
        "METHOD" => "delete",
        "HTTP_METHODS" => ["GET", "POST"],
        "AUTH" => ["ROLE_ADMIN", "ROLE_CHEF"],
    ],
    "/project/list" => [
        "CONTROLLER" => "ProjectController",
        "METHOD" => "list",
        "HTTP_METHODS" => ["GET", "POST"],
        "AUTH" => ["ROLE_ADMIN", "ROLE_DEV", "ROLE_CHEF"],
    ],
    "/project/{id}" => [
        "CONTROLLER" => "ProjectController",
        "METHOD" => "detail",
        "HTTP_METHODS" => "GET",
        "AUTH" => ["ROLE_ADMIN", "ROLE_DEV", "ROLE_CHEF"],
    ],
    "/planning/{date}" => [
        "CONTROLLER" => "PlanningController",
        "METHOD" => "displayPlanningGlobal",
        "HTTP_METHODS" => "GET",
        "AUTH" => ["ROLE_ADMIN","ROLE_DEV","ROLE_CHEF"],
    ],


    "/planning"=>[
    "CONTROLLER" => "PlanningController",
    "METHOD"=> "displayPlanningGlobal",
    "HTTP_METHODS" => "GET",
    "AUTH" => ["ROLE_ADMIN","ROLE_DEV","ROLE_CHEF"],

    ],
    "/api/task/check"=>[
    "CONTROLLER" => "TaskController",
    "METHOD"=> "taskCheck",
    "HTTP_METHODS" => "POST",
    ],
    "/task/create"=>[
    "CONTROLLER" => "TaskController",
    "METHOD"=> "create",
    "HTTP_METHODS" => "POST",
    "AUTH" => ["ROLE_ADMIN"],
    ],
    "/api/task/delete/{id}" => [
        "CONTROLLER" => "TaskController",
        "METHOD" => "apiDelete",
        "HTTP_METHODS" => ["DELETE"],
        "AUTH" => ["ROLE_ADMIN"],
    ],

];
