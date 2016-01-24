<?php defined('_JEXEC') or die;

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$tpath = $this->baseurl . '/templates/' . $this->template;
$date = JFactory::getDate();
$cur_year = JHtml::_('date', $date, 'Y');
$sitename  = $app->get('sitename');

$doc->addStyleSheet($this->baseurl . '/media/jui/css/bootstrap.min.css');
$doc->addStyleSheet($this->baseurl . '/media/jui/css/bootstrap-extended.css');
$doc->addStyleSheet($this->baseurl . '/media/jui/css/bootstrap-responsive.css');

// template css
// $doc->addStyleSheet($tpath . '/dist/style.css');
$doc->addStyleSheet($tpath . '/dist/print.css');

// für frontend editing
JHtml::_('bootstrap.framework');

// generator tag
$this->setGenerator(null);

// get html head data
$head = $this->getHeadData();

// remove deprecated meta-data (html5)
unset($head['metaTags']['http-equiv']);

$this->setHeadData($head);
?>

<!doctype html>

<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >

<head>
	<meta charset="<?php echo $this->getCharset(); ?>">
	<jdoc:include type="head"/>
</head>

<body class="contentpane" id="print">

<div class="overall">
	<jdoc:include type="message"/>
	<jdoc:include type="component"/>
</div>

<footer>
	<p><?php echo htmlspecialchars($sitename); ?> | <?php echo $cur_year ;?> | &copy; | alle Rechte vorbehalten</p>
</footer>
<!--
<?php if ($_GET['print'] == '1') echo '<script type="text/javascript">window.print();</script>'; ?>
-->
</body>

</html>
