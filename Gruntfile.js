module.exports = function (grunt) {
    grunt.initConfig({


        /**
            Configuration
        **/
        pkg: grunt.file.readJSON('package.json'),


        /**
            Directories
            Use ex: '<%= dirs.src.js %>/main.js' -> 'src/js/main.js'
        **/
        dirs: {
            // Source
            src: {
                css: 'stylesheets',
                img: 'images',
                js: 'js',
                html: 'html'
            },

            // Distribution
            dist: {
                css: 'dist/assets/css',
                img: 'dist/assets/images',
                js: 'dist/assets/js',
                html: 'dist'
            }
        },


        /**
            Watch our files for changes
            https://github.com/gruntjs/grunt-contrib-watch
        **/
        watch: {
            options: {
                livereload: {
                    host: 'localhost',
                    //port: '8888'
                }
            },

            gruntfile: {
                files: 'Gruntfile.js',
                options: {
                    reload: true
                }
            },

            css: {
                files: ['<%= dirs.src.css %>/**/*.{sass,scss,css}'],
                tasks: ['sass'],
            },

            js: {
                files: '<%= dirs.src.js %>/**/*.js',
                tasks: ['uglify:default']
            },

            html: {
                files: '<%=dirs.src.html %>/**/*.html',
                tasks: ['includes']
            }
        },


        /**
            Compile our SASS
            https://github.com/sindresorhus/grunt-sass
        **/
        sass: {
            options: {
                outputStyle: 'expanded',
                sourceMap: true
            },
            default: {
                files: {
                    '<%= dirs.dist.css %>/main.css': '<%= dirs.src.css %>/main.sass'
                }
            }
        },


        /**
            Combine CSS media queries
            https://github.com/buildingblocks/grunt-combine-media-queries
        **/
        cmq: {
            default: {
                files: {
                    '<%= dirs.dist.css %>': '<%= dirs.dist.css %>/*.css'
                }
            }
        },


        /**
            Finish off our CSS
            https://github.com/nDmitry/grunt-postcss
        **/
        postcss: {
            options: {
                processors: [
                    require('autoprefixer')({ // Add vendor prefixes
                        browsers: [
                            'last 2 versions',
                            'ie 8-9',
                        ]
                    }),
                    require('pixrem')(), // Add fallback units for rem
                    //require('cssnano')(), // Minify our css
                ]
            },
            default: {
                src: '<%= dirs.dist.css %>/*.css'
            }
        },


        /**
            Combine and minify our JavaScript
            https://github.com/gruntjs/grunt-contrib-uglify
        **/
        uglify: {
            build: {
                options: {
                    mangle: true
                },
                files: [

                    // Template separates
                    {
                        '<%= dirs.dist.js %>/templates/product.js': ['<%= dirs.src.js %>/sliders.template.js', '<%= dirs.src.js %>/slickslider.template.js', '<%= dirs.src.js %>/openshare.template.js'],
                    },

                    // Main
                    {
                        dest: '<%= dirs.dist.js %>/main.min.js',
                        src: '<%= dirs.src.js %>/*.main.js'
                    },

                    // Vendor          // Minified & stored separately
                    {
                        expand: true,
                        cwd: '<%= dirs.src.js %>/vendor',
                        src: '*.js',
                        dest: '<%= dirs.dist.js %>/vendor',
                        ext: '.min.js',
                        extDot: 'last'
                    }
                ]
            },
            default: {
                options: {
                    mangle: false,
                    screwIE8: true,
                    beautify: {
                        beautify: true,
                        comments: true,
                        width: 50
                    }
                },
                files: [

                    // Main.js      // Example: script1.main.js & script2.main.js -> main.min.js
                    {
                        dest: '<%= dirs.dist.js %>/main.min.js',
                        src: '<%= dirs.src.js %>/*.main.js',

                        /**

                            Or you can orgranize by folder
                            Example: src/main/script1.js & src/main/script2.js -> assets/js/main.min.js

                            expand: true,
                            cwd: '<%= dirs.src.js %>/main',
                            src: '*.main.js',
                            dest: '<%= dirs.dist.js %>',
                            ext: '.min.js',
                            extDot: 'last'

                        **/
                    },

                    // Template files   // This is used for the templates that require separate js in Kirby using @auto
                    {
                        dest: '<%= dirs.dist.js %>/template.min.js',
                        src: '<%= dirs.src.js %>/*.template.js'
                    },

                    // Mobile.js       // Example: script1.mobile.js & script2.mobile.js -> mobile.min.js
                    {
                        dest: '<%= dirs.dist.js %>/mobile.min.js',
                        src: '<%= dirs.src.js %>/*.mobile.js'
                    },

                    // Vendor          // Minified & stored separately
                    {
                        expand: true,
                        cwd: '<%= dirs.src.js %>/vendor',
                        src: '*.js',
                        dest: '<%= dirs.dist.js %>/vendor',
                        ext: '.min.js',
                        extDot: 'last'
                    }

                ]
            }
        },


        /**
            Minify our images
            https://github.com/gruntjs/grunt-contrib-imagemin
        **/
        imagemin: {
            default: {
                options: {
                    optimizationLevel: 5
                },
                files: [{
                    expand: true,
                    cwd: '<%= dirs.src.img %>',
                    src: ['**/*.{png,jpg,jpeg,gif,svg}'],
                    dest: '<%= dirs.dist.img %>'
                }]
            }
        },


        /**
            Concatenate HTML files
            https://github.com/vanetix/grunt-includes
        **/
        includes: {
            default: {
                files: [{
                    cwd: '<%= dirs.src.html %>/',
                    src: '*.html',
                    dest: '<%= dirs.dist.html %>',
                    flatten: true
                }]
            }
        }


    });



    /**
        Load our Grunt plugins
    **/
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-combine-media-queries');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-includes');


    /**
        Register Tasks
    **/
    // Build our CSS and JS files
    grunt.registerTask('build', ['includes', 'sass', 'uglify:default', 'imagemin']);

    // Watch our files and compile if any changes
    grunt.registerTask('default', ['build', 'watch']);

    // Production - Build the files for production use
    grunt.registerTask('production', ['includes', 'sass', 'postcss', 'cmq', 'uglify:build', 'imagemin']);


};
