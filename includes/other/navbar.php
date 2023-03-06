<nav class="navbar navbar-expand-sm navbar-light bg-light mb-5">
        <a id="brand" class="navbar-brand" href="index.php">Student <span id="spanbrand">forum</span></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"> Trending <span class="sr-only">(current)</span></a>
                </li>
               
           
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php 
                    
                    $sql = $con->query("SELECT * FROM categories");
                    $r = mysqli_num_rows($sql);
                    
                    while($cat = mysqli_fetch_array($sql)) {
                        echo "
                                <a class='dropdown-item' href='categoriess.php?categoriesid= ".$cat['id']."'> " . $cat['cat_name'] . "</a>
                        ";
                    }
                
                ?>
                       
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="aboutus.php">Aboutus</a>
                </li>

                <li class="nav-item">
                    <form action="search2.php" method="post">
                <div class="form-row">
                            <div class="col col-md-9">
                            <input type="text" name="search" class="form-control" placeholder="Search Here">
                            </div>
                            <div class="col col-md-3">
                            <input type="submit" name="submit" class="btn btn-info form-control" value="Search">
                            </div>
                </div>
                    </form>
                
                       
                  </li>

            </ul>

            <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="login.php" class="btn btn-warning mr-2">Members</a>
                    </li>

                    <!-- <li class="nav-item">
                           <button class="btn btn-secondary"> <img id="imgsearch" src="assets/images/icons/search.png" alt=""> Search</button>
                    </li> -->
            </ul> 
        </div>
    </nav>