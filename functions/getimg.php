<html>
<?php

  $id = $_GET['id'];
  // do some validation here to ensure id is safe

  $link = mysql_connect("localhost", "root", "root");
  mysql_select_db("examen");
  $sql = "SELECT objectimage FROM imagelink WHERE imageid=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);
  mysql_close($link);

  header("Content-type: image/jpeg");
  echo $row['dvdimage'];


?>
src="getImage.php?id=1" width="175" height="200" /> <img src="getImage.php?id=2" width="175" height="200" />
</html>
