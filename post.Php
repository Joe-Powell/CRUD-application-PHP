<?php
    require('config/db.php');

    if(isset($_POST['delete'])) {
        echo 'submitted';
        $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
      
  
        $query = "DELETE FROM newest Where id = '$delete_id' ";
          
        if(mysqli_query($conn, $query)) {
              header('location: index.php');
          } else {
              echo 'ERROR: ' . mysql_error($conn);
          }
    
    
      }




    $id= mysqli_real_escape_string($conn, $_GET['id']);


    $query = 'SELECT * FROM newest Where id = ' . $id;
    $result = mysqli_query($conn, $query);

    // kind of like how you parse with javascript
    $post = mysqli_fetch_assoc($result);
//  var_dump($post);
    mysqli_free_result($result);

    mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>

    <a href="index.php" class='btn'>Back</a>
    <h1><?php echo $post['title']; ?></h1>
    <small>Created on <?php echo $post['created_at']; ?></small>
    <small>by <?php echo $post['author'];  ?></small>
     <p><?php echo $post['body'];  ?></p>
     <hr>
     <form class='pull-right' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
        <input type="submit" name='delete' value="Delete" class='btn-delete '>
     </form>
     
     <a href="editpost.php?id=<?php echo $post['id']; ?>" class='edit-btn'>edit</a>

     
<?php include('inc/footer.php'); ?>
