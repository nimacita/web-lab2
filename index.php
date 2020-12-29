<?php

require "db.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css\bootstrap.css">
    <link rel="stylesheet" href="mycss.css" type="text/css">

    <title>FASTER.SC</title>
  </head>
  <body>
   
    <!-- нав менюшка -->
    <div class="container-fluid"> 
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <div class="container">
         <a class="navbar-brand" href="index.php">
         <img src="images/logo.png" alt="FASTER" height="50">
         </a>
         
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle    navigation">
            <span class="navbar-toggler-icon"></span>
           </button>
           
         <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
             
             
              <?php if(isset($_SESSION['logged_user'])):?> <!-- проверка авторизован ли пользователь -->
              <li class="nav-item"><!-- если да -->
                  <a class="nav-link" href="profile.php"><h5><?php echo $_SESSION['logged_user']->login; ?></h5></a>
               </li>
               
               <?php else: ?><!-- если нет -->
               <li class="nav-item">
                  <a class="nav-link" href="sign.php"><h5>Регистрация</h5></a>
               </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><h5>Вход</h5></a>
                </li>
               <?php endif; ?>
               
            </ul>
         </div>
      </div>
     </nav>
    </div>
    
    
    <!--картинки в центре-->
    
    <div class="parentc">
        <div class="blockc image-flex">
            <a href="voleiball.php"><img src="images/voleiboll.png" alt="ВОЛЕЙБОЛ" width="400"></a>
            
            <a href="basket.php"><img src="images/basket.png" alt="БАСКЕТБОЛ" width="400"></a>
            
            <a href="index.php"><img src="images/football.png" alt="ФУТБОЛ" width="400"></a>
        </div>
        
        <div class="blockc2 image-flex">
            <a href="index.php"><img src="images/swimming.png" alt="ПЛАВАНЬЕ" width="400"></a>
            
            <a href="index.php"><img src="images/runing.png" alt="БЕГ" width="400"></a>
        </div>
    </div>
 
 
 
   
    
    <script src="js\jquery-3.5.1.min.js"></script>
    <script src="js\bootstrap.min.js" ></script>
  </body>
</html>