module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),


    // Add vendor prefixes to CSS
    // =====================================
    autoprefixer: {
      target: {
        src: './src/css/*.css'
      }
    },

    // Deletes build folders
    // =====================================
    clean: {
      dev: {
        src: [ './build/dev' ]
      },
      prod: {
        src: [ './build/prod']
      }
    },



    // Allow watch and server at the same time
    // =====================================
    concurrent: {
      dev: {
        tasks: ['watch', 'connect'],
        options: {
          logConcurrentOutput: true
        }
      }
    },


    // Development Web Server
    // =====================================
    connect: {
      dev: {
        options: {
          port: 4000,
          base: './build/dev',
          keepalive: true
        }
      }
    },


    // Copy css to build after sass'ed
    // =====================================
    copy: {
      css: {
        src: './src/css/styles.css',
        dest: './build/dev/css/styles.css',
      },
    },


    // Deploy via FTP
    // =====================================

    'ftp-deploy': {
      prod: {
        auth: {
          host: 'recreant.net',
          port: 21,
          authKey: 'production-key'
        },
        src: './build/prod',
        dest: 'html/',
      }
    },



    // Reduce image size
    // =====================================
    imagemin: {
      all: {
        files: [{
          expand: true,
          cwd: 'src/',
          src: ['img/**/*.{png,jpg,gif}'],
          dest: 'src/'
        }]
      }
    },


    // Build Site w/ Jekyll
    // =====================================
    jekyll: {
      dev: {
        options: {
          src: './src',
          dest: './build/dev'
        }
      },
      prod: {
        options: {
          src: './src',
          dest: './build/prod'
        }
      }
    },


    // Build Sass Files
    // =====================================
    sass: {
      dev: {
        options: {
            style: 'compact'
        },
        files: {
            './src/css/styles.css': './src/css/styles.sass'
        }
      },
      prod: {
        options: {
            style: 'compressed'
        },
        files: {
            './src/css/styles.css': './src/css/styles.sass'
        }
      }
    },


    // Compress Javascript
    // =====================================
    uglify: {
      prod: {
        files: {
          './build/prod/js/index.js': ['./build/prod/js/index.js'],
          './build/prod/js/angular.headroom.js': ['./build/prod/js/angular.headroom.js']
        }
      }
    },


    // Watch files for changes
    // =====================================
    watch: {
      css: {
        files: ['./src/css/**/*.sass'],
        tasks: ['sass', 'autoprefixer', 'copy'],
        options: {
          spawn: false,
        }
      },
      jekyll: {
        files: ['./src/**/*.html', './src/**/*.md', './src/**/*.js', './src/**/*.yml'],
        tasks: ['jekyll:dev'],
        options: {
          spawn: false,
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-concurrent');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-connect');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-ftp-deploy');
  grunt.loadNpmTasks('grunt-jekyll');

  grunt.registerTask('dev', ['clean:dev', 'sass:dev', 'autoprefixer', 'jekyll:dev', 'concurrent:dev']);
  grunt.registerTask('prod', ['clean:prod', 'sass:prod', 'autoprefixer', 'jekyll:prod', 'uglify:prod']);

};
