<template>
   <div class="flex h-screen">
      <!-- Sidebar Admin -->
      <SidebarAdmin />

      <!-- Halaman Admin -->
      <main class="flex-1 bg-dark-theme-950">
         <slot />
      </main>
   </div>
</template>
