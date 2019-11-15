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
    <link href="select2/select4.css" rel="stylesheet">
    <link href="select2/select2-bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">


    <link type="text/css" rel="stylesheet" href="editor/jquery-te-1.4.0.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
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
           <!-- <div  id="loadPage"></div> -->
            <div class="row" id="companyTable">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                            <h5 class="card-header">Advertisement Data</h5>
                            <div class="toolbar ml-auto">
                            <button class="btn btn-primary btn-sm" id="addAdvertisement" style="float:right">Add Advertisement</button>
                            </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first" id="mainTable">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Title</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Company Name</th>
                                                <!-- <th>Revenue Title</th> -->
                                                <th>Status</th>
                                                <th>Action</th>
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
            <div class="row" id="addnewads" style="display:none;">
            <div class="col-lg-12">
                                        <div class="card">
                                            <h5 class="card-header">Add New Advertisement Details</h5>
                                            <div class="card-body">
                                                <!-- <form id="addAdvertisementPage" method="POST"> -->
                                                <input type="hidden" id="adId" value="">
                                                    <div class="row">
                                                         <div class="col-lg-4">
                                                            <label for="validationCustom03">Add Title <span style="color:red">*</span></label>
                                                            <input type="text" class="form-control form-control-sm" id="addTitle" name="addTitle" >

                                                        </div>
                                                        <div class="col-lg-4">
                                                          <label for="validationCustom03">Type</label>
                                                          <select class="form-control"  id="Atype" name="Atype" style="width:100%;" onchange="changetype();">
                                                              <option value="">Select Type</option>
                                                              <option value="1">Banner Image</option>
                                                              <option value="3">Horizontal Slow Scrolling</option>
                                                              <option value="4">Horizontal Fast Scrolling</option>
                                                          </select>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label for="validationCustom03">Company Name</label>
                                                            <div class="form-group">
                                                            <select  class="form-control" id="companyId" name="companyId" style="width:100%;" >

                                                            </select>
                                                        </div>
                                                        </div>
                                                        <!-- <div class="col-lg-6">
                                                            <label for="validationCustom04">Add Media Url<span style="color:red">*</span></label>
                                                            <input type="url" class="form-control form-control-sm" id="videoUrl" name="videoUrl"  >

                                                        </div> -->
                                                        <div class="col-md-12" id="disphtml" style="display:none;">
                                                            <label for="validationCustom03">Html Details<span style="color:red">*</span></label>
                                                            <div class="form-group">
                                                              <span id="texthtml"></span>
                                                              <textarea id="htmlDetails" class="jqte-test"></textarea>
                                                            </div>

                                                        </div>


                                                        <!-- <div class="col-lg-6"> -->
                                                            <!-- <label for="validationCustom03">Type</label>
                                                            <select class="form-control"  id="Atype" name="Atype" style="width:100%;">
                                                                <option value="">Select Type</option>
                                                                <option value="1">Banner Image</option>
                                                                <option value="3">Horizontal Slow Scrolling</option>
                                                                <option value="4">Horizontal Fast Scrolling</option>

                                                            </select> -->
                                                        <!-- </div> -->
                                                        <div class="col-lg-4">
                                                            <label for="validationCustom04">Duration (In Sec)</label>
                                                            <input type="number" class="form-control form-control-sm" id="duration" name="duration">

                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label for="validationCustom03">Start Date</label>
                                                            <input type="date" class="form-control form-control-sm" id="startDate" name="startDate">

                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label for="validationCustom04">End Date</label>
                                                            <input type="date" class="form-control form-control-sm" id="endDate" name="endDate">

                                                        </div>

                                                          <div class="col-lg-6" id="upimgshow" style="padding-top: 30px;">
                                                          <div class="form-group">
                                                            <label class="control-label">Select  Photo </label>
                                                            <input type="file" id="animalimgname" alt="no Image" accept="image/*" onchange="loadFile(event)"/>
                                                          </div>
                                                          </div>
                                                          <div class="col-lg-6" id="upimgshow1" style="padding-top: 30px;">
                                                            <div class="form-group">
                                                             <img class='img-thumbnail'  src='http://esmartsolution.in/mrapp/adimages/'  style='cursor: pointer;'  id="setimage" alt ='No Image' title='Upload Image' width='200px' height='400px'></img>
                                                            </div>
                                                          </div>


                                                          <div class="col-lg-2" id="addbtnshow" >
                                                              <label for="validationCustom04"></label>
                                                              <button class="btn btn-primary" type="submit" id="addAdvertisementPage" style="width: 100%;">ADD</button>
                                                          </div>
                                                          <div class="col-lg-2" id="updatebtnshow" style="display:none;">
                                                            <div class="form-group">
                                                              <label for="validationCustom04"></label>
                                                              <button class="btn btn-primary" type="submit" id="updateAdvertisementPage" style="width: 100%;">UPDATE</button>
                                                              </div>
                                                          </div>
                                                          <div class="col-lg-2">
                                                              <label for="validationCustom04"></label>
                                                              <button class="btn btn-secondary" type="button" id="reload" style="width: 100%;">BACK</button>
                                                          </div>
                                                          <div class="col-lg-8">
                                                              <div class="form-group">
                                                              </div>
                                                          </div>

                                                    </div>
                                                <!-- </form> -->
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

    <script type="text/javascript" src="editor/jquery-te-1.4.0.min.js" charset="utf-8"></script>
    <script src="js/advertisement_master.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>

</body>

</html>
<?php }else{
header('Location:index.php');
}?>
