<template>
   <div class="font-mono">
      <!-- Header -->
      <div class="w-full border-b border-dark-theme-800">
         <div class="px-4 py-4.5">
            <div class="flex flex-row">
               <!-- Title -->
               <div>
                  <span class="text-dark-theme-50 text-base tracking-tight flex flex-row gap-2">
                     <div class="pr-2 border-r border-dark-theme-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                           <rect width="24" height="24" fill="none" />
                           <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                              <path d="M22 22H12c-4.714 0-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12V9m0-7v3" />
                              <path d="m19 7l-3.118 3.926c-.477.602-.716.903-.99 1.05a1.5 1.5 0 0 1-1.357.029c-.28-.135-.531-.425-1.035-1.005s-.755-.87-1.035-1.005a1.5 1.5 0 0 0-1.356.03c-.274.146-.513.447-.99 1.048L6 15" />
                           </g>
                        </svg>
                     </div>
                     Laporan
                  </span>
               </div>
            </div>
         </div>
      </div>

      <!-- Content -->
      <div></div>
   </div>
</template>

<script setup>
// Layout Admin
definePageMeta({
   layout: 'admin',
})
</script>
