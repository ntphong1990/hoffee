<script src="//cdn.ckeditor.com/4.5.7/full-all/ckeditor.js"></script>
<div class="blogPosts form">

<?php echo $this->Form->create('BlogPost', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Blog Post'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('slug');
		echo $this->Form->input('summary');

		echo $this->Form->input('body', array('class' => 'form-control ckeditor'));

		echo $this->Form->input('published');
		echo $this->Form->input('sticky');
		echo $this->Form->input('in_rss');
		echo $this->Form->input('meta_title');
		echo $this->Form->input('meta_description');
		echo $this->Form->input('meta_keywords');
	  echo $this->Form->input('image', array('type' => 'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BlogPost.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('BlogPost.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Blog Posts'), array('action' => 'index')); ?></li>
	</ul>
</div>
