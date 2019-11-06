<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Add New Advertisement Details</h5>
                                <div class="card-body">
                                    <form id="addAdvertisementPage" method="POST">
                                        <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Add Title <span style="color:red">*</span></label>
                                                <input type="text" class="form-control form-control-sm" id="addTitle" name="addTitle"  required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Add Video url<span style="color:red">*</span></label>
                                                <input type="url" class="form-control form-control-sm" id="videoUrl" name="videoUrl"  required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Html Details<span style="color:red">*</span></label>
                                                <textarea name="htmlDetails" id="htmlDetails" cols="5" rows="5" class="form-control form-control-sm"></textarea>

                                            </div>

                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Comapny Name</label>
                                                <div class="form-group">
                                                <select class="form-control form-control-sm" id="companyId" name="companyId">
                                                    <option>Large select</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Revenue Code</label>
                                                <div class="form-group">
                                                <select class="form-control form-control-sm" id="revenueCode" name="revenueCode">
                                                    <option>Large select</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Type</label>
                                                <!-- <input type="number" class="form-control form-control-sm" id="Atype" name="Atype"> -->
                                                <select class="form-control form-control-sm"  id="Atype" name="Atype">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>

                                                <!-- <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div> -->
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Duration</label>
                                                <input type="number" class="form-control form-control-sm" id="duration" name="duration">
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Start Date</label>
                                                <input type="date" class="form-control form-control-sm" id="startDate" name="startDate">
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">End Date</label>
                                                <input type="date" class="form-control form-control-sm" id="endDate" name="endDate">
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
                    <script src="js/advertisement_master.js">

                    </script>
