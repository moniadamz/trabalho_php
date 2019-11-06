<?php
class Route {
 private $route_id;
 private $agency_id;
 private $route_short_name;
 private $route_long_name;
 private $route_desc;
 private $route_type;
 private $route_url;
 private $route_color;
 private $route_text_color;
  
 public function getId()
 {
     return $this->route_id;
 }
 public function getAgencyId()
 {
     return $this->agency_id;
 }
 public function getShortName()
 {
     return $this->route_short_name;
 }
 public function getLongName()
 {
     return $this->route_long_name;
 }
 public function getDesc()
 {
     return $this->route_desc;
 }
 public function getType()
 {
     return $this->route_type;
 }
 public function getUrl()
 {
     return $this->route_url;
 }
 public function getColor()
 {
    return $this->route_color;
 }
 public function getTextColor()
 {
     return $this->route_text_color;
 }
 public function setId($value)
 {
     $this->route_id = $value;
 }
 public function setAgencyId($value)
 {
      $this->agency_id = $value;
 }
 public function setShortName($value)
 {
     $this->route_short_name = $value;
 }
 public function setLongName($value)
 {
     $this->route_long_name = $value;
 }
 public function setDesc($value)
 {
     $this->route_desc = $value;
 }
 public function setType($value)
 {
     $this->route_type = $value;
 }
 public function setUrl($value)
 {
     $this->route_url = $value;
 }
 public function setColor($value)
 {
     $this->route_color = $value;
 }
 public function setTextColor($value)
 {
    $this->route_text_color = $value;
 }

 public function save() {
 // logica para salvar cliente no banco
 }
  
 public function update() {
 // logica para atualizar cliente no banco
 }
  
 public function remove() {
 // logica para remover cliente do banco
 }
  
 public function listAll() {
    $conexao = Conexao::getInstance();
    $stmt    = $conexao->prepare("SELECT * FROM routes;");
    $result  = array();
    if ($stmt->execute()) {
        while ($rs = $stmt->fetchObject(Route::class)) {
            $result[] = $rs;
        }
    }
    if (count($result) > 0) {
        return $result;
    }
    return false;
 }
  
 /**
 * ...
 * outros métodos de abstração de banco
 * ...
 *
 */
}
 
?>