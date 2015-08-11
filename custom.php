<?php

function youTube_embed()
{
	$html = '';
	if (metadata('item', array('Item Type Metadata', 'Identifier.YouTube'))) {
		$src = 'https://www.youtube.com/embed/' . metadata('item', array('Item Type Metadata', 'Identifier.YouTube'));
		$html .= '<div class="videoWrapper"><iframe width="560" height="315" src="' . $src . '?rel=0&autoplay=1&showinfo=0" frameborder="0" allowfullscreen></iframe></div>';
	}
	return $html;
}

function gDrive_link() 
{
	$html = '';
	if (metadata('item', array('Item Type Metadata', 'Identifier.GoogleDrive'))) {
		$href = 'https://drive.google.com/uc?export=download&id=' . metadata('item', array('Item Type Metadata', 'Identifier.GoogleDrive'));
		$html .= '<div id="download" class="drive-link"><a href="' . $href . '">Download Original File (Requires valid fitnyc.edu email)</a></div>'; 
	}
	else {
		$html .= '<div id="download" class="drive-link">Not available for download at this time.</div>'; 
	}
	return $html;
}

function youTube_embed_code()
{
	$html = '';
	if (metadata('item', array('Item Type Metadata', 'Identifier.YouTube'))) {
		$src = 'https://www.youtube.com/embed/' . metadata('item', array('Item Type Metadata', 'Identifier.YouTube'));
		$iframe = '<iframe width="560" height="315" src="' . $src . '" frameborder="0" allowfullscreen></iframe>';
		$html .= '<textarea rows="1" readonly>' . $iframe . '</textarea>';
	}
	return $html;
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
			release_object($item);
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
			release_object($item);
		}
		$html .= '</div>';
		return $html;
	}
}

function tag_carousel($tag, $number)
{
	$items = get_records('Item', array('tags' => $tag['name']), 20);
	set_loop_records('items', $items);
	if ($items) {
        $html = '<div id="collection-carousel-' . $number . '" class="owl-carousel">';
        foreach (loop('items') as $item) {
			$src = 'http://img.youtube.com/vi/' . metadata($item, array('Item Type Metadata', 'Identifier.YouTube')) . '/hqdefault.jpg';
			$img = link_to_item('<img src="' . $src . '">', array('class'=>'permalink'));
			$overlay = link_to_item('<div class="overlay"></div>', array('class'=>'permalink'));
			$description = link_to_item('<div class="title"><p>' . metadata('item', array('Dublin Core', 'Title')) . '</p></div>', array('class'=>'permalink'));
			$html .= '<div class="collection-carousel-item">' . $img . $overlay . $description . '</div>';
			release_object($item);
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

function social_tags($bodyclass) {
	$html = '';
	if ($bodyclass == "items show" ) {
		$item = get_current_record('item');
		$title = metadata($item, array('Dublin Core', 'Title'));
		$url = record_url($item);
		$image = 'http://img.youtube.com/vi/' . metadata($item, array('Item Type Metadata', 'Identifier.YouTube')) . '/hqdefault.jpg';
		$description = metadata($item, array('Dublin Core', 'Description'));
		$video = 'https://www.youtube.com/embed/' . metadata('item', array('Item Type Metadata', 'Identifier.YouTube'));
		$html .= '<!-- Open Graph data -->';
		$html .= '<meta property="og:title" content="' . $title . '" />';
		$html .= '<meta property="og:type" content="video" />';
		$html .= '<meta property="og:url" content="' . $url . '" />';
		$html .= '<meta property="og:image" content="' . $image . '" />';
		$html .= '<meta property="og:description" content="' . $description . '" />';
		$html .= '<meta property="og:video" content="' . $video . '" />';
	}
	return $html;
}

; ?>