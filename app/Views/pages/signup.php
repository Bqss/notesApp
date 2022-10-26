<?php $this->extend("pageLayout")?>
<?php $this->section("content") ?>

    <main>
        <?php if(isset($errors)):?>
            <div aria-live="assertive" class="fixed inset-0  flex items-start px-4 py-6 pointer-events-none sm:p-6 sm:items-start" x-data="{ isShow : true }" >
                <div class="w-full flex flex-col items-center space-y-4 sm:items-end" x-show="isShow" 
                x-transition:leave="transition linear duration-500"
                x-transition:leave-start="opacity-100 translate-x-0"
                x-transition:leave-end="opacity-0 translate-x-full" >
                    <div class="max-w-xs w-11/12 bg-red-500 shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 flex items-center align-self-center">
                                    <!-- Heroicon name: outline/check-circle -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="text-base font-medium text-black dark:text-white">Error has encoured!</p>
                                    <p class="mt-1 text-sm text-black dark:text-white "><?php $res = $validation -> getErrors() ; echo array_shift($res);  ?></p>
                                </div>
                                <div class="ml-4 flex-shrink-0 flex">
                                    <button class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 group" @click="isShow=false">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
        <div class=" p-10 flex flex-col md:flex-row md:items-center  bg-secondary-light mx-auto dark:bg-secondary-dark rounded-lg mt-7">
            <div class=" hidden md:block w-7/12">
                <img src="/images/loginil.webp" class="-ml-12 rounded-md" alt="login-ilustraation">
            </div>
            <div class="text-light dark:text-text-dark w-5/12">
                <h1 class="mb-1">Let's Get Started</h1>
                <p>Register now and enjoy write your notes</p>
                
                <form action="/register" class="mt-6" method="POST">
                    <?=csrf_field(); ?>
                    <div class="flex flex-col">
                        <label for="username" class="text-sm text-gray-600 dark:text-gray-300 mb-1">Username</label>
                        <input type="text" name="username" id="username" value="<?= old("username")?>" class="rounded-md bg-transparent px-4 py-2  text-text-light text-sm dark:text-gray-300 border transition-colors ring-2 ring-transparent duration-300 outline-none  border-gray-500 <?= (isset($validation) && $validation->hasError("username")) ? "border-red-500 focus:ring-red-300/40 focus:border-red-500" : "focus:border-blue-400 focus:ring-blue-300/40" ?>"  placeholder="Enter your username" autocomplete="username">
                        <small class="text-xs mt-1 text-red-500"><?= isset($validation) ? $validation->getError("username") : '' ?></small>
                    </div>
                    <div class="flex flex-col mt-2" >
                        <label for="email" class="text-sm text-gray-600 dark:text-gray-300 mb-1">Email</label>
                        <input type="email" name="email" id="email" value="<?= old("email")?>" class="rounded-md bg-transparent text-text-light px-4 outline-offset-[-2px] py-2 text-sm dark:text-gray-300 border transition-colors ring-transparent ring-2  duration-300 outline-none  focus:invalid:border-red-500  focus:invalid:ring-red-400/40 border-gray-500 <?= (isset($validation) && $validation->hasError("email")) ? "border-red-500 focus:ring-red-300/40 focus:border-red-500" : "focus:border-blue-400 focus:ring-blue-300/40" ?>" autocomplete="email" placeholder="Enter your email" >
                        <small class="text-xs mt-1 text-red-500"><?= isset($validation) ? $validation->getError("email") : '' ?></small>
                    </div>
                    <div class="flex flex-col mt-2" >
                        <label for="password" class="text-sm text-gray-600 dark:text-gray-300 mb-1">Password</label>
                        <input type="password" name="password" id="password"  class="rounded-md bg-transparent text-text-light px-4 py-2 text-sm dark:text-gray-300 border transition-colors ring-transparent ring-2   duration-300 outline-none  border-gray-500 <?= (isset($validation) && $validation->hasError("password")) ? "border-red-500 focus:ring-red-300/40 focus:border-red-500" : "focus:border-blue-400 focus:ring-blue-300/40" ?>"  placeholder="Enter your password" autocomplete="new-password">
                        <small class="text-xs mt-1 text-red-500"><?= isset($validation) ? $validation->getError("password") : '' ?></small>
                    </div>
                    <div class="flex flex-col mt-2" >
                        <label for="pass_confirm" class="text-sm text-gray-600 dark:text-gray-300 mb-1 ">Password Confirmation</label>
                        <input  type="password" name="confirm_password" id="confirm_password"  class="rounded-md bg-transparent text-text-light px-4 py-2 text-sm dark:text-gray-300 border transition-colors ring-transparent ring-2   duration-300 outline-none   border-gray-500 <?= (isset($validation) && $validation->hasError("confirm_password")) ? "border-red-500 focus:ring-red-300/40 focus:border-red-500" : "focus:border-blue-400 focus:ring-blue-300/40" ?>" autocomplete="current-password" placeholder="Enter your confirm password">
                        <small class="text-xs mt-1 text-red-500"><?= isset($validation) ? $validation->getError("confirm_password") : '' ?></small>
                    </div>
                    <input role="button" type="submit" class="w-full bg-blue-600 py-2 block mt-6 font-medium text-text-dark  rounded-md hover:bg-blue-700 " value="Register">
                    <p class="text-sm text-black dark:text-white mt-2">Have account ?, click  <a href="/login" class="text-blue-400">here </a>to Login</p>
                </form>
            </div>
        </div>
    </main>
    
<?php $this->endSection()?> 