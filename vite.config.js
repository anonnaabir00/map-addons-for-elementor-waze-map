import { defineConfig } from 'vite'
import path from 'path'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  plugins: [
    vue(),
  ],
  build: {
    minify: true,
    manifest: false,
    rollupOptions: {
      input: {
      'main': path.resolve(__dirname, 'src/main.js'),
      'slider': path.resolve(__dirname, 'src/slider.js'),
      'app': path.resolve(__dirname, 'src/style.css'),
      },

        output:{
          dir: 'includes/assets',
          watch: true,
          entryFileNames: '[name].js',
          assetFileNames: '[name].[ext]',
          manualChunks: undefined,
        },

    }
  }
})