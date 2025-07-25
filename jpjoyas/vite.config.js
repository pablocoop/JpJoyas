import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  server: {
    host: '0.0.0.0',
    port: 5173,
    strictPort: true,
    cors: {
      origin: [/^https?:\/\/192\.168\.1\.8(?::\d+)?$/],
    },
    hmr: {
      host: '192.168.1.8',
      protocol: 'ws',
      port: 5173,
    },
  },
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
});
