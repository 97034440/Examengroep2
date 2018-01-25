<?php

    include_once('../functions/mijnaccount.php');
    $accountfunction = new AccountFunction();
    $accountgegevens = $accountfunction->getAccountAction();
    if(isset($_POST['submit'])) {
        $return = $accountfunction->updateAccountAction();
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
                    <form class="form-horizontal">
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
                            <h3>Persoonlijke informatie</h3>	
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Voornaam<span class="required">*</span></label>
                                <div class="col-md-8">
                                    <input id="name" name="voorletters" type="text" placeholder="Voornaam" class="form-control input-md" value="<?php echo $accountgegevens['voorletters']; ?>" required>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Tussenvoegsel</label>
                                <div class="col-md-8">
                                    <input id="name" name="tussenvoegsel" type="text" placeholder="Tussenvoegsel" class="form-control input-md" value="<?php echo $accountgegevens['tussenvoegsel']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Achternaam<span class="required">*</span></label>
                                <div class="col-md-8">
                                    <input id="name" name="achternaam" type="text" placeholder="Achternaam" class="form-control input-md" value="<?php echo $accountgegevens['achternaam']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Email<span class="required">*</span></label>
                                <div class="col-md-8">
                                    <input id="name" name="email" type="text" placeholder="Email" class="form-control input-md" value="<?php echo $accountgegevens['email']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Telefoonnummer<span class="required">*</span></label>
                                <div class="col-md-8">
                                    <input id="name" name="telefoonnummer" type="text" placeholder="Telefoonnummer" class="form-control input-md" value="<?php echo $accountgegevens['telefoonnummer']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Adres<span class="required">*</span></label>
                                <div class="col-md-8">
                                    <input id="name" name="adres" type="text" placeholder="Adres" class="form-control input-md" value="<?php echo $accountgegevens['adres']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Postcode<span class="required">*</span></label>
                                <div class="col-md-8">
                                    <input id="name" name="postcode" type="text" placeholder="Postcode" class="form-control input-md" value="<?php echo $accountgegevens['postcode']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Woonplaats<span class="required">*</span></label>
                                <div class="col-md-8">
                                    <input id="name" name="woonplaats" type="text" placeholder="Woonplaats" class="form-control input-md" value="<?php echo $accountgegevens['woonplaats']; ?>" required>
                                </div>
                            </div>
                            <br>
                            <h2 class="form-title">Rijbewijs gegevens</h2>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Rijbewijsnummer<span class="required">*</span></label>
                                <div class="col-md-8">
                                    <input id="name" name="rijbewijsnummer" type="text" placeholder="Rijbewijsnummer" class="form-control input-md" value="<?php echo $accountgegevens['rijbewijsnummer']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Rijbewijs afgifte<span class="required">*</span></label>
                                <div class="col-md-8">
                                    <input id="name" name="rijbewijs_afgifte" type="text" placeholder="Rijbewijs afgifte" class="form-control input-md" value="<?php echo $accountgegevens['rijbewijs_afgifte']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Rijbewijs geldig tot<span class="required">*</span></label>
                                <div class="col-md-8">
                                    <input id="name" name="rijbewijs_geldigtot" type="text" placeholder="Rijbewijs geldig tot" class="form-control input-md" value="<?php echo $accountgegevens['rijbewijs_geldigtot']; ?>" required>
                                </div>
                            </div>

                            <label class="col-md-4 control-label" for="naam">Rijbewijs type(s)<span class="required">*</span></label>
                            <div class="form-group">
                                <label class="col-md-4 control-label">
                                    <input type="checkbox" class="checkbox" name="rijbewijs_B" value="1" value="<?php if(isset($error)){echo $rijbewijs_B;}?>"> 
                                    <span class="label-text">B</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="checkbox" name="rijbewijs_BE" value="2" value="<?php if(isset($error)){echo $rijbewijs_BE;}?>"> 
                                    <span class="label-text">BE</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">
                                    <input type="checkbox" class="checkbox" name="rijbewijs_C" value="3" value="<?php if(isset($error)){echo $rijbewijs_C;}?>"> 
                                    <span class="label-text">C</span>
                                </label>
                                <label>
                                    <input type="checkbox" class="checkbox" name="rijbewijs_CE" value="4" value="<?php if(isset($error)){echo $rijbewijs_CE;}?>"> 
                                    <span class="label-text">CE</span>
                                </label>
                            </div>
                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="submit"></label>
                                <div class="col-md-4">
                                    <button id="submit" name="submit" class="btn btn-primary">Update account</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 dashboard-form">
                    <form class="form-horizontal">
                        <div class="bg-white pinside30">
                            <h2 class="form-title">Wijzig wachtwoord</h2>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="oldpassword">Huidig wachtwoord</label>
                                <div class="col-md-8">
                                    <input id="oldpassword" name="huidig_wachtwoord" type="password" placeholder="Huidig wachtwoord" class="form-control input-md" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="newpassword">Nieuw wachtwoord</label>
                                <div class="col-md-8">
                                    <input id="newpassword" name="nieuw_wachtwoord" type="password" placeholder="Nieuw wachtwoord" class="form-control input-md" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="ConfirmPassword">Herhaal wachtwoord</label>
                                <div class="col-md-8">
                                    <input id="ConfirmPassword" name="herhaal_wachtwoord" type="password" placeholder="Herhaal wachtwoord" class="form-control input-md" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="submit"></label>
                                <div class="col-md-4">
                                    <button id="submit" name="submit" class="btn btn-primary btn-lg">Wijzig wachtwoord</button>
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
