
<?= $this->extend('layout/pageLayout')?>
<?= $this->section('content')?>
    <main>
        <?= $this->include("layout/toast");?>
        <div class=" p-10 flex  flex-col md:flex-row md:items-center bg-secondary-light mx-auto dark:bg-secondary-dark rounded-lg mt-7">
            <div class=" hidden md:block w-7/12">
                <img src="/images/loginil.webp" class="-ml-12 rounded-md" alt="login-ilustraation">
            </div>
            <div class="text-light dark:text-text-dark">
                <h1 class="mb-1">Hello, welcome back </h1>
                <p >Happy to meet with you again , let's login to continue</p>
                <form action="/login" class="mt-6" method="POST">
                    <?=csrf_field(); ?>
                    <div class="flex flex-col">
                        <label for="email" class="text-sm text-gray-600 dark:text-gray-300">Email</label>
                        <input type="email" name="email" value="" id="email" class="rounded-md bg-transparent px-4 py-2  text-text-light text-sm dark:text-gray-300 border border=transparent transition ring-2 ring-transparent duration-300 outline-none focus:border-blue-400 focus:ring-blue-300/50   invalid:border-red-500 border-gray-400 focus:invalid:border-red-500 focus:invalid:ring-red-300/40  peer" autocomplete="email">
                    </div>
                    <div class="flex flex-col mt-3" x-data="{ onfocus :  false }">
                        <label for="password" class="text-sm text-gray-600 dark:text-gray-300">Password</label>
                        <input type="password" name="password" value="" id="password"  class="rounded-md bg-transparent text-text-light border-gray-400 px-4 py-2 text-sm dark:text-gray-300 ring-2 ring-transparent  border transition duration-300 outline-none focus:border-blue-400 focus:ring-blue-300/40 " autocomplete="current-password" >
                    </div>
                    <input role="button" type="submit" class="w-full bg-blue-600 py-3 block mt-6 font-medium text-text-dark  rounded-md hover:bg-blue-700 " value="Login">
                    <p class="text-sm text-black dark:text-white mt-2">Don't have account ?, click  <a href="/register" class="text-blue-400">here </a>to Signup</p>
                </form>
            </div>
        </div>
    </main>
<?= $this->endSection()?>
