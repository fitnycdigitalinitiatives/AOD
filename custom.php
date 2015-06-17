<?php

function YouTube_embed()
{
	$src = 'https://www.youtube.com/embed/' . metadata('item', array('Dublin Core', 'Relation'));
	$href = 'https://drive.google.com/uc?export=download&id=' . metadata('item', array('Dublin Core', 'Identifier'));
	echo '<div class="videoWrapper"><iframe width="560" height="349" src="' . $src . '" frameborder="0" allowfullscreen></iframe></div><div class="drive-link"><a href="' . $href . '">Download Original File</a></div>'; 
}

; ?>