<?php
require "db.php";

$data = $_POST;
if(isset($data['do_login'])){
    $errors = array();
    $user = R::findOne('users','login=?',array($data['login']));
    if($user){
        
        if(password_verify($data['password'], $user->password)){
            //логиним
            $_SESSION['logged_user'] = $user;
            //echo '<div style="color:red;">ок</div>';
            echo '<div class="alert alert-primary" role="alert">
              вы успешно вошли
            </div>';
             header('Location: /profile.php');
        }else{
            $errors[] = 'Введен неверный пароль';
        }
        
    }else{
        $errors[] = 'Пользователя с таким логином не существует';
    }
    
    if(!empty($errors)){
            echo '<div class="alert alert-danger" role="alert">'
              .array_shift($errors).
            '</div>';
        //echo '<div style="color:red;">'.array_shift($errors).'</div>';
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
        <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
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
                  <a class="nav-link" href="login.php"><h3>Вход</h3></a>
            </ul>
         </div>
      </div>
   </nav>
    </div>
    
    
    <div class="container-fluid regcont">
        <form action="/login.php" method="POST">
         
          
          <div class="form-group">
            <label for="exampleInputEmail1">Логин:</label>
            <input type="text" name = "login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php  echo @$data['login']; ?>">
          </div>
          
          <div class="form-group">
            <label for="exampleInputPassword1">Пароль:</label>
            <input type="password" name = "password" class="form-control" id="exampleInputPassword1">
          </div>
          
          
          <button type="submit" name = "do_login"class="btn btn-primary">Вход</button>
          
        </form>
    </div>
    
   
    
  

   
    
    <script src="js\jquery-3.5.1.min.js"></script>
    <script src="js\bootstrap.min.js" ></script>
  </body>
</html>