<?php defined('_JEXEC') or die;

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$tpath = $this->baseurl . '/templates/' . $this->template;
$date = JFactory::getDate();
$cur_year = JHtml::_('date', $date, 'Y');
$sitename  = $app->get('sitename');

// generator tag
$this->setGenerator(null);

// für frontend editing
// JHtml::_('bootstrap.framework');
// oder
// add jquery framework
JHtml::_('jquery.framework');

// für frontend editing zusätzlich protostar css
// $doc->addStyleSheet($tpath . '/css/legacy.css');

// template css
$doc->addStyleSheet($tpath . '/dist/style.css');
$doc->addStyleSheet($tpath . '/dist/print.css');

?>

<!doctype html>

<html lang="<?php echo $this->language; ?>">

<head>

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
