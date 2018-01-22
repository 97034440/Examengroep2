<?php
require_once '../init.php';

$object_id = $_GET['product'];
echo $object_id;


$query = new Querybuilder(connection::connect($config['database']));
//roept de selectAll function aan van de querybuilder en stuurt de tabelnaam
//en de classnaam waar je de object aan wilt koppelen.
$objects = $query->selectAll('object');
?>
