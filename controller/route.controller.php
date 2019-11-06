<?php
require_once 'model/route.php';
  
class RouteController {
 
 public function listar() {
 $route = new Route();
 $routes = $route->listAll();
 
 $_REQUEST['routes'] = $routes;
 
 require_once 'view/route.view.php';
 }
}
 
?>