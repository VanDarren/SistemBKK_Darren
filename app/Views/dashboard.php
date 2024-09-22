<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Dashboard BKK</h2>
            </div>
         </div>
      </div>

      <!-- Alert untuk pendaftaran siswa -->
      <?php if (isset($showRegisterAlert) && $showRegisterAlert): ?>
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Perhatian!</strong> Anda harus mendaftar sebagai siswa untuk dapat melakukan lamaran. 
            <a href="<?= base_url('home/registersiswa') ?>" class="btn btn-link">Daftar Sekarang</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
      <?php endif; ?>

       <!-- Search Section -->
       <div class="row">
         <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <h2>Cari Perusahaan</h2>
                  </div>
               </div>
               <div class="full inbox_inner_section">
                  <div class="row">
                     <div class="col-md-12">
                        <input type="text" id="search" class="form-control" placeholder="Cari perusahaan..." value="<?= isset($_GET['search']) ? esc($_GET['search']) : ''; ?>" autocomplete="off">
                        <div id="suggestions" class="suggestions-box" style="display: none;"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- List Perusahaan -->
      <div class="row">
         <?php if (!empty($perusahaan)) : ?>
            <?php foreach ($perusahaan as $p) : ?>
               <div class="col-md-4">
                  <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                     <!-- Gambar perusahaan -->
                     <img class="card-img-top" src="<?= base_url('images/perusahaan/' . esc($p['foto'])); ?>" alt="<?= esc($p['nama_perusahaan']); ?>" style="height: 150px; width: auto; object-fit: contain;">

                     <div class="card-body">
                        <!-- Nama perusahaan -->
                        <h5 class="card-title"><?= esc($p['nama_perusahaan']); ?></h5>
                        <!-- Deskripsi perusahaan -->
                        <p class="card-text"><?= esc($p['deskripsi']); ?></p>

                        <!-- Jumlah lowongan -->
                        <ul class="list-group list-group-flush">
                           <li class="list-group-item">
                              <i class="fa fa-briefcase"></i> 
                              <?= esc($p['jumlah_lowongan']); ?> Lowongan Tersedia
                           </li>
                        </ul>

                        <!-- Tombol lihat detail -->
                       <a href="<?= base_url('home/detailperusahaan/' . $p['id_perusahaan']); ?>" class="btn btn-primary mt-3">Lihat Detail</a>

                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
         <?php else : ?>
            <p>Tidak ada perusahaan yang membuka lowongan saat ini.</p>
         <?php endif; ?>
      </div>

   </div>
</div>
