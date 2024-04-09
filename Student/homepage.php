<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/app.css">
    <script src="https://kit.fontawesome.com/524640606a.js" crossorigin="anonymous"></script>
    <title>Document</title>
  
</head>
<body>
    
    <div class="wrapper">
        <!-- navbar stats here -->
        <nav>
          <input type="checkbox" id="show-search">
          <input type="checkbox" id="show-menu">
          <label for="show-menu" class="menu-icon"><i class="fa-solid fa-bars-staggered"></i></label>
          <div class="content">
          <div class="logo"><a href="#">Student forum</a></div>
            <ul class="links">
              <li><a href="#">Trending</a></li>
              <li>
                <a href="#" class="desktop-link">Categories</a>
                <input type="checkbox" id="show-features">
                <label for="show-features">Categories</label>
                <ul>
                  <li><a href="#">Social issues</a></li>
                  <li><a href="#">Technology</a></li>
                  <li><a href="#">Economics</a></li>
                  <li><a href="#">Sports & entertainments</a></li>
                  <li><a href="#">Health & fitness</a></li>
                  <li><a href="#">Politics</a></li>
                </ul>
              </li>
              <li>
               
              </li>
              <li><a href="#">About us</a></li>
            </ul>
          </div>
          <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
          <form action="#" class="search-box">
            <input type="text" placeholder="Type Something to Search..." required>
            <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
          </form>

          
        </nav>
         <!-- navbar ends here -->

         <!-- main body starts here -->
         <div class="main-body flex">
            <!-- left absolute panel starts here -->
            <div class="left-panel d-flex flex-col justify-center gap-1">
               <div class="img-wrapper">
                <img src="assets/images/kd.jpg" alt="x" class="w-10">
               </div>
               <div class="user-info d-flex flex-col ">
                <span class="name">Kelvin Aron</span>
                <span class="email">aron@gmail.com</span>
               </div>

               <div class="quick-links d-flex flex-col gap-1">
                <div class="quick-item">
                  <a href="students.html">Community</a>
                </div>
                <div class="quick-item">
                  <a href="posts.html">Manage posts</a>
                </div>
                <div class="quick-item">
                  <a href="create.html">Create new</a>
                </div>
                <div class="quick-item">
                  <a href="profile.html">View profile</a>
                </div>
               </div>

               <div class="logout-btn">
                 <div class="logout">
                    <a href="">logout</a>
                 </div>
               </div>
            </div>
            <!-- left absolute panel ends here -->

            <!-- right-panel starts here -->
            <div class="right-panel py-2 px-2 d-flex flex-col justify-center">
              <div class="header-post text-center">
                <h3>Trending stories</h3>
              </div>
                <div class="post-card w-9 d-flex">
                   <div class="left-content d-flex flex-col justify-center">
                      <div class="img-wrapper">
                        <img src="assets/images/kd.jpg" alt="x" class="w-10">
                      </div>
                      <a href="/users/uid" class="name">
                        <span class="name">Kelvin Aron</span>
                      </a>
                   </div>

                   <div class="right-content">
                    <h4>Post title goes here</h4>
                     <div class="post-body">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quasi dolorum saepe voluptatem possimus. Nemo, incidunt corporis, laborum commodi temporibus fugiat in eligendi laboriosam minima aliquid voluptatum mollitia illo dolore atque?</p>
                     </div>
                    <a href="/posts/pid/show" class="comments-show flex">
                        <i class="fas fa-comments"></i>
                        <span>20 comments</span>
                    </a>

                    <div class="time">
                      <span>2 hours ago</span>
                    </div>
                   </div>
                </div>
                <div class="post-card w-9 d-flex">
                   <div class="left-content d-flex flex-col justify-center">
                      <div class="img-wrapper">
                        <img src="assets/images/kd.jpg" alt="x" class="w-10">
                      </div>
                      <a href="/users/uid" class="name">
                        <span class="name">Kelvin Aron</span>
                      </a>
                   </div>

                   <div class="right-content">
                    <h4>Post title goes here</h4>
                     <div class="post-body">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quasi dolorum saepe voluptatem possimus. Nemo, incidunt corporis, laborum commodi temporibus fugiat in eligendi laboriosam minima aliquid voluptatum mollitia illo dolore atque?</p>
                     </div>
                    <a href="/posts/pid/show" class="comments-show flex">
                        <i class="fas fa-comments"></i>
                        <span>20 comments</span>
                    </a>

                    <div class="time">
                      <span>2 hours ago</span>
                    </div>
                   </div>
                </div>
                <div class="post-card w-9 d-flex">
                   <div class="left-content d-flex flex-col justify-center">
                      <div class="img-wrapper">
                        <img src="assets/images/kd.jpg" alt="x" class="w-10">
                      </div>
                      <a href="/users/uid" class="name">
                        <span class="name">Kelvin Aron</span>
                      </a>
                   </div>

                   <div class="right-content">
                    <h4>Post title goes here</h4>
                     <div class="post-body">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quasi dolorum saepe voluptatem possimus. Nemo, incidunt corporis, laborum commodi temporibus fugiat in eligendi laboriosam minima aliquid voluptatum mollitia illo dolore atque?</p>
                     </div>
                    <a href="/posts/pid/show" class="comments-show flex">
                        <i class="fas fa-comments"></i>
                        <span>20 comments</span>
                    </a>

                    <div class="time">
                      <span>2 hours ago</span>
                    </div>
                   </div>
                </div>
               
            </div>
         </div>
         <!-- main body ends here -->
      </div>
   
    
</body>
</html>