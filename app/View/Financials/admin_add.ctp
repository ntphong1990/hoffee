</br>
</br>

<br />

<div class="row">
	<div class="col-sm-5">
<?php echo $this->Form->create('Financial'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Financial'); ?></legend>
		<select name="data[Financial][type]" class="form-control" id="FinancialType">
			<option value="1">Thu</option>
			<option value="2">Chi</option>

		</select>
		<?php

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

		<li><?php echo $this->Html->link(__('List Financials'), array('action' => 'index')); ?></li>
	</ul>
</div>
