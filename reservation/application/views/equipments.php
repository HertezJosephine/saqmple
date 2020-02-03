<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="col-md-12 row">
                <div class="col-md-6">
                    <h6 class="font-weight-bold text-primary col-md-3"> Equipment List</h6>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#addEquipment">Add Equipment</button>
                </div>
            </div>
            <?php echo $this->session->flashdata('message'); ?>
        </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Equipment Name</th>
                      <th>Description</th>
                      <th>Date Created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                        if(!empty($equipmentlist))
                        {
                            foreach($equipmentlist as $row)
                            {
                                $id = $row->id;
                                echo"<tr>
                                        <td>".$row->equipmentname."</td>
                                        <td>".$row->description."</td>
                                        <td>".$row->created_by."</td>
                                         <td><a href='".site_url('Welcome/editEquipment/'.$id)."' target='_blank' class='btn btn-sm btn-primary'>Edit</a></td>
                                         <td><a href='".site_url('Welcome/deleteEquipment/'.$id)."' target='_blank' class='btn btn-sm btn-danger'>Delete</a></td>
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
<div class="modal fade" id="addEquipment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Equipment</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('Welcome/addEquipment'); ?>" method="post">
                    <div class="form-group">
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="equipmentname">Equipment Name</label>
                                <input type="text" class="form-control" required id="equipmentname" name="equipment_name">
                            </div>
                        </div>
                        <hr>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="description">Description </label>
                                <input type="text" class="form-control" required id="description" name="equip_description">
                            </div>
                            </div><hr>
                        <button type="submit" class="btn btn-primary btn-sm pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>