<template>
   <div v-if="tambahKategori" class="fixed inset-0 z-50 flex items-center justify-center bg-dark-theme-900/25 backdrop-blur-sm">
      <div class="flex flex-col items-center justify-center bg-dark-theme-950 max-w-xl w-full p-6 rounded-xl border border-dark-theme-800">
         <!-- Formulir Tambah Kategori -->
         <form class="flex flex-col items-baseline justify-center gap-6">
            <!-- Judul-->
            <div class="flex flex-col gap-1 w-full">
               <div class="text-dark-theme-50 flex flex-row items-center justify-between">
                  <span class="text-lg font-medium tracking-tight">Tambah kategori baru.</span>
                  <svg type="button" @click="close" class="hover:bg-dark-theme-800/50 p-1 rounded-4xl hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                     <rect width="36" height="36" fill="none" />
                     <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="m14.5 9.5l-5 5m0-5l5 5M7 3.338A9.95 9.95 0 0 1 12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12c0-1.821.487-3.53 1.338-5" />
                  </svg>
               </div>

               <!-- Subjudul -->
               <div>
                  <span class="text-dark-theme-300 text-base font-normal tracking-tight">Masukkan gambar dan nama untuk menambahkan kategori baru.</span>
               </div>
            </div>

            <!-- Kotak Input Foto Kategori -->
            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <div>
                  <!-- Label Foto Kategori -->
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Foto Kategori</span>
               </div>

               <div class="flex flex-row gap-3 items-center w-full">
                  <label for="gambar" class="bg-dark-theme-50 rounded-md flex flex-row gap-2 px-4 py-2 hover:bg-dark-theme-300 text-dark-theme-950 hover:cursor-pointer text-base items-center">Tambah gambar kategori</label>
                  <input type="file" accept="image/jpeg, image/png, image/jpg" id="gambar" class="hidden" />

                  <!-- Nama File -->
                  <span v-if="fileName" class="text-dark-theme-300 text-sm">
                     {{ fileName }}
                  </span>
                  <span v-else class="text-dark-theme-300 text-sm">Belum ada file dipilih</span>
               </div>
            </div>

            <!-- Kotak Input Nama Kategori -->
            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <div>
                  <!-- Label Nama Kategori -->
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Nama Kategori</span>
               </div>

               <div class="flex flex-row w-full">
                  <input type="text" placeholder="Masukkan nama kategori" class="placeholder:text-dark-theme-300 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900/95 w-full px-4 py-2 rounded-md focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" />
               </div>
            </div>

            <!-- Tombol Tambah -->
            <div class="flex flex-row w-full">
               <div class="flex flex-row w-full">
                  <button type="submit" class="text-dark-theme-950 bg-dark-theme-50 p-2 rounded-md w-full text-md tracking-tight hover:bg-dark-theme-300 hover:cursor-pointer">Simpan</button>
               </div>
            </div>

            <!-- Pesan Error -->
            <div v-if="error" class="w-full text-dark-theme-50 bg-red-500 text-base flex flex-row items-baseline justify-baseline px-4 py-2 rounded-md tracking-tight"></div>
         </form>
      </div>
   </div>
</template>

<script setup>
// Membuka pop up
const tambahKategori = defineModel({ type: Boolean, default: false })

// Menutup pop up
const close = () => {
   tambahKategori.value = false
}
</script>
