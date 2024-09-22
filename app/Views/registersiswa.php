<div class="container mt-5 custom-margin-top">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header text-center">
               <h4>Registrasi Data Siswa</h4>
            </div>
            <div class="card-body">
               <?php if (session()->getFlashdata('error')): ?>
                  <div class="alert alert-danger">
                     <?= session()->getFlashdata('error'); ?>
                  </div>
               <?php endif; ?>

               <form method="POST" action="<?= base_url('home/simpanSiswa') ?>">
                  <div class="form-group">
                     <label for="nama_siswa">Nama Lengkap</label>
                     <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" required>
                  </div>

                  <div class="form-group">
                     <label for="tanggal_lahir">Tanggal Lahir</label>
                     <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                  </div>

                  <div class="form-group">
                     <label for="jurusan">Jurusan</label>
                     <select class="form-control" name="jurusan" id="jurusan" required>
                        <option value="" disabled selected>Pilih Jurusan</option>
                        <option value="AKL">AKL</option>
                        <option value="BDP">BDP</option>
                        <option value="RPL">RPL</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label for="keterampilan">Keterampilan</label>
                     <textarea class="form-control" name="keterampilan" id="keterampilan" rows="4" required></textarea>
                  </div>

                  <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                  <a href="<?= base_url('home/dashboard') ?>" class="btn btn-secondary btn-block mt-3">Kembali ke Dashboard</a>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>


<style>
   body {
       background-color: #15283c;
       color: white;
   }

   .card {
       background-color: white; /* Card content stays white */
       border-radius: 10px; /* Rounded corners for the card */
       box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Soft shadow */
   }
   .form-control {
       font-size: 1.1rem; /* Larger font size for inputs */
   }
   .btn {
       font-size: 1.1rem; /* Larger font size for buttons */
       padding: 10px; /* More padding for buttons */
   }
   .custom-margin-top {
       margin-top: 50px; /* Adjust this value as needed */
   }
   .card-header, label {
       color: #15283c; /* Color for header and labels */
   }
</style>
