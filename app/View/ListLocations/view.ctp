<div class="listLocations view">
<h2><?php echo __('List Location'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($listLocation['ListLocation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($listLocation['ListLocation']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($listLocation['ListLocation']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($listLocation['ListLocation']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit List Location'), array('action' => 'edit', $listLocation['ListLocation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete List Location'), array('action' => 'delete', $listLocation['ListLocation']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $listLocation['ListLocation']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List List Locations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New List Location'), array('action' => 'add')); ?> </li>
	</ul>
</div>
