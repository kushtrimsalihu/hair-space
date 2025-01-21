import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: "resources/js/app.js",
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            "@": "/resources/js", // Make sure this path points to the correct directory
        },
    },
    server: {
        host: "127.0.0.1", // Ensure Vite listens on 127.0.0.1
        port: 5173,
        strictPort: true, // Ensures the port is fixed
        cors: {
            origin: "http://127.0.0.1:8000", // Allow requests from Laravel backend
            methods: ["GET", "POST", "PUT", "DELETE"],
            allowedHeaders: ["Content-Type"],
        },
    },
});
