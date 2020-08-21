const
	gulp		= require("gulp"),
	sourcemaps	= require("gulp-sourcemaps"),
	concat		= require("gulp-concat"),
	deporder	= require("gulp-deporder"),
	uglify		= require("gulp-uglify");

const paths = {
	src:	"js/src/**/*.js",
};

function js()
{
	return gulp.src(paths.src)
		.pipe(sourcemaps.init())
		// NB: Example shows deporder *after* concat
		.pipe(deporder())
		.pipe(concat("main.js"))
		.pipe(uglify())
		.pipe(sourcemaps.write("."))
		.pipe(gulp.dest("js/dist"));
}

const watch = () => gulp.watch(
	paths.src, js
);

const dev = gulp.series(js, watch);

exports.default = dev;