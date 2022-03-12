                <div class="contents">
                    <h3 id="feeAmount" class="countUp"><?php totalFeeAmount()?></h3>
                    <p>Fee Amount</p>
                </div>
                <div class="contents">
                    <h3 id="feeCount" class="countUp"><?php feeCount() ?></h3>
                    <p>Fee Count</p>
                </div>
                <div class="contents">
                    <h3 id="admisssionsCount" class="countUp"><?php countAdmissions() ?></h3>
                    <p>New Admissions</p>
                </div>

<?php 

    function countAdmissions()
    {
        include "../connection/connection.php";

        $date = date('Y-m-d');
        $timestamp = strtotime($date);
        $days =  date("d", $timestamp) - 1;
        $date1 = date('Y-m-d', strtotime($date. " - $days days"));
        // $date1 = date('Y-m-d', strtotime($date. " - ('$days'-1) days"));
       $query =  "SELECT COUNT(*) from `members` where CAST(date_created as DATE) BETWEEN '$date1' AND '$date'";
       $result = mysqli_query($link,$query); //running above query

            $row = mysqli_fetch_array($result);

            echo "$row[0]";


    }

    function feeCount(){

        include "../connection/connection.php";

        $date = date('Y-m-d');
        $timestamp = strtotime($date);
        $days =  date("d", $timestamp) - 1;
        $date1 = date('Y-m-d', strtotime($date. " - $days days"));

        $query = "SELECT count(*) from `payments` where CAST(date_created as DATE) BETWEEN '$date1' AND '$date' ";
       $result = mysqli_query($link,$query); //running above query

            $row = mysqli_fetch_array($result);

            echo "$row[0]";

    }

    function totalFeeAmount() {

        include "../connection/connection.php";

        $date = date('Y-m-d');
        $timestamp = strtotime($date);
        $days =  date("d", $timestamp) - 1;
        $date1 = date('Y-m-d', strtotime($date. " - $days days"));

        $query = "SELECT SUM(amount) from `payments` where CAST(date_created as DATE) BETWEEN '$date1' AND '$date' ";
       $result = mysqli_query($link,$query); //running above query

            $row = mysqli_fetch_array($result);

            echo "$row[0]";
    }

?>

<script type="text/javascript">
    $('.countUp').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 1000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});


</script>