<?php defined('_JEXEC') or die;

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$tpath = $this->baseurl . '/templates/' . $this->template;

$whichmethod = $this->params->get('whichmethod');
$fontloadercss = $this->params->get('fontloadercss');
$fontloaderjs = $this->params->get('fontloaderjs');

// generator tag
$this->setGenerator(null);

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet($tpath . '/css/j-template.css');
$doc->addStyleSheet($tpath . '/css/print.css');

?><!doctype html>

<html lang="<?php echo $this->language; ?>">

<head>
    <jdoc:include type="head"/>

    <!-- font loader css code: google or brick fonts -->
    <?php if ($whichmethod==1) : ?>
        <?php if ($fontloadercss) : ?>
            <?php $doc->addStyleSheet($fontloadercss); ?>
        <?php endif; ?>
    <?php endif; ?>

    <!-- font loader js code: adobe typekit fonts -->
    <?php if ($whichmethod==0) : ?>
        <?php if ($fontloaderjs) : ?>
            <script src="//use.typekit.net/<?php echo ($fontloaderjs); ?>.js"></script>
            <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
        <?php endif; ?>
    <?php endif; ?>

</head>

<body class="contentpane" id="print">

<div id="overall">
    <jdoc:include type="message"/>
    <jdoc:include type="component"/>
</div>

<p><?php echo htmlspecialchars($app->getCfg('sitename')); ?> | 2015 | &copy; | alle Rechte vorbehalten</p>

</body>

</html>
