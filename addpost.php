<?php

    require('config/db.php');
  if(isset($_POST['submit'])) {
      echo 'submitted';
      $title = mysqli_real_escape_string($conn, $_POST['title']);
      $body = mysqli_real_escape_string($conn, $_POST['body']);
      $author = mysqli_real_escape_string($conn, $_POST['author']);

      $query = "INSERT INTO newest(title, author, body) VALUES('$title','$author' ,'$body')";
        
      if(mysqli_query($conn, $query)) {
            header('location: index.php');
        } else {
            echo 'ERROR: ' . mysql_error($conn);
        }
  
  
    }

   
?>

<?php include('inc/header.php'); ?>
    <h1>Add Posts</h1>

    <form class='form-add-post' method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" >
        <div class="form-group">
            <label >Title</label>
            <input type="text" name="title" class='form-control' >
        </div>
        <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" class='form-control'>
        </div>
        <div class="form-group">
            <label >Body</label>
            <textarea name="body" class='form-control'  rows='3' cols='20'>   </textarea>
        </div>
            <input type="submit" name='submit' value='Post' class='btn-post'> 
    </form>

    <?php include('inc/footer.php'); ?>












