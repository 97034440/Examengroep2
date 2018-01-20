<?php

include('../modules/inlog.php');

class User
{
    protected $pdo;

    function __construct(PDO $pdo)
    {
      $this->pdo = $pdo;
    }

    private $gebruikersnaam;
    private $wachtwoord;

    public function login($gebruikersnaam,$upass)
    {
       try
       {
          $stmt = $this->pdo->prepare("SELECT * FROM accountgegevens WHERE gebruikersnaam = :gebruikersnaam AND wachtwoord = :wachtwoord");
          $stmt->execute(array(':gebruikersnaam'=>$gebruikersnaam, ':umail'=>$umail));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($upass, $userRow['user_pass']))
             {
                $_SESSION['user_session'] = $userRow['user_id'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }

   public function redirect($url)
   {
       header("Location: $url");
   }

   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}

// $stmt = $this->pdo->prepare("INSERT INTO accountgegevens (gebruikersnaam, wachtwoord) VALUES (:gebruikersnaam, :wachtwoord)");
//     return $stmt->execute(array(':gebruikersnaam' => $gebruikersnaam, ':wachtwoord' => $wachtwoord));

?>
