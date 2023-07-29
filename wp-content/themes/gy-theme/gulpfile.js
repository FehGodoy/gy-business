const gulp = require("gulp");
const browserSync = require("browser-sync").create();
// const sass        = require('gulp-sass');
const sass = require("gulp-sass")(require("sass"));
const concat = require("gulp-concat");
const terser = require("gulp-terser");
const { src, series, parallel, dest } = require("gulp");
const jsPath = "assets/js/**/*.js";
const scssPath = "assets/scss/**/*.scss";

function scssTask() {
	return src(scssPath)
		.pipe(sass().on("error", sass.logError))
		.pipe(sass({ outputStyle: "compressed" }))
		.pipe(dest("assets/min/css"))
		.pipe(browserSync.stream());
}

function jsTask() {
	return src(jsPath)
		.pipe(concat("all.min.js"))
		.pipe(terser())
		.pipe(dest("assets/min/js/"))
		.pipe(browserSync.stream());
}

function watchTask() {
	browserSync.init({
		proxy: "http://localhost/sites/gy-business/", //altere aqui para a pasta que está seu servidor local xampp ou outro
		browser: "Chrome",
		notify: false,
	});
	gulp.watch(scssPath, scssTask);
	gulp.watch(jsPath, jsTask);
	gulp.watch("./*.php").on("change", browserSync.reload);
	gulp.watch(scssPath).on("change", browserSync.reload);
	gulp.watch(jsPath).on("change", browserSync.reload);
}

exports.scssTask = scssTask;
exports.jsTask = jsTask;
exports.watchTask = watchTask;
exports.default = series(parallel(jsTask, scssTask), watchTask);
