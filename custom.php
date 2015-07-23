<?php

function video_embed()
{
	$src = 'https://www.youtube.com/embed/' . metadata('item', array('Item Type Metadata', 'Identifier.YouTube'));
	$href = 'https://drive.google.com/uc?export=download&id=' . metadata('item', array('Item Type Metadata', 'Identifier.GoogleDrive'));
	return '<div class="videoWrapper"><iframe width="560" height="349" src="' . $src . '?rel=0&autoplay=1&showinfo=0" frameborder="0" allowfullscreen></iframe></div><div class="drive-link"><a href="' . $href . '">Download Original File (Requires valid fitnyc.edu email)</a></div>'; 
}

function YouTube_thumbnail($item)
{
	$src = 'http://img.youtube.com/vi/' . metadata($item, array('Item Type Metadata', 'Identifier.YouTube')) . '/hqdefault.jpg';
	return '<img src="' . $src . '">';
}

function carousel()
{
	$items = get_records('Item', array('featured' => 1, 'sort_field' => 'random'), 20);
	set_loop_records('items', $items);
	if ($items) {
        $html = '<div id="featured-carousel" class="owl-carousel">';
        foreach (loop('items') as $item) {
			$src = 'http://img.youtube.com/vi/' . metadata($item, array('Item Type Metadata', 'Identifier.YouTube')) . '/hqdefault.jpg';
			$img = link_to_item('<img src="' . $src . '">', array('class'=>'permalink'));
			$overlay = link_to_item('<div class="overlay"></div>', array('class'=>'permalink'));
			$description = link_to_item('<div class="title"><p>' . metadata('item', array('Dublin Core', 'Title')) . '</p></div>', array('class'=>'permalink'));
			$html .= '<div class="carousel-item">' . $img . $overlay . $description . '</div>';
		}
		$html .= '</div>';
		return $html;
	}
}

function collection_carousel($collection, $number)
{
	$items = get_records('Item', array('collection' => metadata('collection', 'id')), 20);
	set_loop_records('items', $items);
	if ($items) {
        $html = '<div id="collection-carousel-' . $number . '" class="owl-carousel">';
        foreach (loop('items') as $item) {
			$src = 'http://img.youtube.com/vi/' . metadata($item, array('Item Type Metadata', 'Identifier.YouTube')) . '/hqdefault.jpg';
			$img = link_to_item('<img src="' . $src . '">', array('class'=>'permalink'));
			$overlay = link_to_item('<div class="overlay"></div>', array('class'=>'permalink'));
			$description = link_to_item('<div class="title"><p>' . metadata('item', array('Dublin Core', 'Title')) . '</p></div>', array('class'=>'permalink'));
			$html .= '<div class="collection-carousel-item">' . $img . $overlay . $description . '</div>';
		}
		$html .= '</div>';
		return $html;
	}
}

function related_items($current_item)
{
	if (metadata($current_item, 'has tags')) {
		$tags = get_current_record($current_item)->Tags;
		$youTubeID = metadata($current_item, array('Item Type Metadata', 'Identifier.YouTube'));
		$items = get_records('Item', array('tags' => $tags[0], 'sort_field' => 'random', 'advanced' => array(array('element_id' => '53', 'type' => 'does not contain', 'terms' => $youTubeID))), 7);
		set_loop_records('items', $items);
		if ($items) {
			$html = '<div class="related_items"><h2>Related Videos</h2>';
			foreach (loop('items') as $item) {
				$html .= get_view()->partial('items/single.php', array('item' => $item));
				release_object($item);
			}
			$html .= '</div>';
			return $html;
		}
	}
}

; ?>