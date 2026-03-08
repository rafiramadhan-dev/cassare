<template>
   <div class="flex h-screen">
      <!-- Admin Sidebar -->
      <SidebarAdmin />

      <!-- Admin Page -->
      <main class="flex-1 bg-dark-theme-950">
         <slot />
      </main>
   </div>
</template>
