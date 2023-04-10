<?php
include "header.php" ;
?>

<div class="container product-add-form">
    <div class="add-product">
        <h1 class="text-center">Add Product</h1> <br>

        <form method="post" action="productAdd.php" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="productname"><span class="text-danger">*</span> Product Name</lable>
                        <input class="form-control" type="text" name="productname" id="productname" required>
                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="productslug"><span class="text-danger">*</span> Product Slug</lable>
                        <input class="form-control" type="text" name="productslug" id="productslug" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="productshortdiscription"><span class="text-danger">*</span> Short Description</lable>
                        <input class="form-control" type="text" name="productshortdiscription" id="productshortdiscription" required>
                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="currentdate"><span class="text-danger">*</span> Published Date</lable>
                        <input class="form-control" type="date" name="currentdate" id="currentdate" value="<?= date('Y-m-d') ?>">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                        <div class="form-group">
                            <lable class="lable-products" for="productdesctiption"><span class="text-danger">*</span>Description</lable>
                            <textarea class="form-control" id="productdesctiption" name="productdesctiption" rows="6" required></textarea>
                        </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="productimage"> Product Image 1</label>
                    <input class="form-control" type="file" name="image" id="image">
                    <label for="productimage"> Product Image 2</label>
                    <input class="form-control" type="file" name="image2" id="image2">
                    <label for="productimage"> Product Image 3</label>
                    <input class="form-control" type="file" name="image3" id="image3">
                    <label for="productimage"> Product Image 4</label>
                    <input class="form-control" type="file" name="image4" id="image4">
                </div>
            </div>

            <div class="row mt-4 " >
                <div class="col-md-12 " >
                    <input class="form-control bg-primary text-white submit-btn" type="submit" name="submit" id="submit">
                </div>
            </div>



            <?php
            include "connection.php";
            if (isset($_POST['submit'])){

                if (isset($_POST['productname'])){
                    $productname= $_POST['productname'];
                }else{
                    $productname="";
                }

                if (isset($_POST['productslug'])){
                    $productslug= $_POST['productslug'];
                }else{
                    $productslug="";
                }

                if (isset($_POST['productshortdiscription'])){
                    $shorttext= $_POST['productshortdiscription'];
                }else{
                    $shorttext="";
                }

                if (isset($_POST['currentdate'])){
                    $currentdate= $_POST['currentdate'];
                }else{
                    $currentdate="";
                }
                if (isset($_POST['productdesctiption'])){
                    $description= $_POST['productdesctiption'];
                }else{
                    $description="";
                }
//      first image
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_directory = "images/product/";
            $target_file = $target_directory . basename($_FILES['image']['name']);
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            //            save image as new file name
            $newfilename = "$productname." . $imageFileType;
            $target_file = $target_directory . $newfilename;

            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
            } else {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                echo "The File " . $newfilename . " has been uploaded.<br>";

//                second image
                if (isset($_FILES['image2']) && $_FILES['image2']['error'] == 0) {
                    $target_directory = "images/product/";
                    $target_file = $target_directory . basename($_FILES['image2']['name']);
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                    // Save image as new file name
                    $newfilename2 = "$productname" . "_image2." . $imageFileType;
                    $target_file = $target_directory . $newfilename2;

                    if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                    } else {
                        if (move_uploaded_file($_FILES['image2']['tmp_name'], $target_file)) {
                            echo "2nd, ";
                        }
                    }
                }
                //                third image
                if (isset($_FILES['image3']) && $_FILES['image3']['error'] == 0) {
                    $target_directory = "images/product/";
                    $target_file = $target_directory . basename($_FILES['image2']['name']);
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                    // Save image as new file name
                    $newfilename3 = "$productname" . "_image3." . $imageFileType;
                    $target_file = $target_directory . $newfilename3;

                    if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                    } else {
                        if (move_uploaded_file($_FILES['image3']['tmp_name'], $target_file)) {
                            echo "3rd ";
                        }
                    }
                }
                //                fourth image
                if (isset($_FILES['image4']) && $_FILES['image4']['error'] == 0) {
                    $target_directory = "images/product/";
                    $target_file = $target_directory . basename($_FILES['image2']['name']);
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                    // Save image as new file name
                    $newfilename4 = "$productname" . "_image4." . $imageFileType;
                    $target_file = $target_directory . $newfilename4;

                    if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                    } else {
                        if (move_uploaded_file($_FILES['image4']['tmp_name'], $target_file)) {
                            echo "4rd Uploaded <br>";
                        }
                    }
                }

                $sql = "INSERT INTO  product( productname, productslug, short, discription, date, image, image2, image3, image4)
                 VALUES ('$productname', '$productslug','$shorttext', '$description', '$currentdate', '$newfilename', '$newfilename2', '$newfilename3', '$newfilename4')";



                if ($conn->query($sql) === TRUE) {
                    echo "File name saved to database successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }else{
                echo "Sorry, there was an error uploading your file.";
            }
            }
            }else{
                echo "Error: No file uploaded.";
            }



            }
            ?>

        </form>
    </div>
</div>





<?php
include "footer.php" ;
?>


