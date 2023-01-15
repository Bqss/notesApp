<?php $this->extend("layout/pageLayout") ?>
<?php $this->section("content"); ?>
  <div class="mt-6  bg-white dark:bg-secondary-dark text-text-light dark:text-text-dark p-6 rounded-lg">
    <h2 class="mb-5">Edit Note</h2>
    <form action="" method="post">
      <div class="flex flex-col">
        <label for="title" class="text-sm mb-2  text-gray-600 dark:text-gray-300">Title*</label>
        <input type="text" name="title" value="<?= $note_title ?>" id="title" class="rounded-md  bg-transparent px-4 py-2  text-text-light text-sm dark:text-gray-300 border border=transparent transition ring-2 ring-transparent duration-300 outline-none focus:border-blue-400 focus:ring-blue-300/50   invalid:border-red-500 border-gray-400 focus:invalid:border-red-500 focus:invalid:ring-red-300/40  peer" required>
      </div>
      <div class="flex flex-col mt-6">
        <label for="body" class="text-sm mb-2">Body*</label>
        <textarea name="body" id="body"  class="rounded-md  bg-transparent px-4 py-2  text-text-light text-sm dark:text-gray-300 border border=transparent transition ring-2 ring-transparent duration-300 outline-none focus:border-blue-400 focus:ring-blue-300/50   invalid:border-red-500 border-gray-400 focus:invalid:border-red-500 focus:invalid:ring-red-300/40  pee " rows="10" required> <?= $note_text ?></textarea>
      </div>
      <input role="button" type="submit" class=" bg-blue-600 py-3 px-6 block mt-6 font-medium text-text-dark  rounded-md hover:bg-blue-700 " value="Save Change">

    </form>
  </div>

<?php $this->endSection(); ?>