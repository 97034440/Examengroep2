<?php
require'../init.php';
//ik roep de query class aan en stuur de pdo verbinding gegevens mee.
$query = new querybuilder(connection::connect($config['database']));
//roept de selectAll function aan van de querybuilder en stuurt de tabelnaam
//en de classnaam waar je de object aan wilt koppelen.
$objects = $query->selectAll('object');
$images = $query->selectSpecific('objectimage', '1');

var_dump($images);
?>

<html>
<head>
</head>

<body>
  <ul>
    <?php
    foreach ($objects as $object):
    ?>
      <li>
          <div>Kenteken: <?php echo $object->kenteken;?></div>
      </li>
      <li>
          <div>Chassinummer: <?php echo $object->chassinummer;?></div>
      </li>
      <li>
          <div>Camper/Caravan: <?php echo $object->object_type;?></div>
      </li>
      <li>
          <div>Merk: <?php echo $object->merk;?></div>
      </li>
      <li>
          <div>Type: <?php echo $object->type;?></div>
      </li>
      <li>
          <div>Bouwjaar: <?php echo $object->bouwjaar;?></div>
      </li>
      <li>
          <div>Massa inventaris: <?php echo $object->mass_inventaris;?></div>
      </li>
      <li>
          <div>Max massa:<?php echo $object->massa_max;?></div>
      </li>
      <li>
          <div>Lengte tot: <?php echo $object->lengte_tot?></div>
      </li>
      <li>
          <div>Lengte opbouw: <?php echo $object->lengte_opbouw?></div>
      </li>
      <li>
          <div>Hoogte: <?php echo $object->hoogte?></div>
      </li>
      <li>
          <div>Benodigde: <?php echo $object->rijbewijs_benodigd?></div>
      </li>
      <li>
          <div>Prijs per dag: <?php echo $object->prijs_dag?></div>
      </li>
      <li>
          <div>Prijs per week: <?php echo $object->prijs_week?></div>
      </li>
      <li>
          <div>imageid: <?php echo $object->imageid?></div>
      </li>

      <?php
      foreach ($images as $image):
        $url = $image->imagelink;
        ?>
        <li>
           <?php echo '<img src="'.$url.'" alt="">'; ?>
        </li>
        <li>
            <div>imageid: <?php echo $image->id?></div>
        </li>
          <?php endforeach; ?>
    </br>
    <?php endforeach; ?>
    ?>
</ul>


</body>

</html>
