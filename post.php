<?php include("includes/header.php"); ?>

<?php include("includes/navbar.php"); ?>


    
    <div id="Post" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9 bg-light">
                    <h1  class="lead align-items-center mt-5 text-center">Create Post</h1>
                     <form action="" method="post">
                         <div class="form-group">
                           <label for="">Title</label>
                           <input type="text" name="" id="" class="form-control" placeholder="Type Title here" aria-describedby="helpId">
                           <!-- <small id="helpId" class="text-muted">Help text</small> -->
                         </div>

                         <div class="form-group">
                           <label for="">Post</label>
                           <textarea name="editor" id="editor" class="form-control" cols="30" rows="10" placeholder="Type Your Post Here"></textarea>
                           
                           <!-- <small id="helpId" class="text-muted">Help text</small> -->
                         </div>

                         <button type="submit" class="btn btn-warning mb-5">Create Post</button>

                         

                <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
                     </form>
                </div>

                <div class="col-md-3">

                </div>
            </div>
        </div>
    </div>



 <?php include("includes/footer.php"); ?>

 


<!-- 
    Developed by: @kevoocodes
 -->