<?php
/**
 * GCalendar is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * GCalendar is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with GCalendar.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package		GCalendar
 * @author		Digital Peak http://www.digital-peak.com
 * @copyright	Copyright (C) 2007 - 2013 Digital Peak. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

defined('_JEXEC') or die();

JFactory::getDocument()->addStyleSheet('components/com_gcalendar/views/cpanel/tmpl/default.css');
?>
<div style="width:500px;">
<h2><?php echo JText::_('COM_GCALENDAR_VIEW_CPANEL_WELCOME'); ?></h2>
<p>
<?php echo JText::_('COM_GCALENDAR_VIEW_CPANEL_INTRO'); ?>
</p>
<br>

<div id="cpanel" style="float:left">
    <div style="float:left;margin-right: 20px">
            <div class="icon">
                <a href="index.php?option=com_gcalendar&view=gcalendars" >
                <img src="<?php echo JURI::base(true);?>/../media/com_gcalendar/images/48-calendar.png" height="50px" width="50px">
                <span><?php echo JText::_('COM_GCALENDAR_VIEW_CPANEL_GCALENDARS'); ?></span>
                </a>
            </div>
            <div class="icon">
                <a href="index.php?option=com_gcalendar&task=import" >
                <img src="<?php echo JURI::base(true);?>/../media/com_gcalendar/images/admin/import.png" height="50px" width="50px">
                <span><?php echo JText::_('COM_GCALENDAR_VIEW_CPANEL_IMPORT'); ?></span>
                </a>
            </div>
            <div class="icon">
                <a href="index.php?option=com_gcalendar&view=gcalendar&layout=edit" >
                <img src="<?php echo JURI::base(true);?>/../media/com_gcalendar/images/admin/add.png" height="50px" width="50px">
                <span><?php echo JText::_('COM_GCALENDAR_VIEW_CPANEL_ADD'); ?></span>
                </a>
            </div>
            <div class="icon">
                <a href="index.php?option=com_gcalendar&view=tools" >
                <img src="<?php echo JURI::base(true);?>/../media/com_gcalendar/images/admin/tools.png" height="50px" width="50px">
                <span><?php echo JText::_('COM_GCALENDAR_SUBMENU_TOOLS'); ?></span>
                </a>
            </div>
            <div class="icon">
                <a href="index.php?option=com_gcalendar&view=support" >
                <img src="<?php echo JURI::base(true);?>/../media/com_gcalendar/images/admin/support.png" height="50px" width="50px">
                <span><?php echo JText::_('COM_GCALENDAR_SUBMENU_SUPPORT'); ?></span>
                </a>
            </div>
    </div>
</div>
</div>
<a class="twitter-timeline" href="https://twitter.com/digitpeak" data-widget-id="346951058737750017">Tweets by @digitpeak</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<div align="center" style="clear: both">
	<br>
	<?php echo sprintf(JText::_('COM_GCALENDAR_FOOTER'), JRequest::getVar('GCALENDAR_VERSION'));?>
</div>