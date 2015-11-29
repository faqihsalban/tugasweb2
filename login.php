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
                            <a href="index.php?menu=home" class="brand"><div class="icon-large icon-truck">

                            </div>Deli Town</a>


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

                <li class="dropdown"><a href="index.php?menu=deliLaundry" class="dropdown-toggle" >
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
              <div class="row">
        				<div class="widget">
        					<div class="widget-content">
        						<div class="faq-container">
        							<!-- <div class="faq-toc"> -->

        								<h2 style="text-align: center;"><br>Selamat Datang di Deli Town
                          <div class="icon-large icon-truck" style="color:#52017b"></div>
                          <div class="icon-small icon-align-left"></div>
                        </h2>
                        <p style="text-align:center">Belum punya ID?<a href="index.php?menu=signup"> Daftar</a></p>

                        <div class="account-container" style="margin-top:1em; margin-bottom:3em">

                            <div class="content clearfix" >
                                <form action="index.php?menu=home" method="post">
                                    <h1>Login</h1>

                                    <div class="login-fields">

                                        <div class="field">
                                            <label for="username">Username</label>
                                            <input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
                                        </div> <!-- /field -->

                                      <div class="field">
                                            <label for="password">Password:</label>
                                            <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
                                        </div> <!-- /password -->

                                    </div>

                                    <div class="login-actions">
                                        <button class="button btn btn-success btn-large" type="submit" name="btn_login">Masuk</button>
                                    </div>

                                </form>

                            </div>
                          </div>
        							</div>
        						</div>
        					</div>
        				</div>
        				</div>
        				</div>
        			</div>
        		</div>
        		</div>

        <?php
    // }
    ?>
  </body>
</html>
