import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/js/delete.js",
                "resources/js/welcome.js",
                "resources/css/welcome.css",
                "resources/js/datepick.js",
                "resources/js/totalCalculate.js",
            ],
            refresh: true,
        }),
    ],
});
