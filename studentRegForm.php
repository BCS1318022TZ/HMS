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
  <script type="text/javascript" src="js/jquery.min.js"></script>
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
            <a href="#">SignUp</a>
          </li>
        </ol>
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
  <!-- FORM STARTING -->
  <div class="container table-responsive"> 
    <form action="studentReg.php" method="POST" name="myForm" role="form" style="margin-top: 50px;">
      <div class="form-group has-feedback" hidden="">
        <input type="text" name="student_id" hidden="">
        <input type="text" name="status" value="Applicant" hidden="">
        <input type="text" name="room_id" value="1" hidden="">
        <input type="text" name="photo" value="photo" hidden="">
      </div>

      <div class="row">
        <div class="col-sm-5">
         <div class="form-group">
          <label for="pwd">First Name:</label>
          <input type="text" name="fName" id="fName" class="form-control" required="" placeholder="First Name">
        </div>
      </div>
      <div class="col-sm-5">
        <div class="form-group">
          <label for="pwd">Middle Name:</label>
          <input type="text" name="mName" id="mName" class="form-control" required="" placeholder="Middle Name">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-5">
       <div class="form-group">
        <label for="pwd">Last Name:</label>
        <input type="text" name="lName" id="lName" class="form-control" required="" placeholder="Last Name">
      </div>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <label for="pwd">Gender:</label>
        <select class="form-control" name="gender">
          <option value="">--Select Gender--</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-5">
     <div class="form-group">
      <label for="pwd">Stduent Address:</label>
      <input type="text" name="address" id="address" class="form-control" required="" placeholder="address">
    </div>
  </div>
  <div class="col-sm-5">
    <div class="form-group">
      <label for="pwd">User Phone :</label>
      <input type="text" name="phone" class="form-control" required="" placeholder="User Phone 
      Eg: 776 666 813">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-5">
   <div class="form-group">
    <label for="pwd">User Email:</label>
    <input type="text" name="email" id="email" class="form-control" required="" placeholder="User Email 
    Eg: example@gmail.com">
  </div>
</div>
<div class="col-sm-5">
  <div class="form-group">
    <label for="pwd">Middle Name:</label>
    <input type="date" name="dob" class="form-control" required="" placeholder="Date of Birth">
  </div>
</div>
</div>

<div class="row">
  <div class="col-sm-5">
   <div class="form-group">
    <label for="pwd">User Name:</label>
    <input type="text" name="username" id="username" class="form-control" required="" placeholder="User Name">
  </div>
</div>
<div class="col-sm-5">
  <div class="form-group">
    <label for="pwd">User Password:</label>
    <input type="password" name="password" id="password" required="" class="form-control" placeholder="User Password">
  </div>
</div>
</div>
<button type="submit"  id="btnSubmit" class="btn btn-success" name="submit" onclick="return Validate()">Sign In</button>
<button type="reset"  class="btn btn-warning" name="reset">Reset</button>  
</form>
</div>
<!-- END FORM -->
</div>
<!-- END OF NAVSIDE(RIGHT && LEFT) -->


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

   if( document.myForm.fName.value == "" )
   {
    alert( "Please provide your First Name!" );
    document.myForm.fName.focus() ;
    return false;
  }

  if( document.myForm.mName.value == "" )
  {
    alert( "Please provide your Middle Name!" );
    document.myForm.mName.focus() ;
    return false;
  }
  if( document.myForm.lName.value == "" )
  {
    alert( "Please provide your Last Name!" );
    document.myForm.lName.focus() ;
    return false;
  }
  if( document.myForm.gender.value == "" )
  {
    alert( "Please provide your gender!" );
    document.myForm.gender.focus() ;
    return false;
  }

  if( document.myForm.phone.value == "" ||
   isNaN( document.myForm.phone.value ) ||
   document.myForm.phone.value.length != 9 )
  {
    alert( "Mobile number should contain only 9 digits(number)");
    document.myForm.phone.focus() ;
    return false;
  }


  if( document.myForm.address.value == "" )
  {
    alert( "Please provide your Address!" );
    document.myForm.address.focus() ;
    return false;
  } 

  if( document.myForm.phone.value == "" )
  {
    alert( "Please provide your Phone!" );
    document.myForm.phone.focus() ;
    return false;
  }  


  if( document.myForm.email.value == "" )
  {
    alert( "Please provide your Email!" );
    document.myForm.email.focus();
    return false;
  }

  var emailID = document.myForm.email.value;
  atpos = emailID.indexOf("@");
  dotpos = emailID.lastIndexOf(".");

  if (atpos < 1 || ( dotpos - atpos < 2 )) 
  {
    alert("Please enter correct email ID")
    document.myForm.email.focus();
    return false;
  }

  if( document.myForm.dob.value == "" )
  {
    alert( "Please provide your Address!" );
    document.myForm.dob.focus();
    return false;
  }
}
</script>
</html>