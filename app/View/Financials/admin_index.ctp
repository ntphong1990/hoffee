<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Icons</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-xs-12 col-md-6 col-lg-3">
		<div class="panel panel-blue panel-widget ">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php echo number_format($doanhthu);?> ₫</div>
					<div class="text-muted">Doanh Thu</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-3">
		<div class="panel panel-orange panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php echo number_format($chi);?> ₫</div>
					<div class="text-muted">Chi</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-3">
		<div class="panel panel-teal panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php echo number_format($tong);?> ₫</div>
					<div class="text-muted">Tổng thu</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-3">
		<div class="panel panel-red panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php echo number_format($tong - $chi);?> ₫</div>
					<div class="text-muted">Tiền mặt</div>
				</div>
			</div>
		</div>
	</div>
</div><!--/.row-->

<div class="financials index">
	<table data-toggle="table" data-url="tables/data1.json" data-show-refresh="true"
		   data-show-toggle="true" data-show-columns="true" data-search="true"
		   data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
		   data-sort-order="desc" class="table table-hover">
	<thead>
	<tr>
<!--			<th>--><?php //echo $this->Paginator->sort('id'); ?><!--</th>-->
			<th><?php echo $this->Paginator->sort('type','Thu/Chi'); ?></th>
			<th><?php echo $this->Paginator->sort('value','Tiền'); ?></th>
			<th><?php echo $this->Paginator->sort('note','Chi tiết'); ?></th>
			<th><?php echo $this->Paginator->sort('detail','Mã'); ?></th>
			<th><?php echo $this->Paginator->sort('created','Ngày tạo'); ?></th>

			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($financials as $financial): ?>
	<tr>
<!--		<td>--><?php //echo h($financial['Financial']['id']); ?><!--&nbsp;</td>-->
		<td><?php if($financial['Financial']['type'] == 1) {
				echo '<span class="label payment_2">Thu</span>';
			}
			if($financial['Financial']['type'] == 2) {
				echo '<span class="label payment_6">Chi</span>';
			}

			?></td>
		<td><?php echo h(number_format($financial['Financial']['value'])); ?>&nbsp;₫</td>
		<td><?php echo h($financial['Financial']['note']); ?>&nbsp;</td>
		<td class="text-underline hover-underline"><?php if($financial['Financial']['kind'] != 0 )echo $this->Html->link(__('#'.$financial['Financial']['detail']), array('controller' => 'orders','action' => 'view', $financial['Financial']['detail'])); ?></td>
		<td><?php echo h($financial['Financial']['created']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $financial['Financial']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $financial['Financial']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $financial['Financial']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $financial['Financial']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Financial'), array('action' => 'add')); ?></li>
	</ul>
</div>
