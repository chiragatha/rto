     
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RTO Management System</title>
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <img src="production/images/collage8.png" style="display: block;margin: 0 auto;margin-bottom: -60px;"  />
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="production/data/authentication.php" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="required"  name="email"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="required" name="password"/>
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Log In</button>
              </div>

              <?php
                if(isset($_REQUEST['message']))
                {
                  switch($_REQUEST['message'])
                  {
                    case 1: 
                      echo "<div class='alert alert-warning'>Warning!Please Login First.</div>";
                      //echo '<h6>'."Please Login First".'</h6>';
                      break;
                    case 2: 
                      echo "<div class='alert alert-danger'><strong>Warning!</strong> Email or Password did not matched.</div>";
                      //echo '<h6>'."Username nd Password did not matched".'</h6>';
                      break;
                          
                  }
                }    
              ?>   

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <!-- <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div> -->
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="production/data/register.php" method="post">
              <h1>Create Account</h1> 
              <div>
                <input type="text" class="form-control" placeholder="Name" required="required"  name="name"/>
              </div>             
              <div>
                <input type="email" class="form-control" placeholder="Email" required="required" name="email"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="required" name="password"/>
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <!-- <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div> -->
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
