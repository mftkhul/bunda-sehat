<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                    <p class="card-text"><?= $user['email'] ?></p>
                    <p class="card-text"><?= $user['password'] ?></p>
                    <p class="card-text"><?= $user['alamat'] ?></p>
                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']) ?></small></p>
                </div>
            </div>
        </div>
    </div> -->

    <div class="card" style="width: 15rem;">
        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <form>
        <div class="form-group row">
            <label for="name" class="col-sm-1 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": <?= $user['name'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-1 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": <?= $user['email'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-1 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": <?= $user['alamat'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-1 col-form-label">No Hp</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": <?= $user['phone'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="usia" class="col-sm-1 col-form-label">Usia</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": <?= $user['usia'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="usia_hamil" class="col-sm-1 col-form-label">Usia Hamil</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": <?= $user['usia_hamil'] ?>">
            </div>
        </div>
    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->