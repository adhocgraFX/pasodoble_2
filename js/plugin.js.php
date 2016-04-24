<?php
// get template params
$analytics          = $this->params->get('analytics');
$textresizer        = $this->params->get('textresizer');
$textindent         = $this->params->get('textindent');
$headerbackground   = $this->params->get('headerbackground');
$params             = $app->getParams();
$pageclass          = $params->get('pageclass_sfx');
$hltext             = $this->params->get('hltext');
?>

<script type="text/javascript">
    //  Avoid `console` errors in browsers that lack a console.
    (function() {
        var method;
        var noop = function () {};
        var methods = [
            'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
            'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
            'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
            'timeStamp', 'trace', 'warn'
        ];
        var length = methods.length;
        var console = (window.console = window.console || {});

        while (length--) {
            method = methods[length];

            // Only stub undefined methods.
            if (!console[method]) {
                console[method] = noop;
            }
        }
    }());

    /*  Web Starter Kit
     *  Copyright 2014 Google Inc. All rights reserved.
     *
     *  Licensed under the Apache License, Version 2.0 (the "License");
     *  you may not use this file except in compliance with the License.
     *  You may obtain a copy of the License at
     *
     *  https://www.apache.org/licenses/LICENSE-2.0
     *
     *  Unless required by applicable law or agreed to in writing, software
     *  distributed under the License is distributed on an "AS IS" BASIS,
     *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     *  See the License for the specific language governing permissions and
     *  limitations under the License */

    // nav
    <?php if ($this->countModules('nav')): ?>
    (function () {
        'use strict';

        var querySelector = document.querySelector.bind(document);

        var navdrawerContainer = querySelector('.navdrawer-container');
        var body = document.body;
        var appbarElement = querySelector('.app-bar');
        var menuBtn = querySelector('.menu');
        var menuSidebarBtn = querySelector('.sidebar-menu');
        var menuLeftbarBtn = querySelector('.leftbar-menu');
        var menuActionsBtn = querySelector('.actions');
        var main = querySelector('.layout');

        function closeMenu() {
            body.classList.remove('open');
            appbarElement.classList.remove('open');
            navdrawerContainer.classList.remove('open');
        }

        function toggleMenu() {
            body.classList.toggle('open');
            appbarElement.classList.toggle('open');
            navdrawerContainer.classList.toggle('open');
            navdrawerContainer.classList.add('opened');
        }

        main.addEventListener('click', closeMenu);
        menuSidebarBtn.addEventListener('click', closeMenu);
        menuLeftbarBtn.addEventListener('click', closeMenu);
        menuActionsBtn.addEventListener('click', closeMenu);
        menuBtn.addEventListener('click', toggleMenu);
        // navdrawerContainer.addEventListener('click', function (event) {
        //     if (event.target.nodeName === 'A' || event.target.nodeName === 'LI') {
        //         closeMenu();
        //    }
        // });
    })();
    <?php endif; ?>

    // das selbe für aside
    <?php if ($this->countModules('sidebar')): ?>
    (function () {
        'use strict';

        var querySelector = document.querySelector.bind(document);

        var sidebarContainer = querySelector('.sidebar-container');
        var body = document.body;
        var appbarSelect = querySelector('.app-bar');
        var menuBtn = querySelector('.menu');
        var menuSidebarBtn = querySelector('.sidebar-menu');
        var menuActionsBtn = querySelector('.actions');
        var main = querySelector('main');

        function closeMenu() {
            body.classList.remove('aside-open');
            appbarSelect.classList.remove('aside-open');
            sidebarContainer.classList.remove('aside-open');
        }

        function toggleMenu() {
            body.classList.toggle('aside-open');
            appbarSelect.classList.toggle('aside-open');
            sidebarContainer.classList.toggle('aside-open');
            sidebarContainer.classList.add('aside-opened');
        }

        main.addEventListener('click', closeMenu);
        menuBtn.addEventListener('click', closeMenu);
        menuActionsBtn.addEventListener('click', closeMenu);
        menuSidebarBtn.addEventListener('click', toggleMenu);
        sidebarContainer.addEventListener('click', function (event) {
            if (event.target.nodeName === 'A' || event.target.nodeName === 'LI') {
                closeMenu();
            }
        });
    })();
    <?php endif; ?>

    // das selbe für leftbar
    <?php if ($this->countModules('left_bar')): ?>
    (function () {
        'use strict';

        var querySelector = document.querySelector.bind(document);

        var leftbarContainer = querySelector('.leftbar-container');
        var body = document.body;
        var appbarSelect = querySelector('.app-bar');
        var menuBtn = querySelector('.menu');
        var menuLeftbarBtn = querySelector('.leftbar-menu');
        var menuActionsBtn = querySelector('.actions');
        var main = querySelector('main');

        function closeMenu() {
            body.classList.remove('left-open');
            appbarSelect.classList.remove('left-open');
            leftbarContainer.classList.remove('left-open');
        }

        function toggleMenu() {
            body.classList.toggle('left-open');
            appbarSelect.classList.toggle('left-open');
            leftbarContainer.classList.toggle('left-open');
            leftbarContainer.classList.add('left-opened');
        }

        main.addEventListener('click', closeMenu);
        menuBtn.addEventListener('click', closeMenu);
        menuActionsBtn.addEventListener('click', closeMenu);
        menuLeftbarBtn.addEventListener('click', toggleMenu);
        leftbarContainer.addEventListener('click', function (event) {
            if (event.target.nodeName === 'A' || event.target.nodeName === 'LI') {
                closeMenu();
            }
        });
    })();
    <?php endif; ?>

    // das selbe für actions
    <?php if (($textresizer == 1) or ($this->countModules('search'))): ?>
    (function () {
        'use strict';

        var querySelector = document.querySelector.bind(document);

        var actionsContainer = querySelector('.app-bar-actions');
        var body = document.body;
        var appbarSelect = querySelector('.app-bar');
        var menuBtn = querySelector('.menu');
        var menuSidebarBtn = querySelector('.sidebar-menu');
        var menuLeftbarBtn = querySelector('.leftbar-menu');
        var menuActionsBtn = querySelector('.actions');
        var main = querySelector('.layout');


        function closeMenu() {
            body.classList.remove('actions-open');
            appbarSelect.classList.remove('actions-open');
            actionsContainer.classList.remove('actions-open');
        }

        function toggleMenu() {
            body.classList.toggle('actions-open');
            appbarSelect.classList.toggle('actions-open');
            actionsContainer.classList.toggle('actions-open');
            actionsContainer.classList.add('actions-opened');
        }

        main.addEventListener('click', closeMenu);
        menuBtn.addEventListener('click', closeMenu);
        menuSidebarBtn.addEventListener('click', closeMenu);
        menuLeftbarBtn.addEventListener('click', closeMenu);
        menuActionsBtn.addEventListener('click', toggleMenu);
        actionsContainer.addEventListener('click', function (event) {
            if (event.target.nodeName === 'SPAN' || event.target.nodeName === 'A' || event.target.nodeName === 'LI') {
                closeMenu();
            }
        });
    })();
    <?php endif; ?>


    // double Tap to go by Osvaldas Valutis
    jQuery('nav li:has(ul)').doubleTapToGo();


    // text-indent, Ausnahmen Erstzeileneinzug
    <?php if ($textindent == 1): ?>
    jQuery(window).load( function() {
        var $paragraph = jQuery("p");
        // Absatz mit Bild
        $paragraph.has("img").css({
            "margin-top": ".75em",
            "margin-bottom": "1.5em",
            "text-indent": "0px"
        })
            .addClass("bild");
        // mit Button
        $paragraph.has("button").css({
            "margin-top": ".75em",
            "margin-bottom": ".75em",
            "text-indent": "0px"
        });
        // mit Anker
        $paragraph.has("a").css({
            "text-indent": "0px"
        });
    });
    <?php endif; ?>

    // go to top
    jQuery(window).load(function() {
        var offset = 240;
        var duration = 500;

        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('.go-top').fadeIn(duration);
            } else {
                jQuery('.go-top').fadeOut(duration);
            }
        });

        jQuery('.go-top').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({scrollTop: 0}, duration);
            return false;
        })
    });

    // go to nav
    <?php if (($headerbackground) and ($pageclass=="header-img" || $pageclass == "header-img masonry" || $pageclass == "header-img cards")): ?>
    jQuery(window).load(function() {
        var offset = 120;
        var duration = 500;
        var $navdrawer = jQuery("#navdrawer");

        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('.go-down').fadeOut(duration);
            } else {
                jQuery('.go-down').fadeIn(duration);
            }
        });

        jQuery('.go-down').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({scrollTop: ($navdrawer).offset().top}, duration);
            return false;
        })
    });
    <?php endif; ?>

    // typographic quotes (nicht für jmdach oder jugfulda wg frontend editing)
	<?php if ($hltext == "default") : ?>
    (typeof('jQuery') == 'function' ? jQuery : function ( callback ) {
        var addListener = document.addEventListener || document.attachEvent,
            removeListener = document.removeEventListener ? "removeEventListener" : "detachEvent",
            eventName = document.addEventListener ? "DOMContentLoaded" : "onreadystatechange";

        addListener.call(document, eventName, function() {
            document[removeListener](eventName, arguments.callee, false);
            callback();
        }, false);
    })(function() {
        var root = document.body;
        var node = root.childNodes[0];
        while(node != null) {
            if(node.nodeType == 3) {
                node.nodeValue = node.nodeValue
                    .replace(/(\W|^)"(\S)/g, '$1\u201c$2') // beginning "
                    .replace(/(\u201c[^"]*)"([^"]*$|[^\u201c"]*\u201c)/g, '$1\u201d$2') // ending "
                    .replace(/([^0-9])"/g,'$1\u201d') // remaining " at end of word
                    .replace(/(\W|^)'(\S)/g, '$1\u2018$2') // beginning '
                    .replace(/([a-z])'([a-z])/ig, '$1\u2019$2') // conjunction's possession
                    .replace(/((\u2018[^']*)|[a-z])'([^0-9]|$)/ig, '$1\u2019$3') // ending '
                    .replace(/(\u2018)([0-9]{2}[^\u2019]*)(\u2018([^0-9]|$)|$|\u2019[a-z])/ig, '\u2019$2$3') // abbrev. years like '93
                    .replace(/(\B|^)\u2018(?=([^\u2019]*\u2019\b)*([^\u2019\u2018]*\W[\u2019\u2018]\b|[^\u2019\u2018]*$))/ig, '$1\u2019') // backwards apostrophe
                    .replace(/'''/g, '\u2034') // triple prime
                    .replace(/("|'')/g, '\u2033') // double prime
                    .replace(/'/g, '\u2032'); // prime
            }
            if(node.hasChildNodes() && node.firstChild.nodeName != "CODE") {
                node = node.firstChild;
            } else {
                do {
                    while(node.nextSibling == null && node != root) {
                        node = node.parentNode;
                    }
                    node = node.nextSibling;
                } while (node && (node.nodeName == "CODE" || node.nodeName == "SCRIPT" || node.nodeName == "STYLE"));
            }
        }
    });
	<?php endif; ?>

    //  google analytics code asynchron + anonym
    <?php if ($analytics != "UA-XXXXX-X"): ?>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', '<?php echo htmlspecialchars($analytics); ?>']);
        _gaq.push(['_gat._anonymizeIp']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    <?php endif; ?>

    //  text resizer
    <?php if ($textresizer == 1): ?>
    jQuery(document).ready( function() {
        jQuery( "#textsizer-embed a" ).textresizer({
            target: "main",
            type: "css",
            sizes: [
                // Small. Index 0
                { "font-size" : "87.5%" },
                // Default. Index 1
                { "font-size" : "100%" },
                // Large. Index 2
                { "font-size" : "112.5%" },
                // XLarge. Index 3
                { "font-size" : "125%" }
            ],
            selectedIndex: 1
        });
    });
    <?php endif; ?>

    // formstone lightbox
    jQuery(".lightbox").lightbox();

    // sticky nav
    jQuery(document).ready(function() {
        var stickyNavTop = jQuery('.navdrawer-container').offset().top;

        var stickyNav = function(){
            var scrollTop = jQuery(window).scrollTop();

            if (scrollTop > stickyNavTop) {
                jQuery('.navdrawer-container').addClass('sticky');
            } else {
                jQuery('.navdrawer-container').removeClass('sticky');
            }
        };

        stickyNav();

        jQuery(window).scroll(function() {
            stickyNav();
        });
    });

    // masonry
    // init Masonry after all images have loaded
    var $grid = jQuery('.masonry-container').imagesLoaded( function() {
        $grid.masonry({
            columnWidth: '.masonry-item',
            itemSelector: '.masonry-item',
            percentPosition: true
            });
    });
</script>