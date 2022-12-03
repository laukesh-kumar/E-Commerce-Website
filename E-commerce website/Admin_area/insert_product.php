<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keyword=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';
    //accessing image
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    //accessing image temp name
    $temp_image1=$_FILES['product_image1']['tmp_name']; 
    $temp_image2=$_FILES['product_image1']['tmp_name'];
    $temp_image3=$_FILES['product_image1']['tmp_name'];
    // cheking empty condition
    if($product_title=='' or $description=='' or $product_keyword=='' or $product_category=='' or $product_brands=='' or $product_price=='' or  $product_image1=='' or  $product_image2=='' or  $product_image3==''  ){
        echo "<script>alert('Please fill all the avaible details')</script>";
        exit();
    }
    else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");
        // insert query
        $insert_products="insert into products (product_title,product_description,
        product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values 
        ('$product_title','$description','$product_keyword','$product_category',
        '$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Product has been added succussfully')</script>";
        }
    }



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert Product-Admin Dashboard</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS file link -->
     <link rel="stylesheet" href="../style.css">
    <!-- cnd for font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class = "bg-light">
    <div class="caontainer mt-3">
        <h1 class="text-center">Insert Pruducts</h1>
        <!-- form  -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Title  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product-title" class="form-label">
                    Product Title
                </label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <!-- description  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">
                    Product description
                </label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product description" autocomplete="off" required="required">
            </div>
            <!-- keyword  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">
                    Product Keyword 
                </label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product Keyword" autocomplete="off" required="required">
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                    
                    $select_query="Select * from categories";
                    $result_query=mysqli_query($con,$select_query);
                    while ($row=mysqli_fetch_assoc($result_query)) {
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    
                    
                    ?>
                    <!-- <option value="">Select a category1</option>
                    <option value="">Select a category2</option>
                    <option value="">Select a category3</option>
                    <option value="">Select a category4</option> -->
                </select>
            </div>
             <!-- Brands -->
             <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select a Brands</option>
                    <?php
                     
                    $select_query="Select * from brands";
                    $result_query=mysqli_query($con,$select_query);
                    while ($row=mysqli_fetch_assoc($result_query)) {
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    
                    
                    ?>
                    <!-- <option value="">Select Brands2</option>
                    <option value="">Select Brands3</option>
                    <option value="">Select Brands1</option>
                    <option value="">Select Brands4</option> -->
                </select>
            </div>
            <!-- Image1  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">
                    Product Image 1 
                </label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
              <!-- Image2  -->
              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">
                    Product Image 2 
                </label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
              <!-- Image 3 -->
              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">
                    Product Image 3
                </label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>
             <!--Price  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">
                    Product Price 
                </label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>
            <!-- keyword  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>
    
</body>
</html>