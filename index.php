<?php
session_start();
require_once("App/Controllers/Router.php");
$Router=new Router();
$Router->routeReq();