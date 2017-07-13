var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cleanCSS = require('gulp-clean-css'),
    include = require('gulp-include'),
    watch = require('gulp-watch');


gulp.task('default', function() {
});

gulp.task('styles', function () {
  return gulp.src('./dev/styles/style.scss')
    .pipe(sass().on('error', sass.logError))
      .pipe( include() )
      .pipe(cleanCSS({
          keepSpecialComments: 1
      }))
    .pipe(gulp.dest('./'));
});

gulp.task('scripts', function() {
    gulp.src(['./dev/scripts/scripts.js'])
        .pipe( include() )
        .pipe( gulp.dest("./") );
});

gulp.task('watch', function () {
    gulp.watch('./dev/styles/*.scss', ['sass'] );
    gulp.watch('./dev/scripts/*.js', ['scripts'] );
});

gulp.task('default', ['scripts', 'styles']);
