<?php
if(!isset($_SESSION)){
session_start();
}
   if(!isset($_SESSION['username'])){
    header('Location: index.php');
   }   
   $url = "http://localhost/CRM/";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shopping Cart</title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?php echo $url;?>vendor/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>vendor/feather/feather.css">
  <link rel="stylesheet" href="<?php echo $url;?>vendor/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo $url;?>vendor/flag-icon-css/css/flag-icon.min.css"/>
  <link rel="stylesheet" href="<?php echo $url;?>vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>vendor/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="<?php echo $url;?>vendor/jquery-bar-rating/fontawesome-stars.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo $url;?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo $url;?>images/favicon.png" />

  
</head>
<body>
  <div class="container-scroller">
