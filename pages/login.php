
<?php

		include '../includes/header.php';

     if (isset($_GET['User']) && $_GET['User']== "0") 
        {

// <!-- START ALERT MESSAGES -->
echo' <div class="row" style="margin-top: 8px;">
  <div class="col-md-9"></div>
   <div class="col-md-3">
      <div class=" btn-danger alert alert-danger alert-dismissible btn-danger" role="alert" style="background-color: #CC0000; color: white; border-radius: 10px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-user-circle"></i> &nbsp; Please fill username.
    </div>
   </div>
</div>';
// <?php
        }
        if (isset($_GET['User']) && $_GET['User']== "1") 
        {
?>
<div class="row" style="margin-top: 8px;">
  <div class="col-md-9"></div>
   <div class="col-md-3">
      <div class=" btn-danger alert alert-danger alert-dismissible btn-danger" role="alert" style="background-color: #CC0000; color: white; border-radius: 10px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-user-circle"></i> &nbsp; Invalid username.
    </div>
   </div>
</div>
<?php
        }
        if (isset($_GET['Pass']) && $_GET['Pass']== "0") 
        {
?>
<div class="row" style="margin-top: 8px;">
  <div class="col-md-9"></div>
   <div class="col-md-3">
      <div class=" btn-danger alert alert-danger alert-dismissible btn-danger" role="alert" style="background-color: #CC0000; color: white; border-radius: 10px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-key fa-rotate-90"></i> &nbsp; Please fill password.
    </div>
   </div>
</div>
<?php
        }
         if (isset($_GET['Pass']) && $_GET['Pass']== "1") 
        {
?>
<div class="row" style="margin-top: 8px;">
  <div class="col-md-9"></div>
   <div class="col-md-3">
      <div class=" btn-danger alert alert-danger alert-dismissible btn-danger" role="alert" style="background-color: #CC0000; color: white; border-radius: 10px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-key fa-rotate-90"></i> &nbsp; Invalid password.
    </div>
   </div>
</div>
<?php
        }
         if (isset($_GET['Pass']) && $_GET['Pass']== "2") 
        {
?>
<div class="row" style="margin-top: 8px;">
  <div class="col-md-9"></div>
   <div class="col-md-3">
      <div class=" btn-danger alert alert-danger alert-dismissible btn-danger" role="alert" style="background-color: #CC0000; color: white; border-radius: 10px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-key fa-rotate-90"></i> &nbsp; Password is not registered..
    </div>
   </div>
</div>
<?php
        }
?>
 <!-- END ALERT MESSAGES -->

<div class="modal-dialog modal-md" >
     <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-7">
          <div class="panel" style="border-radius: 15px; box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);">
              <div class="panel-heading" style=" box-shadow: 0 0 128px 0 rgba(0,0,0,0.2),
              0 32px 64px -48px rgba(0,0,0,0.5);">
                  <a href="../index.php" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" title="Back">
                      <b style="color: #000080; font-size: 25px; ">
                      &times;
                      </b>
                  </span>
                  </a>

                  <h3 class="panel-title" style="text-align: center; color: #000080; "> 
                    <span  class="fa fa-group fa-lg" > </span> Sign in
                  </h3>
              </div>
              <div class="panel-body">
                  <form method="post" action="LoginHandler.php" autocomplete="off" >
                      <div class="form-group">
                          <span  class="fa fa-user " style=" color: #000080;" > 
                            <label style=" font-family: Times new roman; font-weight: bold; ">
                              User name
                            </label>
                          </span>
                          <input type="text" name="us"  class="  form-control"  placeholder="Enter user name"  >
                          <span class="text-danger" > 
                            <?php   
                              if (isset($_GET['User']) && $_GET['User']== "0") 
                              {
                                echo "Please fill username.";
                              }
                              if (isset($_GET['User']) && $_GET['User']== "1") 
                              {
                                echo "Invalid username.";
                              }
                            ?>
                          </span>
                      </div>
                      <div class="form-group">
                          <span  class="fa fa-key" style=" color: #000080;">
                            <label style=" font-family: Times new roman; font-weight: bold;">
                              Password
                            </label>
                          </span>
                          <input type="password" name="ps"  class="form-control"  placeholder="Enter password" id="inputError" >
                          <span class="text-danger" > 
                            <?php   
                              if (isset($_GET['Pass']) && $_GET['Pass']== "0") 
                              {
                                echo "Please fill password.";
                              }
                              if (isset($_GET['Pass']) && $_GET['Pass']== "1") 
                              {
                                echo "Invalid password.";
                              }
                              if (isset($_GET['Pass']) && $_GET['Pass']== "2") 
                              {
                                echo "Password is not registered.";
                              }
                            ?>
                          </span>
                      </div>
                        <div class="form-group">
                          <input type="submit" name="login_form" value="Login" class="form-control btn btn-primary" style=" font-family: Times new roman; font-weight: bold;">
                        </div>
                    </form>
                    <div class="row">
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-5">
                      <a href="login.php" data-toggle="modal" data-target=".bd-example-modal-sm" style="font-family: times new roman" >Forget password </a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
     </div>

  </div>

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" >
     <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-7">
          <div class="panel" style="border-radius: 15px; box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);">
              <div class="panel-heading" >
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" title="Cancel">
                      <b style="color: #000080; font-size: 25px; ">
                      &times;
                      </b>
                  </span>
                  </button>
                  <h3 class="panel-title" style="text-align: center; color: #000080;">
                    <span  class="fa fa-group fa-lg" > </span> Varification form</h3>
              </div>
              <div class="panel-body">
                  <form method="post" action="password.php" autocomplete="off">
                      <div class="form-group">
                          <span  class="fa fa-user" style=" color: #000080;" > 
                            <label style=" font-family: Times new roman; font-weight: bold; ">
                              Reg number
                            </label>
                          </span>
                          <input type="text" name="Uname"  class="form-control"  placeholder="Enter regno..." required title="Enter your regno..">
                      </div>
                      <div class="form-group">
                          <span  class="fa fa-yelp" style=" color: #000080;" > 
                            <label style=" font-family: Times new roman; font-weight: bold; ">
                              First name
                            </label>
                          </span>
                          <input type="text" name="first"  class="form-control"  placeholder="Enter first name" required title="Enter your first name..">
                      </div>
                      <div class="form-group">
                          <span  class="fa fa-gg-circle" style=" color: #000080;" > 
                            <label style=" font-family: Times new roman; font-weight: bold; ">
                              Last name
                            </label>
                          </span>
                          <input type="text" name="last"  class="form-control" required  placeholder="Enter last name" title="Enter your last name..">
                      </div>
                      <div class="form-group">
                          <span  class="fa fa-gg-circle" style=" color: #000080;" > 
                            <label style=" font-family: Times new roman; font-weight: bold; ">
                              Department name
                            </label>
                          </span>
                          <input type="text" name="department"  class="form-control" required  placeholder="Enter department name" title="Enter your department name..">
                      </div>
                      <div class="form-group">
                          <span  class="fa fa-gg-circle" style=" color: #000080;" > 
                            <label style=" font-family: Times new roman; font-weight: bold; ">
                              User role
                            </label>
                          </span>
                          <input type="text" name="role"  class="form-control" required  placeholder="Enter role in this system " title="Enter your role..">
                      </div>
                        <div class="form-group">
                          <input type="submit" name="signin" value="Varify" class="form-control btn btn-primary" style=" font-family: Times new roman; font-weight: bold;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
     </div>   
  </div>
</div>


<?php
		include '../includes/footer.php';
?>