// VARIABLES
var gulp = require('gulp');
var uglify = require('gulp-uglify');
var minifyCSS = require('gulp-minify-css');
var concat = require('gulp-concat');
var less = require('gulp-less');
var autoprefix = require('gulp-autoprefixer');
var convertEncoding = require('gulp-convert-encoding');
var notify = require('gulp-notify');
var useref = require('gulp-useref');

// hello world
gulp.task('hello', function() {
    console.log('Hello world!');
});

// WATCH
gulp.task('watch', ['script', 'style', 'print'], function(){
    // TEMPLATE FILES
    gulp.watch('js/**/*.js',['script']);
    gulp.watch('less/**/*.css',['style']);
    gulp.watch('less/**/*.css',['print']);
});

// JAVASCRIPT
gulp.task('script', function () {
    return gulp.src([
        // textresizer
        'js/jquery.cookie.min.js',
        'js/jquery.textresizer.min.js',
        // formstone lightbox > modal windows und image galeries
        'js/core.js',
        'js/transition.js',
        'js/touch.js',
        'js/lightbox.js',
        // flickity by dessandro
        'js/flickity.pkgd.min.js',
        // doubletaptogo > hover lösung für drop downs
        'js/doubletaptogo.min.js'
    ])
        .pipe(uglify())
        .pipe(concat('app.js'))
        .pipe(convertEncoding({to: 'utf8'}))
        .pipe(gulp.dest('dist'))
        .pipe(notify({message:'app.js erfolgreich destilliert, hicks'}));
});

// LESS TO CSS
gulp.task('style', function () {
    gulp.src([
        'less/j-template.less'
    ])
        .pipe(less())
        .pipe(autoprefix('last 10 versions', 'ie 9', 'ie 8'))
        .pipe(minifyCSS())
        .pipe(concat('style.css'))
        .pipe(gulp.dest('dist'))
        .pipe(notify({message:'style.css erfolgreich destilliert, hicks'}));
});

gulp.task('print', function () {
    gulp.src([
        'less/print.less'
    ])
        .pipe(less())
        .pipe(autoprefix('last 10 versions', 'ie 9', 'ie 8'))
        .pipe(minifyCSS())
        .pipe(concat('print.css'))
        .pipe(gulp.dest('dist'))
        .pipe(notify({message:'print.css erfolgreich destilliert, hicks'}));
});