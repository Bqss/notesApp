<?php 
$isLoggedIn = session()->get("isLoggedIn");
$active = session()->get("active_page"); ?>
<header>
    <nav class="transition-colors duration-300">
        <div class=" flex justify-between  mt-10 mx-auto bg-secondary-light dark:bg-secondary-dark px-5 py-4 rounded-lg items-center">
            <a href="/" class="inline-flex items-center gap-4">
                <img src="/images/logo.jfif" alt="logo" class="w-10 h-10 rounded-lg">
                <span class="text-xl text-text-light dark:text-text-dark font-semibold">Note App</span>
            </a>
            <?php if ($isLoggedIn) : ?>
                <div>
                    <a href="/dashboard">
                        <button class=" <?= $active== 'dashboard' ? "bg-[rgb(237,242,255)] dark:bg-navButton-dark" : "" ?> py-2 text-blue-400  dark:text-slate-300   px-4 rounded-sm">Home</button>
                    </a>
                    <a href="/archive">
                        <button class="<?= $active== 'archive' ? "bg-[rgb(237,242,255)] dark:bg-navButton-dark" : "" ?> text-blue-400  dark:text-slate-300  py-2  px-4 rounded-sm">Archive</button>
                    </a>
                </div>
                
            <?php endif ?>
            <div class="flex item-center gap-4">
                <button @click="isDark = !isDark  " class="bg-theme-button-light dark:bg-theme-button-dark p-2 rounded-md" >
                    <template x-if="isDark">
                        <svg class=" w-5 h-5 dark:stroke-white " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                    </template>
                    <template x-if="!isDark">
                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-orange-500 fill-theme-button-light">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                    </template>
                </button>
                <?php if ($isLoggedIn) : ?>
                    <div class="inline-flex items-center gap-3 relative" x-data="{ isExpand :  false }">
                        <button @click="isExpand = !isExpand" aria-haspopup="true" :aria-expanded="isExpand"  class="bg-[rgb(237,242,255)]  dark:bg-navButton-dark p-[0.4rem]  rounded-md ring-2 ring-transparent active:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"  class="w-6 h-6 stroke-primary-dark dark:stroke-primary-light">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                        <p class="text-sm hover:cursor-default"><?= session()->get("username")?></p>
                        <div x-show="isExpand" class="absolute flex flex-col items-center w-max rounded-md right-1/2 top-16 px-2 py-2 bg-blue-500 text-white dark:text-white " @click.outside="isExpand = false" x-transition.origin.top >
                            <ul class="space-y-1 mt-3 w-full">
                                <li><a class=" block py-2 px-4  transition duration-100 rounded-md hover:bg-blue-300  text-sm" href="/profile">View Profile</a></li>
                                <li><a class=" block py-2 px-4  transition duration-100 rounded-md hover:bg-blue-300  text-sm" href="/logout">Logout</a></li>
                            </ul>
                        </div>
                        
                    </div>
                    
                <?php endif ?>
                
            </div>

        </div>
    </nav>
</header>