<div class="container mt-4"> <!-- Added margin-top for spacing -->
   <div class="row">
      <div class="col-md-12">
         <h2>Detail Perusahaan</h2>
         <hr>
      </div>
   </div>

   <div class="row mb-4"> <!-- Added margin-bottom for spacing -->
      <div class="col-md-4">
         <!-- Gambar Perusahaan -->
         <img src="<?= base_url('images/perusahaan/' . esc($perusahaan->foto)); ?>" alt="<?= esc($perusahaan->nama_perusahaan); ?>" class="img-fluid rounded">
      </div>

      <div class="col-md-8">
         <!-- Detail Perusahaan -->
         <h3><?= esc($perusahaan->nama_perusahaan); ?></h3>
         <p><strong>Alamat:</strong> <?= esc($perusahaan->alamat); ?></p>
         <p><strong>Kontak:</strong> <?= esc($perusahaan->kontak); ?></p>
         <p><strong>Deskripsi:</strong> <?= esc($perusahaan->deskripsi); ?></p>
      </div>
   </div>

   <hr>

   <!-- Daftar Lowongan -->
   <div class="row">
      <div class="col-md-12">
         <div class="d-flex justify-content-between align-items-center"> <!-- Flexbox for heading and button -->
            <h3>Lowongan yang Tersedia</h3>
            <!-- Show Add Job button only if user is level 2 and owns the company -->
            <?php if (session()->get('id_level') == 2 && session()->get('id') == $perusahaan->id_user): ?>
               <a href="<?= base_url('home/addLowongan/' . esc($perusahaan->id_perusahaan)); ?>" class="btn btn-success">Tambah Lowongan</a>
            <?php endif; ?>
         </div>
         <?php if (!empty($lowongan)): ?>
            <ul class="list-group mb-4"> <!-- Added margin-bottom for spacing -->
               <?php foreach ($lowongan as $l): ?>
                  <li class="list-group-item">
                     <h5><?= esc($l->pekerjaan); ?></h5>
                     <p><strong>Deskripsi:</strong> <?= esc($l->deskripsi); ?></p>
                     <p><strong>Persyaratan:</strong> <?= esc($l->persyaratan); ?></p>
                     <p><strong>Deadline:</strong> <?= esc($l->deadline); ?></p>
                     
                     <!-- Only show "Lamar Sekarang" button if user is not level 2 -->
                     <?php if (session()->get('id_level') != 2): ?>
                        <a href="<?= base_url('home/buatlamaran/' . esc($l->id_lowongan)); ?>" class="btn btn-primary">Lamar Sekarang</a>
                     <?php endif; ?>
                  </li>
               <?php endforeach; ?>
            </ul>
         <?php else: ?>
            <p>Tidak ada lowongan yang tersedia saat ini.</p>
         <?php endif; ?>
      </div>
   </div>
</div>
