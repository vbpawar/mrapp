<div class="row">
                       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Update Revenue Code</h5>
                                <div class="card-body">
                                    <form id="updateRevenueDetails" method="POST">
                                    <div class="row">
                                        <input type="hidden" id="revenueCode" value="<?php echo $_GET['revenueCode'];?>" />
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">Title <span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="revenueTitle" name="revenueTitle" value="<?php echo $_GET['title'];?>" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Price<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="price" name="price" value="<?php echo $_GET['price'];?>" onkeypress="javascript:return isNumberKey(event)" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                        </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit">UPDATE</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="js/revenueMaster.js"></script>
