<script>
	function pageLoad(){
	}
</script>
<?php echo $this->Form->create('Customer', array('id'=>'pjax-container','data-pjax','class'=>'form-horizontal','role' =>'form')); ?>
<div class="row">

			
                
			
				<div class="input-group col-sm-12">
                                                <input type="text" name="data[key]" value="<?php echo $key;?>"  class="form-control" id="search-input">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-secondary click-action">Search</button>
                                                </span>
                            </div>
</div>
<div class="widget">


<div class="customers index">
	<div class="pageheader two-actions-header-mobile">
		<div class="col-xs-12">
			<div class="breadcrumb-new">
				<div class="ctrl-filter fluid-container col-xs-12">
					<div class="btn-group filter-container dropdown">
					
		
						<div class="input-group-btn saved-search-actions">
							
						</div>
					
					</div>
				
				</div>
			</div>
			
		</div>
		<div class="clear"></div>
	</div>

	<table style="margin-top:100px" data-toggle="table" data-url="tables/data1.json" data-show-refresh="true"
		   data-show-toggle="true" data-show-columns="true" data-search="true"
		   data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
		   data-sort-order="desc" class="table table-hover">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			
		<th><?php echo $this->Paginator->sort('phone'); ?></th>

		<th><?php echo $this->Paginator->sort('email'); ?></th>
		
			<th><?php echo $this->Paginator->sort('address'); ?></th>

			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($customers as $customer): ?>
	<tr>
		<td><?php echo h($customer['Customer']['id']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['lastname'].' '.$customer['Customer']['name']); ?>&nbsp;</td>
		
		<td><?php echo h($customer['Customer']['phone']); ?>&nbsp;</td>

		<td><?php echo h($customer['Customer']['email']); ?>&nbsp;</td>
	
		<td><?php echo h($customer['Customer']['address']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $customer['Customer']['id']),array('class' => 'btn btn-default btn-xs')); ?>
			
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
		<?php echo $this->element('pagination-counter'); ?>

		<?php echo $this->element('pagination'); ?>
</div>


<?php echo $this->Form->end(); ?>
</div>