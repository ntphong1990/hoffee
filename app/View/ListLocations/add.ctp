<div class="listLocations form">
<?php echo $this->Form->create('ListLocation'); ?>
	<fieldset>
		<legend><?php echo __('Add List Location'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List List Locations'), array('action' => 'index')); ?></li>
	</ul>
</div>
