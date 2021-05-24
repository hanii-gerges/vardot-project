const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
//compile scss into css
function frontendStyle() {
    return gulp.src('public_html/scss/**/*.scss')
    .pipe(sass().on('error',sass.logError))
    .pipe(gulp.dest('public_html/css'))
    .pipe(browserSync.stream());
}

function backendStyle() {
    return gulp.src('public_html/admin/assets/scss/**/*.scss')
    .pipe(sass().on('error',sass.logError))
    .pipe(gulp.dest('public_html/admin/assets/css'))
    .pipe(browserSync.stream());
}

function watch() {
    browserSync.init({
        server: {
           baseDir: "./public_html",
           index: "/index.html"
        }
    });
    gulp.watch('public_html/scss/**/*.scss', frontendStyle)
    gulp.watch('public_html/*.html').on('change',browserSync.reload)
    gulp.watch('public_html/js/**/*.js').on('change', browserSync.reload)
    gulp.watch('public_html/admin/**/*.html').on('change',browserSync.reload)
    gulp.watch('public_html/admin/assets/**/*.scss', backendStyle)
    gulp.watch('public_html/admin/assets/js/**/*.js').on('change', browserSync.reload);

}
exports.frontendStyle = frontendStyle;
exports.backendStyle = backendStyle;
exports.watch = watch;