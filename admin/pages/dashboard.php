<?php

session_start();

if (!$_SESSION) {
    
    header("location:../index.php");

}elseif (isset($_SESSION) && $_SESSION['user']!='admin') {
    header('location../index.php');
}

include('./views/websiteicon.php');
?>

<script src="../actions/js/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


<title>Dashboard</title>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Admin Panel</a>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div id="wrapper">

    <div id="SucessMessageModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p><svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
  <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
  <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
</svg></p>
<div class="modalText"><center id="modaltext1"></center></div> 
  </div>

</div>

        <!-- Sidebar -->
        <?php include "./views/sidebarMenu.php" ?>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper" >
        <div class="mainContents ">
            <?php include "./views/mainContents_dashboard.php"; ?>
        </div>

        <div class="mainContents">
            <?php include "./views/addGymBoy.php"; ?>
        </div>

        <div class="mainContents">
            <?php include "./views/gymBoys.php"; ?>
        </div>

        <div class="mainContents is-active">
            <?php include "./views/addTrainer.php"; ?>
        </div>

        <div class="mainContents">
            hi5
        </div>

        <div class="mainContents">
            hi6
        </div>
    </div>

    <!-- Page Contents end-->


</body>

<script type="text/javascript">


window.onload = function(){
var today = new Date(); 
var dd = today.getDate(); 
var mm = today.getMonth()+1; 
var yyyy = today.getFullYear();
var rangeStart = dd-(dd-1)+'/'+mm+'/'+yyyy; 
var rangeEnd = dd+'/'+mm+'/'+yyyy;
    document.getElementById('datePicker').value = rangeStart+' '+'-'+' '+rangeEnd;
    document.getElementById('CurrentDateRange').innerHTML = rangeStart + " to " + rangeEnd;
  updateGraph();

};
    
    const navLinks = Array.from(document.querySelectorAll('.sidebarLink'))
const contentItems = Array.from(document.querySelectorAll('.mainContents'))

const clearActiveClass = (element, className = 'is-active') => {
  element.find(item => item.classList.remove(`${ className }`))
}

const setActiveClass = (element, index, className = 'is-active') => {
  element[index].classList.add(`${ className }`)
}

const checkoutTabs = (item, index) => {
  item.addEventListener('click', () => {
    
    if (item.classList.contains('is-active')) return
    clearActiveClass(navLinks)
    clearActiveClass(contentItems)
    
    setActiveClass(navLinks, index)
    setActiveClass(contentItems, index)
  })
}

navLinks.forEach(checkoutTabs);


    // Get the modal
var SucessMessageModal = document.getElementById("SucessMessageModal");

// Get the button that opens the modal
var btn = document.getElementById("addGymBoy");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function displaySuccessMessage(mssg) {
  SucessMessageModal.style.display = "block";
  document.getElementById('modaltext1').innerHTML = mssg;
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  SucessMessageModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == SucessMessageModal) {
    SucessMessageModal.style.display = "none";
  }
}


</script>