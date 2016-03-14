<?php defined('_JEXEC') or die;

/**
 * @copyright    Paso Doble responsive Joomla! 3 template © 2015 adhocgraFX / Johannes Hock - All Rights Reserved.
 * @license      GNU/GPL
 **/

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();

// Add current user information
$user = JFactory::getUser();

// Detecting Active Variables
$menu      = $app->getMenu();
$active    = $app->getMenu()->getActive();
$params    = $app->getParams();
$option    = $app->input->getCmd('option', '');
$view      = $app->input->getCmd('view', '');
$layout    = $app->input->getCmd('layout', '');
$task      = $app->input->getCmd('task', '');
$sitename  = $app->get('sitename');
$pageclass = $params->get('pageclass_sfx');
$tpath     = $this->baseurl . '/templates/' . $this->template;
$tpl       = $app->getTemplate(true);
$params    = $tpl->params;
$action    = $menu->getActive() == $menu->getDefault() ? ('front') : ('site');

// get template params
$logo        = $this->params->get('logo');
$textresizer = $this->params->get('textresizer');

$whichmethod   = $this->params->get('whichmethod');
$fontloadercss = $this->params->get('fontloadercss');
$fontloaderjs  = $this->params->get('fontloaderjs');

$headerbackground = $this->params->get('headerbackground');
$hltext = $this->params->get('hltext');

$buttontext = $this->params->get('buttontext');
$buttonlink = $this->params->get('buttonlink');
$unset      = $this->params->get('unset');
// cookies
$c_accept = $this->params->get('acceptcookie');
$c_infotext = $this->params->get('cookieinfotext');
$c_buttontext = $this->params->get('cookiebuttontext');
$c_linktext = $this->params->get('cookielinktext');
$c_link = $this->params->get('cookielink');

// generator tag
$this->setGenerator(null);

if ($unset == 1) :
	// unset javascript file from head
	unset($doc->_scripts[$this->baseurl . '/media/jui/js/jquery.min.js']);
	unset($doc->_scripts[$this->baseurl . '/media/jui/js/jquery-noconflict.js']);
	unset($doc->_scripts[$this->baseurl . '/media/jui/js/jquery-migrate.min.js']);
	unset($doc->_scripts[$this->baseurl . '/media/system/js/caption.js']);
	unset($doc->_scripts[$this->baseurl . '/media/system/js/html5fallback.js']);
elseif ($view == "form" || $view == "modules" || $layout == "edit") :
	// frontend editing
	JHtml::_('bootstrap.framework');
else:
	// add jquery framework
	JHtml::_('jquery.framework');
endif;
?>

<!-- font loader css code: google or brick fonts -->
<?php if ($whichmethod == 1) : ?>
	<?php if ($fontloadercss) : ?>
		<?php $doc->addStyleSheet($fontloadercss); ?>
	<?php endif; ?>
<?php endif; ?>

<!-- font loader js code: adobe typekit fonts -->
<?php if ($whichmethod == 0) : ?>
	<?php if ($fontloaderjs) : ?>
		<script src="//use.typekit.net/<?php echo($fontloaderjs); ?>.js"></script>
		<script>try {
				Typekit.load({async: true});
			} catch (e) {
			}</script>
	<?php endif; ?>
<?php endif; ?>

<?php if ($view == "form" || $view == "modules" || $layout == "edit") :
	// frontend editing > zusätzlich bootstrap css
	$doc->addStyleSheet($this->baseurl . '/media/jui/css/bootstrap.min.css');
	$doc->addStyleSheet($this->baseurl . '/media/jui/css/bootstrap-extended.css');
	$doc->addStyleSheet($this->baseurl . '/media/jui/css/bootstrap-responsive.min.css');
	// basic template css
	$doc->addStyleSheet($tpath . '/dist/basic.css');
else:
	$doc->addStyleSheet($tpath . '/dist/style.css');
endif; ?>

<!doctype html>

<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >

<head>

	<jdoc:include type="head"/>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php if ($view != "form" || $layout != "edit") : ?>
		<!-- Bildverkleinerung über mobify cdn -->
		<script>!function(a,b,c,d,e){function g(a,c,d,e){var f=b.getElementsByTagName("script")[0];a.src=e,a.id=c,a.setAttribute("class",d),f.parentNode.insertBefore(a,f)}a.Mobify={points:[+new Date]};var f=/((; )|#|&|^)mobify=(\d)/.exec(location.hash+"; "+b.cookie);if(f&&f[3]){if(!+f[3])return}else if(!c())return;b.write('<plaintext style="display:none">'),setTimeout(function(){var c=a.Mobify=a.Mobify||{};c.capturing=!0;var f=b.createElement("script"),h="mobify",i=function(){var c=new Date;c.setTime(c.getTime()+3e5),b.cookie="mobify=0; expires="+c.toGMTString()+"; path=/",a.location=a.location.href};f.onload=function(){if(e)if("string"==typeof e){var c=b.createElement("script");c.onerror=i,g(c,"main-executable",h,mainUrl)}else a.Mobify.mainExecutable=e.toString(),e()},f.onerror=i,g(f,"mobify-js",h,d)})}(window,document,function(){a=/webkit|(firefox)[\/\s](\d+)|(opera)[\s\S]*version[\/\s](\d+)|(trident)[\/\s](\d+)/i.exec(navigator.userAgent);return!a||a[1]&&4>+a[2]||a[3]&&11>+a[4]||a[5]&&6>+a[6]?!1:!0},

		// path to mobify.js
				"//cdn.mobify.com/mobifyjs/build/mobify-2.0.16.min.js",

		// calls to APIs go here (or path to a main.js)
				function() {
					var capturing = window.Mobify && window.Mobify.capturing || false;

					if (capturing) {
						Mobify.Capture.init(function(capture){
							var capturedDoc = capture.capturedDoc;

							var images = capturedDoc.querySelectorAll("img, picture");
							Mobify.ResizeImages.resize(images);

							// Render source DOM to document
							capture.renderCapturedDoc();
						});
					}
				});</script>
	<?php endif; ?>

	<!-- Disable tap highlight on IE -->
	<meta name="msapplication-tap-highlight" content="no">

	<!-- Web Application Manifest -->
	<link rel="manifest" href="manifest.json">

	<!-- Add to homescreen for Chrome on Android -->
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="application-name" content="<?php echo htmlspecialchars($sitename); ?>">
	<link rel="icon" sizes="192x192" href="<?php echo $tpath; ?>/images/touch/chrome-touch-icon-192x192.png">

	<!-- Add to homescreen for Safari on iOS -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="<?php echo htmlspecialchars($sitename); ?>">
	<link rel="apple-touch-icon" href="<?php echo $tpath; ?>/images/touch/apple-touch-icon.png">

	<!-- Tile icon for Win8 (144x144 + tile color) -->
	<meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
	<meta name="msapplication-TileColor" content="#2c4d91">

	<meta name="theme-color" content="#3372DF">

	<!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page
	https://developers.google.com/webmasters/smartphone-sites/feature-phones
	<link rel="canonical" href="http://www.example.com/"> -->

	<!-- humans text
	<link rel="author" href="humans.txt" /> -->

	<!-- load css options -->
	<?php include_once('css/j-template.css.php'); ?>

</head>

<body
	class="<?php echo $option . ' view-' . $view . ($layout ? ' layout-' . $layout : ' no-layout') . ($task ? ' task-' . $task : ' no-task'); ?>
    <?php echo ($action) . ' ' . $active->alias . ' ' . $pageclass; ?>"
	role="document">

<header class="app-bar promote-layer" role="banner">
	<section class="app-bar-actions">
		<?php if ($textresizer == 1): ?>
			<div class="textresizer-container">
				<ul class="textresizer" id="textsizer-embed">
					<li><a href="#nogo" class="small-text" title="small"><span class="icon-angle-down"></span><p hidden>small</p></a></li>
					<li><a href="#nogo" class="default-text" title="default"><span class="icon-format-size"></span><p hidden>default</p></a></li>
					<li><a href="#nogo" class="large-text" title="large"><span class="icon-angle-up"></span><p hidden>large</p></a></li>
					<li><a href="#nogo" class="x-large-text" title="x-large"><span class="icon-angle-double-up"></span><p hidden>x-large</p></a></li>
				</ul>
			</div>
		<?php endif; ?>
		<?php if ($this->countModules('search')): ?>
			<div class="search-container">
				<jdoc:include type="modules" name="search" style="jduo"/>
			</div>
		<?php endif; ?>
	</section>
	<section class="app-bar-container">
		<button class="leftbar-menu" aria-label="Sidebar"></button>
		<button class="menu" aria-label="Navigation"></button>
		<?php if ($hltext == "default") : ?>
			<h1 class="logo-text">
				<a href="<?php echo $this->baseurl ?>"><?php echo htmlspecialchars($sitename); ?></a>
			</h1>
		<?php elseif ($hltext == "jmag") : ?>
			<h1 class="logo-text">
				<a href="<?php echo $this->baseurl ?>">Joomla!Magazin <span class="d-a-ch">D-A-CH</span> </a>
			</h1>
		<?php elseif ($hltext == "jugfulda"): ?>
			<h1 class="logo-text jf-title">
				<a href="<?php echo $this->baseurl ?>">Joomla!<sup>&reg;</sup><span class="jf-green"> User</span><span class="jf-orange"> Group</span><span class="jf-red"> Fulda</span></a>
			</h1>
		<?php endif; ?>
		<button class="actions" aria-label="actions"></button>
		<button class="sidebar-menu" aria-label="Sidebar"></button>
	</section>
	<?php if (($buttontext) and ($buttonlink) and ($action == "front")): ?>
		<section class="app-bar-call-to-action hide-on-tablet">
			<a href="<?php echo $this->baseurl ?>/<?php echo($buttonlink); ?>"
			   class="call-to-action btn btn-accent btn-large"><?php echo htmlspecialchars($buttontext); ?> <span
					class="icon-arrow-forward"></span></a>
		</section>
	<?php endif; ?>
	<?php if (($headerbackground) and ($pageclass == "header-img")): ?>
		<a href="#navdrawer" class="go-down"><span class="icon-chevron-down"></span><p hidden>Navigation</p></a>
	<?php endif; ?>
</header>

<nav class="navdrawer-container promote-layer" id="navdrawer" role="navigation">
	<?php if ($logo): ?>
		<div class="logo-image">
			<a href="<?php echo $this->baseurl ?>">
				<img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>"
				     alt="<?php echo htmlspecialchars($sitename); ?>"/>
			</a>
		</div>
	<?php else: ?>
		<h4>Navigation</h4>
	<?php endif; ?>
	<?php if ($this->countModules('nav')): ?>
		<jdoc:include type="modules" name="nav"/>
	<?php endif; ?>
</nav>

<section class="layout block-group">
	<?php if ($this->countModules('slideshow')): ?>
		<section class="slider-container" role="complementary">
			<jdoc:include type="modules" name="slideshow" style="flickity"/>
		</section>
	<?php endif; ?>

	<?php if ($this->countModules('top_row')): ?>
		<section class="top" role="complementary">
			<jdoc:include type="modules" name="top_row" style="jduo"/>
		</section>
	<?php endif; ?>

	<section class="main-container">
		<?php if ($this->countModules('left_bar')): ?>
			<aside class="leftbar-container" role="complementary">
				<h4 class="sidebar-text">Sidebar</h4>
				<jdoc:include type="modules" name="left_bar" style="jduo"/>
			</aside>
		<?php endif; ?>
		<main role="main">
			<?php if ($this->countModules('inner_top_row')): ?>
				<section class="inner-top" role="complementary">
					<jdoc:include type="modules" name="inner_top_row" style="jduo"/>
				</section>
			<?php endif; ?>
			<section class="content">
				<jdoc:include type="message"/>
				<jdoc:include type="component"/>
			</section>
			<?php if ($this->countModules('inner_bottom_row')): ?>
				<section class="inner-bottom" role="complementary">
					<jdoc:include type="modules" name="inner_bottom_row" style="jduo"/>
				</section>
			<?php endif; ?>
		</main>
		<?php if ($this->countModules('sidebar')): ?>
			<aside class="sidebar-container" role="complementary">
				<h4 class="sidebar-text">Sidebar</h4>
				<jdoc:include type="modules" name="sidebar" style="jduo"/>
			</aside>
		<?php endif; ?>
	</section>

	<?php if ($this->countModules('bottom_row')): ?>
		<section class="bottom" role="complementary">
			<jdoc:include type="modules" name="bottom_row" style="jduo"/>
		</section>
	<?php endif; ?>

	<?php if ($this->countModules('breadcrumbs')): ?>
		<section class="breadcrumbs-container block-group" role="navigation">
			<jdoc:include type="modules" name="breadcrumbs"/>
		</section>
	<?php endif; ?>

	<?php if ($this->countModules('footer')): ?>
		<footer class="block-group" role="contentinfo">
			<jdoc:include type="modules" name="footer" style="jduo"/>
		</footer>
	<?php endif; ?>
</section>

<a href="#" class="go-top"><span class="icon-chevron-up"></span><p hidden>Top</p></a>

<!-- cookie info -->
<?php if ($c_accept == 1) : ?>

	<?php if(isset($_POST['set_cookie'])):
		if($_POST['set_cookie']==1)
			setcookie("acceptcookie", "yes", time()+3600*24*365, "/");
		?>
	<?php endif; ?>

	<div id="accept-cookie-container" class="box info" style="display:none;position:fixed;bottom:-1em;font-size:.75em;width:100%;text-align:center;z-index:99999">
		<p><?php echo htmlspecialchars($c_infotext); ?>
		<?php if (($c_linktext != "Cookie link caption") and ($c_link != "http://my_site.de")): ?>
			<a href="<?php echo htmlspecialchars($c_link); ?>">
				<?php echo htmlspecialchars($c_linktext); ?></a>
		<?php endif; ?></p>
		<button id="accept" class="btn btn-accent"><?php echo htmlspecialchars($c_buttontext); ?></button>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function () {

			function setCookie(c_name,value,exdays)
			{
				var exdate=new Date();
				exdate.setDate(exdate.getDate() + exdays);
				var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString()) + "; path=/";
				document.cookie=c_name + "=" + c_value;
			}

			function readCookie(name) {
				var nameEQ = name + "=";
				var ca = document.cookie.split(';');
				for(var i=0;i < ca.length;i++) {
					var c = ca[i];
					while (c.charAt(0)==' ') c = c.substring(1,c.length);
					if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
				}
				return null;
			}

			var $ca_container = jQuery('#accept-cookie-container');
			var $ca_accept = jQuery('#accept');
			var acceptcookie = readCookie('acceptcookie');
			if(!(acceptcookie == "yes")){

				$ca_container.delay(1000).slideDown('slow');

				$ca_accept.click(function(){
					setCookie("acceptcookie","yes",365);
					jQuery.post('<?php echo JURI::current(); ?>', 'set_cookie=1', function(){});
					$ca_container.slideUp('slow');
				});
			}
		});
	</script>
<?php endif; ?>

<jdoc:include type="modules" name="debug"/>

<!-- todo frontend editing -->
<?php if ($view != "form" || $layout != "edit") : ?>
	<!-- load plugin scripts -->
	<?php if ($unset == 1): ?>
		<script type="text/javascript" src="<?php echo $tpath . '/js/template.js.php?u=' . $unset . 'v=1'; ?>"></script>
	<?php else: ?>
		<script type="text/javascript" src="<?php echo $tpath . '/dist/app.js'; ?>"></script>
	<?php endif; ?>
	<!-- load plugin options -->
	<?php include_once('js/plugin.js.php'); ?>
<?php endif; ?>

</body>

</html>
