import { defineStore } from 'pinia'

export const useCategoryStore = defineStore('category', {
   // State (Save Data)
   state: () => ({
      name: '',
      photo: null,
   }),

   // Actions (Function To Change Data)
   actions: {
      // Get Token
      getToken() {
         return localStorage.getItem('token')
      },

      // Index
      async index() {
         const config = useRuntimeConfig()
         try {
            const response = await fetch(`${config.public.apiKey}/category/index`, {
               method: 'GET',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  Accept: 'application/json',
               },
               credentials: 'include',
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal mengambil data kategori:', error)
         }
      },

      // Store
      async store() {
         const config = useRuntimeConfig()
         try {
            const formData = new FormData()
            formData.append('name', this.name)
            formData.append('photo', this.photo)

            const response = await fetch(`${config.public.apiKey}/category/store`, {
               method: 'POST',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: formData,
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal menambah kategori:', error)
         }
      },

      // Show
      async show(id_category) {
         const config = useRuntimeConfig()
         try {
            const response = await fetch(`${config.public.apiKey}/category/show`, {
               method: 'POST',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: JSON.stringify({ id_category }),
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal mengambil detail kategori:', error)
         }
      },

      // Update
      async update(id_category) {
         const config = useRuntimeConfig()
         try {
            const formData = new FormData()
            formData.append('id_category', id_category)
            formData.append('name', this.name)

            if (this.photo) {
               formData.append('photo', this.photo)
            }

            const response = await fetch(`${config.public.apiKey}/category/update`, {
               method: 'POST',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: formData,
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal memperbarui kategori:', error)
         }
      },

      // Destroy
      async destroy(id_category) {
         const config = useRuntimeConfig()
         try {
            const response = await fetch(`${config.public.apiKey}/category/destroy`, {
               method: 'POST',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: JSON.stringify({ id_category }),
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal menghapus kategori:', error)
         }
      },
   },
})
