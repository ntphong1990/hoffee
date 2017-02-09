<div class="financials form">
<?php echo $this->Form->create('Financial'); ?>
	<fieldset>
		<legend><?php echo __('Add Financial'); ?></legend>
	<?php
		echo $this->Form->input('type');
		echo $this->Form->input('value');
		echo $this->Form->input('note');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Financials'), array('action' => 'index')); ?></li>
	</ul>
</div>
