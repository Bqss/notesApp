<div class=" text-text-dark  z-10 absolute inset-0 grid place-items-center backdrop-blur-sm " x-show="isAdd" @click.away="isAdd=false" x-transition>
    <div class="w-11/12 max-w-2xl p-6 pt-8 rounded-lg bg-white -mt-10 bg-gray-white text-black dark:text-white dark:bg-[#1A1B1E]" @click.outside="isAdd= false">
        <div class="flex justify-between">
            <span>Create New Note</span>
            <button @click="isAdd=false">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form action="/addNote"  method="post" class="mt-10" >
            <div class="mb-2">
                <label for="title " class="text-sm">Title*</label>
                <input type="text"  class="w-full rounded-md bg-white dark:bg-secondary-dark text-sm p-2 px-5 border border-gray-300 dark:border-gray-700 outline-none focus:border-blue-500 " name="title" id="title">
            </div>
            <div class="">
                <label for="body" class="text-sm">Body*</label>
                <textarea name="body" id="body" class="w-full rounded-md resize-none bg-white dark:bg-secondary-dark text-sm p-2 px-5 border border-gray-300 dark:border-gray-700 outline-none focus:border-blue-500 " rows="10"></textarea>
            </div>
            <input type="submit" class="w-full bg-blue-600  text-white dar rounded-md py-3 text-sm mt-2 hover:bg-blue-500" role="button"  value="Add Note"> 
        </form>
    </div>
    
</div>