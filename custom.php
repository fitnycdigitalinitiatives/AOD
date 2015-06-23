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

; ?>