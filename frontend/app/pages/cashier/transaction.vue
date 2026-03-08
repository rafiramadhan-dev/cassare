<template>
   <div class="font-mono">
      <!-- Kepala -->
      <div class="w-full border-b border-dark-theme-800">
         <div class="px-4 py-4.5">
            <div class="flex flex-row">
               <!-- Judul -->
               <div>
                  <span class="text-dark-theme-50 text-base tracking-tight flex flex-row gap-2">
                     <div class="pr-2 border-r border-dark-theme-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                           <rect width="24" height="24" fill="none" />
                           <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.5 4L4 10h10m6 0h-2.5m-3 10l5.5-6H10m-6 0h2.5" />
                        </svg>
                     </div>
                     Transaksi
                  </span>
               </div>
            </div>
         </div>
      </div>

      <!-- Konten -->
      <div></div>
   </div>
</template>

<script setup>
// Layout Kasir
definePageMeta({
   layout: 'kasir',
})
</script>
