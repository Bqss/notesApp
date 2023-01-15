<?php $this -> extend("layout/pageLayout");  ?>
<?php $this -> section("content");?>
    <div class="mt-6" x-data="{ isAdd :  false }">
        <div class="flex items-end justify-end">
            <!-- <button @click="isAdd = true" class="bg-blue-600 text-base font-medium px-4 py-2 rounded-md text-text-dark">Add Notes</button> -->
            <form action="/archive" method="get">
                <div class="relative">
                    <input type="text" id="search" class=" text-sm text-text-light focus:pl-5 transition-all peer dark:text-text-dark bg-white dark:bg-secondary-dark  px-5 py-2 pl-10  border outline-none rounded-md border-gray-300 dark:border-transparent  focus:border-blue-500  dark:focus:border-blue-500 "  name="search" value="<?=isset($keyword) ? $keyword : ''   ?>" placeholder="Search by title">
                    <label for="search" class="absolute left-2 top-1/2 -translate-y-1/2 cursor-text peer-focus:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-black dark:stroke-white" stroke-width="1.5" width="20" height="20">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </label>
                </div>
            </form>
        </div>
        <?php if(isset($notes) && count($notes) > 0): ?>
            <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-8 rounded-md">
            
                <?php foreach($notes as $d) :?>
                    <div class="bg-white dark:bg-secondary-dark p-6 flex flex-col justify-between rounded-md min-h-[15rem]">
                        <div >
                            <h3 class="text-text-light dark:text-text-dark line-clamp-1 text-ellipsis "><?= $d["note_title"]?></h3>
                            <p class="text-text-light dark:text-text-dark  text-sm mt-2 "><?= $d["created_at"] ?></p>
                            <p class="text-text-light dark:text-text-dark  text-sm mt-3 line-clamp-2 break-words"><?= $d["note_text"] ?></p>
                        </div>

                        <!-- method spoofing -->
                        <div class="mt-6 flex gap-2">
                            <form action="delete/<?=$d["note_id"]?> " method ="POST" class="relative">
                                <button type="submit" class="p-2 rounded-md bg-btn-delete-light dark:bg-btn-delete-dark   peer  ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"  class="w-5 h-5  stroke-red-500 dark:stroke-red-200">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                </button>
                                <span class="bg-black w-max py-1 px-2 rounded-md text-sm text-text-dark invisible transition duration-300 opacity-0 absolute  peer-hover:visible peer-hover:opacity-100 -top-10 left-1/2 -translate-x-1/2 ">Delete</span>
                            </form>
                            <form action="archive/remove/<?=$d["note_id"]?> " method="post" class="relative">
                                <button type="submit" class="p-2 rounded-md bg-btn-archive-light dark:bg-btn-archive-dark  peer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"  class=" stroke-green-500 dark:stroke-green-200 w-5 h-5 rotate-180">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                    </svg>
                                </button>
                                <span class="bg-black w-max py-1 px-2 rounded-md text-sm text-text-dark invisible transition duration-300 opacity-0 absolute  peer-hover:visible peer-hover:opacity-100 -top-10 left-1/2 -translate-x-1/2 ">Unarchive Note</span>
                            </form> 
                            <form action="detail/<?= $d["note_id"] ?> " method="post" class="relative">
                                <button type="submit" class="p-2 rounded-md bg-btn-detail-light dark:bg-btn-detail-dark peer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 2 4" stroke-width="1.5" class="w-6 h-5  stroke-blue-500 dark:stroke-blue-200">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                                <span class="bg-black w-max py-1 px-2 rounded-md text-sm text-text-dark invisible transition duration-300 opacity-0 absolute  peer-hover:visible peer-hover:opacity-100 -top-10 left-1/2 -translate-x-1/2 ">See Detail</span>
                            </form>
                        </div>
                    </div>
                <?php endforeach?>
            
            </div>
        <?php else :?>
            <p class="text-center bg-white dark:bg-secondary-dark mt-8 py-24 rounded-lg ">There's no archived note <?= isset($keyword) ? "with title : $keyword" : '' ?></p>
        <?php endif ?>
    </div>
<?php $this->endSection();?>
