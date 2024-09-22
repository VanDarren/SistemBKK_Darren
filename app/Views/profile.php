<!-- Include jQuery (if using Bootstrap 4) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- profile.php for id_level 1&2 -->
<div class="row column1">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>User Profile</h2>
                </div>
            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="full dis_flex center_text">
                            <div class="profile_img">
                                <img width="180" class="rounded-circle" src="<?= base_url('images/user/' . $user['foto']); ?>" alt="#" />
                                <!-- Edit Photo Button -->
                                <div class="mt-2">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editPhotoModal">Edit Photo</button>
                                </div>
                            </div>

                            <div class="profile_contant">
                                <div class="contact_inner">
                                    <h3><?= $user['username']; ?></h3>
                                    <p><strong>Email: </strong><?= $user['email']; ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Editable profile details -->
                        <div class="full inner_elements margin_top_30">
                        <form action="<?= base_url("home/editprofile1/" . $user['id_user']) ?>" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <!-- Account Information -->
                                    <div class="col-md-6">
                                        <label for="username">Username:</label>
                                        <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="level">Level:</label>
                                        <input type="text" name="level" value="<?= $level['level']; ?>" class="form-control" readonly />
                                    </div>
                                </div>
<br>
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </form>

                            <!-- Button to Open Change Password Modal -->
                            <div class="mt-3">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change Password</button>
                            </div>

                            <form action="<?=base_url("home/resetPassword")?>" method="post" class="mt-3">
                                <button type="submit" class="btn btn-warning" onclick="return confirm('Reset password to username?')">Reset Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Edit Photo -->
<div class="modal fade" id="editPhotoModal" tabindex="-1" aria-labelledby="editPhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Action points to the 'updatePhoto' function with the selected user's ID -->
            <form action="<?= base_url("home/updatePhoto/" . $user['id_user']) ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPhotoModalLabel">Change Profile Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="foto">Upload New Photo (PNG, JPG, JPEG):</label>
                    <input type="file" name="foto" accept=".png, .jpg, .jpeg" class="form-control" required />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Photo</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal for Change Password -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Action points to the 'updatepassword' function with the selected user's ID -->
            <form action="<?= base_url("home/updatepassword/" . $user['id_user']) ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Alerts -->
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Form fields -->
                    <div class="form-group">
                        <label for="current_password">Current Password:</label>
                        <input type="password" name="current_password" class="form-control" placeholder="Enter current password" required />
                    </div>
                    <div class="form-group mt-2">
                        <label for="new_password">New Password:</label>
                        <input type="password" name="new_password" class="form-control" placeholder="Enter new password" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
            </form>
        </div>
    </div>
</div>


