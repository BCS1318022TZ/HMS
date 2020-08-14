<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
     include("head.php");
?>
<body>
  <div class="container-fluid">
    <div class="row content">
      <?php
          include("sideNav.php");
      ?>
      <div class="col-sm-9">
        <h4>
          <h3 style="color: blue;text-transform: uppercase;">
            USER account - <?php echo $_SESSION["status"]; ?>
            </h3>
        </h4>
        <hr>
        <!------------------- PHP BLOCK ------------------------------>
        <?php
        if (!isset($_SESSION["user"])) {
          header("location:index.php");
        }else{
          include("connection.php");
          $user = $_SESSION["user"];
          $pass = $_SESSION["pass"];
          $query="SELECT * FROM students WHERE username='$user' and password='$pass' ";
          $stmt = $db->query($query);
          $r = $stmt->fetch(PDO::FETCH_ASSOC);
          ?>
          <!-------------------END PHP BLOCK ------------------------------>
          <div class="row container-fluid" >
            <div class="col-sm-6">
              <table class="table table-hover">
               <h4>PERSONAL BACKGROUND</h4>
               <tbody>
                <tr>
                  <th>Full Name</th>
                  <td> 
                    <?php echo $r["fName"]; ?>
                  </td>
                  <td>
                    <?php echo $r["mName"]; ?>
                  </td>
                  <td>
                    <?php echo $r["lName"]; ?>
                  </td>
                </tr>
                <tr>
                  <th>Gender</th>
                  <td colspan="3">
                    <?php echo $r["gender"];?>
                  </td>
                </tr>
                <tr>
                  <th>Date of Birth </th>
                  <td colspan="3">
                    <?php echo $r["dob"];?>
                  </td>
                </tr>
              </tbody>
            </table>

            <table class="table table-hover">
             <h4>CONTACT INFORMATIONS</h4>
             <tbody>
              <tr>
                <th>Phone Number</th>
                <td colspan="3"> 
                  <?php echo "+255-".$r["phone"];?>
                </td>
              </tr>
              <tr>
                <th>Email Address </th>
                <td colspan="3">
                  <?php echo $r["email"];?>
                </td>
              </tr>
              <tr>
                <th>Permanent Address</th>
                <td colspan="3">
                  <?php echo $r["address"];?>
                </td>
              </tr>
            </tbody>
          </table>

          <table class="table table-hover">
           <h4>OTHER INFORMATIONS</h4>
           <tbody>
            <tr>
              <th>Status</th>
              <td colspan="3"> 
                <?php echo $r["status"];?>
              </td>
            </tr>
            <tr>
              <th>Username</th>
              <td colspan="3">
                <?php echo $r["username"];?>
              </td>
            </tr>
            <tr>
              <th>Permanent Address</th>
              <td colspan="3">
                <?php echo $r["address"];?>
              </td>
            </tr>
            <tr>
              <th>User Password</th>
              <td colspan="3">
                <?php echo $r["password"];?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
     <?php 
       if ($_SESSION["status"]=="Students"){
        ?>
      <div class="col-sm-6">
        <h3 style="text-align: center;">Profile Picture</h3>
        <span>
         <img src="img/user.png"<?php echo '#'; ?> style="width: 30%; height: 130px;margin-left: 15%; border: 1px solid white;">
       </span>
       <form>
        <table align="center">
          <tr>
            <td >
              <input type="file" name="profile" style="width: 45%;" required="required" class="btn btn-primary"/>
            </td>

            <td>
              <input type="submit" name="save" value="UPLOAD" style="margin-left: -150%;"  class="btn btn-primary">
            </td>
          </tr>
        </table>
      </form>
    </div>
    <?php 
      } 
      ?>
  </div>
</div>
<div class="col-sm-3">.</div>
<div class="col-sm-9">
  <input type="submit" name="save" value="EDIT DATA"  class="btn btn-primary">
</div>
</div>
</div>
<?php
  }
    include("footer.php");
?>
</body>
</html>