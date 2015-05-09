<html>
<body>
<?php

//starting connection
 $dbc = mysql_connect('localhost','root','redline9k');
    if(!$dbc)
    {
      die('not connected'   . mysql_error());
    }

//selecting database

$dbs = mysql_select_db("employees",$dbc);
   if(!$dbs)
   {
     die('no databse ' . mysql_error());
   }

//testing update




?>
</body>
</html>
