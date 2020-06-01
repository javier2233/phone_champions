/*------------------------------------*\
 $DEPENDECIAS
 \*------------------------------------*/

var gulp = require('gulp');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var minifyCSS = require('gulp-minify-css');


/*------------------------------------*\
$LINEA ERROR
\*------------------------------------*/
var displayError = function (error) {

    var errorString = '[' + error.plugin + ']';
    if (error.fileName)
        errorString += ' in ' + error.fileName;
    if (error.lineNumber)
        errorString += ' on line ' + error.lineNumber;
    console.error(errorString);
};

/*------------------------------------*\
$SASS
\*------------------------------------*/
gulp.task('sass', (done) => {
    gulp.src('assets/css/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('phone_champions.css'))
        .pipe(minifyCSS({keepBreaks:false}))
        .pipe(gulp.dest( 'public/css/'))
    done();
});

/*------------------------------------*\
$wATCH
\*------------------------------------*/
gulp.task('watch', function () {
    return gulp.watch('assets/css/*.scss', gulp.series('sass'));
});


/*------------------------------------*\
$POR DEFECTO
\*------------------------------------*/

gulp.task('default', gulp.parallel('watch', 'sass'));