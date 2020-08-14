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
        <h3 align="center">Manage Applicants</h3>        
        <div class="container table-responsive">
          <button type="button" class="btn btn-info btn-lg" style="float: right; margin: 15px 0px 15px 50px;"><a href="addStudent.php" style="color: white; text-decoration: none;">NEW_STUENT</a></button>           
          <table class="table table-hover" style="width: 100%;">
            <thead>
             <!-- session -->
             <?php if(isset($_SESSION['success'])){?>
              <label style="color: green; font-size: 20px;">
                <?php echo $_SESSION['success']; ?>
                
              </label>
            <?php }?>

            <?php if(isset($_SESSION['fail'])){?>
              <label style="color: red;font-size: 20px;"><?php echo $_SESSION['fail']; ?></label> 
            <?php }?>
            <!-- end session -->
            <tr>
              <th>Full Name</th>
              <th>Gender</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Date of Birth</th>
              <th>Room Name</th>
              <th>Status</th>
            </tr>
          </thead>
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
          $rw = $stmt->fetch(PDO::FETCH_ASSOC);
          $st = $rw["room_id"];

          $query="SELECT * FROM Room WHERE room_name!='null' and room_id='$st' order by room_name";
            $stmt = $db->query($query);
            while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
              ?>
          ?>
              <!-------------------END PHP BLOCK ------------------------------>
              <tbody>
                <tr>
                  <td><?php echo $r["fName"]." ".$r["mName"]." ".$r["lName"];?></td>
                  <td><?php echo $r["gender"];?></td>
                  <td><?php echo $r["address"];?></td>
                  <td><?php echo "+255-".$r["phone"];?></td>
                  <td><?php echo $r["email"];?></td>
                  <td><?php echo $r["dob"];?></td>
                  <td><?php echo $row["room_name"];}?></td>
                  <td><?php echo $r["status"];?></td>
                  </tr>
                </tbody>
                <?php
              }
              ?>
            </table>
          </div>
      </div>
  </div>
  <?php
}
include("footer.php");
?>
</body>
</html>