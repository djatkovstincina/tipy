module.exports = function (grunt) {
    'use strict';

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        watch: {
            files: 'wp-content/themes/tipytheme/src/sass/**/*.scss',
            tasks: ['sass:dist', 'postcss']
        },

        sass: {
            options: {
                style: 'compressed'
            },
            dist: {
                files: {
                    'wp-content/themes/tipytheme/style.css': 'wp-content/themes/tipytheme/src/sass/style.scss',
                    'wp-content/themes/tipytheme/inc/acf/acf.css': 'wp-content/themes/tipytheme/src/sass/partials/acf.scss'
                }
            }
        },

        uglify: {
            option: {

            },
            dist: {
                files: {
                    'wp-content/themes/tipytheme/src/js/script.min.js': [
                        // 'wp-content/themes/tipytheme/src/js/src/jquery-3.1.1.min.js',
                        'wp-content/themes/tipytheme/src/js/src/slick.min.js',
                        'wp-content/themes/tipytheme/src/js/src/script.js'
                    ]
                }
            }
        },

        browserSync: {
            dev: {
                bsFiles: {
                    src : [
                        'wp-content/themes/tipytheme/style.css',
                        'wp-content/themes/tipytheme/src/js/**/*.js'
                    ]
                },
                options: {
                    watchTask: true,
                    proxy: "localhost" //Add /projectname
                }
            }
        },

        postcss: {
            options: {
                map: true,
                processors: [
                    require('autoprefixer') ({browsers: 'last 2 versions'})
                ]
            },
            dist: {
                src: 'wp-content/themes/tipytheme/style.css'
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-browser-sync');

    grunt.registerTask('run', ['sass', 'postcss']);
    grunt.registerTask('dist', ['sass', 'uglify']);
    grunt.registerTask('default', ['browserSync', 'watch']);
};