const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const sourcemaps = require('gulp-sourcemaps');

// Paths
const paths = {
    scss: './assets/scss/styles.scss',
    css: './assets/css/'
};

// Compile SCSS
function compileSCSS() {
    return gulp.src(paths.scss) // Source files
        .pipe(sourcemaps.init()) // Initialize sourcemaps
        .pipe(sass().on('error', sass.logError)) // Compile SCSS
        .pipe(postcss([autoprefixer(), cssnano()])) // Process with PostCSS
        .pipe(sourcemaps.write('./')) // Write sourcemaps
        .pipe(gulp.dest(paths.css)); // Output destination
}

// Watch for changes
function watchFiles() {
    gulp.watch(paths.scss, compileSCSS); // Watch SCSS files and compile on change
}

// Define tasks
exports.compile = compileSCSS;
exports.watch = gulp.series(compileSCSS, watchFiles);
exports.default = gulp.series(compileSCSS, watchFiles);
