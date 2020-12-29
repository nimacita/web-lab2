<?php
require "db.php";
$data = $_POST;
if(isset($data['do_exit'])){
    unset($_SESSION['logged_user']);
    header('Location: /');
}

$stat = R::dispense('stat');


if(isset($_POST['do_stat'])) {
        session_start();
        //$_SESSION['stat_mat'] = $_POST['stat'];
        $_SESSION['stat_mat'] = strtr($_POST['stat'], array(" бля"=>" ***", "еба"=>"***", "еби"=>"***", "хуй"=>"***", "пизд"=>"****", "хуе"=>"***", "хуя"=>"***", "ебе"=>"***", " сук"=>" ***"));
    
        $stat->status=$_SESSION['stat_mat'];
        $stat->name=$_SESSION['logged_user'];
        $stat->dates=date("l dS F Y");
        $stat->times=date("h:i A");
        R::store($stat);
}


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
               <li class="nav-item active">
                  <a class="nav-link" href="profile.php"><h3>Профиль</h3></a>
            </ul>
         </div> 
      </div>
   </nav>
    </div>
    
    
   <div class="container-fluid parent-card flex-column">
        <h4><p>Логин: <?php echo $_SESSION['logged_user']->login; ?></p></h4>
        <h4><p>Email адресс: <?php echo $_SESSION['logged_user']->email; ?></p></h4>
        <h4><p>Имя: <?php echo $_SESSION['logged_user']->name; ?></p></h4>
        <h4><p>Любимый вид спорта: <?php echo $_SESSION['logged_user']->sport; ?></p></h4>
        
        <div class="form-group">
            <label for="exampleFormControlTextarea1"><h4>Ваш статус:</h4></label>
               <form action="/profile.php" method="POST">
                
                 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='stat' 
                 placeholder="Я люблю футбол, но вообще не знаю как играть"></textarea>
                 
                 <button type="submit" name = "do_stat" class="btn btn-alert">Сохранить</button>
            </form>
        </div>
        
        <h4>Статусы:<br></h4>
        <div class="stat ">
         <h4><?php
        $stats = R::findCollection('stat',"ORDER BY 'id' DESC");
       while($stat = $stats->next()){
           echo 'Status: ' . $stat->times;
           ?>

           <form action="del.php" method="POST">
               <input type="hidden" name="id" value="<?php echo $stat->id ?>">
               <input type="submit" value="Удалить">
            </form>
            <form action="red.php" method="POST">
               <textarea name="red"><?php echo  $stat->status?></textarea>
               <input type="hidden" name="id" value="<?php echo $stat->id ?>">
               <input type="submit" value="Ред">
            </form>
            
           <?php
       }
        ?></h4>
        </div>
        
        <form action="/profile.php" method="POST">
        <button type="submit" name = "do_exit" class="btn btn-alert">Выход</button>
       </form>
       
   </div>
   
    
  

   
    
    <script src="js\jquery-3.5.1.min.js"></script>
    <script src="js\bootstrap.min.js" ></script>
  </body>
</html>