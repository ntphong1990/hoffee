<div class="customers index">
	<h2><?php echo __('Customers'); ?></h2>
	<table style="margin-top: 0px" data-toggle="table" data-url="tables/data1.json" data-show-refresh="true"
		   data-show-toggle="true" data-show-columns="true" data-search="true"
		   data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
		   data-sort-order="desc" class="table table-hover">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('lastname'); ?></th>
			<th><?php echo $this->Paginator->sort('birthday'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>

			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($customers as $customer): ?>
	<tr>
		<td><?php echo h($customer['Customer']['id']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['name']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['birthday']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['address']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['phone']); ?>&nbsp;</td>

		<td><?php echo h($customer['Customer']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $customer['Customer']['id']),array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $customer['Customer']['id']),array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $customer['Customer']['id']),array('class' => 'btn btn-default btn-xs'),array('confirm' => __('Are you sure you want to delete # %s?', $customer['Customer']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
		<?php echo $this->element('pagination-counter'); ?>

		<?php echo $this->element('pagination'); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Customer'), array('action' => 'add')); ?></li>
	</ul>
</div>
