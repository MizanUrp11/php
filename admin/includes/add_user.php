<?php
if(isset($_POST['create_user'])){
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
    
     $query = "INSERT INTO users (user_id, username, user_password, user_firstname, user_lastname, user_email, user_role) VALUES (NULL, '{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}');";
    
   
     $create_user_query = mysqli_query($connection,$query);
    
    
     confirm_query($create_user_query);
    
    
    
    
}




?>
   

   
   <form action="" method="post" enctype="multipart/form-data">
    
    
    
   <div class="form-group">
        <label for="Post_Author">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>


    <div class="form-group">
        <label for="Post_Status">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>


    <div class="form-group">
        
        <select name="user_role" id="">
        <option value="subscriber">Select Option</option>
        <option value="admin">admin</option>
        <option value="subscriber">subscriber</option>
            
            
            
        </select>
        
    </div>



    <!-- <div class="form-group">
        <label for="Post_image">Post Image</label>
        <input type="file" class="form-control" id="Post_image" placeholder="Post Title" name="image">
    </div> -->

    <div class="form-group">
        <label for="Post_tags">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="Post_tags">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" class="form-control" name="user_password">
    </div>


  

    <button type="submit" class="btn btn-primary" name="create_user">Add User</button>


</form>
