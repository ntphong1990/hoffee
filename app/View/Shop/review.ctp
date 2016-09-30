<?php echo $this->set('title_for_layout', 'Order Review'); ?>

<?php $this->Html->addCrumb('Order Review'); ?>

<?php echo $this->Html->script(array('jquery.validate.js', 'additional-methods.js', 'shop_review.js'), array('inline' => false)); ?>

<h1>Review And Place Your Order</h1>

<hr>

<div class="uk-grid">
    <div class="uk-width-1-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Customer Info</h3>
            </div>
            <div class="panel-body">
                <?php echo $shop['Order']['first_name'];?> <?php echo $shop['Order']['last_name'];?><br />
                Email: <?php echo $shop['Order']['email'];?><br />
                Phone: <?php echo $shop['Order']['phone'];?>
            </div>
        </div>
    </div>
    <div class="uk-width-1-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Billing Address</h3>
            </div>
            <div class="panel-body">
                <?php echo $shop['Order']['first_name'];?> <?php echo $shop['Order']['last_name'];?><br />
                <?php echo $shop['Order']['billing_address'];?><br />
                <?php echo $shop['Order']['billing_address2'];?><br />
                <?php echo $shop['Order']['billing_city'];?>
            </div>
        </div>
    </div>
    <div class="uk-width-1-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Shipping Address</h3>
            </div>
            <div class="panel-body">
                <?php echo $shop['Order']['first_name'];?> <?php echo $shop['Order']['last_name'];?><br />
                <?php echo $shop['Order']['shipping_address'];?><br />
                <?php echo $shop['Order']['shipping_address2'];?><br />
                <?php echo $shop['Order']['shipping_city'];?>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="pk-table-fake pk-table-fake-header">
    <div class="pk-table-min-width-200"></div>
    <div class="pk-table-min-width-100">ITEM</div>
    <div class="pk-table-min-width-100">WEIGHT</div>
    <div class="pk-table-min-width-100">WEIGHT</div>
    <div class="pk-table-min-width-100">PRICE</div>
    <div class="pk-table-min-width-100" style="text-align: right;">QUANTITY</div>
    <div class="pk-table-min-width-100" style="text-align: right;">SUBTOTAL</div>
</div>
<?php foreach ($shop['OrderItem'] as $item): ?>
<div class="uk-nestable-panel pk-table-fake uk-form uk-visible-hover">
    <div class="pk-table-min-width-100"><?php echo $this->Html->image('/images/small/' . $item['Product']['image'], array('height' => 60, 'class' => 'px60')); ?></div>
    <div class="pk-table-min-width-100">
    <?php echo $item['Product']['name']; ?>
    <?php if(isset($item['Product']['productmod_name'])) : ?>
    <br />
    <small><?php echo $item['Product']['productmod_name']; ?></small>
    <?php endif; ?>
    </div>
    <div class="pk-table-min-width-100"><?php echo $item['Product']['weight']; ?></div>
    <div class="pk-table-min-width-100"><?php echo $item['totalweight']; ?></div>
    <div class="pk-table-min-width-100">$<?php echo $item['Product']['price']; ?></div>
    <div class="pk-table-min-width-100" style="text-align: right;"><?php echo $item['quantity']; ?></div>
    <div class="pk-table-min-width-100" style="text-align: right;">$<?php echo $item['subtotal']; ?></div>
</div>
<?php endforeach; ?>


<div class="row">
    <div class="col col-sm-10">Products: <?php echo $shop['Order']['order_item_count']; ?></div>
    <div class="col col-sm-1" style="text-align: right;">Items: <?php echo $shop['Order']['quantity']; ?></div>
    <div class="col col-sm-1" style="text-align: right;">Total<br /><strong>$<?php echo $shop['Order']['total']; ?></strong></div>
</div>

<hr>

<br />
<br />

<?php echo $this->Form->create('Order'); ?>

  <div class="col col-sm-12 pull-right tr">

<?php echo $this->Form->button('<i class="fa fa-check"></i> &nbsp; Place your order', array('class' => 'uk-button uk-button-large uk-button-primary', 'ecape' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>

<br />
<br />

