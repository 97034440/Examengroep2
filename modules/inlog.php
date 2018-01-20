<?php
try{ // maakt de connectie aan met de database
    $dbh = connection::connect($config['database']);
    die(json_encode(array('outcome' => true)));
}
catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 'message' => 'Kan geen verbinding maken'))); // als het opgevangen word
}
if($user->is_loggedin()!="")  // als de gebruiker ingelogd is dan verwijst die naar index.php
{
 $user->redirect('index.php');
}

if(isset($_POST['btn-login']))
{
 $gebruikersnaam = $_POST['gebruikersnaam']; // was txt_gebruikersnaam_email
 $umail = $_POST['gebruikersnaam_email'];
 $upass = $_POST['password'];

 if($user->login($gebruikersnaam,$umail,$upass))
 {
  $user->redirect('index.php');
 }
 else
 {
  $error = "Verkeede gegevens!";
 }
}
?>
