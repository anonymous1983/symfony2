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
    gutil = require('gulp-util'),
    CONFIG = require('./.gulpfilec');

// /////////////////////////////////////////////////////////////////
// Script Task
// /////////////////////////////////////////////////////////////////
var fnScript = function () {
    gulp.src(CONFIG.PATH.src.js)
        .pipe(rename({suffix: '.min'}))
        .pipe(concat('script.js'))
        .pipe(gulp.dest(CONFIG.PATH.dist.js))
        .pipe(uglify())
        .pipe(concat('script.min.js'))
        .pipe(gulp.dest(CONFIG.PATH.dist.js));
};
gulp.task('scripts', fnScript());

// /////////////////////////////////////////////////////////////////
// Less Task
// /////////////////////////////////////////////////////////////////
var fnLess = function () {
    gulp.src(CONFIG.PATH.src.less)
        .pipe(concat('style.less'))
        .pipe(gulp.dest(CONFIG.PATH.dist.less))
        .pipe(less())
        .pipe(gulp.dest(CONFIG.PATH.dist.css))
        .pipe(less({
            compress: true
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(CONFIG.PATH.dist.css));
};
gulp.task('less', fnLess());

// /////////////////////////////////////////////////////////////////
// Build Task
// /////////////////////////////////////////////////////////////////

var fnBuild = {
    clean: function (cb) {
        del(CONFIG.PATH.clean, cb);
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
    del(CONFIG.PATH.clean).then(function () {
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
    //gulp.watch(CONFIG.PATH.src.js, ['scripts']);
    //gulp.watch(CONFIG.PATH.src.less, ['less']);
    //@ bug symfony cache ::
    gulp.watch(CONFIG.PATH.src.watch, ['build']);
});

// /////////////////////////////////////////////////////////////////
// Default Task
// /////////////////////////////////////////////////////////////////
gulp.task('default', ['build', 'watch']);