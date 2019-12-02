let mix = require("laravel-mix");

const config = {
    scss: {
        src: './assets/css/layout.scss',
        dest: './assets/css'
    },
    watchFiles: [
        './templates/**/*.ss',
        './assets/css/**/*.css',
        './assets/javascript/**/*.js'
    ],
    vendor: {
      cssPaths: [
        'node_modules/bootstrap/dist/css/bootstrap.min.css'
      ],
      jsPaths: [
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/jquery/dist/jquery.min.js'
      ]
    }
};
mix.sass(config.scss.src, config.scss.dest).sourceMaps()
    .copy(config.vendor.cssPaths, 'assets/css/vendor')
    .copy(config.vendor.jsPaths, 'assets/javascript/vendor')
    .browserSync({
        open: "external",
        proxy: "publicforum.vcap.me",
        host: "publicforum.vcap.me",
        injectChanges: true,
        files: config.watchFiles,
    });
