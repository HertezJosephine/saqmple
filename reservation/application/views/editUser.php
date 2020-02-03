<?php 
    $username = "";
    $fullname = "";
    $address  = "";
    $contact  = "";
    $user_type = "";
    $user_id = "";
    if(!empty($userdata))
    {
        foreach($userdata as $row)
        {
            $contact  = $row->contact_number;
            $username = $row->username;
            $fullname = $row->fullname;
            $address  = $row->address;
            $user_type= $row->user_type;
            $user_id  = $row->user_id;
        }
    }
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="col-md-12 row">
                <div class="col-md-6">
                    <h6 class="font-weight-bold text-primary col-md-3"> Edit User</h6>
                </div>
            </div>
            <?php echo $this->session->flashdata('message'); ?>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('Welcome/saveChangesUser'); ?>" method="post">
                    <div class="form-group">
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="username">Username</label>
                                <input type="hidden" value="<?php echo $user_id; ?>" class="form-control" required name="user_id">
                                <input type="text" value="<?php echo $username; ?>" class="form-control" required id="username" name="user_name">
                            </div>
                        </div>
                        <hr>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="fullname">Fullname</label>
                                <input type="text" class="form-control"  value="<?php echo $fullname; ?>" required id="fullname" name="fullname">
                            </div>
                            <div class="col-md-6">
                                <label for="contact">Contact #</label>
                                <input type="text" class="form-control pull-right" required id="contact"  value="<?php echo $contact; ?>" name="contact">
                            </div>
                        </div>
                        <hr>
                         <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control"  value="<?php echo $address; ?>" required id="address" name="address">
                            </div>
                            <div class="col-md-6">
                                <label for="user-type">User Type</label>
                                <select class="form-control" id="user-type" required name="user_type">
                                    <option value="">-- Select user type -- </option>
                                    <option value="student" <?php echo (($user_type == 'student') ? "selected" : ""); ?>>Student</option>
                                    <option value="faculty" <?php echo (($user_type == 'faculty') ? "selected" : ""); ?>>Faculty</option>
                                </select>
                            </div>
                        </div><hr>
                        <button type="submit" class="btn btn-primary btn-sm pull-right">Save Changes</button>
                    </div>
                </form>
        </div>
    </div>
</div>