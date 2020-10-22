<?php
require "db.php";

$data = $_POST;
if(isset($data['do_signup'])){
    //регестрируем 
    
    $errors = array();
    if($data['login']==''){
       $errors[]='Вы не ввели логин!'; 
    }
    if($data['email']==''){
       $errors[]='Вы не ввели email!'; 
    }
    if($data['password']==''){
       $errors[]='Вы не ввели пароль!'; 
    }
    if(R::count('users',"login = ?",array($data['login']))>0){
       $errors[]='Пользоватеь с таким логином уже существует'; 
    }
    if(R::count('users',"email = ?",array($data['email']))>0){
       $errors[]='Пользоватеь с таким email уже существует'; 
    }
    
    if(empty($errors)){
     
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        
        $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
        
        R::store($user);
        echo '<div class="alert alert-primary" role="alert">
              вы успешно зарегистрировались
            </div>';
    }else{
        //echo '<div class="alert alert-primary" role="alert>'.array_shift($errors).'</div>';
    }
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
                  <a class="nav-link" href="sign.php"><h3>Регистрация</h3></a>
            </ul>
         </div>
      </div>
   </nav>
    </div>
    
    
    <div class="container-fluid regcont">
        <form action="/sign.php" method="POST">
         
          <div class="form-group">
            <label for="exampleInputEmail1">Ваш Email адресс:</label>
            <input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php  echo @$data['email']; ?>">
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Ваш логин:</label>
            <input type="text" name = "login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php  echo @$data['login']; ?>">
          </div>
          
          <div class="form-group">
            <label for="exampleInputPassword1">Ваш пароль:</label>
            <input type="password" name = "password" class="form-control" id="exampleInputPassword1">
          </div>
          
          
          <button type="submit" name = "do_signup"class="btn btn-primary">Регистрация</button>
          
        </form>
    </div>
    
   
    
  

   
    
    <script src="js\jquery-3.5.1.min.js"></script>
    <script src="js\bootstrap.min.js" ></script>
  </body>
</html>