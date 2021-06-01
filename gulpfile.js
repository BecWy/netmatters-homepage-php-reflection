
// // //NOTES////////////
// // // .pipe is a bit like .then in regular JS
// // // series will complete one after the other
// // // parallel completes simultaneously


// const gulp = require('gulp');
// //const imagemin = require('gulp-imagemin');
// const concat = require('gulp-concat');
// const terser = require('gulp-terser');
// const sourcemaps = require('gulp-sourcemaps');
// const sass = require('gulp-sass');
// //sass.compiler = require('node-sass');
// //const sassPartialsImported = require('gulp-sass-partials-imported'); // Import Sass partials
// const postcss = require('gulp-postcss');
// const cssnano = require('cssnano');
// //const autoprefixer = require('autoprefixer');
// const babel = require("gulp-babel");
// const plumber = require("gulp-plumber");
// const { src, series, parallel, dest, watch } = require('gulp');

// const jsPath = './js/*.js'; //'./src/js/*.js'
// const cssPath = './css/*.css'; //'./src/css/*.css';
// const scssPath = './sass/*.scss';
// //const babelPath = //'./src/js/*.js';

// //For the HTML don't need a plugin
// // function copyHTML() {
// //     return src('./src/*.html').pipe(gulp.dest('./dist'));
// // }

// // function imgTask() {
// //     return src('./src/img/*').pipe(imagemin()).pipe(gulp.dest('./dist/img'));
// // }

// //minifies the JS
// function jsTask() {
//     return src(jsPath)
//     .pipe(sourcemaps.init()) //initialises a plugin that builds a sourcemap
//     .pipe(concat('all.js'))  //plugin that will concat files to the output file all.js
//     .pipe(terser())          // plugin that minifies JS, it's a popular & efficient minifier. Alternatives inlcude babel-minify which is built using the Babel toolchain. Another alternative is gulp-uglify but not recommended as doesn't minify ES6 (or didn't when video made)
//     .pipe(babel({presets: [["@babel/env", {modules: false}]]})) // Transpile the JS code using Babel's preset-env.
//     .pipe(sourcemaps.write('.')) //the sourcemap writes after the other plugins have done their thing
//     .pipe(dest('./dist/js'));  //the output is saved in the dist JS folder
// }

// // Convert Sass to CSS
// function scssTask() {
//     return src(scssPath)
//       //.pipe(sourcemaps.init()) //initialises a plugin that builds a sourcemap
//       //.pipe(concat('style.css')) //plugin that will concat files to the output file style.css
//       //.pipe(sassPartialsImported('./sass/*/*.scss'))
//       //.pipe(cache(sass({ includePaths: './sass/*/*.scss'}).on('error', sass.logError)))
//       .pipe(sass().on('error', sass.logError))
//       //.pipe(sourcemaps.write('.'))
//       .pipe(dest('./css'));
// }




// //minifies the CSS
// //NB because I have postcss9 the autoprefixer function won't work because it needs postcss8
// //I've disabled the autoprefixer for now because of this
// function cssTask() {
//     return src(cssPath)
//     .pipe(sourcemaps.init()) //initialises a plugin that builds a sourcemap
//     .pipe(concat('style.css')) //plugin that will concat files to the output file style.css
//     .pipe(postcss([cssnano()])) // REMOVED FROM [] // autoprefixer(), the postcss plugin is using  two other plugins. autoprefixer adds prefixes and cssnano minifies.
//     .pipe(sourcemaps.write('.')) //the sourcemap writes after the other plugins have done their thing
//     .pipe(dest('./dist/css')); //the output is saved in the dist CSS folder
// }

// //BABEL - works, but would need to work out whether babel happens before or after the js files are minified by terser
// // function babelTask() {
// //     return src(babelPath)
// //         .pipe(plumber()) // Stop the process if an error is thrown.
// //         .pipe(babel({presets: [["@babel/env", {modules: false}]]})) // Transpile the JS code using Babel's preset-env.
// //         .pipe(dest("./dist/babel")) // Save each component as a separate file in dist.
// //   }

// //WATCH TASK
// function watchTask() {
//     watch([scssPath, cssPath, jsPath], {interval: 1000}, series(scssTask, cssTask, jsTask));
    
//     //watch([scssPath, cssPath, jsPath], {interval: 1000}, parallel(series(scssTask, cssTask), jsTask));
//     // watch([scssPath, cssPath, jsPath], {interval: 1000}, parallel(series(scssTask, cssTask), jsTask));
//     // watch('sass/*.scss', scssTask);
// }



// //exports.babelTask = babelTask;
// exports.scssTask = scssTask;
// exports.cssTask = cssTask;
// exports.jsTask = jsTask;
// exports.watchTask = watchTask;
// //exports.imgTask = imgTask;
// //exports.copyHTML = copyHTML;
// exports.default = series(scssTask, cssTask, jsTask, watchTask); //removed from the start copyHTML, imgTask. Also removed an inset parallel
