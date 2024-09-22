<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="text-center">Setting Website</h2>
            <hr>
        </div>
    </div>

    <form action="<?= base_url('home/editsetting'); ?>" method="post" enctype="multipart/form-data" class="border p-4 rounded">
        <div class="mb-3">
            <label for="websiteName" class="form-label">Nama Website</label>
            <input type="text" id="websiteName" name="namaweb" class="form-control" value="<?= $darren2->namawebsite ?>">
        </div>

        <div class="mb-3">
            <label for="tabIcon" class="form-label">Icon Tab (jpg, jpeg, png)</label>
            <input type="file" id="tabIcon" name="tab" class="form-control" accept=".jpg, .jpeg, .png">
        </div>

        <div class="mb-3">
            <label for="loginIcon" class="form-label">Icon Login (jpg, jpeg, png)</label>
            <input type="file" id="loginIcon" name="login" class="form-control" accept=".jpg, .jpeg, .png" >
        </div>

        <div class="mb-3">
            <label for="menuIcon" class="form-label">Icon Menu (jpg, jpeg, png)</label>
            <input type="file" id="menuIcon" name="menu" class="form-control" accept=".jpg, .jpeg, .png" >
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
