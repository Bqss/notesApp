<?php  $this-> extend("pageLayout") ?>
<?php $this-> section("content")?>
    <div class="mt-6 bg-white dark:bg-secondary-dark text-text-light dark:text-text-dark   p-6 rounded-lg">
        <h3 class=""><?= $note_title ?></h2>
        <p class="text-sm mt-4"><?= $created_at ?></p>
        <p class="text-sm mt-3"><?= $note_text ?></p>
    </div>
<?php $this-> endSection();?>