<body>
    <div class="container">
        <div class="col-md-12"> 
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>Restored Users</h2>
                    </div>
                </div>
                
                <div class="table_section padding_infor_info">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Username</th>
                                    <th>Tanggal Dihapus</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($deletedUsers)): ?>
                                    <?php foreach ($deletedUsers as $user): ?>
                                        <tr>
                                            <td><?= esc($user->username) ?></td>
                                           
                                            <td><?= esc($user->deleted_at) ?></td>
                                            <td>
                                                <!-- Restore Button -->
                                                <a href="<?= base_url('home/restoreDeletedUser/' . $user->id_user) ?>" class="btn btn-success" onclick="return confirm('Anda yakin ingin merestore pengguna ini?')">Restore</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data pengguna yang dihapus.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
