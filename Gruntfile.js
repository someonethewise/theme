module.exports = function(grunt) {
  
  grunt.registerTask('watch', [ 'watch' ]);
  
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // concat
    concat: {
         js: {
           options: {
             separator: ';'
           },
           src: ['js/src/**/*.js'],
           dest: 'js/<%= pkg.name %>.min.js'
         },
       },

    // uglify
    uglify: {
        options: {
          mangle: false
        },
        js: {
          files: {
            'js/<%= pkg.name %>.min.js': ['js/<%= pkg.name %>.min.js']
          }
        }
      },

    // Add banner to style.css
    usebanner: {
       addbanner: {
          options: {
            position: 'top',
            banner: '/*\nTheme Name: AffiliateWP\n' + 
                    'Theme URI: http://affiliatewp.com\n' +
                    'Author: AffiliateWP\n' +
                    'Author URI: http://affiliatewp.com\n' +
                    'Description: AffiliateWP theme\n' +
                    'License: GNU General Public License\n' +
                    'License URI: license.txt\n' +
                    '*/',
            linebreak: true
          },
          files: {
            src: [ 'style.css' ]
          }
        }
    },
    // LESS CSS
    less: {
      style: {
        options: {
          compress: true
        },
        files: {
          "style.css": "less/style.less",
          "css/editor-style.css": "less/editor-style.less"
        }
      }
    },

    // watch our project for changes
    watch: {
      // JS
      js: {
        files: ['js/src/**/*.js'],
        tasks: ['concat:js', 'uglify:js'],
        options: {
      //    livereload: true,
        }
      },
      // CSS
      css: {
        files: ['less/*.less'],
        tasks: ['less:style'],
        options: {
       //   livereload: true,
        }
      },
      // Add banner
      addbanner: {
        files: 'style.css',
         tasks: ['usebanner:addbanner'],
         options: {
          spawn: false
        }
      }
    
    }
  });

  // Saves having to declare each dependency
  require( "matchdep" ).filterDev( "grunt-*" ).forEach( grunt.loadNpmTasks );

  grunt.registerTask('default', ['concat', 'uglify', 'less', 'usebanner']);
};