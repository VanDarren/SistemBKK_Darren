<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Daftar Lowongan Kerja</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row column4 graph">
            <!-- Tab Kategori Lowongan Kerja -->
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Kategori Lowongan Kerja</h2>
                        </div>
                    </div>
                    <div class="full inner_elements">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab_style1">
                                    <div class="tabbar padding_infor_info">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-fulltime-tab" data-toggle="tab" href="#nav-fulltime" role="tab" aria-controls="nav-fulltime" aria-selected="true">Full-time</a>
                                                <a class="nav-item nav-link" id="nav-parttime-tab" data-toggle="tab" href="#nav-parttime" role="tab" aria-controls="nav-parttime" aria-selected="false">Part-time</a>
                                                <a class="nav-item nav-link" id="nav-internship-tab" data-toggle="tab" href="#nav-internship" role="tab" aria-controls="nav-internship" aria-selected="false">Internship</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                          <!-- Full-time Tab -->
<div class="tab-pane fade show active" id="nav-fulltime" role="tabpanel" aria-labelledby="nav-fulltime-tab">
    <div class="job_list">
        <?php if (!empty($fulltime)): ?>
            <?php foreach ($fulltime as $job): ?>
                <div class="job_item">
                    <h4><?= esc($job['pekerjaan']) ?> - <?= esc($job['nama_perusahaan']) ?></h4> <!-- Nama perusahaan -->
                    <p>Deadline: <?= esc($job['deadline']) ?></p>
                    <button class="btn btn-info" data-toggle="modal" data-target="#detailLowonganModal" 
    data-pekerjaan="<?= esc($job['pekerjaan']) ?>"
    data-perusahaan="<?= esc($job['nama_perusahaan']) ?>"
    data-deskripsi="<?= esc($job['deskripsi']) ?>"
    data-deadline="<?= esc($job['deadline']) ?>"
    data-kategori="<?= esc($job['kategori']) ?>"
    data-id_lowongan="<?= esc($job['id_lowongan']) ?>"> <!-- Tambahkan ini -->
    Lihat Detail
</button>

                </div>
                <hr />
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada lowongan Full-time saat ini.</p>
        <?php endif; ?>
    </div>
</div>
<!-- Part-time Tab -->
<div class="tab-pane fade" id="nav-parttime" role="tabpanel" aria-labelledby="nav-parttime-tab">
    <div class="job_list">
        <?php if (!empty($parttime)): ?>
            <?php foreach ($parttime as $job): ?>
                <div class="job_item">
                    <h4><?= esc($job['pekerjaan']) ?> - <?= esc($job['nama_perusahaan']) ?></h4> <!-- Nama perusahaan -->
                    <p>Deadline: <?= esc($job['deadline']) ?></p>
                    <button class="btn btn-info" data-toggle="modal" data-target="#detailLowonganModal" 
    data-pekerjaan="<?= esc($job['pekerjaan']) ?>"
    data-perusahaan="<?= esc($job['nama_perusahaan']) ?>"
    data-deskripsi="<?= esc($job['deskripsi']) ?>"
    data-deadline="<?= esc($job['deadline']) ?>"
    data-kategori="<?= esc($job['kategori']) ?>"
    data-id_lowongan="<?= esc($job['id_lowongan']) ?>"> <!-- Tambahkan ini -->
    Lihat Detail
</button>

                </div>
                <hr />
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada lowongan Part-time saat ini.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Internship Tab -->
<div class="tab-pane fade" id="nav-internship" role="tabpanel" aria-labelledby="nav-internship-tab">
    <div class="job_list">
        <?php if (!empty($internship)): ?>
            <?php foreach ($internship as $job): ?>
                <div class="job_item">
                    <h4><?= esc($job['pekerjaan']) ?> - <?= esc($job['nama_perusahaan']) ?></h4> <!-- Nama perusahaan -->
                    <p>Deadline: <?= esc($job['deadline']) ?></p>
                    <button class="btn btn-info" data-toggle="modal" data-target="#detailLowonganModal" 
    data-pekerjaan="<?= esc($job['pekerjaan']) ?>"
    data-perusahaan="<?= esc($job['nama_perusahaan']) ?>"
    data-deskripsi="<?= esc($job['deskripsi']) ?>"
    data-deadline="<?= esc($job['deadline']) ?>"
    data-kategori="<?= esc($job['kategori']) ?>"
    data-id_lowongan="<?= esc($job['id_lowongan']) ?>"> <!-- Tambahkan ini -->
    Lihat Detail
</button>

                </div>
                <hr />
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada lowongan Internship saat ini.</p>
        <?php endif; ?>
    </div>
</div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tab Kategori Lowongan Kerja -->
        </div>
    </div>
</div>

<!-- Modal Detail Lowongan -->
<div class="modal fade" id="detailLowonganModal" tabindex="-1" role="dialog" aria-labelledby="detailLowonganModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 id="modal-pekerjaan" class="font-weight-bold"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modal-perusahaan" class="font-weight-bold"></p>
                <div class="d-flex justify-content-between">
                    <p><strong>Deadline:</strong> <span id="modal-deadline"></span></p>
                    <p><strong>Kategori:</strong> <span id="modal-kategori"></span></p>
                </div>
                <hr>
                <p><strong>Deskripsi:</strong></p>
                <p id="modal-deskripsi"></p>
            </div>
            <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <!-- Kirim ID lowongan ke form lamaran -->
    <a href="#" id="buatLamaranButton">
        <button type="button" class="btn btn-primary">Buat Lamaran</button>
    </a>
</div>

        </div>
    </div>
</div>



    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom Script -->
    <script>
    // Script untuk menangkap ID lowongan dan mengirimkannya ke form lamaran
$('#detailLowonganModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var pekerjaan = button.data('pekerjaan');
    var perusahaan = button.data('perusahaan');
    var deskripsi = button.data('deskripsi');
    var deadline = button.data('deadline');
    var kategori = button.data('kategori');
    var idLowongan = button.data('id_lowongan'); // Tangkap ID lowongan

    // Masukkan data ke dalam modal
    var modal = $(this);
    modal.find('#modal-pekerjaan').text(pekerjaan);
    modal.find('#modal-perusahaan').text(perusahaan);
    modal.find('#modal-deskripsi').text(deskripsi);
    modal.find('#modal-deadline').text(deadline);
    modal.find('#modal-kategori').text(kategori);

$('#buatLamaranButton').attr('href', '<?= base_url('home/buatlamaran') ?>' + '/' + idLowongan);

});

    </script>

<style>
   .modal-body {
    font-size: 1.5rem; /* Increase the font size */
}

.modal-title {
    font-size: 2rem; /* Increase title size */
    font-weight: bold; /* Ensure the title is bold */
}

#modal-pekerjaan {
    font-size: 1.8rem; /* Increase job title size */
    font-weight: bold; /* Make job title bold */
}

#modal-perusahaan {
    font-size: 1.5rem; /* Increase company name size */
    font-weight: bold; /* Make company name bold */
}

#modal-deadline,
#modal-kategori,
#modal-deskripsi {
    font-weight: bold; /* Make these fields bold */
}

.modal-footer {
    display: flex;
    justify-content: space-between;
}

.modal-content {
    border-radius: 10px;
    width: 80%; /* Increase modal width */
    max-width: 900px; /* Set a maximum width */
}

.modal-header, .modal-body {
    padding: 20px; /* Add some padding for a better appearance */
}

    </style>