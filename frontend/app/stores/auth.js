import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', {
   // State (Save Data)
   state: () => ({
      token: null,
      admin: null,
   }),

   // Getters (Take Data From State)
   getters: {
      isAuthenticated: (state) => !!state.token,
      getAdmin: (state) => state.admin,
   },

   // Actions (Function To Change Data)
   actions: {
      // Login
      async login(email, password) {
         try {
            const config = useRuntimeConfig()

            const response = await fetch(`${config.public.apiKey}/login`, {
               method: 'POST',
               headers: {
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: JSON.stringify({
                  email: email,
                  password: password,
               }),
            })

            const data = await response.json()

            if (!response.ok) {
               throw new Error(data.error || data.message || 'Login gagal!')
            }

            this.token = data.token
            this.admin = data.admin
            localStorage.setItem('token', data.token)
            localStorage.setItem('admin', JSON.stringify(data.admin))

            return data
         } catch (error) {
            throw error
         }
      },

      // Logout
      async logout() {
         const config = useRuntimeConfig()

         await fetch(`${config.public.apiKey}/logout`, {
            method: 'POST',
            headers: {
               'Content-Type': 'application/json',
               Accept: 'application/json',
               Authorization: `Bearer ${this.token}`,
            },
            credentials: 'include',
         })

         this.token = null
         this.admin = null

         localStorage.removeItem('token')
         localStorage.removeItem('admin')
      },

      // Verify Email
      async verifyEmail(email) {
         try {
            const config = useRuntimeConfig()
            const response = await fetch(`${config.public.apiKey}/verifyEmail`, {
               method: 'POST',
               headers: {
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: JSON.stringify({
                  email: email,
               }),
            })
            const data = await response.json()
            if (!response.ok) {
               throw new Error(data.error || data.message || 'Verifikasi email gagal!')
            }
            return data
         } catch (error) {
            throw error
         }
      },

      // Verify OTP
      async verifyOtp(email, otpCode) {
         try {
            const config = useRuntimeConfig()
            const response = await fetch(`${config.public.apiKey}/verifyOtp`, {
               method: 'POST',
               headers: {
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: JSON.stringify({
                  email: email,
                  otp: otpCode,
               }),
            })
            const data = await response.json()
            if (!response.ok) {
               throw new Error(data.error || data.message || 'Verifikasi OTP gagal!')
            }
            return data
         } catch (error) {
            throw error
         }
      },

      // Change Password
      async changePassword(email, newPassword, confirmationPassword) {
         try {
            const config = useRuntimeConfig()
            const response = await fetch(`${config.public.apiKey}/changePassword`, {
               method: 'POST',
               headers: {
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: JSON.stringify({
                  email: email,
                  new_password: newPassword,
                  confirmation_password: confirmationPassword,
               }),
            })
            const data = await response.json()
            if (!response.ok) {
               throw new Error(data.error || data.message || 'Ubah password gagal!')
            }
            return data
         } catch (error) {
            throw error
         }
      },

      // Unblock
      async unblock() {},

      // Redirect
      redirect() {
         const router = useRouter()

         if (!this.admin) {
            router.push('/login')
            return
         }

         if (this.admin.level === 'Admin') {
            router.push('/admin/home')
         } else if (this.admin.level === 'Kasir') {
            router.push('/cashier/home')
         } else {
            router.push('/login')
         }
      },
   },
})
