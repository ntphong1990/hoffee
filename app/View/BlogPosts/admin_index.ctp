<div class="blogPosts index">
	<h2><?php echo __('Blog Posts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('summary'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th>
			<th><?php echo $this->Paginator->sort('published'); ?></th>
			<th><?php echo $this->Paginator->sort('sticky'); ?></th>
			<th><?php echo $this->Paginator->sort('in_rss'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_title'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_description'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_keywords'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($blogPosts as $blogPost): ?>
	<tr>
		<td><?php echo h($blogPost['BlogPost']['id']); ?>&nbsp;</td>
		<td><?php echo h($blogPost['BlogPost']['title']); ?>&nbsp;</td>
		<td><?php echo h($blogPost['BlogPost']['slug']); ?>&nbsp;</td>
		<td><?php echo h($blogPost['BlogPost']['summary']); ?>&nbsp;</td>
		<td><?php echo ''; ?>&nbsp;</td>
		<td><?php echo h($blogPost['BlogPost']['published']); ?>&nbsp;</td>
		<td><?php echo h($blogPost['BlogPost']['sticky']); ?>&nbsp;</td>
		<td><?php echo h($blogPost['BlogPost']['in_rss']); ?>&nbsp;</td>
		<td><?php echo h($blogPost['BlogPost']['meta_title']); ?>&nbsp;</td>
		<td><?php echo h($blogPost['BlogPost']['meta_description']); ?>&nbsp;</td>
		<td><?php echo h($blogPost['BlogPost']['meta_keywords']); ?>&nbsp;</td>
		<td><?php echo h($blogPost['BlogPost']['created']); ?>&nbsp;</td>
		<td><?php echo h($blogPost['BlogPost']['modified']); ?>&nbsp;</td>
		<td><?php echo h($blogPost['BlogPost']['image']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $blogPost['BlogPost']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $blogPost['BlogPost']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $blogPost['BlogPost']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $blogPost['BlogPost']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Blog Post'), array('action' => 'add')); ?></li>
	</ul>
</div>
