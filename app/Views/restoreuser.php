<body>
    <div class="container">
        <div class="col-md-12"> 
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>Restore User yang Diedit</h2>
                    </div>
                </div>
                
                <div class="table_section padding_infor_info">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php if (!empty($editedUsers)): ?>
        <?php foreach ($editedUsers as $user): ?>
            <tr>
            <td><?= $user->username ?></td>
                <td>
                    <!-- Restore Button -->
                    <a href="<?= base_url('home/restoreu/' . $user->id_user) ?>" class="btn btn-success" onclick="return confirm('Anda yakin ingin merestore pengguna ini?')">Restore</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="2" class="text-center">Tidak ada data pengguna yang diedit.</td>
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
