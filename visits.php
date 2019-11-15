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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" /> -->
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
           <div  id="loadPage"></div>
            <div class="row" id="companyTable">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                    <div class="col-md-3">
                      <div class="card">
                        <div class="card-body text-center">
                          <!-- <p class="card-text">Date</p> -->
                          <select class="form-control form-control-sm" id="dateid" name="dateId">
                              <!-- <option value="">Select Date</option>
                              <option value="1">1</option> -->
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="card">
                        <div class="card-body text-center">
                          <!-- <p class="card-text">Month</p> -->
                          <select class="form-control form-control-sm" id="monthid" name="monthId">
                              <!-- <option value="">Select Month</option>
                              <option value="1">1</option> -->
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="card">
                        <div class="card-body text-center">
                          <!-- <p class="card-text">Year</p> -->
                          <select class="form-control form-control-sm" id="yearid" name="yearId">
                              <!-- <option value="">Select Year</option>
                              <option value="1">1</option> -->
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="card">
                        <div class="card-body text-center">
                          <!-- <p class="card-text">Company Name</p> -->
                          <select class="form-control form-control-sm" id="companynameid" name="companynameId">
                              <!-- <option value="">Select Year</option>
                              <option value="1">1</option> -->
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                          <div class="card-body text-center" >
                            <!-- <p class="card-text">Search</p> -->
                            <input type="button" name="search" id="search" value="APPLY FILTER" class="btn btn-info" style="padding-top: 4px;padding-bottom: 4px;" onclick="searchbtninfo();"/>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                            <h5 class="card-header">visits Data</h5>
                            <div class="toolbar ml-auto">
                            <!-- <button class="btn btn-primary btn-sm" id="addAdvertisement" style="float:right">Add New Advertisement</button> -->
                            </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first" id="mainTable">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Company Name</th>
                                                <th>Company Subtitle</th>
                                                <th>Manager Name</th>
                                                <th>visit Date</th>
                                                <th>Time</th>

                                            </tr>
                                        </thead>
                                        <tbody id="tblData">

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
          <?php include "footer.php"; ?>
    </div>
    </div>
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="select2/select4.js"></script>
    <script src="js/apifile.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/visits.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
</body>
</html>
<?php }else{
header('Location:index.php');
}?>
