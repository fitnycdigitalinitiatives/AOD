<div class="element-set">
<h2>Metadata</h2>
<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
	<?php if ($setName == "Dublin Core"): ?>
		<div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
			<h3><?php echo html_escape(__($elementName)); ?></h3>
			<?php foreach ($elementInfo['texts'] as $text): ?>
				<div class="element-text"><?php echo $text; ?></div>
			<?php endforeach; ?>
		</div><!-- end element -->
	<?php else: ?>
		<div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
			<h3><?php echo html_escape(__($elementName)); ?></h3>
			<?php foreach ($elementInfo['texts'] as $text): ?>
				<div class="element-text"><?php echo $text; ?></div>
			<?php endforeach; ?>
		</div><!-- end element -->
	<?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>
</div><!-- end element-set -->