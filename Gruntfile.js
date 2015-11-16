module.exports = (grunt) ->
  
  # To support SASS/SCSS or Stylus, just install
  # the appropriate grunt package and it will be automatically included
  # in the build process, Sass is included by default:
  #
  # * for SASS/SCSS support, run `npm install --save-dev grunt-contrib-sass`
  # * for Stylus/Nib support, `npm install --save-dev grunt-contrib-stylus`
  npmDependencies = require("./package.json").devDependencies
  hasSass = npmDependencies["grunt-contrib-sass"] isnt `undefined`
  hasStylus = npmDependencies["grunt-contrib-stylus"] isnt `undefined`
  distName = "aposh_dist_" + new Date().getTime()
  distDir = "dist/" + distName
  grunt.option "target", "dist"
  grunt.initConfig
    
    # Watches for changes and runs tasks
    watch:
      sass:
        files: [ "scss/**/*.scss" ]
        tasks: (if (hasSass) then [ "sass:dev" ] else null)
        options:
          livereload: true

      stylus:
        files: [ "stylus/**/*.styl" ]
        tasks: (if (hasStylus) then [ "stylus:dev" ] else null)
        options:
          livereload: true

      js:
        files: [ "js/**/*.js" ]
        tasks: [ "jshint" ]
        options:
          livereload: true

      php:
        files: [ "**/*.php" ]
        options:
          livereload: true

    
    # JsHint your javascript
    jshint:
      all: [ "js/*.js", "!js/modernizr.js", "!js/*.min.js", "!js/vendor/**/*.js" ]
      options:
        browser: true
        curly: false
        eqeqeq: false
        eqnull: true
        expr: true
        immed: true
        newcap: true
        noarg: true
        smarttabs: true
        sub: true
        undef: false

    
    # Dev and production build for sass
    sass:
      production:
        files: [
          src: [ "**/*.scss", "!**/_*.scss" ]
          cwd: "scss"
          dest: "<%= grunt.option(\"target\") %>/css"
          ext: ".css"
          expand: true
         ]
        options:
          style: "compressed"

      dev:
        files: [
          src: [ "**/*.scss", "!**/_*.scss" ]
          cwd: "scss"
          dest: "css"
          ext: ".css"
          expand: true
         ]
        options:
          style: "expanded"

    
    # Dev and production build for stylus
    stylus:
      production:
        files: [
          src: [ "**/*.styl", "!**/_*.styl" ]
          cwd: "stylus"
          dest: "css"
          ext: ".css"
          expand: true
         ]
        options:
          compress: true

      dev:
        files: [
          src: [ "**/*.styl", "!**/_*.styl" ]
          cwd: "stylus"
          dest: "css"
          ext: ".css"
          expand: true
         ]
        options:
          compress: false

    copy:
      production:
        files: [
          expand: true
          cwd: "./js/vendor/bootstrap-sass/assets/fonts"
          src: [ "**" ]
          dest: "<%= grunt.option(\"target\") %>/fonts"
        ,
          expand: true
          cwd: "./fonts"
          src: [ "**/*.*" ]
          dest: "<%= grunt.option(\"target\") %>/fonts"
        ,
          expand: true
          cwd: "./"
          src: [ "*.php", "*.css", "*.png", "!.*", "shortcodes/*", "widgets/*", "includes/*", "js/modernizr.js" ]
          dest: "<%= grunt.option(\"target\") %>"
        ,
          expand: true
          cwd: "./js/vendor/requirejs/"
          src: [ "require.js" ]
          dest: "<%= grunt.option(\"target\") %>/js"
         ]

      dev:
        files: [
          expand: true
          cwd: "./js/vendor/bootstrap-sass/assets/fonts"
          src: [ "**" ]
          dest: "fonts"
         ]

    
    # Bower task sets up require config
    bower:
      all:
        rjsConfig: "js/global.js"

    
    # Require config
    requirejs:
      production:
        options:
          name: "global"
          baseUrl: "js"
          mainConfigFile: "js/global.js"
          out: "<%= grunt.option(\"target\") %>/js/scripts.min.js"

    
    # Image min
    imagemin:
      production:
        files: [
          expand: true
          cwd: "images"
          src: "**/*.{png,jpg,jpeg,gif}"
          dest: "<%= grunt.option(\"target\") %>/images"
         ]

    
    # SVG min
    svgmin:
      production:
        files: [
          expand: true
          cwd: "images"
          src: "**/*.svg"
          dest: "<%= grunt.option(\"target\") %>/images"
         ]

    chmod:
      options:
        mode: "777"

      dist:
        
        # Target-specific file/dir lists and/or options go here.
        src: [ "dist" ]

    clean:
      production: [ "<%= grunt.option(\"target\") %>" ]

    concat:
      production:
        src: [ "css/vendor/*.css", "js/vendor/bootstrap-select/<%= grunt.option(\"target\") %>/css/bootstrap-select.css" ]
        dest: "<%= grunt.option(\"target\") %>/css/vendor.css"

    cssmin:
      production:
        files:
          "<%= grunt.option(\"target\") %>/css/vendor.css": [ "<%= grunt.option(\"target\") %>/css/vendor.css" ]

    "ftp-deploy":
      production:
        auth:
          host: "ftp.aposhproduction.com"
          port: 21
          authKey: "aposhKey"

        src: "dist"
        dest: "/aposhdev/content/themes/aposhproduction"
        serverSep: "/"
        concurrency: 4
        progress: true

    zip:
      production:
        src: [ "<%= grunt.option(\"target\") %>/**/*" ]
        dest: "releases/" + distName + ".zip"
        cwd: "dist/"

  
  # Default task
  grunt.registerTask "default", [ "watch", "copy:dev" ]
  
  # Build task
  grunt.registerTask "build", [ "sass:production" ], ->
    arr = [ "jshint" ]
    
    #arr.push('chmod');
    arr.push "clean:production"
    console.log "<%= grunt.option(\"target\") %>"
    arr.push "sass:production"  if hasSass
    arr.push "stylus:production"  if hasStylus
    arr.push "concat:production"
    arr.push "cssmin:production"
    arr.push "imagemin:production", "svgmin:production", "requirejs:production", "copy:production", "zip:production"
    grunt.task.run arr
    arr

  
  # Template Setup Task
  grunt.registerTask "setup", ->
    arr = []
    arr.push["sass:dev"]  if hasSass
    arr.push "stylus:dev"  if hasStylus
    arr.push "bower-install"

  
  # Load up tasks
  grunt.loadNpmTasks "grunt-contrib-sass"  if hasSass
  grunt.loadNpmTasks "grunt-contrib-stylus"  if hasStylus
  grunt.loadNpmTasks "grunt-contrib-jshint"
  grunt.loadNpmTasks "grunt-contrib-watch"
  grunt.loadNpmTasks "grunt-bower-requirejs"
  grunt.loadNpmTasks "grunt-contrib-requirejs"
  grunt.loadNpmTasks "grunt-contrib-imagemin"
  grunt.loadNpmTasks "grunt-contrib-copy"
  grunt.loadNpmTasks "grunt-svgmin"
  grunt.loadNpmTasks "grunt-chmod"
  grunt.loadNpmTasks "grunt-contrib-clean"
  grunt.loadNpmTasks "grunt-contrib-concat"
  grunt.loadNpmTasks "grunt-contrib-cssmin"
  grunt.loadNpmTasks "grunt-ftp-deploy"
  grunt.loadNpmTasks "grunt-zip"
  
  # Run bower install
  grunt.registerTask "bower-install", ->
    done = @async()
    bower = require("bower").commands
    bower.install().on("end", (data) ->
      done()
    ).on("data", (data) ->
      console.log data
    ).on "error", (err) ->
      console.error err
      done()

