
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Style untuk form input */
        .form-control, .form-control-file, .sr-input {
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.3s, box-shadow 0.3s;
            font-size: 1.1rem;
        }

        .form-control:focus, .form-control-file:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /* Style untuk tombol */
        .btn {
            border-radius: 0.25rem;
        }

        /* Transisi untuk perubahan tampilan langkah */
        .step-form {
            transition: opacity 0.5s ease;
            opacity: 0;
            display: none;
        }

        .step-form.show {
            display: block;
            opacity: 1;
        }

    </style>
<body>

<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Buat Lamaran</h2>
            </div>
         </div>
      </div>

      <!-- Langkah 1: Informasi Kontak, Surat Lamaran, dan Resume -->
      <div class="row step-form show" id="main_form">
         <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
               <div class="full inbox_inner_section">
                  <div class="row">
                     <div class="col-md-12">
                        <h3>Informasi Kontak, Surat Lamaran, dan Resume</h3>
                        <form method="POST" action="<?=base_url('home/simpanlamaran')?>" enctype="multipart/form-data">
                        <input type="hidden" name="id_lowongan" value="<?= $id_lowongan ?>">
                           <!-- Kontak HP -->
                           <div class="form-group">
                              <label for="phone">Kontak HP</label>
                              <div class="input-append">
                                 <input type="text" class="sr-input form-control" name="phone" id="phone" placeholder="Masukkan nomor HP">
                              </div>
                           </div>

                           <!-- Email -->
                           <div class="form-group">
                              <label for="email">Email</label>
                              <div class="input-append">
                                 <input type="email" class="sr-input form-control" name="email" id="email" placeholder="Masukkan email">
                              </div>
                           </div>

                           <!-- Surat Lamaran -->
                           <div class="form-group">
                              <label>Surat Lamaran</label>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" name="cover_letter_option" id="cover_letter_manual" value="manual" checked>
                                 <label class="form-check-label" for="cover_letter_manual">Ketik Surat Lamaran</label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" name="cover_letter_option" id="cover_letter_upload" value="upload">
                                 <label class="form-check-label" for="cover_letter_upload">Upload File Surat Lamaran</label>
                              </div>

                              <!-- Input surat lamaran -->
                              <div class="input-append form-group" id="cover_letter_manual_input">
                                 <textarea class="sr-input form-control" name="cover_letter" id="cover_letter" rows="5" placeholder="Tuliskan surat lamaran..."></textarea>
                              </div>
                              
                              <div class="input-append form-group" id="cover_letter_upload_input" style="display: none;">
                                 <input type="file" class="form-control-file sr-input" name="cover_letter_file" id="cover_letter_file">
                              </div>
                           </div>

                           <!-- Resume -->
                           <div class="form-group">
                              <label>Resume / CV</label>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" name="resume_option" id="resume_manual" value="manual" checked>
                                 <label class="form-check-label" for="resume_manual">Ketik Resume / CV</label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" name="resume_option" id="resume_upload" value="upload">
                                 <label class="form-check-label" for="resume_upload">Upload File Resume / CV</label>
                              </div>

                              <!-- Input Resume -->
                              <div class="input-append form-group" id="resume_manual_input">
                                 <textarea class="sr-input form-control" name="resume" id="resume" rows="5" placeholder="Tuliskan resume..."></textarea>
                              </div>

                              <div class="input-append form-group" id="resume_upload_input" style="display: none;">
                                 <input type="file" class="form-control-file sr-input" name="resume_file" id="resume_file">
                              </div>
                           </div>

                           <!-- Pengalaman Kerja -->
<div class="form-group">
    <label for="pengalaman">Berapa lama pengalaman bekerja dalam bidang yang serupa?</label>
    <div class="input-append">
        <input type="number" class="sr-input form-control" name="pengalaman" id="pengalaman" placeholder="Masukkan lama pengalaman dalam tahun">
    </div>
</div>


                           <div class="text-right">
                              <button type="button" class="btn btn-primary" id="to_confirmation">Lanjutkan ke Konfirmasi</button>
                           </div>
                       
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Langkah 2: Konfirmasi -->
      <div class="row step-form" id="step_confirmation">
         <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
               <div class="full inbox_inner_section">
                  <div class="row">
                     <div class="col-md-12">
                        <h3>Konfirmasi Lamaran</h3>
                        <!-- Konfirmasi Data -->
<div class="form-group">
    <label>Konfirmasi Data</label>
    <p>Nomor HP: <span id="confirm_phone"></span></p>
    <p>Email: <span id="confirm_email"></span></p>
    <p>Surat Lamaran: <span id="confirm_cover_letter"></span></p>
    <p>Resume: <span id="confirm_resume"></span></p>
    <p>Pengalaman Kerja: <span id="confirm_pengalaman"></span></p> <!-- Pengalaman Kerja -->
</div>

                        
                        <div class="text-right">
                           <button type="button" class="btn btn-primary" id="back_to_form">Kembali</button>
                           <button type="submit" class="btn btn-success">Kirim Lamaran</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- JavaScript untuk interaksi form -->
<script>
  document.getElementById('to_confirmation').addEventListener('click', function() {
    document.getElementById('step_confirmation').classList.add('show');
    document.getElementById('main_form').classList.remove('show');

    // Menampilkan data konfirmasi
    document.getElementById('confirm_phone').textContent = document.getElementById('phone').value;
    document.getElementById('confirm_email').textContent = document.getElementById('email').value;
    document.getElementById('confirm_cover_letter').textContent = document.getElementById('cover_letter').value || document.getElementById('cover_letter_file').files[0]?.name;
    document.getElementById('confirm_resume').textContent = document.getElementById('resume').value || document.getElementById('resume_file').files[0]?.name;
    
    // Konfirmasi pengalaman kerja
    const pengalaman = document.getElementById('pengalaman').value;
    document.getElementById('confirm_pengalaman').textContent = pengalaman ? pengalaman + ' tahun' : 'Tidak ada pengalaman yang diinput';
});


   document.getElementById('back_to_form').addEventListener('click', function() {
      document.getElementById('main_form').classList.add('show');
      document.getElementById('step_confirmation').classList.remove('show');
   });

   document.querySelectorAll('input[name="cover_letter_option"]').forEach((radio) => {
      radio.addEventListener('change', function() {
         if (this.value === 'manual') {
            document.getElementById('cover_letter_manual_input').style.display = 'block';
            document.getElementById('cover_letter_upload_input').style.display = 'none';
         } else {
            document.getElementById('cover_letter_manual_input').style.display = 'none';
            document.getElementById('cover_letter_upload_input').style.display = 'block';
         }
      });
   });

   document.querySelectorAll('input[name="resume_option"]').forEach((radio) => {
      radio.addEventListener('change', function() {
         if (this.value === 'manual') {
            document.getElementById('resume_manual_input').style.display = 'block';
            document.getElementById('resume_upload_input').style.display = 'none';
         } else {
            document.getElementById('resume_manual_input').style.display = 'none';
            document.getElementById('resume_upload_input').style.display = 'block';
         }
      });
   });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

