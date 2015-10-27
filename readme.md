PasoDoble-2
=================

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
* analytics / options
* font resizer

###PasoDoble in action
[pasodoble](http://pasodoble.adhocgrafx.de "PasoDoble")

###Work in progress!

#### todos:
* der heilige Gral - die Suche geht weiter - gulpfile für js und less :)
* Hybrid Lösung: 
    * Gulp für js und less eingerichtet, style.css und app.js in dist folder
    * prepros less compilation (j-template.css) in css folder und js compilation (template-dist.js) in js folder
    * unset über options steuerbar; dann wird template.js.php anstelle app.js geladen 
* source maps via gulp noch nicht optimal (die prepros source map ist genauer)
    