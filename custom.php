<?php
// Creates iframe to embed YouTube player. Uses YouTube Identifier to create url.
function video_embed()
{
	$html = '';
	if (metadata('item', array('Item Type Metadata', 'Identifier.YouTube'))) {
		$src = 'https://www.youtube.com/embed/' . metadata('item', array('Item Type Metadata', 'Identifier.YouTube'));
		$title = metadata('item', array('Dublin Core', 'Title'));
		$description = metadata('item', array('Dublin Core', 'Description'));
		$image = 'https://img.youtube.com/vi/' . metadata('item', array('Item Type Metadata', 'Identifier.YouTube')) . '/hqdefault.jpg';
		$video = 'https://www.youtube.com/embed/' . metadata('item', array('Item Type Metadata', 'Identifier.YouTube'));
		$uploadDate = metadata('item', 'added');
		$html .= '<div class="videoWrapper" itemprop="video" itemscope itemtype="http://schema.org/VideoObject">';
		$html .= '<!-- schema.org data -->';
		$html .= '<meta itemprop="name" content="' . $title . '" />';
		$html .= '<meta itemprop="description" content="' . $description . '" />';
		$html .= '<meta itemprop="thumbnailUrl" content="' . $image . '" />';
		$html .= '<meta itemprop="embedURL" content="' . $video . '" />';
		$html .= '<meta itemprop="uploadDate" content="' . $uploadDate . '" />';
		$html .= '<!-- YouTube iFrame -->';
		$html .= '<iframe id="ytplayer" type="text/html" width="560" height="315" src="' . $src . '?rel=0&autoplay=1&showinfo=0" frameborder="0" allowfullscreen></iframe>';
		$html .= '</div>';
	}
	elseif (metadata('item', array('Item Type Metadata', 'Identifier.GoogleDrive'))) {
		$src = 'https://drive.google.com/file/d/' . metadata('item', array('Item Type Metadata', 'Identifier.GoogleDrive')) . '/preview';
		$title = metadata('item', array('Dublin Core', 'Title'));
		$description = metadata('item', array('Dublin Core', 'Description'));
		$uploadDate = metadata('item', 'added');
		$html .= '<div class="videoWrapper" itemprop="video" itemscope itemtype="http://schema.org/VideoObject">';
		$html .= '<!-- schema.org data -->';
		$html .= '<meta itemprop="name" content="' . $title . '" />';
		$html .= '<meta itemprop="description" content="' . $description . '" />';
		$html .= '<meta itemprop="uploadDate" content="' . $uploadDate . '" />';
		$html .= '<!-- Google Drive iFrame -->';
		$html .= '<iframe type="text/html" width="560" height="315" src="' . $src . '?start=1&autoplay=1" frameborder="0" allowfullscreen></iframe>';
		$html .= '</div>';
	}
	return $html;
}

// Creates link to download link to Google Drive, either the master video file or supplemental file.
function gDrive_link()
{
	$html = '';
	if ((metadata('item', array('Item Type Metadata', 'Identifier.GoogleDrive'))) or (metadata('item', array('Item Type Metadata', 'Identifier.GoogleDriveForm')))) {
		$href = 'https://drive.google.com/uc?export=download&id=' . metadata('item', array('Item Type Metadata', 'Identifier.GoogleDrive'));
		$form_href = 'https://drive.google.com/uc?export=download&id=' . metadata('item', array('Item Type Metadata', 'Identifier.GoogleDriveForm'));
		$html .= '<div id="download" class="drive-link">';
		if (metadata('item', array('Item Type Metadata', 'Identifier.GoogleDrive'))) {
			$html .= '<a href="' . $href . '">Master Video File (Requires valid fitnyc.edu email)</a></br>';
		}
		if (metadata('item', array('Item Type Metadata', 'Identifier.GoogleDriveForm'))) {
			$html .= '<a href="' . $form_href . '">Supplementary file (Requires valid fitnyc.edu email)</a>';
		}
		$html .= '</div>';
	}
	else {
		$html .= '<div id="download" class="drive-link">Not available for download at this time.</div>';
	}
	return $html;
}

// Creates embed code for end users to use.
function youTube_embed_code()
{
	$html = '';
	if (metadata('item', array('Item Type Metadata', 'Identifier.YouTube'))) {
		$src = 'https://www.youtube.com/embed/' . metadata('item', array('Item Type Metadata', 'Identifier.YouTube'));
		$iframe = '<iframe id="ytplayer" type="text/html" width="560" height="315" src="' . $src . '" frameborder="0" allowfullscreen></iframe>';
		$html .= '<textarea rows="1" readonly>' . $iframe . '</textarea>';
	}
	return $html;
}

// Creates YouTube id to pull in YouTube generated thumbnails.
function video_thumbnail($item)
{
	$html = '';
	if (metadata('item', array('Item Type Metadata', 'Identifier.YouTube'))) {
		$src = 'https://img.youtube.com/vi/' . metadata($item, array('Item Type Metadata', 'Identifier.YouTube')) . '/hqdefault.jpg';
		$html .= '<img src="' . $src . '">';
	}
	elseif (metadata('item', array('Item Type Metadata', 'Identifier.GoogleDrive'))) {
		$src = 'https://drive.google.com/thumbnail?authuser=0&sz=w320&id=' . metadata($item, array('Item Type Metadata', 'Identifier.GoogleDrive'));
		$html .= '<img src="' . $src . '" onerror="this.src='. img('default_gdrive.png') . '">';
	}
	return $html;
}

// Creates markup for OWL Carousel jQuery plugin for featured videos.
function carousel()
{
	$items = get_records('Item', array('featured' => 1, 'sort_field' => 'added', 'sort_dir' => 'd'), 20);
	set_loop_records('items', $items);
	if ($items) {
        $html = '<div id="featured-carousel" class="owl-carousel">';
        foreach (loop('items') as $item) {
			$src = 'https://img.youtube.com/vi/' . metadata($item, array('Item Type Metadata', 'Identifier.YouTube')) . '/hqdefault.jpg';
			$img = link_to_item('<img src="' . $src . '">', array('class'=>'permalink'));
			$overlay = link_to_item('<div class="overlay"></div>', array('class'=>'permalink'));
			$description = link_to_item('<div class="title"><p>' . metadata('item', array('Dublin Core', 'Title')) . '</p></div><div class="extent"><i class="fa fa-clock-o"></i> ' . metadata('item', array('Dublin Core', 'Extent')) . '</div>', array('class'=>'permalink'));
			$html .= '<div class="carousel-item">' . $img . $overlay . $description . '</div>';
			release_object($item);
		}
		$html .= '</div>';
		return $html;
	}
}

// Creates markup for OWL Carousel jQuery plugin for channels; not used.
function collection_carousel($collection, $number)
{
	$items = get_records('Item', array('collection' => metadata('collection', 'id')), 20);
	set_loop_records('items', $items);
	if ($items) {
        $html = '<div id="collection-carousel-' . $number . '" class="owl-carousel">';
        foreach (loop('items') as $item) {
			$src = 'https://img.youtube.com/vi/' . metadata($item, array('Item Type Metadata', 'Identifier.YouTube')) . '/hqdefault.jpg';
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

// Creates markup for OWL Carousel jQuery plugin for categories; not used.
function tag_carousel($tag, $number)
{
	$items = get_records('Item', array('tags' => $tag['name']), 20);
	set_loop_records('items', $items);
	if ($items) {
        $html = '<div id="collection-carousel-' . $number . '" class="owl-carousel">';
        foreach (loop('items') as $item) {
			$src = 'https://img.youtube.com/vi/' . metadata($item, array('Item Type Metadata', 'Identifier.YouTube')) . '/hqdefault.jpg';
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

// Returns related videos based on the category.
function related_items($current_item)
{
	if (metadata($current_item, 'has tags')) {
		$tags = get_current_record($current_item)->Tags;
		$youTubeID = metadata($current_item, array('Item Type Metadata', 'Identifier.YouTube'));
		$items = get_records('Item', array('tags' => $tags[0], 'sort_field' => 'random', 'advanced' => array(array('element_id' => '53', 'type' => 'does not contain', 'terms' => $youTubeID))), 7);
		if ($items) {
			$html = '<div class="related_items"><h2>Related Videos</h2>';
			foreach ($items as $item) {
				$html .= '<div class="item-link">';
				$html .= link_to_item('<div class="item-link-thumb">' . video_thumbnail($item) . '<div class="overlay"></div><div class="extent"><i class="fa fa-clock-o"></i> ' . metadata('item', array('Dublin Core', 'Extent')) . '</div></div><div class="description"><h4>' . metadata($item, array('Dublin Core', 'Title')) . '</h4></div>', array('class'=>'permalink'), 'show', $item);
				$html .= '</div>';
				release_object($item);
			}
			$html .= '</div>';
			return $html;
		}
	}
}

//Returns links related parts, i.e. the second of a two-part video.
function related_parts($part)
{
	$part_item = get_records('Item', array('sort_field' => 'random', 'advanced' => array(array('element_id' => '50', 'type' => 'is exactly', 'terms' => $part))), 1);
		if ($part_item) {
			$html = link_to_item(html_escape($part), array('class'=>'permalink'), 'show', $part_item[0]);
			release_object($part_item);
			return $html;
		}
}

// Creates social media tags for a video, following Twitter and Facebook standards.
function social_tags($bodyclass) {
	$html = '';
	if ($bodyclass == "items show" ) {
		$item = get_current_record('item');
		$title = metadata($item, array('Dublin Core', 'Title'));
		$url = record_url($item, null, true);
		$image = 'https://img.youtube.com/vi/' . metadata($item, array('Item Type Metadata', 'Identifier.YouTube')) . '/hqdefault.jpg';
		$description = metadata($item, array('Dublin Core', 'Description'));
		$video = 'https://www.youtube.com/embed/' . metadata('item', array('Item Type Metadata', 'Identifier.YouTube'));
		$html .= '<meta name="description" content="' . $description . '" />';
		$html .= '<!-- Open Graph data -->';
		$html .= '<meta property="og:title" content="' . $title . '" />';
		$html .= '<meta property="og:type" content="video" />';
		$html .= '<meta property="og:url" content="' . $url . '" />';
		$html .= '<meta property="og:image" content="' . $image . '" />';
		$html .= '<meta property="og:description" content="' . $description . '" />';
		$html .= '<meta property="og:video:url" content="' . $video . '" />';
		$html .= '<meta property="og:video:secure_url" content="' . $video . '" />';
		$html .= '<meta property="og:video:type" content="text/html" />';
		$html .= '<!-- Twitter Card data -->';
		$html .= '<meta name="twitter:card" content="player">';
		$html .= '<meta name="twitter:title" content="' . $title . '" />';
		$html .= '<meta name="twitter:site" content="@FITLibrary">';
		$html .= '<meta name="twitter:description" content="' . $description . '" />';
		$html .= '<meta name="twitter:player" content="' . $video . '" />';
		$html .= '<meta name="twitter:player:width" content="560">';
		$html .= '<meta name="twitter:player:height" content="315">';
		$html .= '<meta name="twitter:image" content="' . $image . '" />';
	}
	else {
		if ($site_description = option('description')) {
			$html .= '<meta name="description" content="' . $site_description . '" />';
		}
	}
	return $html;
}

// Given an metadata element and term, returns a search of all videos that match that term.
function heading_links($elementName, $text) {
	$element = get_db()->getTable('Element')->findByElementSetNameAndElementName('Dublin Core', $elementName);
	$id = $element->id;
	$advanced[] = array('element_id' => $id, 'terms' => htmlspecialchars_decode($text, ENT_QUOTES), 'type' => 'is exactly');
	$paramArray = array('search' => '', 'advanced' => $advanced);
	$params = http_build_query($paramArray);
	$url = url('/items/browse?') . $params;
	$html = '<a href="';
	$html .= $url;
	$html .= '">';
	$html .= $text;
	$html .= '</a>';
	return $html;
}

; ?>
