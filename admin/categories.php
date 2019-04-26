<?php include "includes/admin_header.php" ?>


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

            <div class="col-md-6">



                <?php insert_categories(); ?>





                <form action="" method="post">
                    <div class="form-group">
                        <label for="cat_title">Add Category</label>
                        <input type="text" class="form-control" id="cat_title" placeholder="Category title" name="cat_title">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Add Category</button>
                </form>



<?php
    if(isset($_GET['edit'])){
    $cat_id = $_GET['edit'];

    include "includes/update_categories.php";
    }
?>

                    </div>


                    <div class="col-md-6">





                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th colspan="2" class="text-center">Operations</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php findAllCategory(); ?>
                                <?php deleteCategories(); ?>
                                
                            </tbody>
                        </table>

                    </div>




                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>
