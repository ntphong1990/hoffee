<?php echo $this->Form->create('Customer'); ?>
<div class="customers index">
	<div class="pageheader two-actions-header-mobile">
		<div class="col-xs-12">
			<div class="breadcrumb-new">
				<div class="ctrl-filter fluid-container col-xs-12" data-bind="with: SelectedTab, css: { 'not-has-freetext': !HasFreeText() }">
					<div data-bind="css: { 'input-group-btn': !$parent.HasFreeText() }" class="btn-group filter-container dropdown">
						<!-- ko if: $parent.IsDisplayFilter() -->
						<!-- ko if: $parent.FieldsForSelect().length > 0 -->
						<div class="fixed-container drop-control">
							<button type="button" id="dropdownfilter" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Tên/Email/Sdt</button>
							<div class="dropdown-menu mt10 pos-arrow-dropdown animate-scale-dropdown" role="menu" aria-labelledby="dropdownfilter">
								<label><span data-bind="text: $parent.Title">Hiển thị tất cả khách hàng theo</span>:</label>
							</div>
						</div>
						<!-- /ko -->
						<!-- /ko -->
						<!-- ko if: $parent.HasFreeText() -->
						<div class="variable-container">
							<input type="text" name="data[key]" value="<?php echo $key;?>" class="form-control form-large txtSearch border-radius4-right">
						</div>
						<!-- /ko -->
						<!-- ko if: $parent.CanSaveFilter() -->
						<div class="input-group-btn saved-search-actions">
							<!--ko if: (($parent.Tabs()[0] != $data) && (!$data.IsNewTab())) || IsEdit() || IsNewTab() --><!-- /ko -->
						</div>
						<!-- /ko -->
					</div>
					<div class="block list-tags" data-bind="foreach: Fields"></div>
				</div>
			</div>
			<div class="header__secondary-actions">


				<button type="submit" class="btn btn-default ml10" >Tìm kiếm</button>
                <a type="button" class="btn btn-default ml10" href="<?php echo Configure::read('Settings.DOMAIN'); ?>/admin/customers/add">Tạo mới</a>
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
			<th><?php echo $this->Paginator->sort('lastname'); ?></th>
		<th><?php echo $this->Paginator->sort('phone'); ?></th>

		<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('birthday'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>

			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($customers as $customer): ?>
	<tr>
		<td><?php echo h($customer['Customer']['id']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['name']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['phone']); ?>&nbsp;</td>

		<td><?php echo h($customer['Customer']['email']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['birthday']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['address']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $customer['Customer']['id']),array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $customer['Customer']['id']),array('class' => 'btn btn-default btn-xs')); ?>
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

<?php echo $this->Form->end(); ?>