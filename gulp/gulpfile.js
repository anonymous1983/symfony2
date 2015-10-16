'use strict';

// /////////////////////////////////////////////////////////////////
// Required
// /////////////////////////////////////////////////////////////////
var gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    less = require('gulp-less'),
    del = require('del'),
    concat = require('gulp-concat'),
    gutil = require('gulp-util');


// /////////////////////////////////////////////////////////////////
// Script Task
// /////////////////////////////////////////////////////////////////
var fnScript = function () {
    gulp.src('www/js/**/*.js')
        .pipe(rename({suffix: '.min'}))
        .pipe(concat('script.js'))
        .pipe(gulp.dest('dist/js'))
        .pipe(uglify())
        .pipe(concat('script.min.js'))
        .pipe(gulp.dest('dist/js'));
};
gulp.task('scripts', fnScript());

// /////////////////////////////////////////////////////////////////
// Less Task
// /////////////////////////////////////////////////////////////////
var fnLess = function () {
    gulp.src('www/less/**/*.less')
        .pipe(concat('style.less'))
        .pipe(gulp.dest('dist/less'))
        .pipe(less())
        .pipe(gulp.dest('dist/css'))
        .pipe(less({
            compress: true
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('dist/css'));
};
gulp.task('less', fnLess());

// /////////////////////////////////////////////////////////////////
// Build Task
// /////////////////////////////////////////////////////////////////

var fnBuild = {
    clean: function (cb) {
        del([
            'dist/**'
        ], cb);
    },
    export: function () {
        // do async stuff
        setTimeout(function () {
            fnScript();
            //gutil.log('Finished \'%s\'',gutil.colors.cyan('script'));
            fnLess();
            //gutil.log('Finished \'%s\'',gutil.colors.cyan('less'));
        }, 1);
    }
};

// Clear out all files and folders from build folder
gulp.task('build:clean', function (callback) {
    del(['dist/**']).then(function () {
        callback();
    });
});

// Task to export src
gulp.task('build:export', ['scripts', 'less']);

// Task to creat build directory for all files
gulp.task('build', ['build:clean'], function () {
    fnBuild.export();
});

// /////////////////////////////////////////////////////////////////
// Watch Task
// /////////////////////////////////////////////////////////////////
gulp.task('watch', function () {
    gulp.watch('www/js/**/*.js', ['scripts']);
    gulp.watch('www/less/**/*.less', ['less']);
});

// /////////////////////////////////////////////////////////////////
// Default Task
// /////////////////////////////////////////////////////////////////
gulp.task('default', ['build', 'watch']);