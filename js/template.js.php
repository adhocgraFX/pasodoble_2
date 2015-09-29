<?php

// required header info and character set
header("Content-type: application/x-javascript");
// cache control to process
header("Cache-Control: must-revalidate");
// duration of cached content (1 hour)
$offset = 60 * 60 ;
// expiration header format
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s",time() + $offset) . " GMT";
// send cache expiration header to broswer
header($ExpStr);

// load scripts
// textresizer
require('jquery.cookie.min.js');
require('jquery.textresizer.min.js');

// formstone lightbox > modal windows und image galeries
require('core.js');
require('transition.js');
require('touch.js');
require('lightbox.js');

// flickity by dessandro
require('flickity.pkgd.min.js');

// doubletaptogo > hover lösung für drop downs
require('doubletaptogo.min.js');
?>