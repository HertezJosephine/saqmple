 <div class="container-fluid" id="home">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Home</h1>
          </div>
            <div class="col-md-6">
                    <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#NewFacility">New Facility</button>
                </div>
              </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="socialhall">Social Hall</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="avr">AVR</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="multipurpose">Multi Purpose</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
    



<div class="modal fade" id="NewFacility" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Facility</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('Welcome/newFacility'); ?>" method="post">
                    <div class="form-group">
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="faciname">Facility Name</label>
                                <input type="text" class="form-control" required id="faciname" name="faciname">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>