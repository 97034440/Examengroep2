<?php
// @author: Ljubomir Miodrag
?>
<?php
//ik roep de query class aan en stuur de pdo verbinding gegevens mee.
$query = new Querybuilder(connection::connect($config['database']));
//roept de selectAll function aan van de querybuilder en stuurt de tabelnaam
//en de classnaam waar je de object aan wilt koppelen.
$objects = $query->selectAll('object');
?>

    <?php
    //loop voor objects
    foreach ($objects as $object):
      $first = true;
      $objectid = $object->chassinummer;
      $objectidhref = "#".$object->chassinummer;
    ?>

        <div class="col-lg-3 floatleft">
          <?php echo '<div id="'.$objectid.'" class="carousel slide my-4" data-ride="carousel">' ?>
            <div class="carousel-inner" role="listbox">
              <?php
              $objectid = $object->id;
              $images = $query->selectImage('objectimage', 'object_id', $objectid);
              // loop voor afbeeldingen
              foreach ($images as $image):
                $url = $image->imagelink;
                   if ($first == true) {
                     echo '<div class="carousel-item active">
                       <img class="d-block img" height="200" width="100%" src="../images/'.$url.'" alt="First slide">
                     </div>';
                     $first = false;
                   }
                   elseif ($first == false) {
                   echo
                   '<div class="carousel-item">
                     <img class="d-block img" height="200" width="100%" src="../images/'.$url.'" alt="First slide">
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
            <?php $idsend = "$object->id"; ?>
            <div><a href="http://localhost/Examengroep2/pages/product.php?product=<?php echo $idsend?>">Reserveren</a></div>
          </div>

    <?php endforeach; ?>


</html>
