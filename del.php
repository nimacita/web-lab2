<?php
require "db.php";


$delstat = R::load('stat',$_POST['id']);
R::trash($delstat);

header('Location: profile.php');
?>
