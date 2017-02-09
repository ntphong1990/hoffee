<div class="financials view">
<h2><?php echo __('Financial'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($financial['Financial']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($financial['Financial']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($financial['Financial']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($financial['Financial']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($financial['Financial']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($financial['Financial']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Financial'), array('action' => 'edit', $financial['Financial']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Financial'), array('action' => 'delete', $financial['Financial']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $financial['Financial']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Financials'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Financial'), array('action' => 'add')); ?> </li>
	</ul>
</div>
