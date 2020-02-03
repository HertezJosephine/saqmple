<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="col-md-12 row">
                <div class="col-md-6">
                    <h6 class="font-weight-bold text-primary col-md-3">Social Hall</h6>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#addSocialhall">New Reservation Event</button>
                </div>
            </div>
            <?php echo $this->session->flashdata('message'); ?>
        </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Event Name</th>
                      <th>Event Facility</th>
                      <th>Guest Speaker</th>
                      <th>Event Date</th>
                      <th>Event Equipment</th>
                      <th>Date Created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                        if(!empty($socialhalllist))
                        {
                            foreach($socialhalllist as $row)
                            {
                                $reservation_id = $row->reservation_id;
                                echo"<tr>
                                        <td>".$row->event_name."</td>
                                        <td>".$row->event_place."</td>
                                        <td>".$row->guest."</td>
                                        <td>".$row->date."</td>
                                        <td>".$row->id."</td>
                                        <td>".$row->created_by."</td>
                                        <td><a href='".site_url('Welcome/editSocialHall/'.$reservation_id)."' target='_blank' class='btn btn-sm btn-primary'>Edit</a></td>
                                        
                                         <td><a href='".site_url('Welcome/deleteReservation/'.$reservation_id)."' target='_blank' class='btn btn-sm btn-danger'>Delete</a></td>
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
<div class="modal fade" id="addSocialhall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Reservation Event</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('Welcome/addSocialhall'); ?>" method="post">
                    <div class="form-group">
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="event_name">Event Name</label>
                                <input type="text" class="form-control" required id="event_name" name="event_name">
                            </div>
                        </div>
                        <hr>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="event_place">Event Description</label>
                                <input type="text" class="form-control pull-right" required id="event_place" name="event_place">
                            </div>
                            </div><hr>
                        <hr>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="guest">Guest</label>
                                <input type="text" class="form-control" required id="guest" name="guest">
                            </div>
                            </div><hr>
                         <hr>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="date">Date</label>
                                <input type="date" class="form-control pull-right" required id="date" name="date">
                            </div>
                            </div><hr>
                            <hr>
                        <hr>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="id">Equipment</label>
                                <input type="text" class="form-control pull-right" required id="id" name="id">
                            </div>
                            </div><hr>
                         <hr>
                        
                       
                        <button type="submit" class="btn btn-primary btn-sm pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>