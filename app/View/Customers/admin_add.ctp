</br>
</br>

<br />

<div class="row">
    <div class="col-sm-5">
<?php echo $this->Form->create('Customer'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Customer'); ?></legend>
	<?php
		echo $this->Form->input('name', array('class' => 'form-control'));
        echo $this->Form->input('lastname', array('class' => 'form-control'));
		echo $this->Form->input('birthday', array('class' => 'form-control','type' => 'date','minYear' => 1950));
		echo $this->Form->input('address', array('class' => 'form-control'));
		echo $this->Form->input('phone', array('class' => 'form-control'));

		echo $this->Form->input('email', array('class' => 'form-control'));
		echo $this->Form->input('district', array('class' => 'form-control','type' => 'select', 'options' => $district, 'label' => false));
	    echo $this->Form->input('state', array('class' => 'form-control', 'options' => $states,'text' => 'name', 'label' => 'Quan'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div></div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?></li>
	</ul>
</div>
