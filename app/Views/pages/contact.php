<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contact Saya</h2>
            <?php foreach ($alamat as $al) : ?>
                <ul>
                    <li><?= $al['tipe'] ?></li>
                    <li><?= $al['alamat'] ?></li>
                    <li><?= $al['kota'] ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>