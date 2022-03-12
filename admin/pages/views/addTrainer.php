<link rel="stylesheet" type="text/css" href="../css/add Trainer">

<div class="container">
	
	<div class='container' id='hideMe2'><div class='alert alert-danger'><strong id="addTrainerErrorMessage"></strong></div></div>
  <div id="gymBoyForm">
    <h3 id="gymBoyFormHeader">Add Trainer</h3>
  
  <form method="POST" action="../actions/addGymBoy.php" autocomplete="off" class="ajax">
    <div class="row">
      <small id="important">*Required Fields</small>
      <div class="col-md-6">
          <div class="mb-3 input-group">
            <span class="input-group-text" ><i class="far fa-user"></i></span>
            <input type="text" name="name" class="form-control" aria-describedby="emailHelp" placeholder="Name*" required title="This field is required!">

          </div>
            

          <div class="input-group mb-3">
            <span class="input-group-text" ><i class="far fa-address-card"></i></span>
            <input type="text" name="contact" class="form-control" placeholder="Mobile Number*" required title="This field is required!">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" ><i class="fas fa-dollar-sign"></i></span>
            <input type="text" name="fee" class="form-control" placeholder="Fee*" required title="This field is required!">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" ><i class="far fa-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="Email">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" ><i class="fas fa-home"></i></span>
            <input type="text" name="address" class="form-control" placeholder="Address">
          </div>
        
      </div>
      <div class="col-md-6">
             <div class="input-group mb-3">
            <span class="input-group-text" ><i class="far fa-user"></i></span>
            <input type="text" name="fatherName" class="form-control" placeholder="Father Name">
          </div>

            <div class="input-group mb-3">
            <span class="input-group-text" ><i class="far fa-calendar-alt"></i></span>
            <input class="form-control" name="joinDate" type="text" id="datepicker" placeholder="Join Date" />
          </div>

            <div class="input-group mb-3">
            <span class="input-group-text" ><i class="fas fa-weight"></i></span>
            <input type="text" name="weight" class="form-control" placeholder="Weight*" title="This field is required!">
          </div>

          <select class="form-select" aria-label="Default select example" name="gender">
            <option selected value="1">Male</option>
            <option value="2">Female</option>
            <option value="3">Other</option>
          </select>
        <div class="form-button">
        <input id="addGymBoy" type = "submit" name="submit" class="form-submit" value="Add Gym Boy" />
      </div>
      </div>
      
    </div>
  </form>
</div>


</div>