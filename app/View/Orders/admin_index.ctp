
<div class="pageheader two-actions-header-mobile">
    <div class="col-xs-12">
        <div class="breadcrumb-new">
            <svg class="svg-next-icon svg-next-icon-size-20 svg-next-icon-header hidden-xs">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-bag"></use>
            </svg>

            <span class="active" data-bind="text:ListTitle">Danh sách đơn hàng</span>
        </div>
        <div class="header__primary-actions">
            <a class="btn btn-primary"  href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/orders/create">Tạo đơn hàng</a>
        </div>

    </div>
</div>
<table style="margin-top: 100px" data-toggle="table" data-url="tables/data1.json" data-show-refresh="true"
       data-show-toggle="true" data-show-columns="true" data-search="true"
       data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
       data-sort-order="desc" class="table table-hover">
    <tr>
        <th><?php echo $this->Paginator->sort('id','Mã'); ?></th>
        <th><?php echo $this->Paginator->sort('first_name','Khách Hàng'); ?></th>


        <th><?php echo $this->Paginator->sort('phone','Điện Thoại'); ?></th>

        <th><?php echo $this->Paginator->sort('shipping_city','Thành Phố'); ?></th>



        <th><?php echo $this->Paginator->sort('shipping','Phí giao hàng'); ?></th>
        <th><?php echo $this->Paginator->sort('total','Tổng tiền'); ?></th>
        <th><?php echo $this->Paginator->sort('status','Thanh Toán'); ?></th>
        <th><?php echo $this->Paginator->sort('created','Ngày đặt'); ?></th>
        <th>Actions</th>
    </tr>
    <?php foreach ($orders as $order): ?>
    <tr>
        <td class="text-underline hover-underline">#<?php echo h($order['Order']['id']); ?></td>
        <td><?php echo h($order['Order']['first_name']); ?></td>


        <td><?php echo h($order['Order']['phone']); ?></td>

        <td><?php echo h($order['Order']['shipping_city']); ?></td>



        <td><?php echo h($order['Order']['shipping']); ?></td>
        <td><?php echo h(number_format($order['Order']['total'])); ?> ₫</td>
        <td><?php if($order['Order']['status'] == 1) {
                echo '<span class="label payment_2">Đã thanh toán</span>';
            }
            if($order['Order']['status'] == 2) {
                echo '<span class="label payment_6">Chưa thanh toán</span>';
            }
            if($order['Order']['status'] == 3) {
                echo '<span class="label payment_5">Nháp</span>';
            }
            ?></td>
        <td><?php echo h($order['Order']['created']); ?></td>
        <td class="actions">
            <?php echo $this->Html->link('View', array('action' => 'view', $order['Order']['id']), array('class' => 'btn btn-default btn-xs')); ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $order['Order']['id']), array('class' => 'btn btn-default btn-xs')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />
