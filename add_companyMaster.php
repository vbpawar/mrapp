<div class="row">
                       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Add New Company Profile</h5>
                                <div class="card-body">
                                    <form id="addCompanyDetails" method="POST">
                                        <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Company Title <span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="companyTitle" name="companyTitle"  required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Company Name<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="companyName" name="companyName"  required>
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
                                                <textarea name="address" id="address" cols="5" rows="5" class="form-control" required></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                              
                                              <div class="col-lg-2">
                                                <div class="form-group">
                                                  <label for="validationCustom04"></label>
                                                  <button class="btn btn-primary" type="submit" style="width: 100%;">ADD</button>
                                                  </div>
                                              </div>
                                              <div class="col-lg-2">
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="js/companyMaster.js">

                    </script>
