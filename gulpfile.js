var gulp = require('gulp');

gulp.task('default', function () {
    gulp.src('node_modules/gentelella/**')
        .pipe(gulp.dest('public/assets/gentelella/'));
});