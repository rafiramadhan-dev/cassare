<template>
   <div v-if="editCategory" class="fixed inset-0 z-50 flex items-center justify-center bg-dark-theme-900/25 backdrop-blur-sm">
      <div class="flex flex-col items-center justify-center bg-dark-theme-950 max-w-lg w-full p-6 rounded-xl border border-dark-theme-800">
        <!-- Pop Up Delete Category -->
        <div class="flex flex-col items-baseline justify-center gap-6">
            <!-- Text -->
             <div>
                <span>Apa anda yakin ingin menghapus kategori ini?</span>
                <button>Batal</button>
                <button>Iya</button>
             </div>
        </div>
      </div>
   </div>
</template>

<script setup>
// Open Pop Up
const deleteCategory = defineModel({ type: Boolean, default: false })

// Close Pop Up
const close = () => {
   deleteCategory.value = false
}
</script>
