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
        <h3 align="center">Manage Rooms</h3>        
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
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addRoom" style="float: right; margin: 15px 0px 15px 50px;">ADD NEW ROOM</button>
                <!-- Modal -->
                <div id="addRoom" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <form method="POST" action="addRoom.php">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Add New Room</h4>
                        </div>
                        <div class="modal-body">
                          <p>
                            <div class="form-group has-feedback">
                              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                              <input type="text" name="room_name" class="form-control"  
                              placeholder="Room Name" required="">
                            </div>
                            <div class="form-group has-feedback">
                              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                              <input type="text" name="capacity" class="form-control"  
                              placeholder="Room Capacity" required="">

                            </div>
                            <div class="form-group has-feedback">
                              <select name="status" class="form-control" >
                                <option value=""> -- Hostel Status -- </option>
                                <option value="Empty">Empty</option>
                                <option value="Full">Full</option>
                              </select>
                            </div>
                            <div class="form-group has-feedback">
                              <select name="host_name" class="form-control"> <!--host_id-->
                                <?php 
                                include("connection.php");
                                $query="Select * from Hostel";
                                $stmt = $db->query($query);
                                while($r = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                                 <option value="<?php echo $r['host_name']; ?>">
                                  <?php echo $r['host_name']; ?>
                                </option>
                              <?php } ?>
                            </select>

                          </div>
                        </p>
                      </div>
                      <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" name="submit" value="ADD ROOM">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!--End Trigger the modal with a button --> 
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
            $query="SELECT * FROM Room WHERE room_name!='null' order by room_name";
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
                    <i><a href="deleteRoom.php?id=<?php echo $r['room_id'];?>"
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