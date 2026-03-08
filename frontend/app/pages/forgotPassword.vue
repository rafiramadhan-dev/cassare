<template>
   <div class="flex flex-col h-screen items-center justify-center bg-dark-theme-950">
      <div class="flex flex-col items-center justify-center max-w-sm w-full">
         <!-- Form Email -->
         <form v-if="step === 'email'" @submit.prevent="handleVerifyEmail" class="flex flex-col gap-6 font-mono w-full">
            <div class="flex flex-col gap-1 items-baseline justify-baseline w-full">
               <!-- Title -->
               <span class="text-dark-theme-50 text-lg font-medium tracking-tight">Lupa password akun anda?</span>

               <!-- Subtitle -->
               <span class="text-dark-theme-300 text-base font-normal tracking-tight">Masukkan email untuk mengubah password anda.</span>
            </div>

            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <div class="flex flex-row items-center justify-between w-full">
                  <!-- Label Email -->
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Email</span>

                  <!-- Link Back -->
                  <NuxtLink to="/login" class="text-dark-theme-50 text-base font-medium tracking-tight hover:underline-offset-2 hover:underline decoration-2">Kembali></NuxtLink>
               </div>

               <!-- Input Box Email -->
               <div class="flex flex-row w-full">
                  <input v-model="email" class="placeholder:text-dark-theme-300 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900/95 w-full px-4 py-2 rounded-md focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" type="email" placeholder="Masukkan email anda" />
               </div>
            </div>

            <!-- Send Button -->
            <div class="flex flex-row w-full">
               <button type="submit" :disabled="loadingEmail" class="text-dark-theme-950 bg-dark-theme-50 p-2 rounded-md w-full text-md tracking-tight hover:bg-dark-theme-300 hover:cursor-pointer">
                  {{ loadingEmail ? 'Memproses...' : 'Kirim' }}
               </button>
            </div>

            <!-- Error Message Email -->
            <div v-if="errorEmail" class="w-full text-dark-theme-50 bg-red-500 text-base flex flex-row items-baseline justify-baseline px-4 py-2 rounded-md tracking-tight">
               {{ errorEmail }}
            </div>
         </form>

         <!-- Form OTP Code -->
         <form v-if="step === ''" @submit.prevent="handleVerifyOtpCode" class="flex flex-col gap-6 font-mono w-full">
            <!-- Title -->
            <div class="flex flex-col gap-1 items-baseline justify-baseline w-full">
               <span class="text-dark-theme-50 text-lg font-medium tracking-tight">Masukkan kode OTP.</span>

               <!-- Subtitle -->
               <span class="text-dark-theme-300 text-base font-normal tracking-tight">Kode OTP sudah dikirim melalui nomor WhatsApp anda.</span>
            </div>

            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <div class="flex flex-row items-center justify-between w-full">
                  <!-- Label OTP Code -->
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Kode OTP</span>
               </div>

               <!-- Input Box OTP Code -->
               <div class="flex flex-row w-full">
                  <input v-model="otpCode" class="placeholder:text-dark-theme-300 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900/95 w-full px-4 py-2 rounded-md focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" type="password" placeholder="Masukkan kode OTP anda" />
               </div>
            </div>

            <!-- Verification Button -->
            <div class="flex flex-row w-full">
               <button type="submit" :disabled="loadingOtpCode" class="text-dark-theme-950 bg-dark-theme-50 p-2 rounded-md w-full text-md tracking-tight hover:bg-dark-theme-300 hover:cursor-pointer">
                  {{ loadingOtpCode ? 'Memproses...' : 'Verifikasi' }}
               </button>
            </div>

            <!-- Error Message Password -->
            <div v-if="errorOtpCode" class="w-full text-dark-theme-50 bg-red-500 text-base flex flex-row items-baseline justify-baseline px-4 py-2 rounded-md tracking-tight">
               {{ errorOtpCode }}
            </div>
         </form>

         <!-- Form Password -->
         <form v-if="step === 'password'" @submit.prevent="handleChangePassword" class="flex flex-col gap-6 font-mono w-full">
            <!-- Title -->
            <div class="flex flex-col gap-1 items-baseline justify-baseline w-full">
               <span class="text-dark-theme-50 text-lg font-medium tracking-tight">Perbarui password akun anda.</span>

               <!-- Subtitle -->
               <span class="text-dark-theme-300 text-base font-normal tracking-tight">Buat password baru untuk akun anda.</span>
            </div>

            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <div class="flex flex-row items-center justify-between w-full">
                  <!-- Label New Password -->
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Password Baru</span>
               </div>

               <!-- Input Box New Password -->
               <div class="flex flex-row w-full">
                  <input v-model="newPassword" class="placeholder:text-dark-theme-300 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900/95 w-full px-4 py-2 rounded-md focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" type="password" placeholder="Masukkan password baru anda" />
               </div>
            </div>

            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <div class="flex flex-row items-center justify-between w-full">
                  <!-- Label Confirmation Password -->
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Konfirmasi Password</span>
               </div>

               <!-- Input Box Confirmation Password -->
               <div class="flex flex-row w-full">
                  <input v-model="confirmationPassword" class="placeholder:text-dark-theme-300 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900/95 w-full px-4 py-2 rounded-md focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" type="password" placeholder="Masukkan konfirmasi password anda" />
               </div>
            </div>

            <!-- Update Button -->
            <div class="flex flex-row w-full">
               <button type="submit" :disabled="loadingEmail" class="text-dark-theme-950 bg-dark-theme-50 p-2 rounded-md w-full text-md tracking-tight hover:bg-dark-theme-300 hover:cursor-pointer">
                  {{ loadingPassword ? 'Memproses...' : 'Perbarui' }}
               </button>
            </div>

            <!-- Error Message Password -->
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

// Variable
const auth = useAuthStore()
const step = ref('email')
const email = ref('')
const loadingEmail = ref(false)
const errorEmail = ref('')
const otpCode = ref('')
const loadingOtpCode = ref(false)
const errorOtpCode = ref('')
const newPassword = ref('')
const confirmationPassword = ref('')
const loadingPassword = ref(false)
const errorPassword = ref('')

// Verify Email Function
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

// Verify OTP Code Function
const handleVerifyOtpCode = async () => {

}

// Change Password Function
const handleChangePassword = async () => {
   errorPassword.value = ''
   loadingPassword.value = true

   try {
      await auth.changePassword(email.value, newPassword.value, confirmationPassword.value)
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
