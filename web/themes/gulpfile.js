var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('hello', function(done) {
    console.log('Hello Zell');done();
  });

  gulp.task('sass', function() {
    return gulp.src('custom/sportstheme/sass/*.scss') // Gets all files ending with .scss in app/scss and children dirs
      .pipe(sass())
      .pipe(gulp.dest('custom/sportstheme/css'))
  })