module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),


    // Add vendor prefixes to CSS
    // =====================================
    autoprefixer: {
      target: {
        src: './src/assets/css/*.css'
      }
    },

    // Deletes build folders
    // =====================================
    clean: {
      dev: {
        src: [ './build/dev' ]
      },
      stage: {
        src: [ './build/stage' ]
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
        src: './src/assets/css/styles.css',
        dest: './build/dev/assets/css/styles.css',
      },
    },


    // Deploy via FTP
    // =====================================

    'ftp-deploy': {
      stage: {
        auth: {
          host: 'staging.inquirehire.com',
          port: 21,
          authKey: 'staging-key'
        },
        src: './build/prod',
        dest: 'html/',
      },
      prod: {
        auth: {
          host: 'inquirehire.com',
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
          src: ['assets/img/**/*.{png,jpg,gif}'],
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
      stage: {
        options: {
          src: './src',
          dest: './build/stage'
        }
      },
      prod: {
        options: {
          src: './src',
          dest: './build/prod'
        }
      }
    },

    // Link Checker
    // =====================================
    linkChecker: {
      // Use a large amount of concurrency to speed up check
      options: {
        maxConcurrency: 20
      },
      dev: {
        site: 'localhost',
        options: {
          initialPort: 4000
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
            './src/assets/css/styles.css': './src/assets/css/styles.sass'
        }
      },
      stage: {
        options: {
            style: 'compressed'
        },
        files: {
            './src/assets/css/styles.css': './src/assets/css/styles.sass'
        }
      },
      prod: {
        options: {
            style: 'compressed'
        },
        files: {
            './src/assets/css/styles.css': './src/assets/css/styles.sass'
        }
      }
    },

    // Watch files for changes
    // =====================================
    watch: {
      css: {
        files: ['./src/assets/css/**/*.sass'],
        tasks: ['sass', 'autoprefixer', 'copy'],
        options: {
          spawn: false,
        }
      },
      jekyll: {
        files: ['./src/**/*.html', './src/**/*.js', './src/**/*.md', './src/**/*.svg', './src/**/*.yml',],
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
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-ftp-deploy');
  grunt.loadNpmTasks('grunt-jekyll');
  grunt.loadNpmTasks('grunt-link-checker');

  grunt.registerTask('dev', ['clean:dev', 'sass:dev', 'autoprefixer', 'jekyll:dev', 'concurrent:dev']);
  grunt.registerTask('prod', ['clean:prod', 'sass:prod', 'autoprefixer', 'jekyll:prod']);
  grunt.registerTask('check-links', 'linkChecker:dev');

};
