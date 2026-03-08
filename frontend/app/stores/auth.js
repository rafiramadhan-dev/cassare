import { defineStore } from "pinia";

export const useAuthStore = defineStore("auth", {
  // State adalah untuk tempat simpan data
  state: () => ({
    token: null,
    admin: null,
  }),

  // Getters adalah untuk mengambil data dari State
  getters: {
    isAuthenticated: (state) => !!state.token,
    getAdmin: (state) => state.admin,
  },

  // Actions adalah untuk function ubah data
  actions: {
    // Login
    async login(email, password) {
      try {
        const config = useRuntimeConfig();

        const response = await fetch(`${config.public.api}/login`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
          },
          credentials: "include",
          body: JSON.stringify({
            email_admin: email,
            password_admin: password,
          }),
        });

        const data = await response.json();

        if (!response.ok) {
          throw new Error(data.error || data.message || "Login gagal!");
        }

        this.token = data.token;
        this.admin = data.admin;
        localStorage.setItem("token", data.token);
        localStorage.setItem("admin", JSON.stringify(data.admin));

        return data;
      } catch (error) {
        throw error;
      }
    },

    // Logout
    async logout() {
      const config = useRuntimeConfig();

      await fetch(`${config.public.api}/logout`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          Authorization: `Bearer ${this.token}`,
        },
        credentials: "include",
      });

      this.token = null;
      this.admin = null;

      localStorage.removeItem("token");
      localStorage.removeItem("admin");
    },

    // Verify Email
    async verifyEmail(email) {
      try {
        const config = useRuntimeConfig();
        const response = await fetch(`${config.public.api}/verifyEmail`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
          },
          credentials: "include",
          body: JSON.stringify({
            email_admin: email,
          }),
        });
        const data = await response.json();
        if (!response.ok) {
          throw new Error(
            data.error || data.message || "Verifikasi email gagal!",
          );
        }
        return data;
      } catch (error) {
        throw error;
      }
    },

    // Change Password
    async changePassword(email, passwordBaru, konfirmasiPassword) {
      try {
        const config = useRuntimeConfig();
        const response = await fetch(`${config.public.api}/changePassword`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
          },
          credentials: "include",
          body: JSON.stringify({
            email_admin: email,
            password_baru: passwordBaru,
            konfirmasi_password: konfirmasiPassword,
          }),
        });
        const data = await response.json();
        if (!response.ok) {
          throw new Error(data.error || data.message || "Ubah password gagal!");
        }
        return data;
      } catch (error) {
        throw error;
      }
    },

    // Unblock
    async unblock() {},

    // Redirect
    redirect() {
      const router = useRouter();

      if (!this.admin) {
        router.push("/login");
        return;
      }

      if (this.admin.level_admin === "Admin") {
        router.push("/admin/beranda");
      } else if (this.admin.level_admin === "Kasir") {
        router.push("/kasir/beranda");
      } else {
        router.push("/login");
      }
    },
  },
});
