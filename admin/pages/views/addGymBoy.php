<style type="text/css">
  #gymBoyForm{
    padding: 20px 100px;
  }
  #gymBoyForm form{
    background-color: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    margin-bottom: 100px;
  }
  #gymBoyFormHeader{
    font-weight: bolder;
    border-radius: 10px;
    background-color: white;
    padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
  .important{
    color: red!important;
  }

  #addGymBoy{
    text-decoration: none;
    border: none;
    background-color: #212529;
    color: white;
    padding: 13px;
    width: 100%;
    border-radius: 6px;
    margin-top: 10px;
   transition: all 0.5s ease;
  }

input:hover {
  background-color: #dce0e5;
}

#addGymBoy:hover{
  background-color: #3a4047;
  font-weight: bold;
}

  /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 250px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 30%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.checkmark__circle {
  stroke-dasharray: 166;
  stroke-dashoffset: 166;
  stroke-width: 2;
  stroke-miterlimit: 10;
  stroke: #7ac142;
  fill: none;
  animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
}

.checkmark {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  display: block;
  stroke-width: 2;
  stroke: #fff;
  stroke-miterlimit: 10;
  margin: 10% auto;
  box-shadow: inset 0px 0px 0px #7ac142;
  animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
}

.checkmark__check {
  transform-origin: 50% 50%;
  stroke-dasharray: 48;
  stroke-dashoffset: 48;
  animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
}

@keyframes stroke {
  100% {
    stroke-dashoffset: 0;
  }
}
@keyframes scale {
  0%, 100% {
    transform: none;
  }
  50% {
    transform: scale3d(1.1, 1.1, 1);
  }
}
@keyframes fill {
  100% {
    box-shadow: inset 0px 0px 0px 30px #7ac142;
  }
}


.modalText {
  display:inline-block;
  overflow:hidden;
  white-space:nowrap;
  color: #7AC142;
  font-size: 40px;
}

#modaltext1 {
  animation: showup 10s infinite;
}

@keyframes showup {
    0% {opacity:0;}
    20% {opacity:1;}
    80% {opacity:1;}
    100% {opacity:0;}
}

.input-group-text{
  min-width: 45px!important;
  background-color: #212529;
  color: white;
}
#important{
  color: red;
  margin-bottom: 20px;
}

#hideMe {

    display: none;
    text-align: center;

    margin-bottom: 8px;
    -moz-animation: cssAnimation 0.5s ease-in-out 6s forwards;
    /* Firefox */
    -webkit-animation: cssAnimation 0s ease-in-out 6s forwards;
    /* Safari and Chrome */
    -o-animation: cssAnimation 0s ease-in-out 6s forwards;
    /* Opera */
    animation: cssAnimation 0s ease-in-out 6s forwards;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
    width: 900px;

}
</style>

<div class="container" id="gymboy">
  <div class='container' id='hideMe'><div class='alert alert-danger'><strong id="errorMessage"></strong></div></div>
  <div id="gymBoyForm">
    <h3 id="gymBoyFormHeader">Add gym Boy</h3>
  
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

<script type="text/javascript">

  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );

  function displayErrorMessage(err){
    document.getElementById('hideMe').style.display = 'block';
    document.getElementById('errorMessage').innerHTML = err;
    setTimeout(function() {
    $('#hideMe').fadeOut('fast');
}, 2500);
  }


  $('form.ajax').on('submit', function(){
    var that = $(this),
        url = that.attr('action'),
        method = that.attr('method'),
        data = {};

    that.find('[name]').each(function(index,value){
      var that = $(this),
          name = that.attr('name'),
          value = that.val();

      data[name] = value;
    });

    $.ajax({
      url:url,
      type:method,
      data:data,
      dataType:"json",
      success: function(resp){
        if(resp['error']){
          displayErrorMessage(resp.error);
        }else{
          var message = "Gym Boy Added";
          displaySuccessMessage(message);
        }
      }
    })
    return false;
  });



</script>


<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>