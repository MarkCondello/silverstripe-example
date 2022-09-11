import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
// import legacy from '@vitejs/plugin-legacy';

// https://vitejs.dev/config/
export default defineConfig({
    plugins: [
        vue(),
        // legacy({
        //     targets: ['defaults', 'not IE 11']
        // })
    ],
    build: {
        emptyOutDir: false,
        outDir: './public/',
        assetsDir: 'build',
        manifest: true,
        rollupOptions: {
            input: './public/javascript/main.js',
        },
    },
    // The vite server needs an unused port and should match that which is set in the siteconfig
    server: {
        port: 8891,
        strictPort: true,
        hmr: {
            protocol: 'ws',
            host: 'localhost',
        },
    },
});
