<?php

include('includes/connect.php')

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file  -->
    <link rel="stylesheet" href="style.css">
    <title>E-commerce Website</title>
</head>

<body>
    <!-- navbar -->
    <div class="containar-fluid">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="./Image/Logo1.jpg" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pruducts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i
                                    class="fa-sharp fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: 100/-</a>
                        </li>

                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- secon child  -->
        <div class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class=" navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </div>
        <!-- third child -->
        <div class="bg-light">
            <h1 class="text-center">Hiden Store</h1>
            <h4 class="text-center">Welcome to the food world</h4>
        </div>
        <!-- forth child  -->
        <div class="row px-3 ">
            <div class="col-md-10">

                <!-- Product  -->
                <div class="row">
                  <!-- fetching product  -->
                  <?php
                  $select_query ="Select * from `products` order by rand() limit 0,9";
                  $result_query=mysqli_query($con,$select_query);
                  // $row=mysqli_fetch_assoc($result_query);
                  // echo $row['product_title']; 
                  while($row=mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title= $row['product_title'];
                    $product_description= $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./Admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <a href='#' class='btn btn-info'>Add to cart</a>
                            <a href='#' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div>";
                  }
                  ?>
                    <!-- <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="./Image/t-shirt.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">T-shirt</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <a href="#" class="btn btn-info">Add to cart</a>
                                <a href="#" class="btn btn-secondary">View more</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- row end  -->
                </div>
                <!-- column end  -->
            </div>
            <div class="col-md-2 bg-secondary p-0">
                <!-- sidenav  -->
                <!-- Brand names  -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="" class="nav-link text-light">
                            <h4>Delevery Brands</h4>
                        </a>
                    </li>
                    <?php

        $select_brands="select * from brands";
        $result_brands=mysqli_query($con,$select_brands);
        // $row_data=mysqli_fetch_assoc($result_brands);
        // echo $row_data['brand_title'];
        while($row_data=mysqli_fetch_assoc($result_brands)){
          $brand_title=$row_data['brand_title'];
          $brand_id=$row_data['brand_id'];
          echo "<li class='nav-item'>
          <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
        </li>";
        }

      ?>
                </ul>
                <!-- categories  -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    <?php
      $select_categories="select * from categories";
      $result_categories=mysqli_query($con,$select_categories);
      // $row_data=mysqli_fetch_assoc($result_brands);
      // echo $row_data['brand_title'];
      while($row_data=mysqli_fetch_assoc($result_categories)){
        $category_title=$row_data['category_title'];
        $category_id=$row_data['category_id'];
        echo "<li class='nav-item'>
        <a href='index.php?categories=$category_id' class='nav-link text-light'>$category_title</a>
      </li>";
      }
      ?>
                </ul>

            </div>
        </div>
        <!-- footer  -->
        <div class="bg-info p-3 text-center">
            <p>All right reserveed ©- develeped by laukesh-2022</p>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>

        <!-- cnd  -->

</body>

</html>