<div class="widget">
<table class="table">
    <tr>
        <th><?php echo $this->Paginator->sort('first_name'); ?></th>
        <th><?php echo $this->Paginator->sort('last_name'); ?></th>
        <th><?php echo $this->Paginator->sort('email'); ?></th>
        <th><?php echo $this->Paginator->sort('phone'); ?></th>

        <th><?php echo $this->Paginator->sort('shipping_city'); ?></th>



        <th><?php echo $this->Paginator->sort('shipping'); ?></th>
        <th><?php echo $this->Paginator->sort('total'); ?></th>
        <th><?php echo $this->Paginator->sort('status'); ?></th>
        <th><?php echo $this->Paginator->sort('created'); ?></th>
        <th>Actions</th>
    </tr>
    <?php foreach ($orders as $order): ?>
        <tr>
            <td><?php echo h($order['Order']['first_name']); ?></td>
            <td><?php echo h($order['Order']['last_name']); ?></td>
            <td><?php echo h($order['Order']['email']); ?></td>
            <td><?php echo h($order['Order']['phone']); ?></td>

            <td><?php echo h($order['Order']['shipping_city']); ?></td>



            <td><?php echo h($order['Order']['shipping']); ?></td>
            <td><?php echo h($order['Order']['total']); ?></td>
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



<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

</div>
