var Encore = require('@symfony/webpack-encore');

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG
     *
     * Add 1 entry for each "page" of your app
     * (including one that's included on every page - e.g. "app")
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if you JavaScript imports CSS.
     */
    .addEntry('app', './assets/js/app.js')
    // .addEntry('admin', './assets/js/admin.js')
    //.addEntry('page1', './assets/js/page1.js')
    //.addEntry('page2', './assets/js/page2.js')

    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // enables Sass/SCSS support
    .enableSassLoader()

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment if you're having problems with a jQuery plugin
    //.autoProvidejQuery()

;

var config = Encore.getWebpackConfig();

config.resolve.alias = {
    'animation.gsap': 'scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js',
    'TimelineMax': 'gsap/src/minified/TimelineMax.min.js',
    'TweenLite': 'gsap/src/minified/TweenLite.min.js',
    'TimelineLite': 'gsap/src/minified/TimelineLite.min.js',
    'TweenMax': 'gsap/src/minified/TweenMax.min.js',
    'ScrollMagic': 'scrollmagic/scrollmagic/minified/ScrollMagic.min.js'
};

// config.module = {rules: [
//         {
//             test: /\.css$/,
//             use: ['style-loader', 'css-loader']
//         }
//     ]
// };

module.exports = config;

