<?php

if(isset($_GET['edit_user'])){
    
    $the_user_id = $_GET['edit_user'];
    
    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
    $select_users_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_users_query)){
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
         $query .= "WHERE user_id = {$user_id} ";

    
    $edit_user_query = mysqli_query($connection,$query);
    
    confirm_query($edit_user_query);
    
    
}




?>
   

   
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



    <!-- <div class="form-group">
        <label for="Post_image">Post Image</label>
        <input type="file" class="form-control" id="Post_image" placeholder="Post Title" name="image">
    </div> -->

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


  

    <button type="submit" class="btn btn-primary" name="edit_user">Update User</button>


</form>
