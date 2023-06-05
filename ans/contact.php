<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title>Contact</title>
  <link rel="stylesheet" href="vue/css/style.css">
</head>
<body>
<?php
if(isset($_SESSION['email']))
{
  require_once("head_connexion.php"); 
}
else {
      require_once("header.php");
  }
?>
<div class="container">  
  <form id="contact" action="" method="post">
    <h3>Contact</h3>
    <h4>Contactez nous!!</h4>
    <fieldset>
      <input placeholder="Your name" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number (optional)" type="tel" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Web Site (optional)" type="url" tabindex="4" required>
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your message here...." tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>
<!-- partial -->
<?php
require_once("footer.php");
?>
</body>
</html>
