module.exports = function(grunt) {
  var distDir, distName, hasSass, hasStylus, npmDependencies;
  npmDependencies = require("./package.json").devDependencies;
  hasSass = npmDependencies["grunt-contrib-sass"] !== undefined;
  hasStylus = npmDependencies["grunt-contrib-stylus"] !== undefined;
  distName = "aposh_dist_" + new Date().getTime();
  distDir = "dist/" + distName;
  grunt.option("target", "dist");
  grunt.initConfig({
    watch: {
      sass: {
        files: ["scss/**/*.scss"],
        tasks: (hasSass ? ["sass:dev"] : null),
        options: {
          livereload: true
        }
      },
      stylus: {
        files: ["stylus/**/*.styl"],
        tasks: (hasStylus ? ["stylus:dev"] : null),
        options: {
          livereload: true
        }
      },
      js: {
        files: ["js/**/*.js"],
        tasks: [],
        options: {
          livereload: true
        }
      },
      php: {
        files: ["**/*.php"],
        options: {
          livereload: true
        }
      }
    },
    jshint: {
      all: ["js/*.js", "!js/modernizr.js", "!js/*.min.js", "!js/vendor/**/*.js"],
      options: {
        browser: true,
        curly: false,
        eqeqeq: false,
        eqnull: true,
        expr: true,
        immed: true,
        newcap: true,
        noarg: true,
        smarttabs: true,
        sub: true,
        undef: false
      }
    },
    sass: {
      production: {
        files: [
          {
            src: ["**/*.scss", "!**/_*.scss"],
            cwd: "scss",
            dest: '<%= grunt.option("target") %>/css',
            ext: ".css",
            expand: true
          }
        ],
        options: {
          style: "compressed"
        }
      },
      dev: {
        files: [
          {
            src: ["**/*.scss", "!**/_*.scss"],
            cwd: "scss",
            dest: "css",
            ext: ".css",
            expand: true
          }
        ],
        options: {
          style: "expanded"
        }
      }
    },
    stylus: {
      production: {
        files: [
          {
            src: ["**/*.styl", "!**/_*.styl"],
            cwd: "stylus",
            dest: "css",
            ext: ".css",
            expand: true
          }
        ],
        options: {
          compress: true
        }
      },
      dev: {
        files: [
          {
            src: ["**/*.styl", "!**/_*.styl"],
            cwd: "stylus",
            dest: "css",
            ext: ".css",
            expand: true
          }
        ],
        options: {
          compress: false
        }
      }
    },
    copy: {
      production: {
        files: [
          {
            expand: true,
            cwd: "./js/vendor/bootstrap-sass/assets/fonts",
            src: ["**"],
            dest: '<%= grunt.option("target") %>/fonts'
          }, {
            expand: true,
            cwd: "./fonts",
            src: ["**/*.*"],
            dest: '<%= grunt.option("target") %>/fonts'
          }, {
            expand: true,
            cwd: "./",
            src: ["*.php", "*.css", "*.png", "!.*", "shortcodes/*", "widgets/*", "includes/*", "js/modernizr.js", "templates/*", "js/vendor/isotope/js/**/*.js"],
            dest: '<%= grunt.option("target") %>'
          }, {
            expand: true,
            cwd: "./js/vendor/requirejs/",
            src: ["require.js"],
            dest: '<%= grunt.option("target") %>/js'
          }
        ]
      },
      dev: {
        files: [
          {
            expand: true,
            cwd: "./js/vendor/bootstrap-sass/assets/fonts",
            src: ["**"],
            dest: "fonts"
          }
        ]
      }
    },
    bower: {
      all: {
        rjsConfig: "js/global.js"
      }
    },
    requirejs: {
      production: {
        options: {
          name: "global",
          baseUrl: "js",
          mainConfigFile: "js/global.js",
          out: '<%= grunt.option("target") %>/js/scripts.min.js'
        }
      }
    },
    imagemin: {
      production: {
        files: [
          {
            expand: true,
            cwd: "images",
            src: "**/*.{png,jpg,jpeg,gif}",
            dest: '<%= grunt.option("target") %>/images'
          }
        ]
      }
    },
    svgmin: {
      production: {
        files: [
          {
            expand: true,
            cwd: "images",
            src: "**/*.svg",
            dest: '<%= grunt.option("target") %>/images'
          }
        ]
      }
    },
    chmod: {
      options: {
        mode: "777"
      },
      dist: {
        src: ["dist"]
      }
    },
    clean: {
      production: ['dist/**/*','!dist/js/vendor/**/*',]
    },
    concat: {
      production: {
        src: ["css/vendor/*.css", "js/vendor/bootstrap-select/<%= grunt.option(\"target\") %>/css/bootstrap-select.css"],
        dest: '<%= grunt.option("target") %>/css/vendor.css'
      }
    },
    cssmin: {
      production: {
        files: {
          '<%= grunt.option("target") %>/css/vendor.css': ['<%= grunt.option("target") %>/css/vendor.css']
        }
      }
    },
    "ftp-deploy": {
      production: {
        auth: {
          host: "ftp.aposhproduction.com",
          port: 21,
          authKey: "aposhKey"
        },
        src: "dist",
        dest: "/aposhdev/content/themes/aposhproduction",
        serverSep: "/",
        concurrency: 4,
        progress: true
      }
    },
    zip: {
      production: {
        src: ['<%= grunt.option("target") %>/**/*'],
        dest: "releases/" + distName + ".zip",
        cwd: "dist/"
      }
    }
  });
  grunt.registerTask("default", ["watch", "copy:dev"]);
  grunt.registerTask("build", ["sass:production"], function() {
    var arr = [];
    arr.push("clean:production");
    console.log('<%= grunt.option("target") %>');
    if (hasSass) {
      arr.push("sass:production");
    }
    if (hasStylus) {
      arr.push("stylus:production");
    }
    arr.push("concat:production");
    arr.push("cssmin:production");
    arr.push("imagemin:production", "svgmin:production", "requirejs:production", "copy:production", "zip:production");
    grunt.task.run(arr);
    return arr;
  });
  grunt.registerTask("setup", function() {
    var arr;
    arr = [];
    if (hasSass) {
      arr.push["sass:dev"];
    }
    if (hasStylus) {
      arr.push("stylus:dev");
    }
    return arr.push("bower-install");
  });
  if (hasSass) {
    grunt.loadNpmTasks("grunt-contrib-sass");
  }
  if (hasStylus) {
    grunt.loadNpmTasks("grunt-contrib-stylus");
  }
  grunt.loadNpmTasks("grunt-contrib-jshint");
  grunt.loadNpmTasks("grunt-contrib-watch");
  grunt.loadNpmTasks("grunt-bower-requirejs");
  grunt.loadNpmTasks("grunt-contrib-requirejs");
  grunt.loadNpmTasks("grunt-contrib-imagemin");
  grunt.loadNpmTasks("grunt-contrib-copy");
  grunt.loadNpmTasks("grunt-svgmin");
  grunt.loadNpmTasks("grunt-chmod");
  grunt.loadNpmTasks("grunt-contrib-clean");
  grunt.loadNpmTasks("grunt-contrib-concat");
  grunt.loadNpmTasks("grunt-contrib-cssmin");
  grunt.loadNpmTasks("grunt-ftp-deploy");
  grunt.loadNpmTasks("grunt-zip");
  return grunt.registerTask("bower-install", function() {
    var bower, done;
    done = this.async();
    bower = require("bower").commands;
    return bower.install().on("end", function(data) {
      return done();
    }).on("data", function(data) {
      return console.log(data);
    }).on("error", function(err) {
      console.error(err);
      return done();
    });
  });
};

// ---
// generated by coffee-script 1.9.2
