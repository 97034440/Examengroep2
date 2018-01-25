<?php
// @author: Ljubomir Miodrag

include('../modules/order.php');
require_once '../init.php';
$object_id = $_GET['product'];
$query = new Querybuilder(connection::connect($config['database']));
$reserveer = new Reserveer(connection::connect($config['database']));
//roept de selectAll function aan van de querybuilder en stuurt de tabelnaam
//en de classnaam waar je de object aan wilt koppelen.
$objects = $query->selectImage('object', 'id', $object_id);
$opties = $query->selectAll('optie');
if(empty($objects))
{
  header('Location: /Examengroep2');
  exit;
}
?>


<?php
foreach ($objects as $object):
$first = true;
$objectnumber = $object->chassinummer;
$objectidhref = "#".$object->chassinummer;

?>
<div class="container objectload">
  <div class="row">
    <?php
    if ( isset($_POST['submit']) ){
      echo 'Reservering geplaats ga naar mijn reserveringen om deze te bekijken';}
      ?>
    <div class="col-lg-9">
      <?php echo '<div id="'.$objectnumber.'" class="carousel slide my-4" data-ride="carousel">' ?>
        <div class="carousel-inner" role="listbox">
          <?php
          $objectid = $object->id;
          $images = $query->selectImage('objectimage', 'object_id', $objectid);
          // loop voor afbeeldingen
          foreach ($images as $image):
            $url = $image->imagelink;
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
        <div><h1><?php echo $object->object_type;?></h1></div>
        <div>objectid: <?php echo $object->id;?></div>
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
        date_default_timezone_set('Europe/Amsterdam');
        $todaydate = date('Y-m-d');
        $datetime = new DateTime($todaydate);
        $datetime->modify('+60 day');
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
<?php
if ( isset($_POST['submit']) ){
  $reserverdate = $_POST['first'];
  $datumterug = $_POST['second'];
  $username = $_SESSION["username"];
  $resering = $reserveer->Save($username, $object->id, $todaydate, $reserverdate, $datumterug);
}
?>
