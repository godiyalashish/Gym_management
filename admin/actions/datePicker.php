<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<style type="text/css">
	
	.dateRange{
		border: none;
		background-color: #F2F2F2!important;
		border-bottom: 1px solid gray;
		font-size: 20px;
		color: gray;
		text-align: center;
	}
	.filterContent{
		margin-top: 15px;
	}
	#filterForm{
		display: inline-block;
		float: right;
		display: none;
	}
	#filterButton{
		display: inline-block;
		float: right;
		margin-left: 10px;
	}

	#CurrentDateRange{
		display: inline-block;
		float: right;
		margin-right: 10px;
		font-size: 25px;
	}
	.fa-filter{
		margin-right: 4px;
	}
	

</style>


<div id="filterButton" >
<button type="button" id= "buttonFilter" class="btn btn-primary mb-2" onclick="showFilterForm()"><i class="fas fa-filter"></i>Filter</button>
</div>

<strong><div id="CurrentDateRange">
</div></strong>

<div id="filterForm">
<form type="post" action="#" class="form-inline">
	<div class="form-group mx-sm-3 mb-2">
	<input class="form-control dateRange" type="text" name="daterange" id="datePicker" >
	</div>
</form>
</div>

<script>


function showFilterForm() {
		var x = window.getComputedStyle(document.getElementById('filterForm')).display;
		
	if( x == 'none'){
	document.getElementById('filterForm').style.display = "inline-block";
	document.getElementById('buttonFilter').innerHTML = "Close filter";
	document.getElementById('CurrentDateRange').style.display = "none";

}else{
	document.getElementById('filterForm').style.display = "none";
	document.getElementById('buttonFilter').innerHTML = "Filter";
	document.getElementById("buttonFilter").insertAdjacentHTML("afterbegin",
                "<i class='fas fa-filter'></i>");
	document.getElementById('CurrentDateRange').style.display = "inline-block";
}
}

$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    rangeStart = start.format('YYYY-MM-DD');
    rangeEnd = end.format('YYYY-MM-DD');
    document.getElementById('CurrentDateRange').innerHTML = rangeStart + " to " + rangeEnd;
   	 $.ajax({
    	type:"POST",
    	url: "../actions/updateFilterContent.php",
    	data: { startDate : rangeStart, endDate : rangeEnd},
    	success: function(result) {
    		document.getElementById('feeAmount').innerHTML = result[2];
    		document.getElementById('feeCount').innerHTML = result[1];
    		document.getElementById('admisssionsCount').innerHTML = result[0];
    		
    	},dataType:"json"
    })
 
  });
});
</script>

