<style type="text/css">
	

  #GraphFilterList{
    background-color: #007BFE;
    padding: 8px;
    border-radius: 5px;
    color: white;
    border: none;
    float: right!important;
    margin-right: 0px!important;
  }


</style>

<div class=" row">
<div id="chartFilter" >
  <select id = "GraphFilterList" onchange="updateGraph()" >
<option selected value="admissions">Admissions</option>
<option value="fee"> Fee </option>
</select>
</div>
</div>


<div class=" row container"><canvas id="myChart" style="width:100%;"></canvas>
</div>


<script type="text/javascript">
  const year = new Date().getFullYear(); 
  const ctx = document.getElementById('myChart').getContext('2d');
  const barColors = ["red", "green","blue","orange","brown","yellow","navy","#094942","#D16929","#A9D90D","#D8CAF7","#A8BB58"];

var xValues;
var yValues;
    
 var barChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValues
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                }
            }]
        },
    legend: {display: false},
    title: {
      display: true,
      text: "",
      fontSize: 19,
      fontColor: 'black',
      padding:20
    }
    }
});

function updateBarGraph(chart, label, data,title) {
    chart.data.datasets.pop();
    chart.data.datasets.push({
        data: data,
        backgroundColor: barColors
    });
    chart.data.labels.pop();
    chart.data.labels = label;
    chart.options.title.text = title;
    chart.update();
}

 function updateGraph(){
  var mylist = document.getElementById("GraphFilterList");
  var x =  mylist.options[mylist.selectedIndex].text;
  
    $.ajax({
      type:"POST",
      url: "../actions/updateGraph.php",
      data: { type : ((x == "Fee") ? "Fee" : "Admissions")},
      dataType:"json",
      success: function(result) {
        let r = result.hasOwnProperty('amount');
        if(r){
          const monthsArray =Object.values(result.months);
          const amountArray = Object.values(result.amount);
          var text = `Amount of Fees received each month of ${year}`;
          updateBarGraph(barChart,monthsArray,amountArray, text);
        }else{
          const monthsArray = Object.values(result.months);
          const countArray = Object.values(result.count);
          var text =`Number of Admissions each month of ${year}`
          updateBarGraph(barChart,monthsArray,countArray,text);
        }
      }
    })
}


</script>