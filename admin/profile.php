<?php include "includes/admin_header.php" ?>



<?php
if(isset($_SESSION['username'])){
    
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";

    $select_user_profile_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
    }


}


?>

<?php


if(isset($_POST['edit_user'])){
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    
    // $post_image = $_FILES['image']['name'];
    // $post_image_tmp = $_FILES['image']['tmp_name'];
    
    
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // $post_date = date('d-m-y');


    
    // move_uploaded_file($post_image_tmp, "../images/$post_image");
    

    
        

         $query = "UPDATE users SET ";
         $query .= "username = '{$username}', ";
         $query .= "user_password = '{$user_password}', ";
         $query .= "user_firstname = '{$user_firstname}', ";
         $query .= "user_lastname = '{$user_lastname}', ";
         $query .= "user_email = '{$user_email}', ";
         $query .= "user_role = '{$user_role}' ";
         $query .= "WHERE username = '{$username}' ";

    
    $edit_user_query = mysqli_query($connection,$query);
    
    confirm_query($edit_user_query);
    
    
}

?>




<div id="wrapper">

    <!-- Navigation -->


    <?php include "includes/admin_nav.php" ?>















    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>




                    <form action="" method="post" enctype="multipart/form-data">
    
    
    
    <div class="form-group">
         <label for="Post_Author">Firstname</label>
         <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ?>">
     </div>
 
 
     <div class="form-group">
         <label for="Post_Status">Lastname</label>
         <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ?>">
     </div>
 
 
     <div class="form-group">
         
         <select name="user_role" id="">
         
         <option value="subscriber"><?php echo $user_role ?></option>
         
         
         <?php
             if($user_role == 'admin'){
                 
         echo "<option value='subscriber'>subscriber</option>";
             }else{
                 
         echo "<option value='admin'>admin</option>";
             }
             
             
             
             ?>
         
         
             
             
             
         </select>
         
     </div>
 
 
 
     <div class="form-group">
         <label for="Post_tags">Username</label>
         <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
     </div>
 
     <div class="form-group">
         <label for="Post_tags">Email</label>
         <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
     </div>
 
     <div class="form-group">
         <label for="password">Password</label>
         <input type="password" id="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
     </div>
 
 
   
 
     <button type="submit" class="btn btn-primary" name="edit_user">Update Profile</button>
 
 
 </form>




                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

















    <?php include "includes/admin_footer.php" ?>