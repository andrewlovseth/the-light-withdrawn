import gulp from "gulp";
import dartSass from "gulp-dart-sass";
import sourcemaps from "gulp-sourcemaps";
import autoprefixer from "gulp-autoprefixer";
import browserSyncPackage from "browser-sync";

const browserSync = browserSyncPackage.create();

function errorlog(err) {
    console.error(err.message);
    this.emit("end");
}

function style() {
    return gulp
        .src("scss/style.scss")
        .pipe(dartSass().on("error", errorlog))
        .pipe(autoprefixer())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest("./"))
        .pipe(browserSync.stream());
}

function watch() {
    browserSync.init({
        proxy: "https://lightwithdrawn.local/",
    });

    gulp.watch("./scss/**/*.scss", style);
    gulp.watch("./*.php").on("change", browserSync.reload);
    gulp.watch("./components/**/*.php").on("change", browserSync.reload);
    gulp.watch("./templates/**/*.php").on("change", browserSync.reload);
    gulp.watch("./js/**/*.js").on("change", browserSync.reload);
}

export { style, watch };
