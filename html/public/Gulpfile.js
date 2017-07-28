var gulp        = require('gulp'),
    concat      = require('gulp-concat'),
    less        = require('gulp-less'),
    minifyCSS   = require('gulp-minify-css'),
    path        = require('path'),
    concatCss   = require('gulp-concat-css'),
    sourcemaps  = require('gulp-sourcemaps');

gulp.task('less',function() {
    gulp.src('./js/components/bootstrap-select/less/**/*.less')
        .pipe(less({
            paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(gulp.dest('./css/libs'));
});

gulp.task('concat-css',['less'],function() {
    gulp.src('./css/**/*.css')
        .pipe(concatCss('bundle.css'))
        .pipe(gulp.dest('./css'))
});

gulp.task('minify-css',['concat-css'], function() {
    gulp.src('css/bundle.css')
        .pipe(minifyCSS())
        .pipe(gulp.dest('./css'));
});

gulp.task('concatJSLibs', function() {
    gulp.src(
        [
            './js/default.js',
            './js/components/bootstrap-select/js/bootstrap-select.js'
        ])
        .pipe(sourcemaps.init())
        .pipe(concat('bundle.js'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./js'));
});