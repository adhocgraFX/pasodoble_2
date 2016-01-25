// Include gulp
var gulp = require('gulp');

// Include our plugins
var uglify = require('gulp-uglify');
var minifyCSS = require('gulp-minify-css');
var concat = require('gulp-concat');
var less = require('gulp-less');
var sourcemaps = require('gulp-sourcemaps');
var autoprefix = require('gulp-autoprefixer');
var convertEncoding = require('gulp-convert-encoding');
var notify = require('gulp-notify');
var livereload = require('gulp-livereload');


// hello world
gulp.task('hello', function() {
    console.log('Hello world!');
});


// JAVASCRIPT
gulp.task('script', function () {
    return gulp.src([
        // JS plugin files
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
        'js/doubletaptogo.min.js',
        // prism code highlighting
        'js/prism.js'
    ])
        .pipe(uglify())
        .pipe(concat('app.js'))
        .pipe(convertEncoding({to: 'utf8'}))
        .pipe(gulp.dest('dist'))
        .pipe(notify({message:'app.js erfolgreich destilliert, hicks'}));
});


// LESS TO CSS
gulp.task('style', function () {
    return gulp.src([
        'less/j-template.less'
    ])
        .pipe(sourcemaps.init())
        .pipe(less())
        .pipe(autoprefix('last 10 versions', 'ie 9', 'ie 8'))
        .pipe(minifyCSS())
        .pipe(concat('style.css'))
        .pipe(sourcemaps.write('map'))
        .pipe(gulp.dest('dist'))
        .pipe(notify({message:'style.css erfolgreich destilliert, hicks'}));
});

gulp.task('basic', function () {
    return gulp.src([
            'less/j-basic-template.less'
        ])
        .pipe(sourcemaps.init())
        .pipe(less())
        .pipe(autoprefix('last 10 versions', 'ie 9', 'ie 8'))
        .pipe(minifyCSS())
        .pipe(concat('basic.css'))
        .pipe(sourcemaps.write('map'))
        .pipe(gulp.dest('dist'))
        .pipe(notify({message:'basic.css erfolgreich destilliert, hicks'}));
});

gulp.task('print', function () {
    return gulp.src([
        'less/print.less'
    ])
        .pipe(less())
        .pipe(autoprefix('last 10 versions', 'ie 9', 'ie 8'))
        .pipe(minifyCSS())
        .pipe(concat('print.css'))
        .pipe(gulp.dest('dist'))
        .pipe(notify({message:'print.css erfolgreich destilliert, hicks'}));
});


// WATCH
gulp.task('watch', function(){
    // chrome > livereload plugin required
    livereload.listen();

    // TEMPLATE FILES
    gulp.watch('js/**/*.js',['script']).on('change', livereload.changed);
    gulp.watch('less/**/*.less',['style', 'basic', 'print']).on('change', livereload.changed);
});


// DEFAULT TASK
gulp.task('default', ['script', 'style', 'basic', 'print']);


// DEFAULT + WATCH
gulp.task('all', ['script', 'style', 'basic', 'print', 'watch']);