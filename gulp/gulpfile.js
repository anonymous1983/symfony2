'use strict';

// /////////////////////////////////////////////////////////////////
// Required
// /////////////////////////////////////////////////////////////////
var gulp        = require('gulp'),
    uglify      = require('gulp-uglify'),
    rename      = require('gulp-rename'),
    less        = require('gulp-less'),
    del         = require('del'),
    plumber     = require('gulp-plumber'),
    concat      = require('gulp-concat');


// /////////////////////////////////////////////////////////////////
// Script Task
// /////////////////////////////////////////////////////////////////
gulp.task('scripts', function(){
  gulp.src('www/js/**/*.js')
  .pipe(plumber())
  .pipe(rename({suffix: '.min'}))
  .pipe(concat('script.js'))
  .pipe(gulp.dest('dist/js'))
  .pipe(uglify())
  .pipe(concat('script.min.js'))
  .pipe(plumber.stop())
  .pipe(gulp.dest('dist/js'));
});

// /////////////////////////////////////////////////////////////////
// Less Task
// /////////////////////////////////////////////////////////////////
gulp.task('less', function(){
  gulp.src('www/less/**/*.less')
  .pipe(plumber())
  .pipe(concat('style.less'))
  .pipe(gulp.dest('dist/less'))
  .pipe(less())
  .pipe(gulp.dest('dist/css'))
  .pipe(less({
    compress: true
    }))
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest('dist/css'));
});

// /////////////////////////////////////////////////////////////////
// Build Task
// /////////////////////////////////////////////////////////////////

// Clear out all files and folders from build folder
gulp.task('build:clean', function(cb){
  del([
    'dist/**'
    ], cb)
});

// Task to creat build directory for all files
gulp.task('build:copy', ['build:clean'], function(){
  return gulp.src('www/**/*')
        .pipe(gulp.dest('build'));
});


// /////////////////////////////////////////////////////////////////
// Watch Task
// /////////////////////////////////////////////////////////////////
gulp.task('watch', function(){
  gulp.watch('www/js/**/*.js', ['scripts']);
});

// /////////////////////////////////////////////////////////////////
// Default Task
// /////////////////////////////////////////////////////////////////
gulp.task('default', ['scripts', 'less', 'watch']);



