            <div class="container-fluid">
                <div class="row">
                    <h3 class="content-header">Dashboard</h3>
                </div>

            <div class="row">
               <div class="container filterContent" >
                   <?php include "../actions/datePicker.php" ?>
               </div>
            </div>

            <div class="row dashboard-content " style="margin-bottom: 60px;">
               <?php include "../actions/dashboardContent.php" ?>
            </div>

            <div class="dashboard-content">
                <?php include "../actions/updateChart.php" ?>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

</div>