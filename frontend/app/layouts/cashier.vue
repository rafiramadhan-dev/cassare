<template>
   <div class="flex h-screen">
      <!-- Cashier Sidebar -->
      <SidebarCashier />

      <!-- Cashier Page -->
      <main class="flex-1 bg-dark-theme-950">
         <slot />
      </main>
   </div>
</template>
