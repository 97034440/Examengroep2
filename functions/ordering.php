<?php
// @author: Ljubomir Miodrag

include('../modules/order.php');
require_once '../init.php';
//ik haal mijn object id uit de url van de pagina
$object_id = $_GET['product'];
$query = new Querybuilder(connection::connect($config['database']));
$reserveer = new Reserveer(connection::connect($config['database']));

//en de classnaam waar je de object aan wilt koppelen.
//roept de selectSpecific function van de querybuilder en stuurt de tabelnaam de row en wat ik uit de row wil selecteren mee.
//Ik kan nu specifiece informatie aanroepen door bv $object->rownaam te gebruiken.
$objects = $query->selectSpecific('object', 'id', $object_id);
//roept de selectAll function aan van de querybuilder en stuurt de tabelnaam
$opties = $query->selectAll('optie');
if(empty($objects))
{
  header('Location: /Examengroep2');
  exit;
}
?>

<?php
// for each loop om meerdere keer mijn object variable aan te roepen.
foreach ($objects as $object):
  //ik zet first op true deze wordt later gebruikt for een if ifelse.
$first = true;
// ik maak hier een variable an zodat ik deze later als id kan gebruiken voor de carousel
$objectnumber = $object->chassinummer;
// ik maak hier een variable an zodat ik deze later als id kan gebruiken voor de carousel maar ik zet er een # alvast in.
$objectidhref = "#".$object->chassinummer;

?>
<div class="container objectload">
  <div class="row">

    <div class="col-lg-9">
      <div><h1><?php echo $object->object_type;?></h1></div>
      <?php echo '<div id="'.$objectnumber.'" class="carousel slide my-4" data-ride="carousel">' ?>
        <div class="carousel-inner" role="listbox">
          <?php
          $objectid = $object->id;
          $images = $query->selectSpecific('objectimage', 'object_id', $objectid);
          // loop voor afbeeldingen
          foreach ($images as $image):
            // Ik zeg dat elke $url gelijk is aan imagelink van de database
            $url = $image->imagelink;
            // Bootstrap heeft in een carousel de eerste item nodig deze heeft de class active.
            //Ik heb hiervan een if en elseif gemaakt zodat de eerste item de active class heeft en de rest niet.
               if ($first == true) {
                 echo '<div class="carousel-item active">
                   <img class="d-block img" height="500" width="100%" src="../images/'.$url.'" alt="First slide">
                 </div>';
                 $first = false;
               }
               elseif ($first == false) {
               echo
               '<div class="carousel-item">
                 <img class="d-block img" height="500" width="100%" src="../images/'.$url.'" alt="First slide">
               </div>'; }
               ?>
              <?php endforeach; ?>
        </div>
            <?php echo '<a class="carousel-control-prev" href="'.$objectidhref.'" role="button" data-slide="prev">' ?>
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <?php echo '<a class="carousel-control-next" href="'.$objectidhref.'" role="button" data-slide="next">' ?>
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>

      <div class="col-lg-3">
      </br>
      <?php
      // ik roep de informatie voor de overzicht.
       ?>
        <div>Kenteken: <?php echo $object->kenteken;?></div>
        <div>Chassinummer: <?php echo $object->chassinummer;?></div>
        <div>Merk: <?php echo $object->merk;?></div>
        <div>Type: <?php echo $object->type;?></div>
        <div>Bouwjaar: <?php echo $object->bouwjaar;?></div>
        <div>Massa inventaris: <?php echo $object->mass_inventaris;?></div>
        <div>Max massa:<?php echo $object->massa_max;?></div>
        <div>Lengte tot: <?php echo $object->lengte_tot?></div>
        <div>Lengte opbouw: <?php echo $object->lengte_opbouw?></div>
        <div>Hoogte: <?php echo $object->hoogte?></div>
        <div>Benodigde: <?php echo $object->rijbewijs_benodigd?></div>
        <div>Prijs per dag: <?php echo $object->prijs_dag?></div>
        <div>Prijs per week: <?php echo $object->prijs_week?></div>
        <?php
        //ik zet de tijdzone waar ik de uit wil halen.
        date_default_timezone_set('Europe/Amsterdam');
        // ik maak variable van de dag van vandaag
        $todaydate = date('Y-m-d');
        // ik zeg dat de variable $todaydate een datetime is.
        $datetime = new DateTime($todaydate);
        // ik voeg 60 dagen aan de $datetime variable toe dit is 2 maanden.
        $datetime->modify('+60 day');
        // ik format mijn $datetime zodat ik deze in de input kan gebruiken.
        $regdate1 = $datetime->format('Y-m-d');
        $regdate2 = $datetime->format('Y-m-d');
        ?>

        <form class="form-horizontal" method="post" action="">
          <div class="form-group">
            <?php echo '<input value="'.$regdate1.'" type="date" name="first" id="first" min="'.$regdate1.'">'?>
          </div>
          <div class="form-group">
            <?php echo '<input value="'.$regdate2.'" type="date" name="second" id="second" min="'.$regdate2.'">'?>
          </div>
            <div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="submit">Reserveer</button>
						</div>
            <?php
            //ik kijk of mijn post gezet is en ik zet de tijd string om naar time.
            if ( isset($_POST['submit']) ){
              // kijkt of de verhuur datum eerder is dan de terug breng datum.
              if(strtotime($_POST['first']) > strtotime($_POST['second'])) {
                echo "De start datum is later dan de einddatum";
              }
              else {
                echo 'Reservering geplaats ga naar mijn reserveringen om deze te bekijken';
                $reserverdate = $_POST['first'];
                $datumterug = $_POST['second'];
                $username = $_SESSION["username"];
                // roept mijn save functie aan en stuurt de gegevens uit de variablen mee.
                $resering = $reserveer->Save($username, $object->id, $todaydate, $reserverdate, $datumterug);
              }
            }
            ?>
          </form>
      </div> 
      <?php endforeach; ?>

      <!-- <?php
      foreach ($opties as $optie):
        ?>
        <div class="col-lg-5"><?php echo $optie->omschrijving?>
            <?php echo '<input type="checkbox" name="'.$optie->omschrijving.'" value="'.$optie->omschrijving.'">' ?>
        </div>
        <?php
      endforeach; ?> -->
          </br>
    </div>

  </div>
</html>
