<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="col-md-12 row">
                <div class="col-md-6">
                    <h6 class="font-weight-bold text-primary col-md-3"> Facility List</h6>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#addFacility">Add Facility</button>
                </div>
            </div>
            <?php echo $this->session->flashdata('message'); ?>
        </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Facility Name</th>
                      <th>Description</th>
                      <th>Date Created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                        if(!empty($facilist))
                        {
                            foreach($facilist as $row)
                            {
                                $faci_id = $row->faci_id;
                                echo"<tr>
                                        <td>".$row->facilityname."</td>
                                        <td>".$row->description."</td>
                                        <td>".$row->created_by."</td>
                                        <td><a href='".site_url('Welcome/editFacility/'.$faci_id)."' target='_blank' class='btn btn-sm btn-primary'>Edit</a></td>
                                        
                                         <td><a href='".site_url('Welcome/deleteFacility/'.$faci_id)."' target='_blank' class='btn btn-sm btn-danger'>Delete</a></td>
                                    </tr>";
                            }
                        }
                   ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
<div class="modal fade" id="addFacility" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Facility</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('Welcome/addFacility'); ?>" method="post">
                    <div class="form-group">
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="facilityname">Facility Name</label>
                                <input type="text" class="form-control" required id="facilityname" name="facility_name">
                            </div>
                        </div>
                        <hr>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" required id="description" name="faci_description">
                            </div>
                            </div><hr>
                        <button type="submit" class="btn btn-primary btn-sm pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>