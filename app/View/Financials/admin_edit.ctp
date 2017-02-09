</br>
</br>

<br />

<div class="row">
	<div class="col-sm-5">
<?php echo $this->Form->create('Financial'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Financial'); ?></legend>
	<?php
		echo $this->Form->input('id', array('class' => 'form-control'));
		echo $this->Form->input('type', array('class' => 'form-control'));
		echo $this->Form->input('value', array('class' => 'form-control'));
		echo $this->Form->input('note', array('class' => 'form-control'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
	</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Financial.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Financial.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Financials'), array('action' => 'index')); ?></li>
	</ul>
</div>
