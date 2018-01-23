<?php

// require'../sql/connection.php';
//
// $pdo = connection::connect($config['database']);
//
// $statement = $pdo->prepare("SELECT * FROM accountgegevens");
// $result = $statement->execute();
// $obj = $statement->fetch();
// var_dump($obj);

 session_start();
 try
 {
      $connect = connection::connect($config['database']);
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if(isset($_POST["login"]))
      {
           if(empty($_POST["username"]) || empty($_POST["password"]))
           {
                $message = '<label>Alle velden zijn vereist</label>';
           }
           else
           {
                $query = "SELECT * FROM accountgegevens WHERE gebruikersnaam = :username AND wachtwoord = :password";
                $statement = $connect->prepare($query);
                $statement->execute(
                     array(
                          'username'     =>     $_POST["username"],
                          'password'     =>     $_POST["password"]
                     )
                );
                $count = $statement->rowCount();
                if($count > 0)
                {
                     $_SESSION["username"] = $_POST["username"];
                     header("location:../index.php");
                }
                else
                {
                     $message = '<label>Verkeerde gegevens</label>';
                }
           }
          //  if($count==1){
          //     session_start();
          //     $_SESSION['logged']=true;
          //     $_SESSION ['username']=$config;
          //     header("refresh:1;url=../index.php");
          //     }
          //     else{
          //     $_SESSION['logged']=false;
          //     header("refresh:2;url=login.php");}

      }
 }
 catch(PDOException $error)
 {
      $message = $error->getMessage();
 }
 ?>
