const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js/intact.js')
 //.webpackConfig(
 // {
 //       output: {
 //           library: 'MyLibrary', // The global variable name
 //           libraryTarget: 'umd', // Use UMD
 //           umdNamedDefine: true // Use named AMD modules
 //       },
 //       externals: {
 //           // Specify any external dependencies if needed
 //            'vue': 'Vue', // Uncomment if using Vue
 //       }
 //   }
//   )
.vue();

mix.sass('resources/scss/app.scss', 'public/css', [
        //
    ]);
    //mix.js('resources/js/intact.js', 'dist').vue();