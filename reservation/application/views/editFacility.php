<?php 
    $facilityname = "";
    $description = "";
    $faci_id = "";
    if(!empty($userdata))
    {
        foreach($userdata as $row)
        {
            $facilityname  = $row->facilityname;
            $description = $row->description;
        }
    }
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="col-md-12 row">
                <div class="col-md-6">
                    <h6 class="font-weight-bold text-primary col-md-3"> Edit Facility</h6>
                </div>
            </div>
            <?php echo $this->session->flashdata('message'); ?>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('Welcome/saveChangesFaci'); ?>" method="post">
                    <div class="form-group">
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="facilityname">Facility Name</label>
                                <input type="hidden" value="<?php echo $faci_id; ?>" class="form-control" required name="faci_id">
                                <input type="text" value="<?php echo $facilityname; ?>" class="form-control" required id="facilityname" name="facilityname">
                            </div>
                        </div>
                        <hr>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="description">Description</label>
                                <input type="text" class="form-control"  value="<?php echo $description; ?>" required id="description" name="description">
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary btn-sm pull-right">Save Changes</button>
                    </div>
                </form>
        </div>
    </div>
</div>