<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - FAQ</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="vue/css/faq.css">
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
?>>
<!-- partial:index.partial.html -->
<section class="wrapper">
  <h1>Info Stands</h1>

  <div class="accordion__list">
    <div class="accordion__item">
      <input type="checkbox" checked>
      <svg class="accordion__svg" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path class="st0" fill-rule="evenodd" clip-rule="evenodd" d="M15.268 3H2.732L9 13.856 15.268 3zM0 2a.998.998 0 0 1 1-1h16a1 1 0 0 1 .866 1.5l-8 13.856a1 1 0 0 1-1.732 0L.134 2.5A.99.99 0 0 1 0 2z"/>
      </svg>
      <h2>Standart Information</h2>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia ut odit commodi inventore quo libero odio architecto vero fugiat, eligendi ipsum laboriosam labore magnam eveniet, quasi quae ad nihil esse!</p>
    </div>

    <div class="accordion__item">
      <input type="checkbox" checked>
      <svg class="accordion__svg" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path class="st0" fill-rule="evenodd" clip-rule="evenodd" d="M15.268 3H2.732L9 13.856 15.268 3zM0 2a.998.998 0 0 1 1-1h16a1 1 0 0 1 .866 1.5l-8 13.856a1 1 0 0 1-1.732 0L.134 2.5A.99.99 0 0 1 0 2z"/>
      </svg>
      <h2>School Stands</h2>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia ut odit commodi inventore quo libero odio architecto vero fugiat, eligendi ipsum laboriosam labore magnam eveniet, quasi quae ad nihil esse!</p>
    </div>

    <div class="accordion__item">
      <input type="checkbox" checked>
      <svg class="accordion__svg" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path class="st0" fill-rule="evenodd" clip-rule="evenodd" d="M15.268 3H2.732L9 13.856 15.268 3zM0 2a.998.998 0 0 1 1-1h16a1 1 0 0 1 .866 1.5l-8 13.856a1 1 0 0 1-1.732 0L.134 2.5A.99.99 0 0 1 0 2z"/>
      </svg>
      <h2>Floor Stands</h2>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia ut odit commodi inventore quo libero odio architecto vero fugiat, eligendi ipsum laboriosam labore magnam eveniet, quasi quae ad nihil esse!</p>
    </div>
  </div>

</section>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.1.0.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>

<?php
require_once("footer.php");
?>
</body>
</html>