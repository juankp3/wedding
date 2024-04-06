const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat'); // Añadido para corregir el error
const uglify = require('gulp-uglify');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');

// Tarea para compilar Sass a CSS
gulp.task('sass', () => {
  return gulp.src('dev/sass/**/*.sass')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('dist/css'));
});

gulp.task('scripts', () => {
  return gulp.src('dev/js/**/*.js')
    .pipe(concat('bundle.js')) // Concatenar todos los archivos JS en uno solo
    .pipe(uglify()) // Comprimir el archivo JS
    .pipe(rename({ suffix: '.min' })) // Renombrar el archivo comprimido
    .pipe(gulp.dest('dist/js'));
});

gulp.task('css', () => {
  return gulp.src('dev/sass/**/*.sass')
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS()) // Comprimir el CSS
    .pipe(rename({ suffix: '.min' })) // Renombrar el archivo comprimido
    .pipe(gulp.dest('dist/css'));
});


// Observar cambios en los archivos Sass y JS
gulp.task('watch', () => {
  gulp.watch('dev/sass/**/*.sass', gulp.series('sass', 'css'));
  gulp.watch('dev/js/**/*.js', gulp.series('scripts'));
});

// Tarea por defecto que ejecuta todas las tareas
gulp.task('default', gulp.parallel('sass', 'css', 'scripts', 'watch'));
