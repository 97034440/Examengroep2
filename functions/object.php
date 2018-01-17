<?php


class shieet {
  private $host;
  private $username;
  private $password;

  private $conn;

  public function __Construct($set_host, $set_username, $set_password){
    $this->host = $set_host;
    $this->username = $set_username;
    $this->password = $set_password;
    $this->conn = mysqli_connect($this->host, $this->username, $this->password)
                  or die("Couldn't connect");
  }

  public function Database($set_database)
  {
    mysqli_select_db(examen, $this->conn) or die("cannot select Dataabase");
  }

  public function Fetch($tablename){
    return mysqli_query("SELECT * FROM ".$tablename, $this->conn);
  }
}

$connect = new shieet('localhost','root','root');

$posts = $connect->Fetch('object');

if ($posts && mysql_num_rows($posts) > 0) {
     echo "Here is some post data:<BR>";
     while ($record = mysql_fetch_array($posts)) {
         echo $record[0];
     }
} else {
     echo "No posts!";
}

?>
