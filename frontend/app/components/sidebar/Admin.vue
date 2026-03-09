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
               'bg-dark-theme-800/50': active('/admin/home'),
            }">
            <NuxtLink to="/admin/home" class="flex flex-row gap-2 text-base tracking-tight">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M15 18H9m12.636-5.042l-.279 1.937c-.487 3.388-.731 5.081-1.906 6.093S16.553 22 13.106 22h-2.212c-3.447 0-5.17 0-6.345-1.012s-1.419-2.705-1.906-6.093l-.279-1.937c-.38-2.637-.57-3.956-.029-5.083s1.691-1.813 3.992-3.183l1.385-.825C9.8 2.622 10.846 2 12 2s2.199.622 4.288 1.867l1.385.825c2.3 1.37 3.451 2.056 3.992 3.183" />
               </svg>
               Beranda
            </NuxtLink>
         </div>

         <!-- Cashier -->
         <div
            class="w-full py-1.5 px-2 rounded-md hover:bg-dark-theme-800/50 hover:cursor-pointer"
            :class="{
               'bg-dark-theme-800/50': active('/admin/cashier'),
            }">
            <NuxtLink to="/admin/cashier" class="flex flex-row gap-2 text-base tracking-tight">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <g fill="none" stroke="currentColor" stroke-width="1.5">
                     <circle cx="12" cy="6" r="4" />
                     <path stroke-linecap="round" d="M19.998 18q.002-.246.002-.5c0-2.485-3.582-4.5-8-4.5s-8 2.015-8 4.5S4 22 12 22c2.231 0 3.84-.157 5-.437" />
                  </g>
               </svg>
               Kasir
            </NuxtLink>
         </div>

         <!-- Report -->
         <div
            class="w-full py-1.5 px-2 rounded-md hover:bg-dark-theme-800/50 hover:cursor-pointer"
            :class="{
               'bg-dark-theme-800/50': active('/admin/report'),
            }">
            <NuxtLink to="/admin/report" class="flex flex-row gap-2 text-base tracking-tight">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                     <path d="M22 22H12c-4.714 0-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12V9m0-7v3" />
                     <path d="m19 7l-3.118 3.926c-.477.602-.716.903-.99 1.05a1.5 1.5 0 0 1-1.357.029c-.28-.135-.531-.425-1.035-1.005s-.755-.87-1.035-1.005a1.5 1.5 0 0 0-1.356.03c-.274.146-.513.447-.99 1.048L6 15" />
                  </g>
               </svg>
               Laporan
            </NuxtLink>
         </div>

         <div class="w-full flex flex-col gap-0.5 mt-auto">
            <!-- Profile -->
            <div
               class="w-full py-1.5 px-2 rounded-md hover:bg-dark-theme-800/50 hover:cursor-pointer"
               :class="{
                  'bg-dark-theme-800/50': active('/admin/profile'),
               }">
               <NuxtLink to="/admin/profile" class="flex flex-row gap-2 text-base tracking-tight">
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
