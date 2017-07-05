var gulp         = require('gulp-help')(require('gulp')),
    gutil        = require('gulp-util'),
    plumber      = require('gulp-plumber'),
    notify       = require('gulp-notify'),
    sass         = require('gulp-sass'),
    concat       = require('gulp-concat'),
    sourcemaps   = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    rename       = require('gulp-rename'),
    uglify       = require('gulp-uglify'),
    minify       = require('gulp-minify-css'),
    sh           = require('shelljs'),
    fs           = require('fs'),
    path         = require('path'),
    _            = require('lodash'),
    browserSync  = require('browser-sync'),
    runSequence  = require('run-sequence');

var resources = {
    "frontend": {
        "js": [
            'node_modules/jquery/dist/jquery.min.js',
            'node_modules/bootstrap/dist/js/bootstrap.min.js',
            'node_modules/typed.js/lib/typed.js',

            'resources/assets/js/components/snap.svg-min.js',
            'resources/assets/js/components/classie.js',
            'resources/assets/js/functions/home.js',
            'resources/assets/js/functions/global.js',
        ],
        "css": {
            "src": "resources/assets/sass/app.scss",
            "includes": [
                "node_modules/bootstrap/dist/css/bootstrap.min.css"
            ]
        },
        "images": [
            "resources/assets/images/*.*"
        ],
        "fonts": [
            "resources/assets/fonts/*.*",
            "resources/assets/js/vendor/font-awesome/fonts/*.*",
        ]
    },

    "backend": {
        "js": [
            'node_modules/jquery/dist/jquery.min.js',
            'node_modules/bootstrap/dist/js/bootstrap.min.js',
            'node_modules/masonry-layout/dist/masonry.pkgd.min.js',
            'node_modules/select2/dist/js/select2.min.js',
            'node_modules/jquery-sortable-lists/jquery-sortable-lists.min.js',

            'resources/assets/js/vendor/tether/tether.min.js',
            'resources/assets/js/vendor/chart.js/Chart.min.js',
            'resources/assets/js/vendor/datatables/jquery.dataTables.min.js',
            'resources/assets/js/vendor/datatables/dataTables.bootstrap4.min.js',
            'resources/assets/js/functions/sb-admin.js',
            'resources/assets/js/backend/main.js',
        ],
        "css": {
            "src": "resources/assets/sass/admin.scss"
        }
    }
};

var paths = {
    "app"  : "public/build/",
    "sassPath": "resources/assets/sass/"
};

//
// Cleaning
//
gulp.task('clean:app', 'Clean public app folders', function() {
    sh.rm('-rf', paths.app);
    sh.mkdir('-p', paths.app);
    sh.mkdir('-p', path.join(paths.app, 'css'));
    sh.mkdir('-p', path.join(paths.app, 'js'));
    sh.mkdir('-p', path.join(paths.app, 'images'));
    sh.mkdir('-p', path.join(paths.app, 'fonts'));
});

//
// Build
//
gulp.task('build:app', 'Build the website in dev mode', function(callback) {
    runSequence(['build:app:dev'], callback);
});

var timestamp = new Date().getTime();

gulp.task('build:app:dev', 'Build the website app in dev mode', function(callback) {
    runSequence('clean:app', [
        'build:frontend:js:dev', 
        'build:backend:js:dev', 
        'build:frontend:css:dev', 
        'build:backend:css:dev', 
        'build:app:fonts', 
        'build:app:images'
    ], callback);
});

gulp.task('build:frontend:js:dev', false, function() {
    return gulp.src(resources.frontend.js)
        .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
        .pipe(sourcemaps.init())
        .pipe(concat('app.js'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(path.join(paths.app, 'js')))
        .pipe(notify({message:'App javascript successfully builded!', onLast: true}))
        .pipe(browserSync.reload({stream:true}));
});

gulp.task('build:backend:js:dev', false, function() {
    return gulp.src(resources.backend.js)
        .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
        .pipe(sourcemaps.init())
        .pipe(concat('admin.js'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(path.join(paths.app, 'js')))
        .pipe(notify({message:'App javascript successfully builded!', onLast: true}))
        .pipe(browserSync.reload({stream:true}));
});

gulp.task('build:frontend:css:dev', false, function() {
    return gulp.src(resources.frontend.css.src)
        .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
        .pipe(sourcemaps.init())
        .pipe(sass({ includePaths : resources.frontend.css.includes }))
        .pipe(minify())
        .pipe(autoprefixer())
        .pipe(concat('app.css'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(path.join(paths.app, 'css')))
        .pipe(notify({message:'App stylesheets successfully builded!', onLast: true}))
        .pipe(browserSync.reload({stream:true}));
});

gulp.task('build:backend:css:dev', false, function() {
    return gulp.src(resources.backend.css.src)
        .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
        .pipe(sourcemaps.init())
        .pipe(sass({ includePaths : resources.frontend.css.includes }))
        .pipe(minify())
        .pipe(autoprefixer())
        .pipe(concat('admin.css'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(path.join(paths.app, 'css')))
        .pipe(notify({message:'App stylesheets successfully builded!', onLast: true}))
        .pipe(browserSync.reload({stream:true}));
});

gulp.task('build:app:fonts', false, function() {
    return gulp.src(resources.frontend.fonts)
        .pipe(gulp.dest(path.join(paths.app, 'fonts')))
        .pipe(notify({message:'App fonts successfully builded!', onLast: true}))
        .pipe(browserSync.reload({stream:true}));
});

gulp.task('build:app:images', false, function() {
    return gulp.src(resources.frontend.images)
        .pipe(gulp.dest(path.join(paths.app, 'images')))
        .pipe(notify({message:'App images successfully builded!', onLast: true}))
        .pipe(browserSync.reload({stream:true}));
});

//
// Watch
//
// watching change to re-build app
gulp.task('watch', false, ['clean:app', 'build:app'], function() {
    // Watch App
    gulp.watch(resources.frontend.js, ['build:app:js:dev']);
    gulp.watch(resources.frontend.css.src, ['build:app:css:dev']);
    gulp.watch(resources.frontend.images, ['build:app:images']);
    gulp.watch(resources.frontend.css.includes, ['build:app:css:dev']);
});

gulp.task('css-admin', function() {
    return gulp.src(paths.sassPath + '/admin.scss')
        .pipe(sass({
            style: 'compressed',
            loadPath: [
                './resources/assets/sass',
            ]
        })
        .on("error", notify.onError(function (error) {
            return "Error: " + error.message;
        })))
        .pipe(minify())
        .pipe(concat('admin.css'))
        .pipe(gulp.dest(path.join(paths.app, 'css')));
});

gulp.task('css-front', function() {
    return gulp.src(paths.sassPath + '/app.scss')
        .pipe(sass({
            style: 'compressed',
            loadPath: [
                './resources/assets/sass',
            ]
        })
        .on("error", notify.onError(function (error) {
            return "Error: " + error.message;
        })))
        .pipe(minify())
        .pipe(concat('app.css'))
        .pipe(gulp.dest(path.join(paths.app, 'css')));
});

// Rerun the task when a file changes
gulp.task('watch-css', function() {
    gulp.watch(paths.sassPath + '/**/*.scss', ['css-admin']);
    gulp.watch(paths.sassPath + '/**/*.scss', ['css-front']);
});
