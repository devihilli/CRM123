<?php
$url = "http://localhost/CRM/"
?>

<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href=""><img src="<?php echo $url;?>images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href=""><img src="<?php echo $url;?>images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search Projects.." aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
              <a class="dropdown-item preview-item">               
                  <i class="icon-head"></i> Profile
              </a>
              <a class="dropdown-item preview-item" href="logout.php">
                  <i class="icon-inbox"></i>Logout
                  
              </a>
            </div>
          </li>
          <li class="nav-item dropdown mr-4 d-lg-flex d-none">
            <a class="nav-link count-indicatord-flex align-item s-center justify-content-center" href="#">
              <i class="icon-grid"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="<?php echo $url;?>images/faces/shopping-3253839__340.jpg">
          </div>
          <div class="user-name">
              Shooping cart
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#staff" aria-expanded="false" aria-controls="staff">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title"> Staff</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="staff">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url;?>view/staff/create.php">Add Staff</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url;?>view/staff/list.php">View Staff</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#customer" aria-expanded="false" aria-controls="customer">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title"> Customer</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="customer">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url;?>view/customer/create.php">Add  Customer</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url;?>view/customer/list.php">View  Customer</a></li>
            

                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title"> Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url;?>view/product/create.php">Add  Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url;?>view/product/list.php">View Products</a></li>
                
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#purchase" aria-expanded="false" aria-controls="purchase">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title"> Purchase</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="purchase">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url;?>view/purchase/create.php">Add  Purchase</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url;?>view/purchase/list.php">View  Purchase</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#sale" aria-expanded="false" aria-controls="sale">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title"> Sales</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sale">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url;?>view/sale/create.php">Add  Sales</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo $url;?>view/sale/list.php">View Sales</a></li>
                
              </ul>
            </div>
          </li>

          
          <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>     
      
        
        <!-- partial --
    