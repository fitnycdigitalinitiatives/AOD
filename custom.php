<?php

function YouTube_embed()
{
	$src = 'https://www.youtube.com/embed/' . metadata('item', array('Dublin Core', 'Relation'));
	echo '<div class="videoWrapper"><iframe width="560" height="349" src="' . $src . '" frameborder="0" allowfullscreen></iframe></div>' 
}

; ?>