<body>
    <div class="container">
        <div class="col-md-12"> <!-- Changed to col-md-12 for a wider layout -->
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>Daftar User</h2>
                    </div>
                </div>

                <!-- Filter and Buttons in one row -->
                <div class="d-flex justify-content-between align-items-center mb-3 px-3">
                    <!-- Filter for user levels -->
                    <div>
                        <label for="filter" class="form-label">Filter berdasarkan Level:</label>
                        <select class="form-select" id="filter" onchange="filterUsers()">
                            <option value="all">Semua</option>
                            <option value="admin">Admin</option>
                            <option value="perusahaan">Perusahaan</option>
                            <option value="siswa">Siswa</option>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div>
                        <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addUserModal">Tambah User</button>
                        <a href="<?=base_url("home/vrestoreuser")?>">
                        <button class="btn btn-warning me-2">Restore User yang Diedit</button>
                        </a>
                        <a href="<?=base_url("home/restoredUserList")?>">
                        <button class="btn btn-danger">Restore User yang Dihapus</button>
                        </a>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="table_section padding_infor_info">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="userTable">
                                <?php if (!empty($users)): ?>
                                    <?php foreach ($users as $user): ?>
                                        <tr class="user-row" data-level="<?= strtolower($user->level) ?>"> <!-- Set level class for filtering -->
                                            <td><?= esc($user->username) ?></td>
                                            <td><?= esc($user->level) ?></td> <!-- Display level name -->
                                            <td>
                                                <!-- Detail Button -->
                                                <a href="<?= base_url('home/profile/' . $user->id_user) ?>" class="btn btn-info">Detail</a>

                                                <!-- Edit Button - Trigger Modal -->
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUserModal<?= $user->id_user ?>">Edit</button>

                                                <!-- Delete Button -->
                                                <a href="<?= base_url('home/deleteUser/' . $user->id_user) ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus pengguna ini?')">Delete</a>
                                            </td>
                                        </tr>

                                        <!-- Edit User Modal -->
                                        <div class="modal fade" id="editUserModal<?= $user->id_user ?>" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editUserModalLabel">Edit Pengguna: <?= esc($user->username) ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('home/updateuser/' . $user->id_user) ?>" method="post">
                                                            <div class="mb-3">
                                                                <label for="username" class="form-label">Username</label>
                                                                <input type="text" class="form-control" name="username" value="<?= esc($user->username) ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="password" class="form-label">Password</label>
                                                                <input type="password" class="form-control" name="password" placeholder="Masukkan password baru (jika ingin mengubah)">
                                                            </div>
                                                            <input type="hidden" name="id" value="<?= $user->id_user ?>">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="text-center">Tidak ada data pengguna.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add User Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Tambah Pengguna Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('home/aksiadduser') ?>" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="level" class="form-label">Level</label>
                                <select class="form-control" name="level" required>
                                    <option value="1">Admin</option>
                                    <option value="2">Perusahaan</option>
                                    <option value="3">Siswa</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-success">Tambah Pengguna</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Ensure Bootstrap 5 or later is loaded for modal functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script for filtering users based on level -->
    <script>
        function filterUsers() {
            var filterValue = document.getElementById('filter').value;
            var rows = document.querySelectorAll('.user-row');
            
            rows.forEach(function(row) {
                var level = row.getAttribute('data-level');
                
                if (filterValue === 'all') {
                    row.style.display = '';
                } else if (filterValue === level) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
</body>
