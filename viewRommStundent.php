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
          <h3 style="color: blue">ROOMS INFORMATIONS</h3>
        </h4>
        <hr>
        <h3 align="center">View Rooms</h3> 
               
        <div class="container table-responsive">           
          <table class="table table-hover" style="width: 100%;">
            <thead>
              <tr>
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
              </tr>
              <tr>
                <th>Room Name</th>
                <th>Capacity</th>
                <th>Status</th>
                <th>Hostel Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <!------------------- PHP BLOCK ------------------------------>
            <?php
            if (!isset($_SESSION["user"])) {
              header("location:index.php");
            }else{
              include("connection.php");
              $id=$_GET['id'];

              $query="SELECT * FROM Room WHERE room_name!='null'";
              $stmt = $db->query($query);
              while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                <!-------------------END PHP BLOCK ------------------------------>
                <tbody>
                  <?php
                  $hostId = $r["host_id"];
                  $q="SELECT * FROM hostel WHERE host_id='$hostId'";
                  $stmts = $db->query($q);
                  while($row = $stmts->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>  
                      <!-------------------HOSTEL INFO ------------------------------>

                      <td><?php echo $r["room_name"];?></td>
                      <td><?php echo $r["capacity"];?></td>
                      <td><?php echo $r["status"];?></td>
                      <td><?php echo $row["host_name"];?></td>
                      <td>
                        <i><a href="editRoomForm.php?id=<?php echo $r['room_id'];?>">edit</a></i>
                      </td>
                      <td>
                        <i><a href="deleteRoom.php?id=<?php echo $r['host_id'];?>"
                          onclick ='return Delete()'>delete</a></i>
                        </td>
                      </tr>
                    </tbody>
                    <?php
                  }
                }
              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php
    unset($_SESSION['success']);
    unset($_SESSION['fail']);
    include("footer.php");
    ?>
  </body>
  </html>