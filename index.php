<?php

    require('config/db.php');
  

    $query = 'SELECT * FROM newest ORDER BY created_at DESC';
    $result = mysqli_query($conn, $query);

    // kind of like how you parse with javascript
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
 //J Nvar_dump($posts);
    mysqli_free_result($result);

    mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
    <h1>Posts</h1>

    <?php foreach($posts as $post) : ?>
        <div class="well">
            <h3><?php echo $post['title']; ?></h3>
            <small>Created on <?php echo $post['created_at']; ?></small>
            <small>by <?php echo $post['author'];  ?></small>
            <p><?php echo $post['body'];  ?></p>
            <a class='btn btn-default' href="post.php?id=<?php echo $post['id']; ?>">Read More/edit</a> 
              
        </div>
    <?php endforeach; ?>

    <?php include('inc/footer.php'); ?>

