<div class="row">
                       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Update Advertisement Details</h5>
                                <div class="card-body">
                                    <form id="updateAdvertisementPage" method="POST">
                                        <div class="row">
                                        <input type="hidden" id="adId" value="<?php echo $_GET['adId'];?>">
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
                                                <label for="validationCustom03">Company Name</label>
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
                                                <input type="text" class="form-control form-control-sm" id="Atype" name="Atype">
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Duration</label>
                                                <input type="text" class="form-control form-control-sm" id="duration" name="duration">
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
                                            <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                              <div class="col-sm-12">
                                              <div class="form-group">
                                                <label class="control-label">Select  Photo </label>
                                                <!-- <form id='custstyleform' method='post' enctype='multipart/form-data'> -->
                                                <input type="file" id="animalimgname" alt="no Image" accept="image/*" onchange="loadFile(event)"/>
                                                <!-- <button type="button" class="btn btn-primary" onclick="imgup();" >Save</button> -->
                                                <!-- </form> -->

                                              </div>
                                              </div>
                                              <div class="col-sm-12">
                                                <div class="form-group">

                                                    <!-- <input type='file' id='customerstylepic' accept='image/*'/> -->
                                                   <img class='img-thumbnail'  src='adsimg/<?php echo $_GET['adId'];?>.jpg'  style='cursor: pointer;'  id="setimage" alt ='No Image' title='Upload Image' width='200px' height='400px'></img>

                                                    <!-- <img src="images/1.jpg" alt="No Image Uploaded"/> -->
                                                </div>
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
