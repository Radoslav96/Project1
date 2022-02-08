<?php
@include 'config.php';

session_start();
if(!isset($_SESSION['user_name']) || !isset($_SESSION['admin_name'])){
    header('location:login.php');
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
    

    <body>
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
                <div class="fas fa-shopping-cart" id="cart-btn"></div>
               
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
            <div id="pozicija">
            <h4>I do 70% popusta preko online narucivanja</h4>
            <h2>Najbolje ponude komponenti racunara</h2>
            <h1>Posetite nas, nacicete nesto sigurno</h1>
            <p>Ustedite vise sa kuponima!</p>
            <button>Kupite sada</button>
            </div>
        </section>
        
        <section id="feature" class="section-p1">
            <div class="fe-box">
                <img src="img/shipping.jpg" alt="" height="90px" width="90px">
                <h6>Free shipping</h6>
            </div>
            <div class="fe-box">
                <img src="img/onlineOrder.png" alt="" height="90px" width="90px">
                <h6>Online order</h6>
            </div>
            <div class="fe-box">
                <img src="img/saveMoney.png" alt="" height="90px" width="90px">
                <h6>Save money</h6>
            </div>
            <div class="fe-box">
                <img src="img/promotion.png" alt="" height="90px" width="90px">
                <h6>Promotions</h6>
            </div>
            <div class="fe-box">
                <img src="img/happySell.png" alt="" height="90px" width="90px">
                <h6>Happy sell</h6>
            </div>
        </section>

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

        <section id="banner" class="section-m1">
            <h4>Kuponi</h4>
            <h2>Osvojite kupon i ustedite do <span>70% popusta</span> </h2>
            <button class="normal">Istrazite vise</button>
        </section>

        <section id="sm-banner" class="section-p1">
            <div class="banner-box">
                <h4>sjajna ponuda</h4>
                <button class="white">Procitaj vise</button>
            </div>
            
        </section>

             <script src="script1.js">
             </script>

    
</body>
</html>