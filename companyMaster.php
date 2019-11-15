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
      <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
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
             <!-- <div class="row" id="loadPage"></div> -->
              <div class="row" id="companyTable">
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="card">
                              <div class="card-header d-flex">
                              <h5 class="card-header">Company Data</h5>
                              <div class="toolbar ml-auto">
                              <button class="btn btn-primary btn-sm" id="addcompanyPage" style="float:right">Add New Company</button>
                              </div>
                              </div>
                              <div class="card-body">
                                  <div class="table-responsive">
                                      <table class="table table-striped table-bordered first" id="mainTable">
                                          <thead>
                                              <tr>
                                                  <th>Sr.no</th>
                                                  <th>Company Title</th>
                                                  <th>Company Name</th>
                                                  <th>Address</th>
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
                                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                          <div class="card">
                                              <input type="hidden" id="companyId" />
                                              <h5 class="card-header">Company Profile</h5>
                                              <div class="card-body">
                                                  <!-- <form id="addCompanyDetails" method="POST"> -->
                                                      <div class="row">
                                                      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                              <label for="validationCustom03">Company Title <span style="color:red">*</span></label>
                                                              <input type="text" class="form-control" id="companyTitle" name="companyTitle"  >
                                                              <div class="invalid-feedback">
                                                                  Please provide a valid city.
                                                              </div>
                                                          </div>
                                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                              <label for="validationCustom04">Company Name<span style="color:red">*</span></label>
                                                              <input type="text" class="form-control" id="companyName" name="companyName"  >
                                                              <div class="invalid-feedback">
                                                                  Please provide a valid state.
                                                              </div>
                                                          </div>

                                                          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                              <label for="validationCustom03">Manager Name</label>
                                                              <input type="text" class="form-control" id="managerName" name="managerName">
                                                              <div class="invalid-feedback">
                                                                  Please provide a valid city.
                                                              </div>
                                                          </div>
                                                          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                              <label for="validationCustom04">Manager Email</label>
                                                              <input type="email" class="form-control" id="managerEmail" name="managerEmail">
                                                              <div class="invalid-feedback">
                                                                  Please provide a valid state.
                                                              </div>
                                                          </div>
                                                          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                              <label for="validationCustom05">Manager Contact</label>
                                                              <input type="text" class="form-control" id="managerContact" name="managerContact">
                                                              <div class="invalid-feedback">
                                                                  Please provide a valid zip.
                                                              </div>
                                                          </div>
                                                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                              <label for="validationCustom02">Address Details<span style="color:red">*</span></label>
                                                              <textarea name="address" id="address" cols="5" rows="5" class="form-control" ></textarea>
                                                              <div class="valid-feedback">
                                                                  Looks good!
                                                              </div>
                                                          </div>



                                                            <div class="col-lg-2" id="addbtnshow">
                                                              <div class="form-group">
                                                                <label for="validationCustom04"></label>
                                                                <button class="btn btn-primary" type="submit" id="addCompanyDetails" style="width: 100%;">ADD</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2" id="updatebtnshow" style="display:none;">
                                                              <div class="form-group">
                                                                <label for="validationCustom04"></label>
                                                                <button class="btn btn-primary" type="submit" id="detailsUpdate" style="width: 100%;">UPDATE</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2" >
                                                                <div class="form-group">
                                                                <label for="validationCustom04"></label>
                                                                <button class="btn btn-secondary" type="button" id="reload" style="width: 100%;">BACK</button>
                                                            </div>
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
          <!-- ============================================================== -->
          <!-- end main wrapper -->
          <!-- ============================================================== -->
      <?php include "footer.php"; ?>
      </div>
      </div>
      <!-- ============================================================== -->
      <!-- end main wrapper -->
      <!-- ============================================================== -->
      <!-- Optional JavaScript -->

      <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
      <script src="js/apifile.js"></script>
      <script src="js/jquery.dataTables.min.js"></script>
      <script src="js/dataTables.bootstrap4.min.js"></script>
      <script src="js/companyMaster.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
      <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
      <script src="assets/libs/js/main-js.js"></script>
      <script src="select2/select4.js"></script>
  </body>

  </html>
  <?php }else{
  header('Location:index.php');
  }?>
