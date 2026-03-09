<template>
   <div class="max-w-3xs w-full h-screen flex flex-col items-baseline gap bg-dark-theme-900 border-r border-dark-theme-800 font-mono text-dark-theme-50">
      <!-- Title -->
      <div class="w-full border-b border-dark-theme-800">
         <div class="px-2 py-2.5">
            <span class="flex flex-row gap-2 p-2 text-base tracking-tight">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                     <path d="m15 11l1 6m-7-6l-1 6M9 6V5a3 3 0 1 1 6 0v1" />
                     <path d="M20.224 12.526c-.586-3.121-.878-4.682-1.99-5.604C17.125 6 15.537 6 12.36 6h-.72c-3.176 0-4.764 0-5.875.922s-1.403 2.483-1.989 5.604c-.823 4.389-1.234 6.583-.034 8.029S7.174 22 11.639 22h.722c4.465 0 6.698 0 7.897-1.445c.696-.84.85-1.93.696-3.555" />
                  </g>
               </svg>
               Cassare Inc.
            </span>
         </div>
      </div>

      <div class="w-full h-screen py-4 px-2 flex flex-col items-baseline gap-0.5">
         <!-- Home -->
         <div
            class="w-full py-1.5 px-2 rounded-md hover:bg-dark-theme-800/50 hover:cursor-pointer"
            :class="{
               'bg-dark-theme-800/50': active('/cashier/home'),
            }">
            <NuxtLink to="/cashier/home" class="flex flex-row gap-2 text-base tracking-tight">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M15 18H9m12.636-5.042l-.279 1.937c-.487 3.388-.731 5.081-1.906 6.093S16.553 22 13.106 22h-2.212c-3.447 0-5.17 0-6.345-1.012s-1.419-2.705-1.906-6.093l-.279-1.937c-.38-2.637-.57-3.956-.029-5.083s1.691-1.813 3.992-3.183l1.385-.825C9.8 2.622 10.846 2 12 2s2.199.622 4.288 1.867l1.385.825c2.3 1.37 3.451 2.056 3.992 3.183" />
               </svg>
               Beranda
            </NuxtLink>
         </div>

         <!-- Category -->
         <div
            class="w-full py-1.5 px-2 rounded-md hover:bg-dark-theme-800/50 hover:cursor-pointer"
            :class="{
               'bg-dark-theme-800/50': active('/cashier/category'),
            }">
            <NuxtLink to="/cashier/category" class="flex flex-row gap-2 text-base tracking-tight">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <g fill="none" stroke="currentColor" stroke-width="1.5">
                     <path stroke-linecap="round" d="M21.483 19c-.04.936-.165 1.51-.569 1.914c-.586.586-1.528.586-3.414.586s-2.828 0-3.414-.586s-.586-1.528-.586-3.414v-2c0-1.886 0-2.828.586-3.414s1.528-.586 3.414-.586s2.828 0 3.414.586c.532.531.581 1.357.585 2.914" />
                     <path d="M2 8.5c0 1.886 0 2.828.586 3.414S4.114 12.5 6 12.5s2.828 0 3.414-.586S10 10.386 10 8.5v-2c0-1.886 0-2.828-.586-3.414S7.886 2.5 6 2.5s-2.828 0-3.414.586S2 4.614 2 6.5z" />
                     <path stroke-linecap="round" d="M15.5 2.513c-.327.017-.562.055-.765.14a2 2 0 0 0-1.083 1.082c-.152.367-.152.833-.152 1.765s0 1.398.152 1.765a2 2 0 0 0 1.083 1.083c.367.152.833.152 1.765.152h2c.932 0 1.398 0 1.765-.152a2 2 0 0 0 1.083-1.083c.152-.367.152-.833.152-1.765s0-1.398-.152-1.765a2 2 0 0 0-1.083-1.083c-.204-.084-.438-.122-.765-.139" />
                     <path d="M2 18.5c0 .932 0 1.398.152 1.765a2 2 0 0 0 1.083 1.083c.367.152.833.152 1.765.152h2c.932 0 1.398 0 1.765-.152a2 2 0 0 0 1.083-1.083C10 19.898 10 19.432 10 18.5s0-1.398-.152-1.765a2 2 0 0 0-1.083-1.083C8.398 15.5 7.932 15.5 7 15.5H5c-.932 0-1.398 0-1.765.152a2 2 0 0 0-1.083 1.083C2 17.102 2 17.568 2 18.5Z" />
                  </g>
               </svg>
               Kategori
            </NuxtLink>
         </div>

         <!-- Product -->
         <div
            class="w-full py-1.5 px-2 rounded-md hover:bg-dark-theme-800/50 hover:cursor-pointer"
            :class="{
               'bg-dark-theme-800/50': active('/cashier/product'),
            }">
            <NuxtLink to="/cashier/product" class="flex flex-row gap-2 text-base tracking-tight">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <g fill="none" stroke="currentColor" stroke-width="1.5">
                     <path d="M7.5 18a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3Zm9 0a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3Z" />
                     <path stroke-linecap="round" d="m9.5 9l.528 3.118M15.528 9L15 12.118M2 3l.261.092c1.302.457 1.953.686 2.325 1.231s.372 1.268.372 2.715V9.76c0 2.942.063 3.912.93 4.826c.866.914 2.26.914 5.05.914H12m4.24 0c1.561 0 2.342 0 2.894-.45c.551-.45.709-1.214 1.024-2.743l.5-2.424c.347-1.74.52-2.609.076-3.186c-.443-.577-1.96-.577-3.645-.577h-6.065m-6.066 0H7" />
                  </g>
               </svg>
               Produk
            </NuxtLink>
         </div>

         <!-- Transaction -->
         <div
            class="w-full py-1.5 px-2 rounded-md hover:bg-dark-theme-800/50 hover:cursor-pointer"
            :class="{
               'bg-dark-theme-800/50': active('/cashier/transaction'),
            }">
            <NuxtLink to="/cashier/transaction" class="flex flex-row gap-2 text-base tracking-tight">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.5 4L4 10h10m6 0h-2.5m-3 10l5.5-6H10m-6 0h2.5" />
               </svg>
               Transaksi
            </NuxtLink>
         </div>

         <div class="w-full flex flex-col gap-0.5 mt-auto">
            <!-- Profile -->
            <div
               class="w-full py-1.5 px-2 rounded-md hover:bg-dark-theme-800/50 hover:cursor-pointer"
               :class="{
                  'bg-dark-theme-800/50': active('/cashier/profile'),
               }">
               <NuxtLink to="/cashier/profile" class="flex flex-row gap-2 text-base tracking-tight">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                     <rect width="24" height="24" fill="none" />
                     <g fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="9" r="3" />
                        <path stroke-linecap="round" d="M17.97 20c-.16-2.892-1.045-5-5.97-5s-5.81 2.108-5.97 5" />
                        <path stroke-linecap="round" d="M7 3.338A9.95 9.95 0 0 1 12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12c0-1.821.487-3.53 1.338-5" />
                     </g>
                  </svg>
                  Profile
               </NuxtLink>
            </div>

            <!-- Logout -->
            <div class="w-full py-1.5 px-2 rounded-md hover:bg-dark-theme-800/50 hover:cursor-pointer">
               <button @click="auth.logout().then(() => $router.push('/login'))" class="flex flex-row gap-2 text-base tracking-tight hover:cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                     <rect width="24" height="24" fill="none" />
                     <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                        <path stroke-linejoin="round" d="M10 12h10m0 0l-3-3m3 3l-3 3" />
                        <path d="M4 12a8 8 0 0 1 8-8m0 16a7.99 7.99 0 0 1-6.245-3" />
                     </g>
                  </svg>
                  Logout
               </button>
            </div>
         </div>
      </div>
   </div>
</template>

<script setup>
// Import
import { useAuthenticationStore } from '~/stores/authentication'

// Variable
const auth = useAuthenticationStore()
const route = useRoute()

// Check Page
const active = (path) => route.path === path || route.path.startsWith(path)
</script>
