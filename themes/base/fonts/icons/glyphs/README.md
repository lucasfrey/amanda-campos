### Iconfont generation

¡Hola mis amigos!

Here I am once again bringing you an update to our current icon font build shituation. As you all and/or most of you may know, we've been considering using a third party icon font building service.

At last, I'm happy to say: 
```
<strong>screw that</strong>
```
I've gone done had a looksee on npm and since last time I gone done a looksee, some magician has brought out a wonderful plugin: grunt-webfont, https://www.npmjs.com/package/grunt-webfont. And furthermore; https://www.npmjs.com/package/gulp-iconfont for Gulp

**Grunt**

It's really easy to set up. cd into your themes dir and run the following commands:


```
brew install ttfautohint fontforge --with-python
npm install grunt-webfont --save-dev
```

**Gulp**

```
npm install --save-dev gulp-iconfont
```


Too easy. We done? Not quite.

**Next comes config**

While I guess the structure here and naming conventions is a little up for discussion, I've gone with the following setup:

.svg icons path (where I put my cool icons)
`/fonts/icons/glyphs`

built font path (where my cool icons build to)
`/fonts/icons`

icons.less path (where my cool less file builds to)
`/css/less/icons/icons.less`

icon class prefix (BEM coz we cool)
`.icon and .icon--`



And the gruntfile:


```
grunt.config.init( {

dirs: {
	src: 'source/',
	build: '_build/',
	production: 'production/',
	libs: 'vendor/'
},

tasks: [
	'images',
	'fonts',
	'less',
	'js'
],

webfont: {
	icons: {
		src: 'source/icons/*.svg',
		dest: 'source/fonts/icons',
		destCss: 'source/css/less/icons',
		options: {
			stylesheet: 'less',
			types: 'eot,woff,ttf,svg',
			relativeFontPath: '../fonts/icons',
			syntax: 'bem',
			templateOptions: {
			baseClass: 'icon',
			classPrefix: 'icon__',
			mixinPrefix: 'icon-'
			}
		}
	}
}
} );



grunt.loadNpmTasks('grunt-webfont');
```

or, gulpfile:


```
var iconfont = require('gulp-iconfont');

...

/**
 * Icon fontkit build
 */
gulp.task('iconfont', function(){
	return gulp.src(['fonts/icons/glyphs/*.svg'])
	.pipe(iconfont({
		fontName: 'icons',
		normalize: true,
	}))
	.on('codepoints', function(codepoints, options) {
		console.log(codepoints);
		gulp.src('css/templates/icons.less')
			.pipe(consolidate('lodash', {
				glyphs: codepoints,
				fontName: options.fontName,
				fontPath: '../fonts/icons/'
			}))
			.pipe(gulp.dest('css/less/icons'));
	})
	.pipe(gulp.dest('fonts/icons'));
});
```
And finally assume the .less file in style.less

```
@import "icons/icons.less"; // Icons styles (.icon)
```

The grunt font kit builds using `$ grunt webfont`, the gulp version is `$ gulp iconfont` and it's intentionally kept out of the build task as it doesn't need to run each time you do a build.

**ALSO** names all your fonts using the original file name AND hashes the font path so it doesn't cache.

**AND** grunt even spits out a cool little html file where you can generate your little glyph code.

**Final and coolest thing**
Just incase you weren't completely sure whether or not you wanted to keep typing this;
```
<i class="icon icon--longname"></i>
```
or,
```
<i class="icon icon--tendonitis"></i>
```
The tasks build them into mixins. That's right, **MIXINS!** so you can fully attach an icon wherever you want - even to the .logo in the header or that photo of Diamond Dave on the Heyday about page... what an icon.

### GULP

There is a template file you can find `/templates/icons.less` and edit the output of the icon font task. The current standard build includes support for BEM and the Style Guide