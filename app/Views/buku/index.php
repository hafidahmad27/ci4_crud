<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mb-4">Daftar Buku</h2>
            <a href="/buku/create" class="btn btn-primary mb-2">+ Tambah Buku</a>
            <table class="table table-hover mt-1">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($buku as $b) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><img src="/img/<?= $b['sampul']; ?>" class="sampul" alt=""></td>
                            <td><?= $b['judul']; ?></td>
                            <td>
                                <a href="/buku/<?= $b['slug']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>