
<?php

include 'connect.php';
include 'includes/templates/header.php';

if(isset($_GET['page']))
{
  if($_GET['page'] == 'contact')
  {
    include 'includes/templates/contact.php';
  } 
   elseif ($_GET['page'] == 'home')
  {
    include 'includes/templates/home.php';
  } 
  elseif ($_GET['page'] == 'users')
  {
    include 'includes/templates/users.php';
  }
  elseif ($_GET['page'] == 'furniture')
  {
    include 'includes/templates/furniture.php';
  }
  elseif ($_GET['page'] == 'providers')
  {
    include 'includes/templates/providers.php';
  }
}
else 
{
  header('location: index.php?page=home');
}

// include 'includes/templates/footer.php';



