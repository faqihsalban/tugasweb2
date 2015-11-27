<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <title>Login</title>

  </head>
  <body>

        <div class="navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                            class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a>
                            <a href="index.php?menu=signup" class="brand"><div class="icon-large icon-truck">

                            </div>Deli Town</a>
                            <div class="nav-collapse">
                              <ul class="nav pull-right">

                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="icon-large icon-user"></i> <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                  <li><a href="index.php?menu=userEditProfile">Edit Profile</a></li>
                                  <li><a href="index.php?menu=logout"> logout</a></li>
                               </ul>
                             </li>
                          </ul>


              </div>
              <!--/.nav-collapse -->
            </div>
            <!-- /container -->
          </div>
          <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="subnavbar">
          <div class="subnavbar-inner">
            <div class="container">
              <ul class="mainnav">

                <li class="dropdown"><a href="index.php?menu=deliFood" class="dropdown-toggle" >
                  <div class="icon-large icon-glass">
                  </div>
                  <span>FOOD DELI</span> <b class="caret"></b></a>
                </li>

                <li class="active"><a href="index.php?menu=deliLaundry" class="dropdown-toggle" >
                  <div class="icon-large icon-tag">
                  </div>
                  <span>LAUNDRY DELI</span> <b class="caret"></b></a>

                </li>

                <li class="dropdown"><a href="index.php?menu=deliCopy" class="dropdown-toggle" >
                  <div class="icon-large icon-copy">
                  </div>
                  <span>PHOTOCOPY DELI</span> <b class="caret"></b></a>
                </li>

              </ul>
            </div>
            <!-- /container -->
          </div>
          <!-- /subnavbar-inner -->
        </div>
        <!-- /subnavbar -->




        <div class="main">
          <div class="main-inner">
            <div class="container">
              <center>
              <div class="rowSignup">
                <div class="widget-content">
                	<form action="" method="post">
        	          <table class="table table-striped table-bordered">
                      <br>
        	            <tr>
        	              <td colspan="4"> <p style="font-size:170%; text-align: center" ><b>Sign Up</b></p></td>
        	            </tr>

        	            <center><tr>
        	              <td width="12%">Email</td>
        	              <td colspan="3">
        	                <input type="text" class="inputNama" name="email" placeholder="Email">
        	              </td>
        	            </tr></center>

        	            <tr>
        	              <td width="12%">Nama</td>
        	              <td colspan="3"><input type="text" class="inputNama" name="nama" placeholder="Nama"></td>
        	            </tr>

        	            <tr>
        	              <td width="12%">Username</td>
        	              <td colspan="3"><input type="text" class="inputNama" name="username" placeholder="Username" id="txtAngka" maxlength="4"> </td>
        	            </tr>

                      <tr>
        	              <td width="12%">Password</td>
        	              <td colspan="3"><input type="password" class="inputNama" name="password" placeholder="Password" id="txtAngka" maxlength="4"> </td>
        	            </tr>

                      <tr>
        	              <td width="12%">Confirm Password</td>
        	              <td colspan="3"><input type="password" class="inputNama" name="confirmPassword" placeholder="Confirm Password" id="txtAngka" maxlength="4"></td>
        	            </tr>

                      <tr>
        	              <td width="12%">Phone</td>
        	              <td colspan="3"><input type="text" class="inputNama" name="phone" placeholder="Phone" id="txtAngka" maxlength="4"> </td>
        	            </tr>

        		          <tr>
        				          <td colspan="4">
        				            <button type="submit" class="button btn btn-success btn-large" style="margin-left: 10px" name="signUp">Sign Up</button>
        				            <button type="reset" class="button btn btn-success btn-large" style="margin-left: 20px">Reset</button>
        				          </td>
        		        	</tr>
        	          </table>
                	</form>
                </div>

              </div>
            </center>
            </div>
          </div>
        </div>


        <?php
    // }
    ?>
  </body>
</html>
