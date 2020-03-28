require('es6-promise').polyfill();

var gulp          = require('gulp'),
    sass          = require('gulp-sass'),
    sourcemaps    = require('gulp-sourcemaps'); 
    rtlcss        = require('gulp-rtlcss'),
    autoprefixer  = require('gulp-autoprefixer'),
    plumber       = require('gulp-plumber'),
    gutil         = require('gulp-util'),
    notify        = require("gulp-notify");
    rename        = require('gulp-rename'),
    concat        = require('gulp-concat'),
    jshint        = require('gulp-jshint'),
    uglify        = require('gulp-uglify'),
    imagemin      = require('gulp-imagemin'),
    browserSync   = require('browser-sync').create(),
    reload        = browserSync.reload;

var onError = function(error) {
    notify({
            title:    "Gulp Sass",
            subtitle: "Failure!",
            message:  "Error: <%= error.message %>",
            sound:    "Beep"
        }).write(error);

  this.emit('end');
};

// Sass
gulp.task('sass', function() {
  return gulp.src('./sass/**/*.scss')
  .pipe(plumber({ errorHandler: onError }))
  .pipe(sourcemaps.init())
  .pipe(sass({outputStyle: 'compressed'}))
  .pipe(autoprefixer({ overrideBrowserslist: ['last 10 versions'] }))
  .pipe(sourcemaps.write('.'))
  .pipe(gulp.dest('.'))
  .pipe(notify({
                title: 'SASS Files Complete',
                message: 'Yay!',
                onLast: true
            }))
});

// JavaScript
gulp.task('js', function() {
  return gulp.src(['./js/*.js'])
  .pipe(jshint())
  .pipe(jshint.reporter('default'))
  .pipe(concat('app.js'))
  .pipe(rename({suffix: '.min'}))
  .pipe(uglify())
  .pipe(gulp.dest('./js'));
});

// Images
gulp.task('images', function() {
  return gulp.src('./images/src/*')
  .pipe(plumber({ errorHandler: onError }))
  .pipe(imagemin({ optimizationLevel: 7, progressive: true }))
  .pipe(gulp.dest('./images/dist'));
});

// Watch
gulp.task('watch', function() {
  browserSync.init({
    files: ['./**/*.php'],
    proxy: 'alexorto.loc',
  });
  gulp.watch('./sass/**/*.scss', ['sass', reload]);
  //gulp.watch('./js/*.js', ['js', reload]);
  //gulp.watch('images/src/*', ['images', reload]);
});

gulp.task('default', ['sass', 'watch']);
//gulp.task('default', ['sass', 'js', 'images', 'watch']);
