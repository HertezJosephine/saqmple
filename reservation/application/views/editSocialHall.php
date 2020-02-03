<?php 
    $event_name = "";
    $event_place = "";
    $guest = "";
    $date = "";
    $id = "";
    $reservation_id = "";
    if(!empty($userdata))
    {
        foreach($userdata as $row)
        {
            $event_name  = $row->event_name;
            $event_place = $row->event_place;
            $date = $row->date;
            $guest = $row->guest;
            $id = $row->id;
            $reservation_id = $row->reservation_id;
        }
    }
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="col-md-12 row">
                <div class="col-md-6">
                <h6 class="font-weight-bold text-primary col-md-3">Edit Reservation Event</h6>
                </div>
            </div>
            <?php echo $this->session->flashdata('message'); ?>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('Welcome/saveChangesSocialHall'); ?>" method="post">
                    <div class="modal-body">
                    <div class="form-group">
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="event_name">Event Name</label>
                                <input type="hidden" value="<?php echo $reservation_id; ?>" class="form-control" required name="reservation_id">
                                <input type="text" value="<?php echo $event_name; ?>" class="form-control" required id="event_name" name="event_name">
                            </div>
                        </div>
                        <hr>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="event_place">Event Facility</label>
                                 <input type="text" value="<?php echo $event_place; ?>" class="form-control" required id="event_place" name="event_place">
                            </div>
                            </div><hr>
                        <hr>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="date">Date</label>
                                 <input type="date" value="<?php echo $date; ?>" class="form-control" required id="date" name="date">
                            </div>
                            </div><hr>
                         <hr>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="guest">Guest</label>
                                 <input type="text" value="<?php echo $guest; ?>" class="form-control" required id="guest" name="guest">
                            </div>
                            </div><hr>
                            <hr>
                        <hr>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="id">Equipment</label>
                                 <input type="text" value="<?php echo $id; ?>" class="form-control" required id="id" name="id">
                            </div>
                            </div><hr>
                         <hr>
                <button type="submit" class="btn btn-primary btn-sm pull-right">Save Changes</button>
                    </div>
                </form>
        </div>
    </div>
</div>