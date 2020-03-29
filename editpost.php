<?php
    require('config/db.php');

    
  if(isset($_POST['submit'])) {
      echo 'submitted';
      $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
      $title = mysqli_real_escape_string($conn, $_POST['title']);
      $body = mysqli_real_escape_string($conn, $_POST['body']);
      $author = mysqli_real_escape_string($conn, $_POST['author']);

      $query = "UPDATE newest SET 
            title='$title',
            author= '$author',
            body= '$body'
            WHERE id = '$update_id' ";
        
      if(mysqli_query($conn, $query)) {
            header('location: index.php');
        } else {
            echo 'ERROR: ' . mysql_error($conn);
        }
  
  
    }

    $id= mysqli_real_escape_string($conn, $_GET['id']);


    $query = 'SELECT * FROM newest Where id = ' . $id;
    $result = mysqli_query($conn, $query);

    
    $post = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    mysqli_close($conn);

   
?>

<?php include('inc/header.php'); ?>
    <h1>Add Posts</h1>

    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" >
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class='form-control' value ='<?php echo $post['title']; ?>'>
    </div>
    <div class="form-group">
        <label>Author</label>
        <input type="text" name="author" class='form-control' value ='<?php echo $post['author']; ?>'>
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea name="body" class='form-control' rows='25' cols='45'><?php echo $post['body']; ?></textarea>
    </div>
    <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
    <input type="submit" name='submit' value='submit' class='btn btn-primary'> 
    
    
    
    
    </form>

    <?php include('inc/footer.php'); ?>
