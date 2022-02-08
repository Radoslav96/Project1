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
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <div class="container2">
        
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"> </th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col" class="text-center">Quantity</th>
                                <th scope="col" class="text-right">Total price</th>
                                <th scope="col" class="text-right">
                                    <a href="action.php?clear=all" onclick="return confirm('Da li ste sigurni da obrisete sve');" class="btn btn-sm btn-danger">Empty cart</a>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once "config.php";
                           
                            $select_stmt=$db->prepare("SELECT * FROM cart");
                            $select_stmt->execute();
                            $grand_total = 0;
                            while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
                            {
                            ?>
                            <tr>
                                <td><img src="<?php echo $row["product_image"];?>" width="50" height="50"/> </td>
                                <td><?php echo $row["product_name"];?></td>
                                <td><?php echo number_format($row["product_price"],2)?></td>
                                <td><input type="number" class="form-control itemQty" value="<?php echo $row['quantity'];?>"></td>    
                                <td class="text-right"> <?php echo number_format($row["total_price"],2);?></td>
                                <td class="text-right">
                                    <a href="proizvodi.php?remove=<?php echo $row["cart_id"];?>" onclick="return confirm('Da li ste sigurni da obrisete?');"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                                </td>
                                <input type="hidden" class="pid" value="<?php echo $row["cart_id"];?>">
                                <input type="hidden" class="pprice" value="<?php echo $row["product_price"];?>">
                                <?php $grand_total +=$row["total_price"];?>
                            </tr>
                            <?php
                            }
                            ?>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Sub-Total</td>
                                <td class="text-right"> <?php echo number_format($grand_total,2);?></td>

                            </tr>
                            <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> <strong>Total</strong></td>
                            <td class="text-right"> <strong><?php echo number_format($grand_total,2);?></strong></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <a href="proizvodi.php" class="btn btn-block btn-light"><i class="fa fa-shopping-cart"></i>Nastavi kupovinu</a>

                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                         <a href="checkout.php" class="btn btn-md btn-block btn-success text-uppercase <?=($grand_total >1)?"":"disabled";?>">Checkout</a>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>





