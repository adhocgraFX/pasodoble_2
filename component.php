<?php defined('_JEXEC') or die;

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$tpath = $this->baseurl . '/templates/' . $this->template;

// generator tag
$this->setGenerator(null);

// add jquery framework
JHtml::_('jquery.framework');

// Add Stylesheets
$doc->addStyleSheet($tpath . '/dist/style.css');
$doc->addStyleSheet($tpath . '/dist/print.css');

?><!doctype html>

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
	<p><?php echo htmlspecialchars($app->getCfg('sitename')); ?> | 2015 | &copy; | alle Rechte vorbehalten</p>
</footer>

</body>

</html>
