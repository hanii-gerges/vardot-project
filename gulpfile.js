const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
//compile scss into css
function frontendStyle() {
    return gulp.src('src/scss/**/*.scss')
    .pipe(sass().on('error',sass.logError))
    .pipe(gulp.dest('src/css'))
    .pipe(browserSync.stream());
}

function backendStyle() {
    return gulp.src('src/admin/assets/scss/**/*.scss')
    .pipe(sass().on('error',sass.logError))
    .pipe(gulp.dest('src/admin/assets/css'))
    .pipe(browserSync.stream());
}

function watch() {
    browserSync.init({
        server: {
           baseDir: "./src",
           index: "/index.html"
        }
    });
    gulp.watch('src/scss/**/*.scss', frontendStyle)
    gulp.watch('src/*.html').on('change',browserSync.reload)
    gulp.watch('src/js/**/*.js').on('change', browserSync.reload)
    gulp.watch('src/admin/**/*.html').on('change',browserSync.reload)
    gulp.watch('src/admin/assets/**/*.scss', backendStyle)
    gulp.watch('src/admin/assets/js/**/*.js').on('change', browserSync.reload);

}
exports.frontendStyle = frontendStyle;
exports.backendStyle = backendStyle;
exports.watch = watch;