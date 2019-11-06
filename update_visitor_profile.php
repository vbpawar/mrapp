<div class="row">
                       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Update Visitor Profile</h5>
                                <div class="card-body">
                                    <form id="updateVisitorProfile" method="POST">
                                        <div class="row">
                                            <input type="hidden" id="profileId" value="<?php echo $_GET['profileId'];?>">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Visitor Name <span style="color:red">*</span></label>
                                                <input type="text" class="form-control form-control-sm" id="visitorName" name="visitorName"  required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Visitor Contact Number<span style="color:red">*</span></label>
                                                <input type="text" class="form-control form-control-sm" id="visitorContact" name="visitorContact"  required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Comapny Name</label>
                                                <div class="form-group">
                                                <select class="form-control form-control-sm" id="companyId" name="companyId">

                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Id Details</label>
                                                <input type="text" class="form-control form-control-sm" id="idNumber" name="idNumber" placeholder="Id number">
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Joining Date</label>
                                                <input type="date" class="form-control form-control-sm" id="joiningDate" name="joiningDate">
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Birth Date</label>
                                                <input type="date" class="form-control form-control-sm" id="birthDate" name="birthDate">
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit">Submit form</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="js/visitor_profile.js">

                    </script>
