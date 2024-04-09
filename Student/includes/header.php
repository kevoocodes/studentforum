<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assetss/app.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/524640606a.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>

 <!-- FONT AWESOME LINK -->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
    <!-- FONT AWESOME LINK -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
    <title>Student Forum</title>
  
</head>
<body>

    <div class="wrapper">
        <!-- navbar stats here -->
        <nav>
          <input type="checkbox" id="show-search">
          <input type="checkbox" id="show-menu">
          <label for="show-menu" class="menu-icon"><i class="fa-solid fa-bars-staggered"></i></label>
          <div class="content">
          <div class="logo"><a href="dashboard.php">Student forum</a></div>
            <ul class="links">
              <li><a href="dashboard.php">Trending</a></li>
              <li>
                <a href="#" class="desktop-link">Categories</a>
                <input type="checkbox" id="show-features">
                <label for="show-features">Categories</label>
                <ul>
                <?php 
                    
                    $sql = $con->query("SELECT * FROM categories");
                    $r = mysqli_num_rows($sql);
                    
                    while($cat = mysqli_fetch_array($sql)) {
                        echo "
                                     <li><a href='category.php?categoriesid= ".$cat['id']."'> " . $cat['cat_name'] . "</a></li>
                                
                        ";
                        }
                
                    ?>
                 
                </ul>
              </li>
              <li>
               
              </li>
              <li><a href="about.php">About us</a></li>
            </ul>
          </div>
          <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
          <form action="search.php" method="POST" class="search-box">
            <input name="search" type="text" placeholder="Type Something to Search..." required>
            <button name="submit" type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
          </form>

          
        </nav>
         <!-- navbar ends here -->
