<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	header('location:login.php');
	die();
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  
               <li class="menu-item-has-children dropdown">
                     <a href="profile.php" > <b>Profile</b></a>
               </li>
				   <li class="menu-item-has-children dropdown">
                     <a href="product.php" > <b>Tools</b></a>
               </li> 
               <?php
               $res = mysqli_query($con,'select * from categories');
               
               while ($row = mysqli_fetch_assoc($res)) {
               ?>
               <li class="menu-item-has-children dropdown">
                  <a href="<?php echo $row['page_url'] ?>"> <?php echo $row['categories'] ?> </a>
               </li> 

               <?php } ?>

               <!-- <li class="menu-item-has-children dropdown">
               <a href="png-pdf.php">PNG To PDF Converter</a>
               </li>            -->
               <li class="menu-item-has-children dropdown">
               <a href="photopea.php">Photoshop</a>
               </li>             
               <li class="menu-item-has-children dropdown">
               <a href="ai-batch-editor.php">Batch Editor</a>
               </li>           
               <li class="menu-item-has-children dropdown">
               <a href="scribblediffusion.php">Scribble Diffusion</a>
               </li>  
               <li class="menu-item-has-children dropdown">
               <a href="autodraw.php">Autodraw</a>
               </li>
               <li class="menu-item-has-children dropdown">
               <a href="email-translator.php">Email Translator</a>
               </li>
               <li class="menu-item-has-children dropdown">
               <a href="smartsearch.php">Smart Search Assistant</a>
               </li>
               <li class="menu-item-has-children dropdown">
               <a href="text-speech.php">Text To Speech</a>
               </li>
               <!--<li class="menu-item-has-children dropdown">
               //    <a href="chatgpt.php">ChatGPT</a>
               <!-- </li> -->

				  <?php if($_SESSION['ADMIN_ROLE']!=1){?>
				   <li class="menu-item-has-children dropdown">
                     <a href="vendor_management.php" > Users</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="categories.php" > Categories</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="contact_us.php" > Contact Us</a>
                  </li>
				  <?php } ?>
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" href="index.php"><img src="../images/logo/logo.png"></a>
                  <a class="navbar-brand hidden" href="index.php"><img src="images/logo2.png" alt="Logo"></a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Logout</a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>
         <!-- Welcome <?php echo $_SESSION['ADMIN_USERNAME']?> -->