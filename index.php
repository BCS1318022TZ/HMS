<?php 
session_start();
 ?>
 <html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Project</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="js/style.css" />
  <link rel="icon" type="image/jpg" href="img/ed1.jpg" />
  <link rel="stylesheet" type="text/css" href="js/js/style.css"/>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/style.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
 <div class="container-fluid">
  <!-- HEADER SECTION -->
  <div class="row">
    <div class="col-sm-9">
      <div style="height: 110px; width:100%; background-color: #ffffff; font-family: Cambria">
        <p style="padding: 25px 0px 0px 30%; text-align:center; font-size: 25px; color: #269ABC;">
          <b>HOSTEL MANAGEMENT<br>SYSTEM</b>
        </p>
      </div>
    </div>
    <div class="col-sm-3">
      <div style="height: 110px; width:100%; background-color: #ffffff; font-family: Cambria">
        <p style="padding: 30px; text-align:center; font-size: 25px">
          <a href="#" data-toggle="collapse" data-target="#demo">
            <img src="img/prof.png" alt="profilePicture" class="img-circle" style="width: 15%;" >
            <span id="demo" class="collapse" style="font-size: 12px">
              <a href="#">
                <span data-toggle="modal" data-target="#myModal">loginUp</span>
              </a>
            </span>
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title">Login</h3>
                  </div>
                  <div class="modal-body">
                    <div>
                      <form action="loginHendler.php" method="POST" name="myForm" onsubmit="return(Validate());">
                        <div class="form-group has-feedback">
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          <input type="text" name="username" class="form-control"  
                          placeholder="User Name" id="username">
                        </div>
                        <div class="form-group has-feedback">
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          <input type="password" name="password" class="form-control" 
                          placeholder="User Password" id="password">
                        </div>
                        <div class="row">
                          <div class="col-xs-12">

                            <div class="checkbox icheck">
                              <label>
                                <input type="checkbox"> Remember Me
                              </label>
                            </div>
                          </div>
                        </div>
                        <input type="submit"  id = "btnSubmit" class="btn btn-success btn-block btn-flat ajax" 
                        name="btnlogin" value="Sign In"  onclick ='return Validate()'>  
                        <a href="studentRegForm.php">
                          New Student..? Sign Up Here
                        </a><br>
                      </form>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
                <!-- end modal content -->
              </div>
            </div>
            <!-- End Modal -->
          </a>
        </p>      
      </div>
    </div>
  </div>
  <!-- THIN NAV -->
  <div clss="row">
    <div class="col-sm-12">
      <div style="height: 15px; width:100%; background-color: gray;">
        <!--#################################################################################################-->
      </div>
    </div>
  </div>
  <!-- NAV SECTION -->
  <div class="row">
    <div class="col-sm-3">
      <div style="width:100%; margin: 5px 0px 5px 0px;">
        <ol id="ol">
          <li id="link" style="margin-top: 30px;">
            <a href="index.php" id="home"><i class="fa fa-home"></i>Home</a>
          </li>
          <li id="link">
            <a href="#">News</a>
          </li>
          <li id="link">
            <a href="#" id="home">Contact</a>
          </li>
          <li id="link">
            <a href="#">About Us</a>
          </li>
          <li id="link" >
            <a href="#" id="home">Services</a>
          </li>
          <li id="link">
            <a href="studentRegForm.php">
              <span>SignUp</span>
            </a>
          </li>
        </ol>
      </div>
    </div>
    <div class="col-sm-9">
      <!-- session -->
                 <?php if(isset($_SESSION['success'])){?>
                          <label style="color: green; font-size: 20px; text-align: center;">
                            <?php echo $_SESSION['success']; ?>
                              
                            </label>
                        <?php }?>

                        <?php if(isset($_SESSION['fail'])){?>
                          <label style="color: red;font-size: 20px;text-align: center;"><?php echo $_SESSION['fail']; ?></label> 
                        <?php }?>
                 <!-- end session -->
      <div style="min-height: 300px; width:98%; background-color: #F1F1F1;; margin: 5px;">
       <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
        <div id="wowslider-container0">
          <div class="ws_images"><ul>
            <li><img src="img/perfect_bed.jpg" alt="Perfect Bed" title="Perfect Bed" id="wows0_0" 
              style="height: 300px"/></li>
              <li><img src="img/public_room.jpg" alt="Public Room" title="Public Room" id="wows0_1"/></li>
              <li><a href="http://wowslider.net"><img src="img/reading_area.jpg" alt="jquery slideshow" title="Reading Area" id="wows0_2"/></a></li>
              <li><img src="img/vip_room.jpg" alt="VIP ROOM" title="VIP ROOM" id="wows0_3"/></li>
            </ul></div>
            <div class="ws_bullets"><div>
              <a href="#" title="Perfect Bed"><span><img src="img/perfect_bed.jpg" alt="Perfect Bed"/></span></a>
              <a href="#" title="Public Room"><span><img src="img/public_room.jpg" alt="Public Room"/></span></a>
              <a href="#" title="Reading Area"><span><img src="img/reading_area.jpg" alt="Reading Area"/></span></a>
              <a href="#" title="VIP ROOM"><span><img src="img/vip_room.jpg" alt="VIP ROOM"/></span></a>
            </div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="#">#</a>
            </div>
            <div class="ws_shadow"></div>
          </div>  
          <script type="text/javascript" src="js/js/wowslider.js"></script>
          <script type="text/javascript" src="js/js/script.js"></script>
          <!-- End WOWSlider.com BODY section -->
        </div>
      </div>
    </div>
    <!-- END OF NAVSIDE(RIGHT && LEFT) -->
    <div class="row" style="margin-top: 8px;">
     <div class="col-sm-3">
       <div style=" width: 100%; height: 340px;">
         <p>
          <img src="img/new.gif" style="width: 40px">
          <span id="news">News</span>
        </p>
        <ol id="marq">
          <marquee style="font-family: Book Antiqua;
          height:300px;" direction="down" scrolldelay="300" onmouseover="this.stop();"
          onmouseout="this.start();">
          <li id="news">
            <a href="#">Tangazo kwa skuli hotel zetu kufunguliwa baada ya Corona.</a>
            <img src="img/new.gif" style="width: 20px">
          </li>
          <li id="news">
            <a href="files/CSEE_2020.pdf">Final F.4 Timetable in 2020.</a>
            <img src="img/new.gif" style="width: 20px">
          </li>
          <li id="news">
            <a href="#">Hostel nzuri kwa VIP Students.</a>
            <img src="img/new.gif" style="width: 20px">
          </li>
          <li id="news">
            <a href="#">Umuhimu wa kujikinga na tatizo kubwa la Corona.</a>
            <img src="img/new.gif" style="width: 20px">
          </li>
          <li id="news">
            <a href="#">Mwanafunzi kupewa tunzo juu ya kudumisha usafi...</a>
            <img src="img/new.gif" style="width: 20px">
          </li>
        </marquee>
      </ol>
    </div>
  </div>
  <div class="col-sm-3">
   <div style=" width: 100%; min-height: 200px; border-style: double;">
     <div id="contact">
       <p id="head" style="font-size: 15px">
         MESSAGE OF THE DIRECTOR
       </p>
       <fieldset style="width: 100%;"><img src="img/ed2.jpg" style="width: 100%; height: 200px; float: left;">
         Thank you for visiting the Hostel MAnagement website. It’s our distinguished pleasure to welcoming you to our website.
         <a href="#.php">Read More...</a>
       </fieldset>
     </div>
   </div>
 </div>
 <div class="col-sm-3">
   <div style=" width: 100%; min-height: 200px; border-style: dashed;">
     <div id="contact">
       <p id="head" style="font-size: 15px">
         Contact Us via Manager
       </p>
       Overall Rating (Out of 5)
       <h3 style="text-align: center;">4.1</h3>
       <p style="text-align: center;">
         <span class="glyphicon glyphicon-user" id="star-color"></span>
         <span class="glyphicon glyphicon-home"id="star-color"></span>
         <span class="glyphicon glyphicon-lock"id="star-color"></span>
         <span class="glyphicon glyphicon-star"></span>
       </p>
       <span>
        Want to take an admission at our Hostel ?<br> &nbsp Visit our site and know more about our accommodation facilities.<p> Accommodation along with other facilities plays a key role for a student and improving these facilities actually makes a difference in the retention rate of students.
          <a href="#.php">Read More...</a></p>
        </span>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
   <div style=" width: 100%; min-height: 200px; border-style: double;">
     <div id="contact">
       <p id="head" style="font-size: 15px">
         Hostel life
       </p>
       <fieldset style="width: 100%;"><img src="img/guys.png" style="width: 100%; height: 200px; float: left;">
        Hostel life is well connected with the main Collage.
        Here, we make sure that students can feel like their home even away from their own home. 
        <a href="#">Read More..</a>
      </fieldset>
    </div>
  </div>
</div>
</div>
<!-- FOOTER SECTION -->
<div class="row">
  <div class="col-sm-12">
    <div style="height: 30px; width:100%; background-color: gray; text-align:center; font-family: Segoe UI; color: #ffffff; padding: 5px">
      &copy; Moh'd Mshimba || All CopyRight Reserved || 2020
    </div>
  </div>
</div>
</div>
<?php 
unset($_SESSION['success']);
unset($_SESSION['fail']);
 ?>
</body>
<script type="text/javascript">
  
      function Validate()
      {
      
         if( document.myForm.username.value == "" )
         {
            alert( "Please provide your User Name!" );
            document.myForm.username.focus() ;
            return false;
         }

         if( document.myForm.password.value == "" )
         {
            alert( "Please provide your Password!" );
            document.myForm.password.focus() ;
            return false;
         }
     }

</script>
</html>