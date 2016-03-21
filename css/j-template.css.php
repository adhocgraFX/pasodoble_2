<?php
header('Content-type: text/css');

// get template params
$mainwidth = $this->params->get('mainwidth');
$asidewidth = $this->params->get('asidewidth');
$leftwidth = $this->params->get('leftwidth');
$contentwidth = $this->params->get('contentwidth');
$rowmodulewidth = $this->params->get('rowmodulewidth');
$minrowmodulewidth = ($rowmodulewidth / 2);
$modulewidth = $this->params->get('modulewidth');
$minmodulewidth = ($modulewidth / 2);
$equalheights = $this->params->get('equalheights');
$headerbackground = $this->params->get('headerbackground');
$bodyfont = $this->params->get('bodyfont');
$headlinefont = $this->params->get('headlinefont');
$monofont = $this->params->get('monofont');
$basefontsize = $this->params->get('basefontsize');
$textindent = $this->params->get('textindent');
$textresizer = $this->params->get('textresizer');
$buttontext = $this->params->get('buttontext');
$addcss = $this->params->get('addcss');
$hltext = $this->params->get('hltext');
?>

<style type="text/css">

    html {
        font-size: <?php echo $basefontsize;?>%;
    }

    <?php if ($bodyfont): ?>
        body { font-family: '<?php echo htmlspecialchars($bodyfont);?>', Helvetica, Arial, 'Droid Sans', sans-serif; }
    <?php endif; ?>

    <?php if ($headlinefont): ?>
        h1, h2, h3, h4, h5, h6 { font-family: '<?php echo htmlspecialchars($headlinefont);?>', Helvetica, Arial, 'Droid Sans', sans-serif; }
    <?php endif; ?>

    <?php if ($monofont): ?>
        textarea, pre, code, kbd, samp, var, tt { font-family: '<?php echo htmlspecialchars($monofont);?>', Courier, sans-serif; }
    <?php endif; ?>

    <?php if ($textindent == 1): ?>
        article p + p {
            text-indent: 1.5em;
            margin-top: -.75em;
        }

        article p.bild + p,
        article p.lead + p,
        article p.bildlegende + p,
        article p.autor + p,
        article p.readmore {
            text-indent: 0 !important;
        }

        article p.absatz {
            text-indent: 0 !important;
            margin-top: .75em !important;
        }

		article p.readmore a {
            margin: 0 !important;
        }

        article p.alert, article p.box {
            text-indent: 0 !important;
            margin: 1em 0 !important;
        }

		table p + p {
			text-indent: 0 !important;
            margin-top: .75em !important;
		}

    <?php endif; ?>

    <?php if (($textresizer == 1) or ($this->countModules('search'))): ?>
        button.actions {
            width: 3em;
        }
    <?php else : ?>
        button.actions {
            display: none !important;
            visibility: hidden;
        }
    <?php endif; ?>

    <?php if ($this->countModules('nav')): ?>
        button.menu {
            width: 3em;
        }
    <?php else : ?>
        button.menu {
            display: none !important;
            visibility: hidden;
        }
    <?php endif; ?>

    <?php if ($this->countModules('sidebar')): ?>
        button.sidebar-menu {
            width: 3em;
        }
    <?php else : ?>
        button.sidebar-menu {
            display: none !important;
            visibility: hidden;
        }
    <?php endif; ?>

    <?php if ($this->countModules('left_bar')): ?>
        button.leftbar-menu {
            width: 3em;
        }
    <?php else : ?>
        button.leftbar-menu {
            display: none !important;
            visibility: hidden;
        }
    <?php endif; ?>

    footer .module {
        max-width: <?php echo $rowmodulewidth;?>em;
        min-width: <?php echo $minrowmodulewidth;?>em;
    }
    section.top .module {
        max-width: <?php echo $rowmodulewidth;?>em;
        min-width: <?php echo $minrowmodulewidth;?>em;
    }
    section.bottom .module {
        max-width: <?php echo $rowmodulewidth;?>em;
        min-width: <?php echo $minrowmodulewidth;?>em;
    }

    @media screen and (min-width: 47em) {

        <?php if ($headerbackground): ?>
            .header-img .app-bar {
                background: url(<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($headerbackground);?>);
                background-size: cover;
                height: 100vh;
            }
            <?php if ($buttontext): ?>
                .header-img .app-bar-container {
                    height: 60vh;
                }
                .header-img .app-bar-call-to-action {
                    height: 30vh;
                }
            <?php else : ?>
                .header-img .app-bar-container {
                    height: 90vh;
                }
            <?php endif; ?>
        <?php endif; ?>

        <?php if (($textresizer == 1) or ($this->countModules('search'))): ?>
            .app-bar-actions {
                height: 3em;
            }
        <?php else : ?>
            .app-bar-actions {
                height: 0;
            }
        <?php endif; ?>

        main {
            -webkit-flex: <?php echo $mainwidth;?>;
            -moz-flex: <?php echo $mainwidth;?>;
            -ms-flex: <?php echo $mainwidth;?>;
            flex: <?php echo $mainwidth;?>;
        }

        section.content,
        section.inner-bottom,
        section.inner-top {
            max-width: <?php echo $contentwidth;?>em;
        }

        aside.sidebar-container {
            -webkit-flex: <?php echo $asidewidth;?>;
            -moz-flex: <?php echo $asidewidth;?>;
            -ms-flex: <?php echo $asidewidth;?>;
            flex: <?php echo $asidewidth;?>;

            <?php if ($equalheights == 1): ?>
                -webkit-align-items: stretch !important;
                -moz-align-items: stretch !important;
                -ms-align-items: stretch !important;
                align-items: stretch !important;
            <?php endif; ?>
        }

        aside.leftbar-container {
            -webkit-flex: <?php echo $leftwidth;?>;
            -moz-flex: <?php echo $leftwidth;?>;
            -ms-flex: <?php echo $leftwidth;?>;
            flex: <?php echo $leftwidth;?>;

            <?php if ($equalheights == 1): ?>
                -webkit-align-items: stretch !important;
                -moz-align-items: stretch !important;
                -ms-align-items: stretch !important;
                align-items: stretch !important;
            <?php endif; ?>
        }

        aside.leftbar-container .module {
            width: <?php echo $modulewidth;?>em;
            min-width: <?php echo $minmodulewidth;?>em;
        }

        aside.sidebar-container .module {
            width: <?php echo $modulewidth;?>em;
            min-width: <?php echo $minmodulewidth;?>em;
        }
    }

	<?php if ($hltext == "jugfulda"): ?>

		nav ul.nav li a::before {
	        font-family: 'FontAwesome';
	        line-height: 1;
	        display: inline-block;
	        text-decoration: inherit;
	        padding-right: .5em;
	        content: ""; }
		nav ul.nav li:nth-child(1) a::before {content: "\f015";}
        nav ul.nav li:nth-child(2) a::before {content: "\f05a";}
        nav ul.nav li:nth-child(3) a::before {content: "\f073";}
        nav ul.nav li:nth-child(4) a::before {content: "\f003";}
		ul.nav li:hover ul.nav-child li a::before {padding-right: 0; content: "";}
	<?php endif; ?>

	<?php if (trim($addcss) != ''): ?>
		<?php echo htmlspecialchars($addcss);?>
	<?php endif; ?>

</style>