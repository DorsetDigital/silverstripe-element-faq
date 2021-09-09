const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const babel = require('gulp-babel');
const cleanCSS = require('gulp-clean-css');
const { parallel, watch, src, dest } = require('gulp');
const uglify = require('gulp-uglify');
const mode = require('gulp-mode')({
    modes: ["production", "development"],
    default: "development",
    verbose: false
});

function processcss() {
    return src('client/src/scss/**/*.scss')
        .pipe(sass({
            outputStyle: 'nested',
            includePaths: ['node_modules']
        })).on('error', sass.logError)
        .pipe(autoprefixer({'grid': 'no-autoplace'}))
        .pipe(mode.production(cleanCSS({level:1, inline: ['local']})))
        .pipe(dest('client/dist/css'))
}

function transpileJS() {
    return src('client/src/javascript/**/*.js')
        .pipe(babel({
            presets: [
                '@babel/preset-env'
            ]
        }))
        .pipe(mode.production(uglify()))
        .pipe(dest('client/dist/javascript'))
}

exports.default = parallel(transpileJS, processcss);

