<?php
session_start();
if(isset($_SESSION['accountId'])){
$accountId = $_SESSION['accountId'];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SMART-MR</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
    <link href="select2/select4.css" rel="stylesheet">
    <link href="select2/select2-bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
       <?php include 'header.php';?>
       <?php include 'sidebar.php';?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
            <div class="row">
            <div class="col-xl-12">
            <div class="card-deck">
            <div class="col-xl-4">
    <div class="card bg-primary">
      <div class="card-body text-center">
        <p class="card-text">Total Advertisement</p>
        <strong id="advCount"></strong>
</div>
</div>
</div>
<div class="col-xl-4">
    <div class="card bg-warning">
      <div class="card-body text-center">
        <p class="card-text">Total company's</p>
        <strong id="compCount"></strong>
</div>
</div>
</div>
<div class="col-xl-4">
    <div class="card bg-success">
      <div class="card-body text-center">
        <p class="card-text">Total Visitors</p>
        <strong id="visitCount"></strong>
</div>
</div>
</div>
</div>

            </div>
            </div><p></p>
            <div class="row">
            <div class="col-xl-9">
              <div class="form-group">
                <select class="form-control form-control-sm" id="companyId" name="companyId"> </select>
              </div>

            <div id="container" style="height: 400px"></div>
            </div>
            <div class="col-xl-3">
            <div class="card">
                            <!-- <div class="card-header"> -->
                            <h5 class="card-header">Visit Max limit</h5>
                            <!-- <h6 class="card-header">Monthly Limit</h6>
                            <h6 class="card-header">Weekely Limit</h6> -->
                            <!-- </div> -->
                            <div class="card-body">
                            <form id="limitDetails" method="POST">
                                    <div class="row">
                                        <!-- <div class="col-xl-12">
                                        <div class="form-group">
                                                <label for="validationCustom03">Weekely Limit</label>
                                                <input type="text" class="form-control" id="weekLimit" name="weekLimit"  required>
                                        </div>
                                        </div> -->
                                        <div class="col-xl-12">
                                        <div class="form-group">
                                                <label for="validationCustom03">Monthly Limit</label>
                                                <input type="text" class="form-control" id="monthLimit" name="monthLimit"  required>
                                        </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit">Set Monthly Visit Limit</button>
                                        </div>
                                        </div>
                            </form>
                            </div>
                            </div>
            </div>



            </div>


        </div>
        <?php include "footer.php"; ?>
    </div>

    </div>
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="js/apifile.js"></script>
    <script src="js/highcharts.js"></script>
    <script src="js/highcharts-3d.js"></script>
    <script src="js/exporting.js"></script>
    <script src="js/export-data.js"></script>

    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/revenueMaster.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
  <script src="select2/select4.js"></script>
    <script src="js/dashboard.js"></script>
    <script>
$(function () {
        var options;
        fetch_companies();
        function fetch_companies(){
        $.ajax({
        type:'GET',
        url:api_url+'fetch_companyId.php',
        dataType:'json',
        success:function(response){
          // console.log(response);
         var count = response.Data.length;
         var opt ='<option value="">Select Company Name</option>';
         for(var i=0;i<count;i++){
           opt+="<option value="+response.Data[i].companyId+">"+response.Data[i].companyName+"</option>";
         }
         $('#companyId').html(opt);
       }
    });
    }
		//on page load
		getAjaxData(1,'cipla');

		//on changing select option
		$('#companyId').change(function(){
			var val = $('#companyId').val();
            var name = $("#companyId :selected").text();
			getAjaxData(val,name);
		});

		function getAjaxData(id,name){

		//use getJSON to get the dynamic data via AJAX call
		$.getJSON( api_url+'graph_data.php', {id: id,name:name}, function(chartData) {

			options = {
        chart: {
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 25,
            depth: 70
        }
    },
    title: {
        text: 'Visits chart against company'
    },
    subtitle: {
        text: 'Notice the difference between a 0 value and a null point'
    },
    plotOptions: {
        column: {
            depth: 25
        }
    },
    xAxis: {
        categories: chartData[1].data,
        labels: {
            skew3d: true,
            style: {
                fontSize: '16px'
            }
        }
    },
    yAxis: {
        title: {
            text: null
        }
    },
    series:[chartData[0]]
    };

chart = Highcharts.chart('container', options);
		});
	}
});
</script>

</body>

</html>
<?php }else{
header('Location:index.php');
}?>
