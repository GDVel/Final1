<html>
<body>
<?php

//singleton connection
class dbaccess {

private $connection;

public static function getInstance(){
  static $instance = null;
  if (null === $instance){
        $instance = new dbaccess();
        $instance->connect();
 }
  return $instance;

}

private function connect(){
 $this->connection = new PDO('mysql:host=' .constants::$sqlhost . 'dbname' . constants::$sqldb, constants::$sqldb, constants::$sqlpass);
}

public function result($query){

 $stmt = $this->connection->prepare($query);
 $stmt->execute();
 $result = $stmt->fetch();
 return $result;

 }
}
</body>
</html>
