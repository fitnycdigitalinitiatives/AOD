<div class="element-set">
<h2>Metadata</h2>
<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
    <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
        <h3><?php echo html_escape(__($elementName)); ?></h3>
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <div class="element-text"><?php echo $elementInfo['id']; ?></div>
        <?php endforeach; ?>
    </div><!-- end element -->
    <?php endforeach; ?>
<?php endforeach; ?>
</div><!-- end element-set -->