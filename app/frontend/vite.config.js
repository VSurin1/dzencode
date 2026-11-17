import vue from '@vitejs/plugin-vue'
import { defineConfig } from 'vite'

export default defineConfig({
  plugins: [vue()],
  server: {
    host: '0.0.0.0',
    port: 5173,
    strictPort: true,
    allowedHosts: ['dzencode.loc.com'],
    hmr: {
      protocol: 'wss',
      host: 'dzencode.loc.com',
      clientPort: 443,
    },
  },
})
