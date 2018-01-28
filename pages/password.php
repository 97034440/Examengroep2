<!-- Dit document is gemaakt door Joanne -->
<?php
    include_once('../functions/mijnaccount.php');
    $accountfunction = new AccountFunction();
   
    if(isset($_POST['submit_wachtwoord'])){
        $return = $accountfunction->wijzigWachtwoordAction();
        extract($return);
        if(isset($anw)){
            extract($anw);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link href="../css/shop-homepage.css" rel="stylesheet">

        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
        <title>Mijn account</title>
    </head>
    <body>   
    <?php
        include('nav.php');
        if(!isset($_SESSION['username'])){ 
            header("Location: /Examengroep2");
        }
    ?>
        <div class="col-md-12 profile-dashboard">
            <div class="row">
                <div class="col-md-7 dashboard-form calender">
                    <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <?php
                        if(isset($error))
                        {
                            foreach($error as $error)
                            {
                                 ?>
                                 <div class="alert alert-danger">
                                    <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error ?>
                                 </div>
                                 <?php
                            }
                        }
                        if(isset($message))
                        {
                             ?>
                             <div class="alert alert-success">
                                <i class="glyphicon glyphicon-ok"></i> &nbsp; <?php echo $message ?>
                             </div>
                            <?php
                        }
                        ?>
                        <div class="bg-white pinside40 mb30">
                            <div class="add_listing_info">
                            <h3>Wijzig wachtwoord</h3>	
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="oldpassword">Huidig wachtwoord</label>
                                <div class="col-md-8">
                                    <input id="oldpassword" name="huidig_wachtwoord" type="password" placeholder="Huidig wachtwoord" class="form-control input-md" value="<?php if(isset($error)){echo $huidig_wachtwoord;} ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="newpassword">Nieuw wachtwoord</label>
                                <div class="col-md-8">
                                    <input id="newpassword" name="nieuw_wachtwoord" type="password" placeholder="Nieuw wachtwoord" class="form-control input-md" value="<?php if(isset($error)){echo $nieuw_wachtwoord;} ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="ConfirmPassword">Herhaal wachtwoord</label>
                                <div class="col-md-8">
                                    <input id="ConfirmPassword" name="herhaal_wachtwoord" type="password" placeholder="Herhaal wachtwoord" class="form-control input-md" value="<?php if(isset($error)){echo $herhaal_wachtwoord;} ?>">
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="submit_wachtwoord"></label>
                                <div class="col-md-4">
                                    <button id="submit" name="submit_wachtwoord" class="btn btn-primary btn-lg">Wijzig wachtwoord</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="../js/js.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

    </body>
</html>
