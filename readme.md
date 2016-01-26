#PasoDoble-2
## responsive Joomla! 3.4x template

* less 
* adhocgrafx template [styleguide](https://github.com/adhocgraFX/styleguide "styleguide")
* skeleton made with
    *  [BLANK template](http://blank.vc/de/ "BLANK template")
    *  [WEB STARTER KIT](https://github.com/google/web-starter-kit "WEB STARTER KIT")
* lightweight off-canvas system for 
    * nav 
    * aside (left / right) and 
    * app-bar
* flexbox layout
* responsive touchable slides: [flickity](http://flickity.metafizzy.co/ "flickity")
* modal media boxes: [formstone lightbox](http://formstone.it/components/lightbox/ "formstone lightbox")
* responsive images: [mobify](http://www.mobify.com/mobifyjs/ "mobify.js")
* code display: [prism](http://prismjs.com/index.html "prism.js")
* analytics / options
* font resizer

###PasoDoble in action
[pasodoble](http://pasodoble.adhocgrafx.de "PasoDoble")

### Npm und gulp:
1. Node js, Info siehe: [Node](http://nodejs.org/)
2. Gulp, Info siehe: [Gulp](http://gulpjs.com/)

####Installation:
1. Node installieren
2. Terminal / Ide mit Terminal - als Administrator ausführen - wichtig!
3. Gulp global installieren: 
	
		npm install -g gulp

4. Node dependencies installieren (package.json):

		npm install
    
####Alternativ package.json selber aufbauen:
    	npm init
		npm install gulp --save-dev
		npm install gulp-autoprefixer gulp-concat gulp-convert-encoding gulp-less gulp-livereload gulp-minify-css gulp-notify gulp-sourcemaps gulp-uglify --save-dev

####Workflow, Gulp Befehle:
		gulp all: script, style, print, watch		
		gulp (default): script, style, print	
		gulp script: app.js	
		gulp style: style.css	
		gulp print: print css	
		gulp watch

###Work in progress!
#### todos:
* der heilige Gral - die Suche geht weiter - gulpfile für js und less
* unset über options steuerbar; dann wird template.js.php anstelle app.js geladen 

#### Gulp:
* js und less: style.css und app.js in dist folder
* css sourcemaps: in dist/map folder

    