<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Sthom\Kernel\Kernel;
use Sthom\Kernel\Error\ErrorHandler;

ErrorHandler::handle();
session_start();
    Kernel::boot();


