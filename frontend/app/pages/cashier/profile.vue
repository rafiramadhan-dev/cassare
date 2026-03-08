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
                           <g fill="none" stroke="currentColor" stroke-width="1.5">
                              <circle cx="12" cy="9" r="3" />
                              <path stroke-linecap="round" d="M17.97 20c-.16-2.892-1.045-5-5.97-5s-5.81 2.108-5.97 5" />
                              <path stroke-linecap="round" d="M7 3.338A9.95 9.95 0 0 1 12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12c0-1.821.487-3.53 1.338-5" />
                           </g>
                        </svg>
                     </div>
                     Profile
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
// Layout Cashier
definePageMeta({
   layout: 'cashier',
})
</script>
