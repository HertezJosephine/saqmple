<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="col-md-12 row">
                <div class="col-md-6">
                    <h6 class="font-weight-bold text-primary col-md-3"> User List</h6>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#addUser">Add User</button>
                </div>
            </div>
            <?php echo $this->session->flashdata('message'); ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                            <th>User Type</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                            if(!empty($userlist))
                            {
                                foreach($userlist as $row)
                                {
                                    $user_id = $row->user_id;
                                    echo"<tr>
                                            <td>".$row->username."</td>
                                            <td>".$row->fullname."</td>
                                            <td>".$row->contact_number."</td>
                                            <td>".$row->address."</td>
                                            <td>".$row->user_type."</td>
                                            <td>".$row->created_by."</td>
                                            <td><a href='".site_url('Welcome/editUser/'.$user_id)."' target='_blank' class='btn btn-sm btn-primary'>Edit</a></td>

                                            <td><a href='".site_url('Welcome/deleteUsers/'.$user_id)."' target='_blank' class='btn btn-sm btn-danger'>Delete</a></td>
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


  <!-- Add user Modal-->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('Welcome/addUser'); ?>" method="post">
                    <div class="form-group">
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" required id="username" name="user_name">
                            </div>
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control pull-right" required id="password" name="password">
                            </div>
                        </div>
                        <hr>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="fullname">Fullname</label>
                                <input type="text" class="form-control" required id="fullname" name="fullname">
                            </div>
                            <div class="col-md-6">
                                <label for="contact">Contact #</label>
                                <input type="text" class="form-control pull-right" required id="contact" name="contact">
                            </div>
                        </div>
                        <hr>
                         <div class="row col-md-12">
                            <div class="col-md-6">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" required id="address" name="address">
                            </div>
                            <div class="col-md-6">
                                <label for="user-type">User Type</label>
                                <select class="form-control" id="user-type" required name="user_type">
                                    <option value="">-- Select user type -- </option>
                                    <option value="student">Student</option>
                                    <option value="faculty">Faculty</option>
                                </select>
                            </div>
                        </div><hr>
                        <button type="submit" class="btn btn-primary btn-sm pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>