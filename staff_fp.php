<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit-icons.min.js"></script>
    <!-- custom css -->
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./common.css">
    <!-- counter js -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <div class="js-navbar">
        <nav class="uk-navbar-container">
          <div class="uk-container">
              <div uk-navbar>
      
                  <div class="uk-navbar-left">
      
                      <ul class="uk-navbar-nav">
                          <li class="uk-active">
                              <a href="#" class="js-text-white uk-text-bold">
                                  <img src="./assets/brandlogo.png" alt="">
                              </a>
                          </li>
                      </ul>
      
                  </div>
      
                  <div class="uk-navbar-right">
      
                    <div>
                      <a href="https://www.linkedin.com/mwlite/in/jananik21" class="uk-icon-link uk-margin-small-right" uk-icon="icon: linkedin;  ratio: 2"></a>
                      <a href="https://github.com/jananik21" class="uk-icon-link uk-margin-small-right" uk-icon="icon: github;ratio:2"></a>
                  </div>
                          </li>
                      </ul>
      
                  </div>
      
              </div>
          </div>1
      </nav>  
      </div>
</head>
<?php 
session_start();
/*if($_SESSION['msg']) {
echo $_SESSION['msg'].'<br/>';
}*/
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<div class="wrapper" style="width: 35%; margin: 0 auto;">
<form class="form-signin" action='staff_fp_update.php' method="post">       
<h2 class="form-signin-heading">Reset Password</h2><br/>
<input type="text" class="form-control" name="Staff_email" placeholder="Enter Your Email"  />
<br/>
<input type="password" class="form-control" name="newPassword" placeholder="New Password" required=""/><br/>
<input type="password" class="form-control" name="confirmPassword" placeholder="Confirm New Password" required=""/>
<br/>
<button class="btn btn-small btn-primary btn-block" type="submit">Submit</button>   
<input type="hidden" name="object" value="forgot"/>
</form>
</div>
 <!--Footer-->
 <div class="uk-section  uk-padding-small uk-padding-remove-bottom">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220"><path fill="#000836" fill-opacity="1" d="M0,64L40,90.7C80,117,160,171,240,170.7C320,171,400,117,480,128C560,139,640,213,720,208C800,203,880,117,960,74.7C1040,32,1120,32,1200,42.7C1280,53,1360,75,1400,85.3L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
  <footer class="lms-footer">
  <div class="footer-content">
      <div class="footer-logo">
          <img src="./assets/brandlogo.png" alt="LMS Logo">
         
      </div>
      <div class="footer-links">
          <h3 class="text-white">Quick Links</h3>
          <ul class="uk-list uk-list-hyphen">
              <li><a href="#" class="text-cray">Home</a></li>
              <li><a href="student_login.html" class="text-cray">Student Login</a></li>
              <li><a href="staff_login.html" class="text-cray">Staff Login</a></li>
              <li><a href="#" class="text-cray">Progress tracking</a></li>
          </ul>
      </div>
       <div class="features">
          <h3 class="text-white">Features</h3>
           <ul>
              <li class="text-cray">Live sessions</li>
              <li class="text-cray">Expertise solutions</li>
              <li class="text-cray">Free courses</li>
           </ul>
       </div>
      <div class="footer-contact">
        <h3 class="text-white">Contact Us</h3>
        <ul class="uk-list uk-list-hyphen">
            <li class="text-cray">Email: jananikuppuraj@gmail.com</li>
            <li class="text-cray">Phone: +91 7538831121</li>
         </ul>
      </div>
      </div>
  <hr><div class="footer-copyright uk-text-center">
      Developed by Janani| Rathinam Technical Campus
  </div>
  </div>
  </footer>
      <!--Footer end-->
      <html>