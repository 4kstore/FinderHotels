var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

var sass_input = ['app/sass/*.scss', 'sass/**/*.scss'];
var sass_output = 'public/css/';

gulp.task('sass', function () {
    gulp.src(sass_input)
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(autoprefixer())
        .pipe(gulp.dest(sass_output));
});

gulp.task('sass-watch', function() {
	gulp.start('sass');
	return gulp
		.watch(sass_input, ['sass'])
		.on('change', function(event) {
		  console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
	});
});

// Default task
gulp.task('default', function () {
    gulp.start('sass');
});