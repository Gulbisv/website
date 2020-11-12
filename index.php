<?php
include 'signup.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/style.css">
    <title>Pineapple</title>
</head>
<body>
<div class="container grid">
    <div class="base-container">
        <div class="top-bar flex">
            <div class="logo-pineapple">
                <img src="assets/images/Union.png" alt="logo">
                <p class="text-pineapple">pineapple.</p>
            </div>
            <ul>
                <li><a href="#">About</a></li>
                <li><a href="#">How it works</a></li>
                <li><a href="#">Contacts</a></li>
            </ul>
        </div>
        <div class="mobile-container">
            <div class="header">
                <p>Subscribe to newsletter</p>
            </div>
            <div class="paragraph">
                <p>Subscribe to our newsletter and get 10% disscount on pineapple glasses</p>
            </div>
            <form id="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="input" id="input">
                    <input type="text" name="email" placeholder="Type your email address here..." id="email" value="<?php echo htmlspecialchars($_POST['email']) ?: '' ?>">
                    <button class="button-arrow" type="submit" name="submit" onclick="Redirect();"  ><i class="fas fa-arrow-right"></i></button>
                    <small id="error">
                        <?php echo $exists;
                        echo $msg ;
                        echo $empty;
                        ?>
                    </small>
                </div>
                <div class="tos" id="tos">
                    <input type="checkbox" id="checkbox" name="terms" value="1"/>
                    <label for="checkbox">I agree to <a href="#">terms of service</a> </label>
                </div>
            </form>
            <div class="underline"><hr></div>
            <div class="social-container">
                <a href="#" class="social-fb"><i class="fab fa-facebook-f" id="ic-fb"></i></a>
                <a href="#" class="social-instagram"><i class="fab fa-instagram" id="ic-instagran"></i></a>
                <a href="#" class="social-twitter"><i class="fab fa-twitter" id="ic-twitter"></i></a>
                <a href="#" class="social-youtube" id="ic-youtube"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
    <div class="image-container"></div>
</div>
<script src="assets/main.js"></script>
</body>
</html>