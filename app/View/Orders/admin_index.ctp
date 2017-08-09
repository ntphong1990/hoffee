<script>
	function pageLoad(){
    }
    </script>
<div class="widget">
    <div class="col-xs-12" style="margin:5px">
        
       <a class="btn btn-primary click-action"  href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/orders/create">Tạo đơn hàng</a>

    </div>
    <header>
                        <div class="widget-controls">
                        
                            <a href="#"><i class="glyphicon glyphicon-cog"></i></a>
                            <a href="#"><i class="fa fa-refresh"></i></a>
                            <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
    </header>
<div class="widget-body">
<table data-toggle="table" data-show-refresh="true"
       data-show-toggle="true" data-show-columns="true" data-search="true"
       data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
       data-sort-order="desc" class="table">
    <tr>
        <th><?php echo $this->Paginator->sort('id','Mã'); ?></th>
        <th><?php echo $this->Paginator->sort('first_name','Khách Hàng'); ?></th>


        <th><?php echo $this->Paginator->sort('phone','Điện Thoại'); ?></th>

        <th class="hidden-sm-down"><?php echo $this->Paginator->sort('shipping_city','Thành Phố'); ?></th>



        <th class="hidden-sm-down"><?php echo $this->Paginator->sort('shipping','Phí giao hàng'); ?></th>
        <th><?php echo $this->Paginator->sort('total','Tổng tiền'); ?></th>
        <th class="hidden-sm-down"><?php echo $this->Paginator->sort('status','Thanh Toán'); ?></th>
        <th class="hidden-sm-down"><?php echo $this->Paginator->sort('shipping_status','Giao Hàng'); ?></th>
        <th class="hidden-sm-down"><?php echo $this->Paginator->sort('created','Ngày đặt'); ?></th>

        <th >Actions</th>
    </tr>
    <?php foreach ($orders as $order): ?>
    <tr>
        <td class="text-underline hover-underline">#<?php echo h($order['Order']['id']); ?></td>
        <td ><?php echo h($order['Order']['first_name']); ?></td>


        <td><?php echo h($order['Order']['phone']); ?></td>

        <td class="hidden-sm-down"><?php echo h($order['Order']['shipping_city']); ?></td>



        <td class="hidden-sm-down"><?php echo h($order['Order']['shipping']); ?></td>
        <td><?php echo h(number_format($order['Order']['total'])); ?> ₫</td>
        <td class="hidden-sm-down"><?php if($order['Order']['status'] == 1) {
                echo '<span class="label label-success">Đã thanh toán</span>';
            }
            if($order['Order']['status'] == 2) {
                echo '<span class="label label-danger">Chưa thanh toán</span>';
            }
            if($order['Order']['status'] == 3) {
                echo '<span class="label payment_5">Nháp</span>';
            }
            ?></td>

        <td class="hidden-sm-down"><?php if($order['Order']['shipping_status'] == 1) {
                echo '<span class="label label-info">Đang giao hàng</span>';
            }
            if($order['Order']['shipping_status'] == 2) {
                echo '<span class="label label-success">Đã giao</span>';
            }
            if($order['Order']['shipping_status'] == 0) {
                echo '<span class="label label-danger">Chưa giao</span>';
            }
            ?></td>
        <td class="hidden-sm-down"><?php echo h($order['Order']['created']); ?></td>
        <td class="actions">
            <?php echo $this->Html->link('View', array('action' => 'view', $order['Order']['id']), array('class' => 'btn btn-default btn-xs')); ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $order['Order']['id']), array('class' => 'btn btn-default btn-xs')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />
</div>
