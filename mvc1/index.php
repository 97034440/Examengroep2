<?php

$query = require'init.php';

require'objecten.php';
//roept de selectAll function aan van de querybuilder en stuurt de tabelnaam
//en de classnaam waar je de object aan wilt koppelen.
$objects = $query->selectAll('object');

require'index.view.php';
?>
