var babelify = require('babelify');
var browserify = require('browserify');
var buffer = require('vinyl-buffer');
var del = require('del');
var gulp = require('gulp');
var imagemin = require('gulp-imagemin');
var gulpif = require('gulp-if');
var minifyCSS = require('gulp-csso');
var sass = require('gulp-sass');
var source = require('vinyl-source-stream');
var sourcemaps = require('gulp-sourcemaps');
var sync = require('browser-sync').create();
var uglify = require('gulp-uglify');
var pxtorem = require('gulp-pxtorem');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');




/////////////
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');

var processors = [
  autoprefixer
];
////////////////

var isProd = process.env.NODE_ENV === 'production';
var dist = "dist";

/**
 * SCSS
 */

function scss() {
    return gulp.src('src/scss/main.scss')
        .pipe(plumber())
        .pipe(gulpif(!isProd, sourcemaps.init()))
        .pipe(sass())
        .pipe(pxtorem())
        .pipe(gulpif(isProd, minifyCSS()))
        .pipe(postcss(processors))
        .pipe(gulpif(!isProd, sourcemaps.write('.')))
        .pipe(gulp.dest(dist + '/css'))
        .pipe(sync.stream())
}

/**
 * JS
 */

function js() {
    return browserify({
            entries: ['src/js/main.js'],
            debug: true
        })
        .transform(babelify, {
            presets: 'es2015'
        })
        .bundle()
        .on('error', notify.onError({
            title: "Compile Error",
            message: "<%= error.message %>"
        }))
        .pipe(source('index.js'))
        .pipe(buffer())
        .pipe(gulpif(!isProd, sourcemaps.init({
            loadMaps: true
        })))
        .pipe(uglify())
        .pipe(gulpif(!isProd, sourcemaps.write('.')))
        .pipe(gulp.dest(dist + '/js'))
        .pipe(sync.stream());
};

/**
 * BOOTSTRAP
 

function bootstrapJs() {
  return gulp.src('wp-content/themes/bikerLover/src/js/bootstrap.min.js')
    .pipe(gulp.dest('wp-content/themes/bikerLover/dist/js/'));
}

function bootstrapCss() {
  return gulp.src('wp-content/themes/bikerLover/src/scss/bootstrap.min.css')
    .pipe(gulp.dest('wp-content/themes/bikerLover/dist/css/'));
}
*/
/**
 * IMAGES
 */

function images() {
    return gulp.src('src/img/**/*')
        .pipe(gulpif(isProd, imagemin({
            verbose: true
        })))
        .pipe(gulp.dest(dist + '/img'));
}

/**
 * FONTS
 */

function fonts() {
    return gulp.src('src/fonts/**/*')
        .pipe(gulp.dest(dist + '/fonts'));
}

/**
 * GLOBAL
 */

function clean() {
    return del(['dist']);
}

gulp.task('clean', clean);

gulp.task('build', gulp.series(clean, gulp.parallel(scss, js, images, fonts)));

gulp.task('default', gulp.parallel(scss, js, images, fonts, function (done) {
    sync.init({
        //   server: {
        //   baseDir: '.wp-content/themes/bikerLover/dist'
        // },
        proxy: "http://localhost:8000/hetic-p2020-wp-freerotation"
    });

    gulp.watch('src/**/*.scss', scss);
    gulp.watch('src/**/*.js', js);

    done();
}));