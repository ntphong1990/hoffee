<script>

    function pageLoad(){

    }
</script>
	<div class="row head-action">
						<div class="col-sm-12 col-lg-6">
						
							<span><a class="back-list hidden-xs" href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/brands/index">Quản lý nhóm sản phẩm</a></span>
						
						
						</div>
						<div class="col-sm-12 col-lg-6">
								<?php echo $this->Html->link('New Brand', array('action' => 'add'), array('class' => 'btn btn-default right')); ?>
						</div>

</div>
<div class="widget">

<table class="table">
    <tr>
        <th><?php echo $this->Paginator->sort('id'); ?></th>
        <th><?php echo $this->Paginator->sort('name'); ?></th>
        <th><?php echo $this->Paginator->sort('slug'); ?></th>
        <th><?php echo $this->Paginator->sort('active'); ?></th>
        <th><?php echo $this->Paginator->sort('created'); ?></th>
        <th><?php echo $this->Paginator->sort('modified'); ?></th>
        <th class="actions">Actions</th>
    </tr>
    <?php foreach ($brands as $brand): ?>
        <tr>
            <td><?php echo h($brand['Brand']['id']); ?></td>
            <td><?php echo h($brand['Brand']['name']); ?></td>
            <td><?php echo h($brand['Brand']['slug']); ?></td>
            <td><?php echo $this->Html->link($this->Html->image('icon_' . $brand['Brand']['active'] . '.png'), array('controller' => 'brands', 'action' => 'switch', 'active', $brand['Brand']['id']), array('class' => 'status', 'escape' => false)); ?></td>
            <td><?php echo h($brand['Brand']['created']); ?></td>
            <td><?php echo h($brand['Brand']['modified']); ?></td>
            <td class="actions">
                <?php echo $this->Html->link('View', array('action' => 'view', $brand['Brand']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                <?php echo $this->Html->link('Edit', array('action' => 'edit', $brand['Brand']['id']), array('class' => 'btn btn-default btn-xs')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />




</div>