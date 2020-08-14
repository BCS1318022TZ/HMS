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
          <h3 style="color: blue">HOSTEL INFORMATIONS</h3>
        </h4>
        <hr>
        <h3 align="center">Manage Hostel</h3>        
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
              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addHotel" style="float: right; margin: 15px 0px 15px 50px;">ADD NEW HOSTEL</button>
              <!-- Modal -->
              <div id="addHotel" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <form method="POST" action="addHostel.php">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add New Hostel</h4>
                      </div>
                      <div class="modal-body">
                        <p>
                          <div class="form-group has-feedback">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            <input type="text" name="hostName" class="form-control"  
                            placeholder="Hostel Name" required="">
                          </div>
                          <div class="form-group has-feedback">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            <input type="email" name="email" class="form-control"  
                            placeholder="Hostel Email" required="">
                          </div>
                          <div class="form-group has-feedback">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            <input type="text" name="location" class="form-control"  
                            placeholder="Hostel Location" required="">

                          </div>
                          <div class="form-group has-feedback">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            <input type="text" name="phone" class="form-control"  
                            placeholder="Phone Number" required="">
                          </div>
                          <div class="form-group has-feedback">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            <input type="text" name="sponser" class="form-control"  
                            placeholder="Sponser Name" required="">
                          </div>
                        </p>
                      </div>
                      <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" name="submit" value="ADD HOSTEL">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!--End Trigger the modal with a button -->
            </tr>
            <tr>
              <th>Hostel Name</th>
              <th>Phone Number</th>
              <th>Hostel Email</th>
              <th>Hostel Location</th>
              <th>Sponser Name</th>
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
            $query="Select * from Hostel where host_id !=1";
            $stmt = $db->query($query);
            while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
              ?>
              <!-------------------END PHP BLOCK ------------------------------>
              <tbody>
                <tr>
                  <td><?php echo $r["host_name"];?></td>
                  <td><?php echo "+255-". $r["phone"];?></td>
                  <td><?php echo $r["email"];?></td>
                  <td><?php echo $r["location"];?></td>
                  <td><?php echo $r["sponser"];?></td>
                  <td>
                    <i><a href="editHostelForm.php?id=<?php echo $r['host_id'];?>">edit</a></i>
                  </td>
                  <td>
                    <i><a href="deleteHostel.php?id=<?php echo $r['host_id'];?>"
                      onclick ='return Delete()'>delete</a></i>
                    </td>
                  </tr>
                  <?php
                }

                ?>
              </tbody>
            </table>
            <tr>
              <td>

                <form>
                   <button style="float: left;" class="btn btn-success">
                      <a href="api.php" style="color: white">APPLY API</a>
                    </button>
                  </form>

                </td>
              </tr>
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