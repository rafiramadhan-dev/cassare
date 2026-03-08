<template>
   <div v-if="editCategory" class="fixed inset-0 z-50 flex items-center justify-center bg-dark-theme-900/25 backdrop-blur-sm">
      <div class="flex flex-col items-center justify-center bg-dark-theme-950 max-w-lg w-full p-6 rounded-xl border border-dark-theme-800">
         <!-- Form Edit Category -->
         <form class="flex flex-col items-baseline justify-center gap-6">
            <!-- Title -->
            <div class="flex flex-col gap-1 w-full">
               <div class="text-dark-theme-50 flex flex-row items-center justify-between">
                  <span class="text-lg font-medium tracking-tight">Edit informasi kategori.</span>
                  <svg type="button" @click="close" class="hover:bg-dark-theme-800/50 p-1 rounded-4xl hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                     <rect width="36" height="36" fill="none" />
                     <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="m14.5 9.5l-5 5m0-5l5 5M7 3.338A9.95 9.95 0 0 1 12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12c0-1.821.487-3.53 1.338-5" />
                  </svg>
               </div>

               <!-- Subtitle -->
               <div>
                  <span class="text-dark-theme-300 text-base font-normal tracking-tight">Perbarui gambar atau nama untuk kategori yang sudah ditambahkan anda.</span>
               </div>
            </div>

            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <!-- Label Category Photo -->
               <div>
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Foto Kategori</span>
               </div>

               <!-- Input Box Category Photo -->
               <div @click="$refs.photoInput.click()" class="text-dark-theme-300 w-full h-46 rounded-lg border-2 border-dashed border-dark-theme-800 bg-dark-theme-900/95 flex flex-col items-center justify-center gap-2 cursor-pointer hover:border-dark-theme-700 hover:bg-dark-theme-800/95 transition-all">
                  <img v-if="photoPreview" :src="photoPreview" class="w-full h-full object-cover rounded-lg" />
                  <div v-else class="flex flex-col items-center justify-center gap-2">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <rect width="24" height="24" fill="none" />
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M15 13H9m3-3v6m7-6h-1M2 13.364c0-3.065 0-4.597.749-5.697a4.4 4.4 0 0 1 1.226-1.204c.72-.473 1.622-.642 3.003-.702c.659 0 1.226-.49 1.355-1.125A2.064 2.064 0 0 1 10.366 3h3.268c.988 0 1.839.685 2.033 1.636c.129.635.696 1.125 1.355 1.125c1.38.06 2.282.23 3.003.702c.485.318.902.727 1.226 1.204c.749 1.1.749 2.632.749 5.697s0 4.596-.749 5.697a4.4 4.4 0 0 1-1.226 1.204C18.904 21 17.343 21 14.222 21H9.778c-3.121 0-4.682 0-5.803-.735A4.4 4.4 0 0 1 2.75 19.06A3.4 3.4 0 0 1 2.277 18" />
                     </svg>
                     <span class="text-base tracking-tight">Masukkan foto kategori.</span>
                     <span class="text-base tracking-tight">.png, .jpg, .jpeg</span>
                  </div>
                  <input ref="photoInput" type="file" accept="image/png, image/jpg, image/jpeg" class="hidden" @change="handlePhoto" />
               </div>
            </div>

            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <!-- Label Category Name -->
               <div>
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Nama Kategori</span>
               </div>

               <!-- Input Box Category Name -->
               <div class="flex flex-row w-full">
                  <input type="text" placeholder="Masukkan nama kategori" class="placeholder:text-dark-theme-300 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900/95 w-full px-4 py-2 rounded-md focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" />
               </div>
            </div>

            <!-- Add Button -->
            <div class="flex flex-row w-full">
               <div class="flex flex-row w-full">
                  <button type="submit" class="text-dark-theme-950 bg-dark-theme-50 p-2 rounded-md w-full text-md tracking-tight hover:bg-dark-theme-300 hover:cursor-pointer">Perbarui</button>
               </div>
            </div>

            <!-- Error Message -->
            <div v-if="error" class="w-full text-dark-theme-50 bg-red-500 text-base flex flex-row items-baseline justify-baseline px-4 py-2 rounded-md tracking-tight"></div>
         </form>
      </div>
   </div>
</template>

<script setup>
// Open Pop Up
const editCategory = defineModel({ type: Boolean, default: false })

// Close Pop Up
const close = () => {
   editCategory.value = false
}
</script>
