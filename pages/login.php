<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/public/styles/site.css">


  <title>CineFlix</title>
</head>

<body>

  <?php
  include("includes/header.php");
  ?>

 <?php if (is_user_logged_in()) { ?>
      <p class= "welcome">Welcome <strong><?php echo htmlspecialchars($current_user['name']); ?></strong>!</p>

    <?php } ?>

  <?php if (!is_user_logged_in()) { ?>
      <h2 class= "welcome">Sign In</h2>

      <?php echo login_form('/admin/movies', $session_messages); ?>
      
  <?php } ?>



  <?php
    include("includes/footer.php");
  ?>

</body>

</html>
