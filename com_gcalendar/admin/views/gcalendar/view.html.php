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

JLoader::import('components.com_gcalendar.libraries.GCalendar.view', JPATH_ADMINISTRATOR);

class GCalendarViewGCalendar extends GCalendarView {

	protected $gcalendar = null;
	protected $form = null;

	protected function addToolbar() {
		JRequest::setVar('hidemainmenu', true);

		$canDo = GCalendarUtil::getActions($this->gcalendar->id);
		if ($this->gcalendar->id < 1) {
			if ($canDo->get('core.create')) {
				JToolBarHelper::apply('gcalendar.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('gcalendar.save', 'JTOOLBAR_SAVE');
				JToolBarHelper::custom('gcalendar.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
			}
			JToolBarHelper::cancel('gcalendar.cancel', 'JTOOLBAR_CANCEL');
		} else {
			if ($canDo->get('core.edit')) {
				JToolBarHelper::apply('gcalendar.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('gcalendar.save', 'JTOOLBAR_SAVE');

				if ($canDo->get('core.create')) {
					JToolBarHelper::custom('gcalendar.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
				}
			}
			if ($canDo->get('core.create')) {
				JToolBarHelper::custom('gcalendar.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
			}
			JToolBarHelper::cancel('gcalendar.cancel', 'JTOOLBAR_CLOSE');
		}

		parent::addToolbar();
	}

	protected function init() {
		$this->form = $this->get('Form');
		$this->gcalendar = $this->get('Item');
	}
}