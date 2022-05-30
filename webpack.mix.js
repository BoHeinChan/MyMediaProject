const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js").postCss(
    "resources/css/app.css",
    "public/css", [require("postcss-import"), require("tailwindcss")]
);

mix.js(
    "./node_modules/bootstrap/dist/js/bootstrap.min.js",
    "./public/bootstrap/js/"
).postCss(
    "./node_modules/bootstrap/dist/css/bootstrap.min.css",
    "./public/bootstrap/css"
);

mix.js(
    "./node_modules/@fortawesome/fontawesome-free/js/all.min.js",
    "./public/fontawesome-free/js"
).postCss(
    "./node_modules/@fortawesome/fontawesome-free/css/all.min.css",
    "./public/fontawesome-free/css"
);

if (mix.inProduction()) {
    mix.version();
}
