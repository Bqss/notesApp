<?php $msg = session() -> getFlashdata('msg')?>
<?php if($msg): ?>
    <div aria-live="assertive" class="fixed inset-0  flex items-start px-4 py-6 pointer-events-none sm:p-6 sm:items-start" x-data="{isShow = true}" >
        <div class="w-full flex flex-col items-center space-y-4 sm:items-end" x-show="isShow" 
        x-transition:leave="transition linear duration-[1000ms]"
        x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 translate-x-full"
        x-init="setTimeout(() => isShow = false , 6000)" >
            <div class="w-11/12 max-w-sm bg-red-500 shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
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
                            <p class="mt-1 text-sm text-black dark:text-white "><?= session()->getFlashdata("msg")?></p>
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
<?php endif ?>

 
 