<?php include 'inc/header.php';?>
<?php
if(isset($_SESSION['auth'])){
    header("location:profile.php");
    die;
}
?>

<?php include 'inc/nav.php';?>


<div class="conatiner">
        <div class="row">
            <div class="col-6 offset-3">
            <h2 class="border p-2 my-2 text-center"> Login</h2>
            
         <?php 
          if (isset($_SESSION['errors'])):
         foreach($_SESSION['errors'] as $error ):?>
         <div  class="alert alert-danger tex-center">
            <?php echo $error;?>
         </div>
            <?php
             endforeach;
             unset($_SESSION['errors']);
            endif;
            ?>

            <form    action="handelers/handellogin.php"    method="POST"  class ="border p-3">

                 <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    
                    <div class="form-group p-2 my-1">
                    <input type="submit" class="form-control" value="login" name="submit"></button>
                    </div>

                    </form>    
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

    <?php include 'inc/footer.php';?>
