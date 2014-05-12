<?php

/**
 *
 * Bootstrap 3 for Joolma
 *
 * @author David Costa<davidcosta@csthost.com.br>
 * @copyright Copyright © 2014 David Costa <davidcosta@csthost.com.br>. All right reserved
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @link https://github.com/davidsantanacosta/joomla-bootstrap-3-template
 *
 */

// no direct access
defined('_JEXEC') or die;


// Note. It is important to remove spaces between elements.

if($item->parent) {
	$parentData = 'data-toggle="dropdown"';
	$item->anchor_css .= ' dropdown-toggle';
} else {
	$parentData = '"';
}

$class = $item->anchor_css ? 'class="' . $item->anchor_css . '" ' : '';
$title = $item->anchor_title ? 'title="' . $item->anchor_title . '" ' : '';

if ($item->menu_image)
	{
		$item->params->get('menu_text', 1) ?
		$linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" /><span class="image-title">' . $item->title . '</span> ' :
		$linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" />';
}
else
{
	$linktype = $item->title;
}

$flink = $item->flink;
$flink = JFilterOutput::ampReplace(htmlspecialchars($flink));

switch ($item->browserNav) :
	default:
	case 0:
?><a <?php echo $class; ?>href="<?php echo $flink; ?>" <?php echo $title; ?> <?php echo $parentData; ?>><?php echo $linktype; ?><?php if($item->parent) echo ' <b class="caret"></b>'; ?></a><?php
		break;
	case 1:
		// _blank
?><a <?php echo $class; ?>href="<?php echo $flink; ?>"  <?php echo $parentData; ?>target="_blank" <?php echo $title; ?>><?php echo $linktype; ?><?php if($item->parent) echo ' <b class="caret"></b>'; ?></a><?php
		break;
	case 2:
		// window.open
		$options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,'.$params->get('window_open');
			?><a <?php echo $class; ?>href="<?php echo $flink; ?>" onclick="window.open(this.href,'targetWindow','<?php echo $options;?>');return false;" <?php echo $title; ?> <?php echo $parentData; ?>><?php echo $linktype; ?><?php if($item->parent) echo ' <b class="caret"></b>'; ?></a><?php
		break;
endswitch;
