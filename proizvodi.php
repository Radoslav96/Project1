<?php
session_start();
require_once "config.php";


if(!isset($_SESSION['user_name']) || !isset($_SESSION['admin_name'])){
    header('location:login.php');
}

if(isset($_POST["pid"]) && isset($_POST["pname"]) && isset($_POST["pprice"]) && isset($_POST["pimage"]) && isset($_POST["pcode"])) 
 {
     $id = $_POST["pid"];
     $name = $_POST["pname"];
     $price = $_POST["pprice"];
     $image = $_POST["pimage"];
     $code = $_POST["pcode"];
     $qty = 1;

     $select_stmt=$db->prepare("SELECT product_code FROM cart WHERE product_code=:code");
     $select_stmt->execute(array(":code"=>$code));
     $row=$select_stmt->fetch(PDO::FETCH_ASSOC);

     $check_code=$row["product_code"];

     if(!$check_code){
         $insert_stmt=$db->prepare("INSERT INTO cart(cart_id,
                                                     product_name,
                                                     product_price,
                                                     product_image,
                                                     quantity,
                                                     total_price,
                                                     product_code)
                                                VALUES
                                                    (:name,
                                                    :price,
                                                    :image,
                                                    :qty,
                                                    :ttl_price,
                                                    :code)");
        $insert_stmt->bindParam(":name",$name);
        $insert_stmt->bindParam(":price",$price);
        $insert_stmt->bindParam(":image",$image);
        $insert_stmt->bindParam(":qty",$qty);
        $insert_stmt->bindParam(":ttl_price",$price);
        $insert_stmt->bindParam(":code",$code);
        $insert_stmt->execute();
        
        echo '<div class="alert alert_success alert_dismissible mt-2">
        <button type="button"  class="close" data-dismiss="alert">x</button>
        <strong> Item added to your cart</strong>
        </div>';
     }
     else{
        echo '<div class="alert alert_success alert_dismissible mt-2">
        <button type="button"  class="close" data-dismiss="alert"></button>
        <strong> Item alredy added to your cart</strong>
        </div>';
     }
 }
 if(isset($_GET["cartItem"]) && isset($_GET["cartItem"])=="cartItem"){
     $select_stmt=$db->prepare("SELECT * FROM cart");
     $select_stmt->execute();
     $row=$select_stmt->rowCount();
     echo $row;
 } 

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>

    <header class="header">
            <a href="index11.php" class="logo">
                <img src="img/logo.png" alt="">
            </a>

            <nav class="navbar">
                <a href="index11.php">Home</a>
                <a href="proizvodi.php">Products</a>
                <a href="#products">Home</a>
                <a href="#review">Home</a>
                
            </nav>
            <div class="content">
                <h3>Dobrodosao <span><?php
                    if(!isset($_SESSION['user_name'])){
                        echo $_SESSION['user_name'];
                    }else
                    echo $_SESSION['admin_name'];
                   
                ?></span></h3>
                <br>
                <a href="logout.php" class="btn1">logout</a>
            </div>
            <div class="icons">
                <div class="fas fa-search" id="search-btn"></div>
                <a href="cart.php"><div class="fas fa-shopping-cart" id="cart-btn"></div></a>
               
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
        
    <div class="row">
    
    <?php
    require_once "config.php";
    $select_stmt=$db->prepare("SELECT * FROM product");
    $select_stmt->execute();
    while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
    {
    ?>
        <div class="col-lg-4 col-md-6 mb-4">
            
            <div class="card h-100">
                
                <a href="#"><img class="card-img-top" src="<?php echo $row['product_image'];?>" width="400px" height="250px"  ></a>

                <div class="card-body">
                    <h4 class="card-title text-primary"> <?php echo $row['product_name'];?></h4>
                    <h5><?php echo number_format($row['product_price'],2);?>/-</h5>
                </div>
                <div class="card-footer">
                    <form class="form-submit">
                        <input type="hidden" class="pid" value="<?php echo $row['product_id'];?>">
                        <input type="hidden" class="pname" value="<?php echo $row['product_name'];?>">
                        <input type="hidden" class="pprice" value="<?php echo $row['product_price'];?>">
                        <input type="hidden" class="pimage" value="<?php echo $row['product_image'];?>">
                        <input type="hidden" class="pcode" value="<?php echo $row['product_code'];?>">
                        <button id="addItem" class="btn btn-success btn-md">Add to cart</button>
                    </form>
                </div>
            </div>

        </div>
        <?php
        }
        ?>
    
    </div>

        <section id="product1" class="section-p1">
            
            <h2>Najnoviji proizvodi</h2>
            <p>Nesto novo u ponudi samo kod nas</p>
            <div class="pro-container">
                <div class="pro">
                    <img src="img/kuciste.png" alt="" >
                    <div class="des">
                        <span>IG-MAX</span>
                        <h5>IG-MAX F5518 bez napajanja</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$50</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/kuciste1.png" alt="" >
                    <div class="des">
                        <span>IG-MAX</span>
                        <h5>IG-MAX F5518 bez napajanja</h5>
                        <div class="star1">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half"></i>                        
                        </div>
                        <h4>$50</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/kuciste2.png" alt="" >
                    <div class="des">
                        <span>IG-MAX</span>
                        <h5>IG-MAX F5518 bez napajanja</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$50</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/kuciste3.png" alt="" >
                    <div class="des">
                        <span>IG-MAX</span>
                        <h5>IG-MAX F5518 bez napajanja</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$50</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/graficka.png" alt="" >
                    <div class="des">
                        <span>Gigabyte</span>
                        <h5>Nvidia Geforce RTX 2060</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$330</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/kuciste.png" alt="" >
                    <div class="des">
                        <span>IG-MAX</span>
                        <h5>IG-MAX F5518 bez napajanja</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$50</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/kuciste.png" alt="" >
                    <div class="des">
                        <span>IG-MAX</span>
                        <h5>IG-MAX F5518 bez napajanja</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$50</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/kuciste.png" alt="" >
                    <div class="des">
                        <span>IG-MAX</span>
                        <h5>IG-MAX F5518 bez napajanja</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$50</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
                </div>
            </div>
        </section>
        
      

             <script src="script1.js">
             </script>

    
</body>
</html>