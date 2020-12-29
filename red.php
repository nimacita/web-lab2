<?php
require "db.php";


$redstat = R::load('stat',$_POST['id']);
$redstat->status = $_POST['red'];
R::store($redstat);

header('Location: profile.php');
?>