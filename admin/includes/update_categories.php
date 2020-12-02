<form action = "" method = "POST">
    <div class = "form-group">
        <label for = "cat-title">Edit category</label>

        <?php
        if(isset($_GET['edit'])){
            $cat_id = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
            $select_categories_id = mysqli_query($conn_db_cms, $query);
            while($row = mysqli_fetch_assoc($select_categories_id )){
                $cat_title =  $row['cat_title'];
                $cat_id =  $row['cat_id'];
            }//end while
        } //end if

        //Update query
        if(isset($_POST['update_category'])){
            $get_cat_title = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '{$get_cat_title}' WHERE cat_id = {$cat_id} ";
            $update_query =  mysqli_query($conn_db_cms, $query);

            if(!$update_query){
                die("Update query failed" . mysqli_error($conn_db_cms));
            }
        }
        ?>
        <input value = "<?php echo isset($cat_title)? $cat_title : ""; //ternary operator?>" type = "text" class = "form-control" name = "cat_title">
        <input type = "text" class = "form-control" name = "cat_title">
    </div>
    <div class = "form-group">
        <input class = "btn btn-primary" type = "submit" name = "update_category" value = "Update">
    </div>
</form>