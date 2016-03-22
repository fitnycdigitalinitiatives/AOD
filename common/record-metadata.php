<div class="element-set">
<h2>About This Video</h2>
<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
	<?php
		switch($elementName) {
			// Check if $elementName is 'Extent'
			case 'Extent':
				$elementLabel = 'Length';
				break;

			// Check if $elementName is 'Temporal Coverage'
			case 'Temporal Coverage':
				$elementLabel = 'Time Period';
				break;
				
			// Check if $elementName is 'Spatial Coverage'
			case 'Spatial Coverage':
				$elementLabel = 'Geography';
				break;

			// Leave the default for headings you don't want to change.
			default:
				$elementLabel = $elementName;
		}
	; ?>
	<?php if (($setName == "Dublin Core") and (($elementName == "Subject") or ($elementName == "Contributor") or ($elementName == "Spatial Coverage") or ($elementName == "Temporal Coverage"))): ?>
		<div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
			<h3><?php echo html_escape(__($elementLabel)); ?></h3>
			<?php foreach ($elementInfo['texts'] as $text): ?>
				<div class="element-text"><?php echo heading_links($elementName, $text); ?></div>
			<?php endforeach; ?>
		</div><!-- end element -->
	<?php else: ?>
		<div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
			<h3><?php echo html_escape(__($elementLabel)); ?></h3>
			<?php foreach ($elementInfo['texts'] as $text): ?>
				<div class="element-text"><?php echo $text; ?></div>
			<?php endforeach; ?>
		</div><!-- end element -->
	<?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>
</div><!-- end element-set -->