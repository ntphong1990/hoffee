<script>
	function pageLoad(){
    }
    </script>
<div class="widget-body">
<?php echo $this->Form->create('Stock'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Stock'); ?></legend>
	<?php
		echo $this->Form->input('product_id');
		echo $this->Form->input('store_id');
		echo $this->Form->input('type');
		echo $this->Form->input('quanlity');
		echo $this->Form->input('note');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Stocks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
