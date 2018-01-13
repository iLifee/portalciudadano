let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js([
	// 'resources/assets/js/axios.js',
	'resources/assets/js/app.js',
	// 'resources/assets/js/humanized_time_span.js',
	], 'public/js/app.js');

mix.styles([
	'resources/assets/css/bootstrap.css',
	'resources/assets/css/toastr.css',
], 'public/css/main.css');