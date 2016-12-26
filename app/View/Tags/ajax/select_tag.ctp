<div class="popover_choice select_tag">
	<legend>Select Tag</legend>
	<div style="display:none;">
		<?php
			if (isset($attributeTag)) {
				echo $this->Form->create('Attribute', array('url' => '/attributes/addTag/' . $object_id, 'style' => 'margin:0px;'));
			} else {
				echo $this->Form->create('Event', array('url' => '/events/addTag/' . $object_id, 'style' => 'margin:0px;'));
			}
			echo $this->Form->input('tag', array('value' => 0));
			echo $this->Form->end();
		?>
	</div>
	<div style="text-align:right;width:100%;" class="select_tag_search">
		<input id="filterField" style="width:100%;border:0px;padding:0px;" placeholder="search tags..."/>
	</div>
	<div class="popover_choice_main" id ="popover_choice_main">
		<table style="width:100%;">
		<?php foreach ($options as $k => &$option): ?>
<<<<<<< HEAD
			<tr style="border-bottom:1px solid black;" class="templateChoiceButton">
				<?php if (isset($attributeTag)): ?>
				<td style="padding-left:10px;padding-right:10px; text-align:center;width:100%;" onClick="quickSubmitAttributeTagForm('<?php echo h($object_id);?>', '<?php echo h($k); ?>');" title="<?php echo h($expanded[$k]);?>"><?php echo h($option); ?></td>
				<?php else: ?>
				<td style="padding-left:10px;padding-right:10px; text-align:center;width:100%;" onClick="quickSubmitTagForm('<?php echo h($object_id);?>', '<?php echo h($k); ?>');" title="<?php echo h($expanded[$k]);?>"><?php echo h($option); ?></td>
				<?php endif; ?>
=======
			<tr id="field_<?php echo h($k); ?>" style="border-bottom:1px solid black;" class="templateChoiceButton">
				<td style="padding-left:10px;padding-right:10px; text-align:center;width:100%;" onClick="quickSubmitTagForm('<?php echo h($event_id);?>', '<?php echo h($k); ?>');" title="<?php echo h($expanded[$k]);?>"><?php echo h($option); ?></td>
>>>>>>> 2.4
			</tr>
		<?php endforeach; ?>
		<tr style="border-bottom:1px solid black;" class="templateChoiceButton">
			<td style="padding-left:10px;padding-right:10px; text-align:center;width:100%;" onClick="getPopup('<?php echo h($object_id); if (isset($attributeTag)) echo '/true'; ?>', 'tags', 'selectTaxonomy');" title="Select Taxonomy">Back to Taxonomy Selection</td>
		</tr>
		</table>
	</div>
	<div class="templateChoiceButton templateChoiceButtonLast" onClick="cancelPopoverForm();">Cancel</div>
</div>
<script type="text/javascript">
	var tags = <?php echo json_encode($options); ?>;
	$(document).ready(function() {
		resizePopoverBody();
		 $("#filterField").focus();
	});
	
	$('#filterField').keyup(function() {
		var filterString =  $("#filterField").val().toLowerCase();
		$.each(tags, function(index, value) {
			if (value.toLowerCase().indexOf(filterString) == -1) {
				$('#field_' + index).hide();
			} else {
				$('#field_' + index).show();
			}
		});
	});
	
	$(window).resize(function() {
		resizePopoverBody();
	});
</script>
