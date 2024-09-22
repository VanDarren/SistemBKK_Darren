<div class="container mt-5 mb-5"> <!-- Adjusted top and bottom margins for better spacing -->
    <h2>Tambah Lowongan Baru</h2>
    <form action="<?= base_url('home/saveLowongan') ?>" method="POST" class="mt-4"> <!-- Added margin-top for form -->
        <div class="form-group mb-4"> <!-- Added bottom margin -->
            <label for="pekerjaan">Pekerjaan:</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
        </div>
        <div class="form-group mb-4"> <!-- Added bottom margin -->
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
        </div>
        <div class="form-group mb-4"> <!-- Added bottom margin -->
            <label for="persyaratan">Persyaratan:</label>
            <textarea class="form-control" id="persyaratan" name="persyaratan" rows="4" required></textarea>
        </div>
        <div class="form-group mb-4"> <!-- Added bottom margin -->
            <label for="deadline">Deadline:</label>
            <input type="date" class="form-control" id="deadline" name="deadline" required>
        </div>
        <div class="form-group mb-4"> <!-- Added bottom margin -->
            <label for="kategori">Kategori:</label>
            <select class="form-control" id="kategori" name="kategori" required>
                <option value="" disabled selected>Pilih Kategori</option>
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-time</option>
                <option value="Internship">Internship</option>
            </select>
        </div>
        <input type="hidden" name="id_perusahaan" value="<?= esc($id_perusahaan); ?>">
        <button type="submit" class="btn btn-primary">Simpan Lowongan</button>
    </form>
</div>
