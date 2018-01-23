<?php
require_once '../init.php';

$object_id = $_GET['product'];
$query = new Querybuilder(connection::connect($config['database']));
//roept de selectAll function aan van de querybuilder en stuurt de tabelnaam
//en de classnaam waar je de object aan wilt koppelen.
$objects = $query->selectImage('object', 'id', $object_id);
$opties = $query->selectAll('optie');
if(empty($objects))
{
  header('Location: /Examengroep2');
  exit;
}

foreach ($objects as $object):
$first = true;
$objectid = $object->chassinummer;
$objectidhref = "#".$object->chassinummer;
?>
<div class="container objectload">
  <div class="row">
    <div class="col-lg-9">
      <?php echo '<div id="'.$objectid.'" class="carousel slide my-4" data-ride="carousel">' ?>
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
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
        $regdate = $datetime->format('Y-m-d');
        ?>

          <?php echo '<input type="date" name="first" min="'.$regdate.'">'?>
          <?php echo $_GET['subject']; ?>
          <?php echo '<input type="date" name="second" min="'.$regdate.'">'?>


      </div>
      <?php endforeach; ?>


      <?php
      foreach ($opties as $optie):
        ?>
        <div class="col-lg-5"><?php echo $optie->omschrijving?>
          <select>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">2</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
        </select>
        </div>
        <?php
      endforeach; ?>
    </div>

  </div>
</html>
