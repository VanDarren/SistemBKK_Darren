<!-- Ambil id_user dari session -->
<?php $loggedInUserId = session()->get('id'); ?>
<?php $loggedInUserLevel = session()->get('id_level'); ?>

<div class="row column1">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Student Profile</h2>
                </div>
            </div>
            <div class="full price_table padding_infor_info">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="full dis_flex center_text">
                            <div class="profile_img">
                                <img width="180" class="rounded-circle" src="<?= base_url('images/user/' . $user['foto']); ?>" alt="#" />
                                <?php if ($loggedInUserId == $user['id_user'] || $loggedInUserLevel == 1 || $loggedInUserLevel == 3): ?>
                                    <!-- Edit Photo Button -->
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editPhotoModal">Edit Photo</button>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="profile_contant">
                                <div class="contact_inner">
                                    <h3><?= $siswa['nama_siswa']; ?></h3>
                                    <p><strong>Major: </strong><?= $siswa['jurusan']; ?></p>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-envelope-o"></i> : <?= $user['email']; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Editable profile details -->
                        <div class="full inner_elements margin_top_30">
                        <form action="<?= base_url('home/updatesiswa/' . $user['id_user']) ?>" method="post">

                                <div class="row">
                                    <!-- Personal Information -->
                                    <div class="col-md-6">
                                        <label for="nama_siswa">Name:</label>
                                        <input type="text" name="nama_siswa" value="<?= $siswa['nama_siswa']; ?>" class="form-control" readonly />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tanggal_lahir">Date of Birth:</label>
                                        <input type="date" name="tanggal_lahir" value="<?= $siswa['tanggal_lahir']; ?>" class="form-control" readonly />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="jurusan">Major:</label>
                                        <input type="text" name="jurusan" value="<?= $siswa['jurusan']; ?>" class="form-control" readonly />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="keterampilan">Skills:</label>
                                        <textarea name="keterampilan" class="form-control" readonly><?= $siswa['keterampilan']; ?></textarea>
                                    </div>
                                </div>

                                <?php if ($loggedInUserId == $user['id_user'] || $loggedInUserLevel == 1 || $loggedInUserLevel == 3): ?>
                                    <br>
                                    <!-- Account Information -->
                                    <h3>Account Information</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="username">Username:</label>
                                            <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control" />
                                        </div>
                                    </div>

                                    <!-- Save Profile Changes -->
                                    <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
                                <?php endif; ?>
                            </form>

                            <!-- Reset Password Button -->
                            <form action="<?= base_url('home/resetPassword') ?>" method="post" class="mt-3">
                                <button type="submit" class="btn btn-warning" onclick="return confirm('Reset password to username?')">Reset Password</button>
                            </form>

                            <!-- Button to Open Change Password Modal -->
                            <div class="mt-3">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change Password</button>
                            </div>
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
            <!-- Make sure to pass the correct profile id (e.g., $user['id_user']) -->
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
            <form action="<?=("home/updatepassword")?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Alert for errors -->
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <!-- Alert for success -->
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
