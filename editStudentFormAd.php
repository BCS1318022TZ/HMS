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
      <div class="col-sm-10">
        <div class="row" style="background-color: #C0D9D9; height: 70px">
          <div class="col-sm-10">
            <div class="modal-body">
              <span style="font-size: 25px">&lt;<<&gt;UPDATE HOSTEL INFORMATIONS &lt;>>&gt;</span>
            </div>
          </div>
          <div class="col-sm-2">
            <div style="margin: 15px -30px 0px 0px;">Profile</div>
          </div>
        </div> 
        <hr>
      </div> 
      <!-- PHP BLOCK  -->
      <?php 
      include("connection.php");
      if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM students WHERE student_id='$id'";
        $stmt = $db->query($query);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <!-- END PHPH BLOCK -->
        <div class="container table-responsive"> 
          <form method="POST" action="editStudentHendlerAd.php" role="form" style="margin-top: 50px;">
            <div hidden="">
              <input type="text" name="student_id" value="<?php echo $r['student_id'];?>" class="form-control" id="pwd">
              <input type="text" name="photo" value="photoName" class="form-control" id="pwd">
            </div>
            <div class="row">
              <div class="col-sm-5">
               <div class="form-group">
                <label for="pwd">First Name:</label>
                <input type="text" name="fName" value="<?php echo $r['fName'];?>" class="form-control" id="pwd">
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Middle Name:</label>
                <input type="text" name="mName" value="<?php echo $r['mName'];?>" class="form-control" id="pwd">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Last Name:</label>
                <input type="text" name="lName" value="<?php echo $r['lName'];?>" class="form-control" id="pwd">
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Gender:</label>
                <input type="ra" name="gender" value="<?php echo $r['gender'];?>" class="form-control" id="pwd">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Address:</label>
                <input type="text" name="address" value="<?php echo $r['address'];?>" class="form-control" id="pwd">
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Phone:</label>
                <input type="text" name="phone" value="<?php echo $r['phone'];?>" class="form-control" id="pwd">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Email:</label>
                <input type="text" name="email" value="<?php echo $r['email'];?>" class="form-control" id="pwd">
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Date of Birth:</label>
                <input type="text" name="dob" value="<?php echo $r['dob'];?>" class="form-control" id="pwd">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Room Name:</label>
                <select name="room_name" class="form-control" style="margin: 14px 0px 0px 0px"> <!--host_id-->
                  <?php 
                  include("connection.php");
                  $room_id = $r['room_id'];
                  $query="Select * from room";
                  $stmt = $db->query($query);
                  while($rw = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo $rw['room_name']; ?>">
                      <?php echo $rw['room_name']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Student Status:</label>
                <input type="text" name="status" readonly="" value="<?php echo $r['status'];?>"  class="form-control" id="pwd">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Username:</label>
                <input type="text" name="username" value="<?php echo $r['username'];?>" class="form-control" id="pwd">
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="text" name="password" value="<?php echo $r['password'];?>" class="form-control" id="pwd">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-10">
              <input class="btn btn-primary" type="submit" name="update" value="UPDATE">
            </div>
          </div>
        </form>    
      </div>
    </div>
  </div>
</div>
<?php
}
include("footer.php");
?>
</body>
</html>