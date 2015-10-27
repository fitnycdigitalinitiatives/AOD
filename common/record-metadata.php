<div class="element-set">
<h2>Metadata</h2>
<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
	<?php foreach ($setElements as $elementName => $elementInfo): ?>
		<?php if ($elementName == "Subject"): ?>
			<?php $element = get_db()->getTable('Element')->findByElementSetNameAndElementName('Dublin Core', $elementName); ?>
			<?php $id = $element->id; ?>
			<div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
				<h3><?php echo html_escape(__($elementName)); ?></h3>
				<?php foreach ($elementInfo['texts'] as $text): ?>
					<?php 
					$advanced[] = array('element_id' => $id, 'terms' => $text, 'type' => 'is exactly');
					$paramArray = array('search' => '', 'advanced' => $advanced);
					$params = http_build_query($paramArray);
					$link = 'items/browse?' . $params;
					?>
					<div class="element-text"><?php echo $link; ?></div>
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