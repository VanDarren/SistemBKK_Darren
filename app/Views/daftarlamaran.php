<div class="container mt-5">
    <h3>Daftar Lamaran</h3>

    <?php if (!empty($lamaranList)): ?>
        <div class="row">
            <?php foreach ($lamaranList as $lamaran): ?>
                <div class="col-lg-4 col-md-6 col-sm-12 profile_details margin_bottom_30">
                    <div class="contact_blog">
                        <h4 class="brief"><?= $lamaran->judul_lowongan ?></h4>
                        <div class="contact_inner">
                            <div class="left">
                                <h3><?= $lamaran->nama_siswa ?></h3>
                                <p><strong>Status: </strong><?= $lamaran->status ?></p>
                                <ul class="list-unstyled">
                                    <li>
                                        <button type="button" class="btn btn-info btn-xs" onclick="viewProfile(<?= $lamaran->id_siswa ?>)">Lihat Profile Siswa</button>
                                    </li>
                                    <li class="mt-2">
                                        <?php 
                                        // Determine if the lamaran is a document or text
                                        $lamaranPath = 'images/lamaran/' . $lamaran->lamaran;
                                        $lamaranExtension = pathinfo($lamaranPath, PATHINFO_EXTENSION);
                                        if (in_array($lamaranExtension, ['pdf', 'doc', 'docx'])): ?>
                                            <button type="button" class="btn btn-success btn-xs" onclick="downloadLamaran('<?= base_url($lamaranPath) ?>')">Download Lamaran</button>
                                        <?php else: ?>
                                            <button type="button" class="btn btn-success btn-xs" onclick="viewLamaranText('<?= htmlspecialchars($lamaran->lamaran, ENT_QUOTES) ?>')">Lihat Lamaran</button>
                                        <?php endif; ?>
                                    </li>
                                    <li class="mt-2">
                                        <?php 
                                        // Determine if the CV is a document or text
                                        $cvPath = 'images/cv/' . $lamaran->cv;
                                        $cvExtension = pathinfo($cvPath, PATHINFO_EXTENSION);
                                        if (in_array($cvExtension, ['pdf', 'doc', 'docx'])): ?>
                                            <button type="button" class="btn btn-primary btn-xs" onclick="downloadCV('<?= base_url($cvPath) ?>')">Download CV</button>
                                        <?php else: ?>
                                            <button type="button" class="btn btn-primary btn-xs" onclick="viewCVText('<?= htmlspecialchars($lamaran->cv, ENT_QUOTES) ?>')">Lihat CV</button>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="bottom_list">
                                <div class="right_button mt-3">
                                <form action="<?= base_url('home/updateStatus') ?>" method="post" style="display:inline;">
        <input type="hidden" name="id_lamaran" value="<?= $lamaran->id_lamaran ?>">
        <input type="hidden" name="status" value="Diterima">
        <button type="submit" class="btn btn-success btn-xs">Terima</button>
    </form>

    <form action="<?= base_url('home/updateStatus') ?>" method="post" style="display:inline;">
        <input type="hidden" name="id_lamaran" value="<?= $lamaran->id_lamaran ?>">
        <input type="hidden" name="status" value="Ditolak">
        <button type="submit" class="btn btn-danger btn-xs">Tolak</button>
    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Tidak ada lamaran yang ditemukan.</p>
    <?php endif; ?>
</div>


<script>
function viewProfile(id_siswa) {
    // Redirect to the student's profile page
    window.location.href = "<?= base_url('home/profile') ?>" + "/" + id_siswa;
}

function downloadLamaran(url) {
    // Download lamaran as a document
    window.open(url, '_blank');
}

function downloadCV(url) {
    // Download CV as a document
    window.open(url, '_blank');
}

function viewLamaranText(text) {
    // Show lamaran text in a modal
    showModal('Lamaran', text);
}

function viewCVText(text) {
    // Show CV text in a modal
    showModal('CV', text);
}

function showModal(title, content) {
    // Show the modal with the provided content
    document.getElementById('modalTitle').innerText = title;
    document.getElementById('modalContent').innerText = content;
    var myModal = new bootstrap.Modal(document.getElementById('textModal'), {});
    myModal.show();
}


</script>


<!-- Modal for Viewing Text -->
<div class="modal fade" id="textModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
            </div>
            <div class="modal-body" id="modalContent"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<style>
    .margin_bottom_30 {
        margin-bottom: 30px;
    }
    .mt-2 {
        margin-top: 10px;
    }
    .mt-3 {
        margin-top: 15px;
    }
</style>
