<?php

/**
 * @copyright	JDuo responsive template © 2014 adhocgraFX / Johannes Hock - All Rights Reserved.
 * @license		GNU/GPL
 **/

// No direct access.
defined('_JEXEC') or die;

/**
 * joomskeleton, joomfluid, joomflex, jduo and pasodoble module chrome
 **/

function modChrome_jduo($module, &$params, &$attribs)
{
    if (!empty ($module->content)) : ?>
        <div class="module <?php if ($params->get('moduleclass_sfx')!='') : ?><?php echo $params->get('moduleclass_sfx'); ?><?php endif; ?>">
            <?php if ($module->showtitle != 0) : ?>
                <?php if ($params->get('backgroundimage')) : ?>
                    <div class="module-image-title" >
                        <img src="<?php echo $params->get('backgroundimage');?>" >
                        <div class="caption">
                            <h4 class="image-title"><?php echo $module->title; ?></h4>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="module-title" >
                        <h4 class="title"><?php echo $module->title; ?></h4>
                    </div>
                <?php endif;?>
            <?php endif; ?>
                <div class="module-body">
                    <?php echo $module->content; ?>
                </div>
        </div>
    <?php endif;
}

function modChrome_flickity($module, &$params, &$attribs)
{
    if (!empty ($module->content)) : ?>
        <div class="module <?php if ($params->get('moduleclass_sfx')!='') : ?><?php echo $params->get('moduleclass_sfx'); ?><?php endif; ?>">
            <?php echo $module->content; ?>
        </div>
    <?php endif;
}