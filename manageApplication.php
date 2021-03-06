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
          <h3 style="color: blue">STUDENTS INFORMATIONS</h3>
        </h4>
        <hr>
        <h3 align="center">Manage Applicants</h3>        
        <div class="container table-responsive">          
          <table class="table table-hover" style="width: 100%; margin: 25px;">
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
              <th>Username</th>
              <th>Approve</th>
              <th>Delete</th>
            </tr>
          </thead>
          <!------------------- PHP BLOCK ------------------------------>
          <?php
          if (!isset($_SESSION["user"])) {
            header("location:index.php");
          }else{
            include("connection.php");
            $query="SELECT * FROM students WHERE room_id !='1' AND status='Applicant' ";
            $stmt = $db->query($query);
            while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
              $rowId =$r['room_id'];
              $q="SELECT * FROM Room WHERE room_id='$rowId' ";
              $st = $db->query($q);
              while($row = $st->fetch(PDO::FETCH_ASSOC)){
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
                  <td><?php echo $r["username"];?></td>
                  <td>
                    <i><a href="ApproveApplication.php?id=<?php echo $r['student_id'];?>">Approve</a></i>
                  </td>
                  <td>
                    <i><a href="deleteStudent.php?ids=<?php echo $r['student_id'];?>"
                      onclick ='return Delete()'>delete</a></i>
                    </td>         
                  </tr>
                </tbody>
                <?php
              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
  unset($_SESSION['success']);
  unset($_SESSION['fail']);
  include("footer.php");
  ?>
</body>
</html>