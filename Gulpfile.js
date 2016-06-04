// Aqui nós carregamos o gulp e os plugins através da função `require` do nodejs
var gulp = require('gulp');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var sass = require('gulp-sass');


// Definimos o diretorio dos arquivos para evitar repetição futuramente
var filesjs = "./app/resources/sources/js/*.js";
var filescss = "./app/resources/sources/css/*.scss";
//Aqui criamos uma nova tarefa através do ´gulp.task´ e damos a ela o nome 'lint'


//Criamos outra tarefa com o nome 'dist'
gulp.task('js', function() {

// Carregamos os arquivos novamente
// E rodamos uma tarefa para concatenação
// Renomeamos o arquivo que sera minificado e logo depois o minificamos com o `uglify`
// E pra terminar usamos o `gulp.dest` para colocar os arquivos concatenados e minificados na pasta build/
    gulp.src(filesjs)
        .pipe(concat('./public/assets/js'))
        .pipe(rename('dist.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./public/assets/js'));
});

//Criamos uma tarefa 'default' que vai rodar quando rodamos `gulp` no projeto

gulp.task('sass', function () {
    return gulp.src(filescss)
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('./public/assets/css'))
        .pipe(rename('dist.min.css'))
        .pipe(gulp.dest('./public/assets/css'));
});


gulp.task('default', function() {

// Usamos o `gulp.run` para rodar as tarefas
// E usamos o `gulp.watch` para o Gulp esperar mudanças nos arquivos para rodar novamente
    gulp.run( 'js','sass');

});