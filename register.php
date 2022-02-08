<?php

@include 'config.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];
    
    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result)>0){
        $error[]= 'user alredy exist';

    }else{
        if($pass != $cpass){
            $error[]= 'password not matched';
        }else{
            $insert = "INSERT INTO user_form (name, email, password, user_type) VALUES('$name',
            '$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }
};



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <body>
        <header class="header">
            <a href="index11.php" class="logo">
                <img src="img/logo.png" alt="">
            </a>

            <nav class="navbar">
                <a class="active" href="#home">Home</a>
                <a href="index11.php">Home</a>
                <a href="proizvodi.php">Products</a>
                <a href="#products">Home</a>
                <a href="#review">Home</a>
                
            </nav>
            <div class="icons">
                <div class="fas fa-search" id="search-btn"></div>
                <div class="fas fa-shopping-cart" id="cart-btn"></div>
                <a href="login.php"><div class="fas fa-user" id="user-btn"></div></a>
                <div class="fas fa-bars" id="menu-btn"></div>

        
             <div class="search-form">
                 <input type="search" id="search-box" placeholder="Pretraži...">
                 <label for="search-box" class="fas fa-search"></label>
             </div>  

             <div class="cart-items-container">
                 <div class="cart-item">
                     <span class="fas fa-times"></span>
                     <img src="img/kuciste.png" alt="">
                     <div class="content">
                        <h3>RGB Kuciste</h3>
                        <div class="cena"> $29.99/-</div>
                     </div>

                     
                 </div>
                 <div class="cart-item">
                    <span class="fas fa-times"></span>
                    <img src="img/kuciste.png" alt="">
                    <div class="content">
                       <h3>RGB Kuciste</h3>
                       <div class="cena"> $29.99/-</div>
                    </div>

                    
                </div>
                <div class="cart-item">
                    <span class="fas fa-times"></span>
                    <img src="img/kuciste.png" alt="">
                    <div class="content">
                       <h3>RGB Kuciste</h3>
                       <div class="cena"> $29.99/-</div>
                    </div>

                    
                </div>
                <a href="#" class="btn">checkout now</a>
             </div> 
             
        </header>
        <section  id="hero">
            <div class="form-container">
                <form action="" method="post">
                    <h3>register now</h3>
                    <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                    ?>
                    <input type="text" name="name" required placeholder="enter your name">
                    <input type="email" name="email" required placeholder="enter your email">
                    <input type="password" name="password" required placeholder="enter your password">
                    <input type="password" name="cpassword" required placeholder="confirm your password">
                    <select name="user_type">
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                    <input type="submit" name="submit" value="register now" class="form-btn">
                    <p>alredy have an account? <a href="index11.php">login now</a></p>
                </form>
            </div>
        </section>
        


        

        <section id="sm-banner" class="section-p1">
            <div class="banner-box">
                <h4>sjajna ponuda</h4>
                <button class="white">Procitaj vise</button>
            </div>
            
        </section>

             <script src="script1.js">
             </script>

</head>  
</body>
</html>