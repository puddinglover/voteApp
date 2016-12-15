//Gulp requirements
var	gulp = require('gulp');
var sass = require('gulp-ruby-sass');
var notify = require("gulp-notify");
var nano = require("gulp-cssnano");
var bower = require('gulp-bower');
var concat = require('gulp-concat');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var imageResize = require('gulp-image-resize');
var uglify = require('gulp-uglify');
var browserSync = require('browser-sync').create();

//build path. Change to server location
var build = './dist';

//Config paths.
var	config = {
	bowerDir: './bower_components',
    sassPath: './assets/scss',
    javaPath: './assets/js',
    imgPath: './assets/img',
    fontPath: '/font'
};

//Distination paths.
var dist = {
    css: build + '/assets/css/',
    js: build + '/assets/js/',
    font: build + '/assets/fonts/',
    img: build + '/assets/img/',
    php: build
}

//App path
var app = './app';

//Run Bower task
gulp.task('bower', function() {
    return bower()
		.pipe(gulp.dest(config.bowerDir))
});

//Icons task. Just relocates them
gulp.task('icons', function() {
    return gulp.src(config.bowerDir + '/font-awesome/fonts/**.*')
        .pipe(gulp.dest(dist.font));
});

//Fonts task
gulp.task('fonts', function(){
    return gulp.src(config.fontPath + '/*')
        .pipe(gulp.dest(dist.font));
});

//Image task. Optimize size
gulp.task('img', ['img-idea'], function(){
    return gulp.src(config.imgPath + '/**/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [
                {removeViewBox: false},
                {cleanupIDs: false}
            ],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(dist.img));
});

//Resize idea-images
gulp.task('img-idea', function () {
  gulp.src(config.imgPath + '/idea-image/*')
    .pipe(imageResize({
      width : 600,
      height : 360,
      crop : true,
      upscale : false
    }))
    .pipe(gulp.dest(config.imgPath + '/idea-image/min'));
});

//php Function
gulp.task('php', function(){
    return gulp.src('*.php')
        .pipe(gulp.dest(dist.php))
				.pipe(browserSync.stream());
});

//SASS/css function. Defines path where our sass is, for our main.scss to locate them via import.
gulp.task('css', function() {
    return sass(config.sassPath + '/main.scss', {
        precision: 6,
        stopOnError: true,
        cacheLocation: '../../cache',
        loadPath: [
					'.assets/scss/'
				]
        })
        .on("error", notify.onError(function (error) {
           return "Error: " + error.message;
        }))
        .pipe(gulp.dest(dist.css))
				.pipe(browserSync.stream());
});

gulp.task('materialcss', function() {
	return sass(config.sassPath + '/material.scss', {
			precision: 6,
			stopOnError: true,
			cacheLocation: '../../cache',
			loadPath: [
				config.bowerDir + '/angular-material/',
				config.bowerDir + '/angular-material/modules/scss'
			]
			})
			.on("error", notify.onError(function (error) {
				 return "Error: " + error.message;
			}))
			.pipe(gulp.dest(dist.css))
			.pipe(browserSync.stream());
});

//Locations of our javascripts files.
var javascript = [
    config.bowerDir + '/angular/angular.js',
    config.bowerDir + '/angular-material/angular-material.js',
		config.bowerDir + '/angular-ui-router/release/angular-ui-router.js',
		config.bowerDir + '/angular-animate/angular-animate.js',
		config.bowerDir + '/angular-aria/angular-aria.js',
		config.bowerDir + '/angular-cookies/angular-cookies.js'
    ]

//Javascript task
gulp.task('js', function(){
    return gulp.src(javascript)
        .pipe(concat('main.js'))
        .pipe(gulp.dest(dist.js))
				.pipe(browserSync.stream());;
});

// Rerun the task when a file changes
gulp.task('watch', ['default'], function() {

		browserSync.init({
			proxy: "http://localhost/dist"
		});

    gulp.watch('*.php', ['php']);
    gulp.watch(config.sassPath + '/**/*.scss', ['css']);
    gulp.watch('/*.js', ['js']);
		gulp.watch('./app/**/*', ['app']);
});

//compress css task with gulpnano. Runs css task before executing
gulp.task('compress-css', ['css'], function(){
    return gulp.src(dist.css + '*.css')
        .pipe(nano())
        .pipe(gulp.dest(dist.css))
});

//compress javascript. Uses gulpuglify. Runs Javascript task before executing
gulp.task('compress-js', ['js'], function() {
  return gulp.src(dist.js + '*.js')
    .pipe(uglify())
    .pipe(gulp.dest(dist.js));
});

gulp.task('app' , function(){
  // the base option sets the relative root for the set of files,
  // preserving the folder structure
  gulp.src('app/**/*.*', { base: 'app/' })
  .pipe(gulp.dest(build + '/app'))
  .pipe(browserSync.reload({
      stream: true
  }));
});

gulp.task('compress', ['compress-css', 'compress-js']);

//Default task. No compressing
gulp.task('default', ['app', 'bower', 'icons', 'css', 'php', 'js', 'fonts']);

//Production task. Use before using on live site.
gulp.task('production',['default', 'materialcss', 'compress','img']);
