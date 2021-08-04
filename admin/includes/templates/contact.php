<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NEST</title>
<meta name="description" content="">
<meta name="author" content="">


<!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="../../layouts/css/bootstrap.css">
<link rel="stylesheet" type="text/css"  href="../../layouts/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="../../layouts/css/style.css">
<link rel="stylesheet" type="text/css"  href="../../layouts/css/nivo-lightbox.css">
<link rel="stylesheet" type="text/css"  href="../../layouts/css/default.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">



<?php
     include 'header.php' ; 
?>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


<!-- Contact Section -->
<div id="contact">
  <div class="container">
    <div class="section-title text-center">
      <h2>Contact Us</h2>
      <hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed dapibus leonec.</p>
    </div>
    <div class="col-md-4">
      <h3>Contact Info</h3>
      <div class="contact-item"> <span>Address</span>
        <p>4321 California St,<br>
          San Francisco, CA 12345</p>
      </div>
      <div class="contact-item"> <span>Email</span>
        <p>info@company.com</p>
      </div>
      <div class="contact-item"> <span>Phone</span>
        <p> +1 123 456 1234</p>
      </div>
    </div>
    <div class="col-md-8">
      <h3>Leave us a message</h3>
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
      </form>
    </div>
  </div>
</div>
<?php
     include 'footer.php' ; 
?>


<script type="text/javascript" src="../../layouts/js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="../../layouts/js/bootstrap.js"></script> 
<script type="text/javascript" src="../../layouts/js/SmoothScroll.js"></script> 
<script type="text/javascript" src="../../layouts/js/nivo-lightbox.js"></script> 
<script type="text/javascript" src="../../layouts/js/jquery.isotope.js"></script> 
<script type="text/javascript" src="../../layouts/js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="../../layouts/js/contact_me.js"></script> 
<script type="text/javascript" src="../../layouts/js/main.js"></script>
</body>
</html>
