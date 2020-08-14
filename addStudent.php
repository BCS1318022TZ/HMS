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
					<h3 style="color: blue">ADD NEW STUDENTS</h3>
				</h4>
				<hr>
				<div class="container table-responsive"> 
					<form method="POST" action="addStudentHendler.php">          
						<table style="width: 100%;">
							<thead>
							</thead>
							<tbody>
								<td hidden="">
									<input name="student_id" type="text" class="form-control" id="pwd">
									<input name="photo" type="text" class="form-control" id="pwd">
									<input name="status" type="text" value="Students" class="form-control">
								</td>
								<tr>
									<td><label>Fist Name</label>
										<input name="fName" type="text" class="form-control" id="pwd" required="" placeholder="Enter Fist Name" style="width: 80%;"></td>
										<td><label>Middle Name</label>
											<input name="mName" type="text" class="form-control" id="pwd" required="" placeholder="Enter Middle Name" style="width: 80%;"></td>
										</tr>
										<tr>
											<td><label>Last Name</label>
												<input name="lName" type="text" class="form-control" id="pwd" required="" placeholder="Enter Last Name" style="width: 80%;"></td>
												<td><label>Gender</label>
													<label class="radio-inline"><input type="radio" value="Male" name="gender">Male</label>
													<label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
												</td>
											</tr>
											<tr>
												<td><label>Address</label>
													<input name="address" type="text" class="form-control" id="pwd" required="" placeholder="Enter Address" style="width: 80%;"></td>
													<td><label for="pwd">Room Name:</label>
														<select name="room_name" class="form-control" style="width: 80%"> <!--host_id-->
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
													</td>
												</tr>
												<tr>
													<td><label>Phone</label>
														<input name="phone" type="number" class="form-control" id="pwd" required="" placeholder="Enter Phone" style="width: 80%;"></td>
														<td><label>Email</label>
															<input name="email" type="email" class="form-control" id="pwd" required="" placeholder="Enter Email" style="width: 80%;"></td>
														</tr>
														<tr>
															<td><label>Date of Birth</label>
																<input name="dob" type="date" class="form-control" id="pwd" required="" placeholder="Enter Date of Birth" style="width: 80%; padding: 0px 0px 5px 20px"></td>
																<td><label>Username</label>
																	<input name="username" type="text" class="form-control" id="pwd" required="" placeholder="Enter Username" style="width: 80%;" ></td>
																</tr>
																<tr><td><label>Password</label>
																	<input name="password" type="password" class="form-control" id="pwd" required="" placeholder="Enter Password" style="width: 80%;"></td>
																</tr>
																<tr>
																	<td>
																		<input class="btn btn-primary" type="submit" name="update" value="ADD STUDENT">
																		<input type="reset" class="btn btn-warning"  id="pwd" required="" value="RESET" style="width: 25%;">
																	</td>
																</tr>
															</tbody>
														</table>
													</form>
												</div>
											</div>
										</div>
									</div>
									<?php
									include("footer.php");
									?>
								</body>
								</html>