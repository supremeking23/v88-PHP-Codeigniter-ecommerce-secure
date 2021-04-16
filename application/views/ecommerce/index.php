<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

     <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
</head>
<body>
    


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2>Products</h2>
            </div>
            <div class="col-md-4">
                <h2>Your Cart: <?= ($this->session->has_userdata("cart_total")) ? $this->session->userdata("cart_total") : 0;?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $this->session->flashdata("billing-success"); ?>
                <?= $this->session->flashdata("errors"); ?>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php foreach($products as $product):?>
                        <tr>
                            <td><?= $product["product_name"]; ?></td>
                            <td><?= $product["description"]; ?></td>
                            <td>$<?= $product["price"]; ?></td>
                            <td>
                                <!-- <form class="" action="<?php base_url()?>add-to-cart" method="POST"> -->
                                <?php echo form_open(base_url()."add-to-cart")?>
                                    <input type="number" name="qty" class="form-control" value="" id="qty">
                                    <input type="hidden" name="product-id" value="<?= $product["id"]?>">
                                    <input type="hidden" name="product-name" value="<?= $product["product_name"]; ?>">
                                    <input type="submit" class="btn btn-info btn-sm" value="Buy">                            
                                </form>
                            </td>
                        </tr>
                       <?php endforeach;?>
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>