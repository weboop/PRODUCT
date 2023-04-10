<?php
include "header.php" ;
include "connection.php";
if (isset($_GET['id'])){
    $id= $_GET['id'];
}else{
    $id= "";
}
$query = "SELECT * FROM product WHERE id= $id";

if ($results= $conn->query($query)){
while ($row = $results->fetch_assoc()) {


?>

<div class="container product-add-form">
    <div class="add-product">
        <h1 class="text-center">Reset Product ( ID # <?php echo $id ;?> ) </h1> <br>

        <form method="POST" action="productreset.php?id=<?php echo $id?>" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="newproductname"><span class="text-danger">*</span> Product Name</lable>
                        <input class="form-control" type="text" name="newproductname" id="newproductname" value="<?php echo $row['productname']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="newproductslug"><span class="text-danger">*</span> Product Slug</lable>
                        <input class="form-control" type="text" name="newproductslug" id="newproductslug" value="<?php echo $row['productslug']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="newshortdiscription"><span class="text-danger">*</span> Short Description</lable>
                        <input class="form-control" type="text" name="newshortdiscription" id="newshortdiscription" value="<?php echo $row['short']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="form-group">
                        <lable class="lable-products" for="newcurrentdate"><span class="text-danger">*</span> Published Date</lable>
                        <input class="form-control" type="date" name="newcurrentdate" id="newcurrentdate"  value="<?php echo $row['date']; ?>">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <lable class="lable-products" for="newproductdesctiption"><span class="text-danger">*</span>Description</lable>
                        <textarea class="form-control" id="newproductdesctiption" name="newproductdesctiption" rows="6"  required><?php echo $row['discription']; }}?></textarea>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="productimage"> Product Image</label>
                    <input class="form-control" type="file" name="productimage" id="productimage">
                </div>
            </div>

            <div class="row mt-4 " >
                <div class="col-md-12 " >
                    <input class="form-control bg-primary text-white submit-btn" type="submit" name="resubmit" id="resubmit">
                </div>
            </div>
            <?php

            if (isset($_POST['resubmit'])){

                if (isset($_POST['newproductname'])){
                    $newproductname = $_POST['newproductname'];
                }else{
                    $newproductname= "";
                }

                if (isset($_POST['newproductslug'])){
                    $newproductslug= $_POST['newproductslug'];
                }else{
                    $newproductslug= "";
                }

                if (isset($_POST['newshortdiscription'])){
                    $newshortdiscription= $_POST['newshortdiscription'];
                }else{
                    $newshortdiscription = "";
                }

                if (isset($_POST['newcurrentdate'])){
                    $newcurrentdate= $_POST['newcurrentdate'];
                }else{
                    $newcurrentdate= "";
                }

                if (isset($_POST['newproductdesctiption'])){
                    $newproductdesctiption= $_POST['newproductdesctiption'];
                }else{
                    $newproductdesctiption = "";
                }

                include "connection.php";
                $sql = "UPDATE product SET 
                            productname = '$newproductname',
                            productslug = '$newproductslug',
                            short = '$newshortdiscription',
                            discription = '$newproductdesctiption',
                            date = '$newcurrentdate'
                           WHERE id=$id";


                // Execute the SQL statement
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
            ?>


        </form>
    </div>
</div>





<?php
include "footer.php" ;
?>


