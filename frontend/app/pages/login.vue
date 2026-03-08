<template>
   <div class="flex flex-col h-screen items-center justify-center bg-dark-theme-950">
      <div class="flex flex-col items-center justify-center max-w-sm w-full">
         <!-- Formulir -->
         <form @submit.prevent="handleLogin" class="flex flex-col gap-6 font-mono w-full">
            <!-- Judul -->
            <div class="flex flex-col gap-1 items-baseline justify-baseline w-full">
               <span class="text-dark-theme-50 text-lg font-medium tracking-tight">Masuk ke akun anda.</span>

               <!-- Subjudul -->
               <span class="text-dark-theme-300 text-base font-normal tracking-tight">Masukkan email dan password di bawah untuk masuk akun anda.</span>
            </div>

            <!-- Kotak Input Email -->
            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <div>
                  <!-- Label Email -->
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Email</span>
               </div>

               <div class="flex flex-row w-full">
                  <input v-model="email" class="placeholder:text-dark-theme-300 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900/95 w-full px-4 py-2 rounded-md focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" type="email" placeholder="Masukkan email anda" />
               </div>
            </div>

            <!-- Kotak Input Password -->
            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <div class="flex flex-row items-center justify-between w-full">
                  <!-- Label Password -->
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Password</span>

                  <!-- Link Lupa Password -->
                  <NuxtLink to="/lupaPassword" class="text-dark-theme-50 text-base font-medium tracking-tight hover:underline-offset-2 hover:underline decoration-2">Lupa password?</NuxtLink>
               </div>

               <div class="flex flex-row w-full">
                  <input v-model="password" class="placeholder:text-dark-theme-300 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900/95 w-full px-4 py-2 rounded-md focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" type="password" placeholder="Masukkan password anda" />
               </div>
            </div>

            <!-- Tombol Masuk -->
            <div class="flex flex-row w-full">
               <button type="submit" :disabled="loading" class="text-dark-theme-950 bg-dark-theme-50 p-2 rounded-md w-full text-md tracking-tight hover:bg-dark-theme-300 hover:cursor-pointer">
                  {{ loading ? 'Memproses...' : 'Masuk' }}
               </button>
            </div>

            <!-- Pesan Error -->
            <div v-if="error" class="w-full text-dark-theme-50 bg-red-500 text-base flex flex-row items-baseline justify-baseline px-4 py-2 rounded-md tracking-tight">
               {{ error }}
            </div>
         </form>
      </div>
   </div>
</template>

<script setup>
// Import
import { useAuthStore } from '@/stores/auth'
import { ref } from 'vue'

// Variabel
const auth = useAuthStore()
const email = ref('')
const password = ref('')
const loading = ref(false)
const error = ref('')

// Login
const handleLogin = async () => {
   error.value = ''
   loading.value = true

   try {
      await auth.login(email.value, password.value)
      auth.redirect()
   } catch (err) {
      error.value = err.message || 'Login gagal!'
      if (err.message && err.message.includes('Akun anda telah diblokir!')) {
         isBlocked.value = true
      } else if (err.message && err.message.includes('Kesempatan tersisa')) {
         const match = err.message.match(/(\d+)x/)
         if (match) {
            remainingAttempts.value = parseInt(match[1])
         }
      }
   } finally {
      loading.value = false
   }
}

// Layout Auth
definePageMeta({
   layout: 'auth',
})
</script>
