<?php

/**
* Google calendar latest events module
* @author allon
* @version $Revision: 2.0.0 $
**/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

if(!empty($error)){
	echo $error;
	return;
}

// How you want each thing to display.
// All bits listed below which are available:
// ###TITLE###, ###DESCRIPTION###, ###DATE###, ###PUBLISHED###
// ###WHERE###, ###BACKLINK###, ###LINK###, ###MAPLINK###
$dsplLink = "<a href='###BACKLINK###'>###TITLE###</a>";
if($params->get( 'openWindow', 0 )==1)
	$dsplLink = "<a href='###LINK###' target='_blank'>###TITLE###</a>";
$event_display="<p>".JText::_("PUBLISHED")." ###PUBLISHEDDATE### ###PUBLISHEDTIME###<br>###DATE### ###FROM###<br>".$dsplLink."</p>";

// Date format you want your details to appear
$dateformat=$params->get('dateFormat', 'd.m.Y'); // 10 March 2009 - see http://www.php.net/date for details
$timeformat=$params->get('timeFormat', 'H:i');; // 12.15am
$calName = $params->get( 'name', NULL );

// Loop through the array, and display what we wanted.
for ($i = 0; $i < sizeof($gcalendar_data) && $i <$params->get( 'max', 5 ); $i++){
	$item = $gcalendar_data[$i];
	
	$tz = $params->get('timezone', '');
	if($tz == ''){
		$feed = $item->get_feed();
		$tz = $feed->get_timezone();
	}

	// These are the dates we'll display
    $startDate = date($dateformat, $item->get_start_time());
    $startTime = date($timeformat, $item->get_start_time());
    $endTime = date($timeformat, $item->get_end_time());
    $pubDate = date($dateformat, $item->get_publish_date());
    $pubTime = date($timeformat, $item->get_publish_date());
    
    
    //Make any URLs used in the description also clickable
    $desc = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?,&//=]+)','<a href="\\1">\\1</a>', $item->get_description());

    // Now, let's run it through some str_replaces, and store it with the date for easy sorting later
    $temp_event=$event_display;
    $temp_event=str_replace("###TITLE###",$item->get_title(),$temp_event);
    $temp_event=str_replace("###DESCRIPTION###",$desc,$temp_event);
    $temp_event=str_replace("###PUBLISHEDDATE###",$pubDate,$temp_event);
    $temp_event=str_replace("###PUBLISHEDTIME###",$pubTime,$temp_event);
    $temp_event=str_replace("###DATE###",$startDate,$temp_event);
    $temp_event=str_replace("###FROM###",$startTime,$temp_event);
    $temp_event=str_replace("###UNTIL###",$endTime,$temp_event);
    $temp_event=str_replace("###WHERE###",$item->get_location(),$temp_event);
    $temp_event=str_replace("###BACKLINK###",urldecode(JURI::base().'index.php?option=com_gcalendar&task=event&eventID='.$item->get_id().'&calendarName='.$calName.'&ctz='.$tz),$temp_event);
    $temp_event=str_replace("###LINK###",$item->get_link(),$temp_event);
    $temp_event=str_replace("###MAPLINK###","http://maps.google.com/?q=".urlencode($item->get_location()),$temp_event);
    // Accept and translate HTML
    $temp_event=str_replace("&lt;","<",$temp_event);
    $temp_event=str_replace("&gt;",">",$temp_event);
    $temp_event=str_replace("&quot;","\"",$temp_event);

	echo $temp_event;
}
?>