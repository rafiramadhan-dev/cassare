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
                           <g fill="none" stroke="currentColor" stroke-width="1.5">
                              <circle cx="12" cy="6" r="4" />
                              <path stroke-linecap="round" d="M19.998 18q.002-.246.002-.5c0-2.485-3.582-4.5-8-4.5s-8 2.015-8 4.5S4 22 12 22c2.231 0 3.84-.157 5-.437" />
                           </g>
                        </svg>
                     </div>
                     Kasir
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
// Layout Admin
definePageMeta({
   layout: 'admin',
})
</script>
