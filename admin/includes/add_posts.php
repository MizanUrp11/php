<?php
if(isset($_POST['create_post'])){
    $post_title = $_POST['title'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['author'];
    $post_status = $_POST['post_status'];
    
    $post_image = $_FILES['image']['name'];
    $post_image_tmp = $_FILES['image']['tmp_name'];
    
    
    $post_tags = $_POST['post_tags'];
    $post_content =mysqli_real_escape_string($connection,$_POST['post_content']);
    $post_date = date('d-m-y');
    
    
    
    
    move_uploaded_file($post_image_tmp, "../images/$post_image");
    
    $query = "INSERT INTO posts (post_id, post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) VALUES (NULL, '{$post_category_id}', '{$post_title}', '{$post_author}', '{$post_date}', '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}');";
    
   
    $create_post_query = mysqli_query($connection,$query);
    
    
    confirm_query($create_post_query);
    
    
    
    
}




?>
   

   
   
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="Post_title">Post Title</label>
        <input type="text" class="form-control" id="Post_title" placeholder="Post Title" name="title">
    </div>


    <div class="form-group">
        
        <select name="post_category" id="">
            
            
            
<?php
    
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    confirm_query($select_categories);           
               
    while($row = mysqli_fetch_assoc($select_categories)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
        
        
        echo "<option value='{$cat_id}'>{$cat_title}</option>";
        
        
    } 
?> 
            
            
            
            
        </select>
        
        
        
        
    </div>



    <div class="form-group">
        <label for="Post_Author">Post Author</label>
        <input type="text" class="form-control" id="Post_Author" placeholder="Post_Author" name="author">
    </div>


    <div class="form-group">
        <label for="Post_Status">Post Status</label>
        <input type="text" class="form-control" id="Post_Status" placeholder="Post Post_Status" name="post_status">
    </div>

    <div class="form-group">
        <label for="Post_image">Post Image</label>
        <input type="file" class="form-control" id="Post_image" placeholder="Post Title" name="image">
    </div>

    <div class="form-group">
        <label for="Post_tags">Post Tags</label>
        <input type="text" class="form-control" id="Post_tags" placeholder="Post Tags" name="post_tags">
    </div>


    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" id="post_content" rows="10" cols="30" name="post_content"></textarea>
    </div>

    <button type="submit" class="btn btn-primary" name="create_post">Publish Post</button>


</form>
