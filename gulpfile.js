var gulp = require('gulp');

gulp.task('default', function () {
    gulp.src('node_modules/gentelella/documentation/**')
        .pipe(gulp.dest('public/assets/gentelella/dcoumentation/'));
    gulp.src('node_modules/gentelella/vendors/**')
        .pipe(gulp.dest('public/assets/gentelella/vendors/'));
    gulp.src('node_modules/gentelella/production/**')
        .pipe(gulp.dest('public/assets/gentelella/production/'));
});