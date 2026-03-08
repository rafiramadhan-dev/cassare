<template>
   <div class="font-mono">
      <!-- Headers -->
      <div class="w-full border-b border-dark-theme-800">
         <div class="px-4 py-4.5">
            <div class="flex flex-row">
               <!-- Title -->
               <div>
                  <span class="text-dark-theme-50 text-base tracking-tight flex flex-row gap-2">
                     <div class="pr-2 border-r border-dark-theme-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                           <rect width="24" height="24" fill="none" />
                           <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M15 18H9m12.636-5.042l-.279 1.937c-.487 3.388-.731 5.081-1.906 6.093S16.553 22 13.106 22h-2.212c-3.447 0-5.17 0-6.345-1.012s-1.419-2.705-1.906-6.093l-.279-1.937c-.38-2.637-.57-3.956-.029-5.083s1.691-1.813 3.992-3.183l1.385-.825C9.8 2.622 10.846 2 12 2s2.199.622 4.288 1.867l1.385.825c2.3 1.37 3.451 2.056 3.992 3.183" />
                        </svg>
                     </div>
                     Beranda
                  </span>
               </div>
            </div>
         </div>
      </div>

      <!-- Content -->
      <div class="w-full flex flex-row gap-4 p-4 items-center justify-center flex-1">
         <!-- Cashier Card -->
         <div class="w-full rounded-lg bg-dark-theme-900 border border-dark-theme-800 px-6 py-4 flex flex-col items-baseline justify-baseline gap-2">
            <div class="flex flex-col items-baseline justify-baseline gap-1">
               <span class="text-dark-theme-300 text-sm tracking-tight">Jumlah Kasir</span>
               <span class="text-dark-theme-50 text-4xl tracking-tight">20</span>
            </div>
            <div>
               <span class="text-dark-theme-300 text-sm tracking-tight">Total seluruh kasir saat ini.</span>
            </div>
         </div>

         <!-- Report Card -->
         <div class="w-full rounded-lg bg-dark-theme-900 border border-dark-theme-800 px-6 py-4 flex flex-col items-baseline justify-baseline gap-2">
            <div class="flex flex-col items-baseline justify-baseline gap-1">
               <span class="text-dark-theme-300 text-sm tracking-tight">Hasil Laporan</span>
               <span class="text-dark-theme-50 text-4xl tracking-tight">Rp57.212,00</span>
            </div>
            <div>
               <span class="text-dark-theme-300 text-sm tracking-tight">Hasil perhitungan keuntungan laporan.</span>
            </div>
         </div>
      </div>
   </div>
</template>

<script setup>
// Layout Admin
definePageMeta({
   layout: 'admin',
})
</script>
