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

JLoader::import('joomla.database.table');
JLoader::import('joomla.utilities.simplecrypt');

class GCalendarTableGCalendar extends JTable
{
	function __construct(&$db)
	{
		parent::__construct('#__gcalendar', 'id', $db);
	}

	public function bind($array, $ignore = '')
	{
		if (isset($array['params']) && is_array($array['params']))
		{
			// Convert the params field to a string.
			$parameter = new JRegistry;
			$parameter->loadArray($array['params']);
			$array['params'] = (string)$parameter;
		}

		return parent::bind($array, $ignore);
	}

	public function load($keys = null, $reset = true)
	{
		$result = parent::load($keys, $reset);

		if(isset($this->password) && !empty($this->password)){
			$cryptor = new JSimpleCrypt();
			$this->password = $cryptor->decrypt($this->password);
		}

		return $result;
	}

	public function store($updateNulls = false)
	{
		$oldPassword = $this->password;
		if(!empty($oldPassword)){
			$cryptor = new JSimpleCrypt();
			$this->password = $cryptor->encrypt($oldPassword);
		}
		$result = parent::store($updateNulls);

		$this->password = $oldPassword;

		return $result;
	}
}