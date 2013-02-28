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

class GCalendarViewGCalendars extends GCalendarView {

	protected $icon = 'calendar';
	protected $title = 'COM_GCALENDAR_MANAGER_GCALENDAR';

	protected $items = null;
	protected $pagination = null;

	protected function addToolbar() {
		$canDo = GCalendarUtil::getActions();
		if ($canDo->get('core.create')) {
			JToolBarHelper::addNew('gcalendar.add', 'JTOOLBAR_NEW');
			JToolBarHelper::custom('import', 'upload.png', 'upload.png', 'COM_GCALENDAR_VIEW_GCALENDARS_BUTTON_IMPORT', false);
		}
		if ($canDo->get('core.edit')) {
			JToolBarHelper::editList('gcalendar.edit', 'JTOOLBAR_EDIT');
		}
		if ($canDo->get('core.delete')) {
			JToolBarHelper::deleteList('', 'gcalendars.delete', 'JTOOLBAR_DELETE');
		}

		parent::addToolbar();
	}

	protected function init() {
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
	}
}