<?php  $this-> extend("pageLayout") ?>
<?php $this-> section("content")?>
    <div class="mt-6 bg-secondary-dark text-text-dark p-6 rounded-lg">
        <h3><?= $title ?></h2>
        <p class="text-sm mt-4"><?= $created_at ?></p>
        <p class="text-sm mt-3"><?= $text ?></p>

    </div>
<?php $this-> endSection();?>