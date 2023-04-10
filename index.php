<?php include "clientheader.php"; ?>
<div class="container mt-5">
    <h1>Products</h1>
  <hr class="mt-5">
    <h2>Custom Hexagon Boxes</h2>
    <div class="row">
        <?php
        include "connection.php";
        $query = "SELECT * FROM product";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>

                <div class="col-md-3 mt-3" >
                    <a class="product-link" href="frountendproductdetails.php?id=<?php echo $row['id'];?>" style="text-decoration: none">
                        <div class="card" >
                            <img class="card-img-top" src="images/product/<?php echo $row['productname']?>.png" alt="Card image cap" style="border: 1px solid black; border-radius: 6px">
                            <div class="card-body ">
                                <p class="card-title" style="font-size: 15px; font-weight: bold"><?php echo $row['productname']; ?></p>
                                <?php
                                $short= $row['short'];
                                $short = implode(' ', array_slice(explode(' ', $short), 0,  8));
                                ?>
                                <p class="card-text"style="font-size: 12px"><?php echo $short; ?>...</p>
                                <a href="#" class="btn btn-primary w-100">Order Now</a>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
<?php include "clientfooter.php"; ?>
