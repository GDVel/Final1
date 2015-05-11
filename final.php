<html>
<body>
<?php

class keys {
            public static $sqlhost = 'localhost';
            public static $sqluser = 'root';
            public static $sqlpass = 'password';
            public static $sqldb = 'project';
        }



//singleton connection from php tut
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
//conencting to mysql database
private function connect(){
 $this->connection = new PDO('mysql:host=' .keys::$sqlhost . 'dbname' . keys::$sqldb, keys::$sqldb, keys::$sqlpass);
}

public function result($query){

 $stmt = $this->connection->prepare($query);
 $stmt->execute();
 $result = $stmt->fetch();
 return $result;

 }
}

class main {
   
  // accessing db
   private $db;
 
   public function __construct() {
   $this->db = dbaccess::getInstance();
  }
  //page output
  public function __destruct() {
  if (!(isset($_GET["entry"]))) {
             $this->menu();
             } 
             else {
              $id = $_GET["entry"];
              $this->compile($id);
               }
            }

public function menu() {
  echo <<< INS
       <p>Please Select what you want answered</p>
    <ul>
      <li><a href='{$_SERVER['PHP_SELF']}?entry=1'>College with highest percetnage of female students</a></li>
      <li><a href='{$_SERVER['PHP_SELF']}?entry=2'>College with highest percentage of male students</a></li>
      <li><a href='{$_SERVER['PHP_SELF']}?entry=3'>College with largest endowment</a></li>
      <li><a href='{$_SERVER['PHP_SELF']}?entry=4'>College with largest enrollment of freshmen</a></li>
      <li><a href='{$_SERVER['PHP_SELF']}?entry=5'>College with highest revenue from tuition</a></li>
      <li><a href='{$_SERVER['PHP_SELF']}?entry=6'>College with lowest non-zero tuition</a></li>
   </ul>
INS;
}
          
public function compile($num) {
    switch ($num) {
  case 1:
         $query = 'select distinct college.name, college.city, college.state, enrollment.womentotal from enrollment join on college.id = enrollment.college_id where enrollment.time = 3 order by mentotal DESC limit 1;';
         $result = $this->db->Result($query);
        echo '<h3>Colleges with the highest percentage of women students?</h3>';
        echo '<p> The College with the highest amount of enrolled women is  ' .$result['name'] .$result['city'] .$result['state'] .'</p> ';
          break;
  case 2:
        $query = 'select distinct college.name, college.city, college.state, enrollment.mentotal from enrollment join on college.id = enrollment.college_id where enrollment.time = 3 order by womentotal DESC limit 1; ';
        $result = $this->db->Result($query);
        echo '<h3>Colleges with the highest percentage of male students?</h3>';
        echo '<p> The College with the highest amount of enrolled men is  ' .$result['name'] .$result['city'] .$result['state'] .'</p>';

            break;
  case 3:
      $query = 'select college.name, college.city, college.state, financial.endowment from financial join college on college.id = financial.college_id order by financial.endowment DESC limit 1 ';
      $result = $this->db->Result($query);
      echo '<h3>Colleges with the largest endowment?</h3>';
      echo '<p> The College with the largest endowment is  ' .$result['name'] .$result['city'] .$result['state'] .'</p>';

      break;
 case 4:
      $query = 'select college.name, college.city, college.state, enrollment.total, from enrollment join college on college.id = enrollment.college_id where enrollment.status = 3 order by enrollment.total DESC limit 1 ';
      $result = $this->db->Result($query);
      echo '<h3>Colleges with largest enrollment of freshmen?</h3>';
      echo '<p> The College with the largest amount of enrolled freshmen is  ' .$result['name'] .$result['city'] .$result['state'] .'</p>';

      break;
  case 5:
      $query = 'college.name, college.city, college.state, financial.tuition from financial join college on college.id = financial.college_id order by financial.tuition DESC limit 1';
      $result = $this->db->Result($query);
      echo '<h3>Colleges with the highest revenue from tuition?</h3>';
       echo '<p> The College with the largest revenue from tuition is  ' .$result['name'] .$result['city'] .$result['state'] .'</p>';
      
      break;
  case 6:
     $query= 'select college.name, college.city, college.state, financial.tuition from financial join college college.id = financial.college_id where tuition <> 0 order by tuition limit 1  ';
    $result = $this->db->Result($query);
    echo '<h3>Colleges with the lowest non-zero tuition?</h3>';
     echo '<p> The College with the lowest non-zero tuition is  ' .$result['name'] .$result['city'] .$result['state'] .'</p>';

    break;
                  
                }
                echo "<a href='".$_SERVER['PHP_SELF']."'>Return to Menu</a>";
            }
}


        
        
$main = new main();


        
            

</body>
</html>
