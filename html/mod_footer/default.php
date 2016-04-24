<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_footer
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div class="footer1 <?php echo $moduleclass_sfx ?>"><?php echo $lineone; ?></div>
<!-- <div class="footer2 <?php echo $moduleclass_sfx ?>"><?php echo JText::_('MOD_FOOTER_LINE2'); ?></div> -->

<?php

$app = JFactory::getApplication();
$params_t = $app->getTemplate(true)->params;

$data = array(
    'designer_name' => $params_t->get('designername'),
    'designer_site' => $params_t->get('designersite')
);

if ($data['designer_name'] != 'my_name' and $data['designer_site'] != 'http://my_site.de') :
    echo JLayoutHelper::render('adhoc.copy', $data);
endif;

?>

