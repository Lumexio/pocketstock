// import this after install `@mdi/font` package
import '@mdi/font/css/materialdesignicons.css';

import 'vuetify/styles';
import { createVuetify } from 'vuetify';

export default defineNuxtPlugin((app) => {
  const vuetify = createVuetify({
    theme: {
      defaultTheme: 'system',
      themes: {
        dark: {
          dark: true,
        },

        system: {
          dark: true,
        },
      },
    },
  });
  app.vueApp.use(vuetify);
});
