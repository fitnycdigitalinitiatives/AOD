<?php

function video_embed()
{
	$src = 'https://www.youtube.com/embed/' . metadata('item', array('Item Type Metadata', 'Identifier.YouTube'));
	$href = 'https://drive.google.com/uc?export=download&id=' . metadata('item', array('Item Type Metadata', 'Identifier.GoogleDrive'));
	return '<div class="videoWrapper"><iframe width="560" height="349" src="' . $src . '?autoplay=1" frameborder="0" allowfullscreen></iframe></div><div class="drive-link"><a href="' . $href . '">Download Original File</a></div>'; 
}

function YouTube_thumbnail()
{
	$src = 'http://img.youtube.com/vi/' . metadata('item', array('Item Type Metadata', 'Identifier.YouTube')) . '/hqdefault.jpg';
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
			$html .= '<div class="carousel-item">' . $img . $overlay . $description. '</div>';
		}
		$html .= '</div>';
		return $html;
	}
}

; ?>