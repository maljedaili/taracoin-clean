<?php require 'inc/config.php'; ?>

<!DOCTYPE HTML>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>Le Chouette Coin</title>
    <link href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css";>
    <link rel="stylesheet" href="./assets/css/style.css">
    
</head>
<header>
    <nav id="nav">
        
         <ul>
			<li class="current"><a href="index.php">Home</a></li>
			<li><a href="products.php">Produits</a></li>
            <?php
                    if (empty($_SESSION['id'])) {
                    ?>
                        <a class="nav-link" href="login.php">Sign in</a>
                    <?php
                    } else {
                    ?>
                        <a class="nav-link" href="profile.php"><?php echo $_SESSION['username']; ?></a>
                        <a class="nav-link" href="?logout">Sign in</a>
                    <?php
                    }
                    ?>
            
		</ul>
        </nav>
	
