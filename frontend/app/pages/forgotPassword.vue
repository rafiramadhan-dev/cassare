<template>
   <div class="flex flex-col h-screen items-center justify-center bg-dark-theme-950">
      <div class="flex flex-col items-center justify-center max-w-sm w-full">
         <!-- Formulir Email -->
         <form v-if="step === 'email'" @submit.prevent="handleVerifyEmail" class="flex flex-col gap-6 font-mono w-full">
            <!-- Judul -->
            <div class="flex flex-col gap-1 items-baseline justify-baseline w-full">
               <span class="text-dark-theme-50 text-lg font-medium tracking-tight">Lupa password akun anda?</span>

               <!-- Subjudul -->
               <span class="text-dark-theme-300 text-base font-normal tracking-tight">Masukkan email untuk mengubah password anda.</span>
            </div>

            <!-- Kotak Input Email -->
            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <div class="flex flex-row items-center justify-between w-full">
                  <!-- Label Email -->
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Email</span>

                  <!-- Link Kembali -->
                  <NuxtLink to="/login" class="text-dark-theme-50 text-base font-medium tracking-tight hover:underline-offset-2 hover:underline decoration-2">Kembali></NuxtLink>
               </div>

               <div class="flex flex-row w-full">
                  <input v-model="email" class="placeholder:text-dark-theme-300 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900/95 w-full px-4 py-2 rounded-md focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" type="email" placeholder="Masukkan email anda" />
               </div>
            </div>

            <!-- Tombol Kirim -->
            <div class="flex flex-row w-full">
               <button type="submit" :disabled="loadingEmail" class="text-dark-theme-950 bg-dark-theme-50 p-2 rounded-md w-full text-md tracking-tight hover:bg-dark-theme-300 hover:cursor-pointer">
                  {{ loadingEmail ? 'Memproses...' : 'Kirim' }}
               </button>
            </div>

            <!-- Pesan Error Email -->
            <div v-if="errorEmail" class="w-full text-dark-theme-50 bg-red-500 text-base flex flex-row items-baseline justify-baseline px-4 py-2 rounded-md tracking-tight">
               {{ errorEmail }}
            </div>
         </form>

         <!-- Formulir Password -->
         <form v-if="step === 'password'" @submit.prevent="handleChangePassword" class="flex flex-col gap-6 font-mono w-full">
            <!-- Judul -->
            <div class="flex flex-col gap-1 items-baseline justify-baseline w-full">
               <span class="text-dark-theme-50 text-lg font-medium tracking-tight">Perbarui password akun anda.</span>

               <!-- Subjudul -->
               <span class="text-dark-theme-300 text-base font-normal tracking-tight">Buat password baru untuk akun anda.</span>
            </div>

            <!-- Kotak Input Password Baru -->
            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <div class="flex flex-row items-center justify-between w-full">
                  <!-- Label Password Baru -->
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Password Baru</span>
               </div>

               <div class="flex flex-row w-full">
                  <input v-model="passwordBaru" class="placeholder:text-dark-theme-300 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900/95 w-full px-4 py-2 rounded-md focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" type="password" placeholder="Masukkan password baru anda" />
               </div>
            </div>

            <!-- Kotak Input Konfirmasi Password -->
            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <div class="flex flex-row items-center justify-between w-full">
                  <!-- Label Konfirmasi Password -->
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Konfirmasi Password</span>
               </div>

               <div class="flex flex-row w-full">
                  <input v-model="konfirmasiPassword" class="placeholder:text-dark-theme-300 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900/95 w-full px-4 py-2 rounded-md focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" type="password" placeholder="Masukkan konfirmasi password anda" />
               </div>
            </div>

            <!-- Tombol Perbarui -->
            <div class="flex flex-row w-full">
               <button type="submit" :disabled="loadingEmail" class="text-dark-theme-950 bg-dark-theme-50 p-2 rounded-md w-full text-md tracking-tight hover:bg-dark-theme-300 hover:cursor-pointer">
                  {{ loadingPassword ? 'Memproses...' : 'Perbarui' }}
               </button>
            </div>

            <!-- Pesan Error Password -->
            <div v-if="errorPassword" class="w-full text-dark-theme-50 bg-red-500 text-base flex flex-row items-baseline justify-baseline px-4 py-2 rounded-md tracking-tight">
               {{ errorPassword }}
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
const step = ref('email')
const email = ref('')
const loadingEmail = ref(false)
const errorEmail = ref('')
const passwordBaru = ref('')
const konfirmasiPassword = ref('')
const loadingPassword = ref(false)
const errorPassword = ref('')

// Verify Email
const handleVerifyEmail = async () => {
   errorEmail.value = ''
   loadingEmail.value = true

   try {
      await auth.verifyEmail(email.value)
      step.value = 'password'
   } catch (err) {
      errorEmail.value = err.message || 'Verifikasi email gagal!'
   } finally {
      loadingEmail.value = false
   }
}

// Change Password
const handleChangePassword = async () => {
   errorPassword.value = ''
   loadingPassword.value = true

   try {
      await auth.changePassword(email.value, passwordBaru.value, konfirmasiPassword.value)
      await navigateTo('/login')
   } catch (err) {
      errorPassword.value = err.message || 'Ubah password gagal!'
   } finally {
      loadingPassword.value = false
   }
}

// Layout Auth
definePageMeta({
   layout: 'auth',
})
</script>
