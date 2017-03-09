<div class="listLocations form">
<?php echo $this->Form->create('ListLocation'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit List Location'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('alias');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ListLocation.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('ListLocation.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List List Locations'), array('action' => 'index')); ?></li>
	</ul>
</div>
