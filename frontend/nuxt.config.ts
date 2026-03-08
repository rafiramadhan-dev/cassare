import tailwindcss from "@tailwindcss/vite";

export default defineNuxtConfig({
  compatibilityDate: "2025-07-15",
  devtools: { enabled: true },

  // Tailwind
  css: ["@/assets/css/tailwind.css"],
  vite: {
    plugins: [tailwindcss()],
  },

  // Modules
  modules: ["@pinia/nuxt", "@nuxt/ui"],

  // URL
  runtimeConfig: {
    public: {
      apiKey: "",
      baseKey: "",
    },
  },
});
