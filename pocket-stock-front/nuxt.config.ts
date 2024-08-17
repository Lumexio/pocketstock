// https://nuxt.com/docs/api/configuration/nuxt-config
import vuetify, { transformAssetUrls } from 'vite-plugin-vuetify';

export default defineNuxtConfig({
  compatibilityDate: '2024-04-03',
  css: ['vuetify/styles'],
  router: {
    options: {
      scrollBehaviorType: 'smooth',
    },
  },
  devtools: { enabled: true },
  vueQuery: {
    stateKey: 'vue-query-nuxt',
    queryClientOptions: {
      defaultOptions: {
        queries: {
          staleTime: 1000 * 60 * 5,

          refetchOnWindowFocus: false,
        },
      }, // default
    },
  },
  runtimeConfig: {
    public: {
      baseUrl: process.env.NUXT_PUBLIC_BASE_URL,
    },
  },
  components: [
    {
      path: '~/components',
      pathPrefix: false,
    },
  ],
  build: {
    transpile: ['vuetify'],
  },
  snackbar: {
    bottom: true,
    right: true,
    duration: 3000,
  },
  modules: [
    (_options, nuxt) => {
      nuxt.hooks.hook('vite:extendConfig', (config) => {
        // @ts-expect-error
        config.plugins.push(vuetify({ autoImport: true }));
      });
    },

    '@pinia/nuxt',
    'nuxt-snackbar',
    '@pinia-plugin-persistedstate/nuxt',
    '@hebilicious/vue-query-nuxt',
    //...
  ],
});
