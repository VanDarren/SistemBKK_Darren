<div class="container-fluid" style="background-color: #15283c; min-height: 100vh;"> <!-- Set background color and full height -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Tambah Data Perusahaan</h4>
                </div>
                <div class="card-body">
                    <!-- Show success or error messages -->
                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php endif; ?>

                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <!-- Form to add company data -->
                    <form action="<?= base_url('home/savePerusahaan') ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <!-- User ID hidden field (auto-populated) -->
                        <input type="hidden" name="id_user" value="<?= session()->get('id') ?>">

                        <div class="form-group">
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="kontak">Kontak</label>
                            <input type="text" name="kontak" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto Logo Perusahaan (JPG, JPEG, PNG)</label>
                            <input type="file" name="foto" class="form-control" accept=".jpg, .jpeg, .png" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('home/login') ?>" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
