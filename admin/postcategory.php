<?php
    include("../includes/config.php");
?>
<?php include ("session.php"); ?>

<?php include ("include/header.php"); ?>

<?php include ("include/navigation.php"); ?>

    <div class="row">
      <div class="container">
        <div class="col-md-10 bg-light">

        <p class="text-secondary">Post Category</p>
                <?php
                    $sql = mysqli_query($con, "SELECT * FROM categories");

                    $number = 1;
                    while($row = mysqli_fetch_array($sql)) {
                        ?>

                        <ul>

                            <p><?php echo $number ?> - <a href="single_cat.php?id= <?php echo $row['id']; ?>" class="text-dark"><?php echo $row['cat_name']; ?></a></p>
                        </ul>

                        <?php

                        $number = $number + 1;
                    }

                ?>
            </div>
      </div>
    </div>



<?php include ("include/footer.php"); ?>