<?php 
$box_view = 'feature';

if (elgg_is_active_plugin('event_manager')) {
        $title = elgg_echo('<div style="color:grey;font-size:0.8em;border-bottom:1px solid lightgrey;">Upcoming Events</div>');
        
        $event_options = array("limit" => 10);

	elgg_push_context('widgets');
	$events = event_manager_search_events($event_options);

	$latest_events = elgg_view_entity_list($events['entities'], array("count" => $events["count"], "offset" => 0, "limit" => 3, "pagination" => false, "full_view" => false));

        if ($latest_events) {

                $river_body = $latest_events;


	elgg_pop_context();

                $river_body .= '<p style="text-align:right; margin:3px 3px;"><a href="'.elgg_get_site_url().'events"><b>'.elgg_echo('View More').'</b></a></p>';
        }else {
                $river_body = elgg_echo ('There are no Upcoming Events');
                $river_body .= '<p style="text-align:right; margin:3px 3px;"><a href="'.elgg_get_site_url().'events/event/new"><b>'.elgg_echo('Add Event').'</b></a></p>';
        }

echo elgg_view_module($box_view, $title, $river_body);

}

	$head = elgg_echo('<div style="color:grey;font-size:0.8em;border-bottom:1px solid lightgrey;">Campus News</div>');
    $river_body = file_get_contents("/home/happyro2/crontab/campusrss/news.txt");
	echo elgg_view_module($box_view, $head, $river_body);     
?>
