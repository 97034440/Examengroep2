<?php
try{ // maakt de connectie aan met de database
    $dbh = connection::connect($config['database']);
    die(json_encode(array('outcome' => true)));
}
catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect'))); // beeindigd de PDO
}
if($user->is_loggedin()!="")  // als de gebruiker ingelogd is dan verwijst die naar index.php
{
 $user->redirect('index.php');
}

if(isset($_POST['btn-login']))
{
 $uname = $_POST['txt_uname']; // was txt_uname_email
 $umail = $_POST['txt_uname_email'];
 $upass = $_POST['txt_password'];

 if($user->login($uname,$umail,$upass))
 {
  $user->redirect('index.php');
 }
 else
 {
  $error = "Verkeede gegevens!";
 }
}
?>
