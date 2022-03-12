<link rel="stylesheet" type="text/css" href="../css/gymBoys.css">

<input type="text" id="userSearch" onkeyup="searchUser()" placeholder="Search for names..">

<select id="userFilterOptions" onChange="FilterOutUsers()">
	<option value="0">--Filters--</option>
	<option value="1">Active</option>
	<option value="2">Inactive</option>
	<option value="3">All</option>
</select>

<!-- <select id="UserListSort" onChange="sortOutUsers()">
	<option value="0">SORT</option>
	<option value="1">Alphabetically</option>
	<option value="2">New Users First</option>
	<option value="3">Old Users First</option>
</select> -->



<?php 

	if(array_key_exists('id',$_SESSION)){
		include "../../connection/connection.php";
		$s = 'btn';

		$query = "SELECT * FROM `members`";
		$result = mysqli_query($link,$query);

		echo '<ul id="usersList">';
		while($row = mysqli_fetch_assoc($result)){

			$name = $row['name'];
			$fathername = $row['fathername'];
			$fee = $row['fee'];
			$gender = $row['gender'];
			$contact = $row['contact'];
			$email = $row['email'];
			$date_created = $row['date_created'];
			$date = new DateTime($date_created);
			$weight = $row['weight'];
			$status = $row['status'];
			$address = $row['address'];
			$id = $row['id'];
			$dateDecoded = $date->format('Y-m-d');
			$name2 = htmlspecialchars($name);
			$fathername2 = htmlspecialchars($fathername);
			$address2 = htmlspecialchars($address);
			$trainerName = '';
			$trainerName2 = '';

			$query2 = "SELECT trainer_id as 'ID' FROM `assigned_trainer` WHERE member_id = $id";
			$result2 = mysqli_query($link,$query2);
			$row2 = mysqli_fetch_array($result2);
			if(!empty($row2['ID'])){
				$trainerId = $row2['ID'];
				$query3 = "SELECT name FROM `trainers` WHERE id = $trainerId";
				$result3 = mysqli_query($link,$query3);
				$row3 = mysqli_fetch_array($result3);
				$trainerName = $row3['name'];
				$trainerName2 = htmlspecialchars($trainerName);
			}

			echo "<li class='user' id='list$id'>
		<div class='container userData row'>
			<div class='col-md-3'>";

			echo '<img src="./views/images/user.png" alt="Avatar" id="memeberAvatar';print_r($id);echo'" class="avatar" onclick="showUserDetailModal(\''.$name2.'\',\''.$fathername2.'\',\''.$address2.'\',\''.$fee.'\',\''.$gender.'\',\''.$contact.'\',\''.$email.'\',\''.$weight.'\',\''.$status.'\',\''.$id.'\', \''.$dateDecoded.'\',\''.$trainerName2.'\')">';
			echo "<span class='userName' id='membername$id'>$name</span></div>";

			if($status == 1){
				echo "<div class='col-md-1 userIsActive' id='isActive$id' style='align-items: right;'><div class='userStatusPresent'>Active</div></div>";
			}else echo "<div class='col-md-1' style='align-items: right;' id='isInactive$id'><div class='userStatusInactive'>Inactive</div></div>";

			
			
			echo "<div class='userContact col-md-2'><i class='fas fa-mobile-alt'>
				<span id='memberContact$id'>$contact</span></i></div>
			<div class='userJoinDate col-md-2'><i class='far fa-calendar'><strong id='memeberJoinDate$id'>";echo $dateDecoded; echo"</strong></i></div>
			<div class='userFee col-md-1'><i class='fas fa-money-bill-wave'><strong id='memberFee$id'>$fee</strong></i></div>
			<div class='userTrainerAndSettings col-md-3' id='userSettings$id'>";

				if(empty($trainerName)){ echo "<div class='UserTrainer' id='$s$id' onClick='assignTrainerModal($id)'><i class='far fa-user' style='margin-right:3px'></i>Assign Trainer</div>";}
				else{ echo"<div style='background-color:green;color:white; font-size:14px; padding: 7px; border-radius:5px; margin-right:4px;'><i class='far fa-user' style='margin-right:3px'></i>$trainerName</div>";}
					echo "<div class='UserSettings'>
						  <button class='settingDropBtn'><center><i class='fas fa-cog'></i></center></button>
							  <div class='dropdown-content'>";

							  if($status != 1){
							    echo '<a href="#" id="changeStatusToActive'; print_r($id); echo '"onclick="changeUserStatus(\''.$id.'\',\''.$status.'\')">Make Active</a>';}else{
							    	echo '<a href="#" id="changeStatusToInActive'; print_r($id); echo'"onclick="changeUserStatus(\''.$id.'\',\''.$status.'\')">Make Inactive</a>';
							    }echo 
							    '<a href="#" id="editUserButton';print_r($id);echo'"onclick="showEditUserDetailsForm(\''.$name2.'\',\''.$fathername2.'\',\''.$address2.'\',\''.$fee.'\',\''.$gender.'\',\''.$contact.'\',\''.$email.'\',\''.$weight.'\',\''.$status.'\',\''.$id.'\', \''.$dateDecoded.'\',\''.$trainerName2.'\')">Edit User</a>';echo
							    '<a href="#" onclick="deleteUser(\''.$id.'\',\''.$name2.'\')">Delete user</a>';echo "
							  </div>
					
				</div>
			</div>
			</div>
	</li>
			";

		 }
		 echo "</ul>";  
	}

?>

    		


<div id="AddTrainerModal" class="modal3">

  <!-- Modal content -->
  <div class="Trainer-modal-content">
    <span id="closebutton1">&times;</span>
    <h2 style="padding:10px 15px;">Assign Trainer</h2>
    <form method="POST" action="../actions/assignTrainer.php" autocomplete="off" class="assignTrainerajax">
    <div class="row">
    	<input type="hidden" name="userId" id="assignTrainerTo">
    	<div class="col-md-10">
    	<select name ="trainer" class=" col-md-10 form-select" aria-label="Default select example">
    		<option selected value='-1'>Select Trainer</option>
    		<?php
    				$query4 = "SELECT id,name FROM `trainers`";
    				$result4 = mysqli_query($link,$query4);
    				while($row4 = mysqli_fetch_assoc($result4)){
    					$Tname = $row4['name'];
    					$tid = $row4['id'];
    					echo "<option value='$tid'>$Tname</option>";
    				}
    		?>
    	</select>
    </div>
    	<div class="col-md-2">
    	<input type = "submit" name="Assign" class="btn btn-primary" value="Confirm">
    </div>
    </div>
    <small id="TrainerAssignError" style="color:red; display: none;"></small>
  </form>
  </div>
</div>


<!-- Edit-user Modal -->
<div id="EditUserDetails" class="modalEditUser">

  <!-- Edit-user-Modal content -->
  <div class="modalEditUser-content">
    <span class="closeEditUser">&times;</span>
    <p>

    	<!-- user edit form starts -->
    	<div class="container" id="userEditForm">
  <div class='container' id='editUserFormErrors'><div class='alert alert-danger'><strong id="userEditFormErrorMessage"></strong></div></div>
  <div id="editUserForm">
  <form method="POST" action="../actions/editGymBoy.php" autocomplete="off" class="userEditFormajax" name="userEditForm">
    <div class="row">
    	<small id="important">*Required Fields</small>
      <div class="col-md-6">
          <div class="mb-3 input-group">
            <strong style="color:red">* &nbsp;</strong><span class="input-group-text" ><i class="far fa-user"></i></span>
            <input type="text" name="name" class="form-control" aria-describedby="emailHelp" placeholder="Name*" required title="This field is required!">

          </div>
            

          <div class="input-group mb-3">
            <strong style="color:red">* &nbsp;</strong><span class="input-group-text" ><i class="far fa-address-card"></i></span>
            <input type="text" name="contact" class="form-control" placeholder="Mobile Number*" required title="This field is required!">
          </div>

          <div class="input-group mb-3">
            <strong style="color:red">* &nbsp;</strong><span class="input-group-text" ><i class="fas fa-dollar-sign"></i></span>
            <input type="text" name="fee" class="form-control" placeholder="Fee*" required title="This field is required!">
          </div>

          <div class="input-group mb-3">
            &emsp;<span class="input-group-text" ><i class="far fa-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="Email">
          </div>

          <div class="input-group mb-3">
            &emsp;<span class="input-group-text" ><i class="fas fa-home"></i></span>
            <input type="text" name="address" class="form-control" placeholder="Address">
          </div>
        
      </div>
      <div class="col-md-6">
             <div class="input-group mb-3">
            &emsp;<span class="input-group-text" ><i class="far fa-user"></i></span>
            <input type="text" name="fatherName" class="form-control" placeholder="Father Name">
          </div>

            <div class="input-group mb-3">
            &emsp;<span class="input-group-text" ><i class="far fa-calendar-alt"></i></span>
            <input class="form-control" name="joinDate" type="text" id="datepicker2" placeholder="Join Date" />
          </div>

            <div class="input-group mb-3">
            <strong style="color:red">* &nbsp;</strong> <span class="input-group-text" ><i class="fas fa-weight"></i></span>
            <input type="text" name="weight" class="form-control" placeholder="Weight*" title="This field is required!">
          </div>

          <select class="form-select" aria-label="Default select example" name="gender" disabled title="Gender can't be changed">
            <option selected value="1">Male</option>
            <option value="2">Female</option>
            <option value="3">Other</option>
          </select>
          <input type="hidden" name="id" value=''>
          <input type="hidden" name="trainer">
          <input type="hidden" name="gender">
          <input type="hidden" name="status">
          <input type="hidden" name="lastEmail" value=''>
        <div class="form-button">
        <input id="addGymBoy" type = "submit" name="submit" class="form-submit" value="Confirm changes" />
      </div>
      </div>
      
    </div>
  </form>
</div>


</div>
    </p>
  </div>

</div>



<div id="userModalDetails" class="modal2">

  <!-- Modal content -->
  <div class="user-modal-content">
    <span class="closeButton">&times;</span>
    <div class="row">
    	<div class="col-md-12" style="display: flex; justify-content: center;">
    	<img src="./views/images/user.png" class="modalUserAvatar">
    </div>
  </div>
    <div class="row">
    	<div class="col-md-12" style="text-align: center; padding-top: 10px; padding-bottom: 10px;">
    		<span id="userModalName"></span>
    	</div>
    </div>

    <div class="row" onmouseover="this.style.backgroundColor='#f7efef';" onmouseout="this.style.backgroundColor='';">
    	<div class="col-md-12" style="margin-bottom:20px">
    		<div class="row" style="display: flex; justify-content: center; font-weight: bold;">Email</div>
    		<div class="row"><span id="modalUserEmail"></span></div>
    	</div>
    </div>
    <div class="row" onmouseover="this.style.backgroundColor='#f7efef';" onmouseout="this.style.backgroundColor='';">
    	<div class="col-md-12" style="margin-bottom:20px">
    		<div class="row" style="display: flex; justify-content: center; font-weight: bold;">Address</div>
    		<div class="row"><span id="modalUserAddress"></span></div>
    	</div>
    </div>

    <div class="row" onmouseover="this.style.backgroundColor='#f7efef';" onmouseout="this.style.backgroundColor='';">
    	<div class="col-md-6" style="margin-bottom:20px" >
    		<div class="row" style="display: flex; justify-content: center; font-weight: bold;">Contact</div>
    		<div class="row"><span id="modalUserContact"></span>
    		</div>
    		</div>
    	<div class="col-md-6" style="margin-bottom:20px">
    		<div class="row" style="display: flex; justify-content: center; font-weight: bold;">Gender</div>
    		<div class="row"><span id="modalUserGender"></span>
    		</div>
    		</div>
    </div>

    <div class="row" onmouseover="this.style.backgroundColor='#f7efef';" onmouseout="this.style.backgroundColor='';">
    	<div class="col-md-6" style="margin-bottom:20px">
    		<div class="row" style="display: flex; justify-content: center; font-weight: bold;">Father Name</div>
    		<div class="row"><span id="modalUserFname"></span>
    		</div>
    		</div>
    	<div class="col-md-6" style="margin-bottom:20px">
    		<div class="row" style="display: flex; justify-content: center; font-weight: bold;">Join Date</div>
    		<div class="row"><span id="modalUserJoinDate"></span>
    		</div>
    		</div>
    </div>

    <div class="row" onmouseover="this.style.backgroundColor='#f7efef';" onmouseout="this.style.backgroundColor='';">
    	<div class="col-md-6" style="margin-bottom:20px">
    		<div class="row" style="display: flex; justify-content: center; font-weight: bold;">Status</div>
    		<div class="row" style="padding: 0px 69px;">
    			<div class='userStatusPresent' id="modalUserActive" style="display: none;">Active</div>
    			<div class='userStatusInactive' id="modalUserInActive" style="display: none;">Inctive</div>
    		</div>
    		</div>
    	<div class="col-md-6" style="margin-bottom:20px">
    		<div class="row" style="display: flex; justify-content: center; font-weight: bold;">Weight(in kg)</div>
    		<div class="row"><span id="modalUserWeight"></span>
    		</div>
    		</div>
    </div>

    <div class="row" onmouseover="this.style.backgroundColor='#f7efef';" onmouseout="this.style.backgroundColor='';">
    	<div class="col-md-5" style="margin-bottom:20px">
    		<div class="row" style="display: flex; justify-content: center; font-weight: bold;">Fee</div>
    		<div class="row"><span id="modalUserFee"></span>
    		</div>
    		</div>
    		<div class="col-md-7" style="margin-bottom:20px">
    		<div class="row" style="display: flex; justify-content: center; font-weight: bold;">Trainer</div>
    		<div class="row"><span id="modalUserTrainer">Trainer</span>
    		</div>
    		</div>
    	</div>
    </div>
    </div>





<script type="text/javascript" src="../actions/js/gymBoys.js"></script>