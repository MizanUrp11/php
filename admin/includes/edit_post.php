<?php

if(isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id'];
     }
    

    $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
    $select_posts_by_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_posts_by_id)){
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_content = $row['post_content'];
        $post_date = $row['post_date'];
    }



    if(isset($_POST['update_post'])){
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        
        $post_image = $_FILES['image']['name'];
        $post_image_tmp = $_FILES['image']['tmp_name'];
        $post_content =mysqli_real_escape_string($connection,$_POST['post_content']);
        $post_date = date('d-m-y');
        
        $post_tags = $_POST['post_tags'];

        move_uploaded_file($post_image_tmp, "../images/$post_image");




        if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
        $select_image = mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($select_image)){
            $post_image = $row['post_image'];
        }
        }

        // $query = "UPDATE posts SET ";
        // $query .= "post_title = '{$post_title}', ";
        // $query .= "post_category_id = '{$post_category_id}', ";
        // $query .= "post_date = '{$post_date}', ";
        // $query .= "post_author = '{$post_author}', ";
        // $query .= "post_status = '{$post_status}', ";
        // $query .= "post_content = '{$post_content}', ";
        // $query .= "post_image = '{$post_image}', ";
        // $query .= "WHERE post_id = {$the_post_id} ";


        $query = "UPDATE posts SET post_category_id = '{$post_category}', post_title = '{$post_title}', post_author = '{$post_author}', post_status = '{$post_status}', post_date = '{$post_date}', post_image = '{$post_image}',  post_content = '{$post_content}', post_tags = '{$post_tags}', post_comment_count = '3' WHERE posts.post_id = $post_id"; 



        $update_query = mysqli_query($connection,$query);
        confirm_query($update_query);
    }
?>




<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="Post_title">Post Title</label>
        <input type="text" class="form-control" id="Post_title" placeholder="Post Title" name="post_title" value="<?php echo $post_title ?>">
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
        <input type="text" class="form-control" id="Post_Author" placeholder="Post_Author" name="post_author" value="<?php echo $post_author ?>">
    </div>





<div class="form-group">
<select name="post_status">
<option value=""><?php echo $post_status; ?></option>


<?php
if ($post_status == "Published" || $post_status == "") {
    echo "<option value='Draft'>Draft</option>";
} else {
    echo "<option value='Published'>Published</option>";
}

?>




</select>
</div>









    <div class="form-group">
        <label for="Post_image">Post Image</label>
        <img class="img-responsive" src="../images/<?php echo $post_image; ?>">
        <input type="file" class="form-control" id="Post_image" placeholder="Post Title" name="image">
    </div>

    <div class="form-group">
        <label for="Post_tags">Post Tags</label>
        <input type="text" class="form-control" id="Post_tags" placeholder="Post Tags" name="post_tags" value="<?php echo $post_tags ?>">
    </div>


    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" id="post_content" rows="10" cols="30" name="post_content"><?php echo $post_content ?>
             
        </textarea>
    </div>

    <button type="submit" class="btn btn-primary" name="update_post">Update Post</button>


</form>