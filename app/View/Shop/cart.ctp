<?php echo $this->set('title_for_layout', 'Shopping Cart'); ?>

<?php $this->Html->addCrumb('Shopping Cart'); ?>

<?php echo $this->Html->script(array('cart.js'), array('inline' => false)); ?>



<?php if(empty($shop['OrderItem'])) : ?>

Shopping Cart is empty

<?php else: ?>

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'cartupdate'))); ?>


<div class="uk-overflow-container">
<div class="pk-table-fake pk-table-fake-header">
    <div class="pk-table-min-width-100"></div>
    <div class="pk-table-min-width-100">ITEM</div>
    <div class="pk-table-min-width-100">PRICE</div>
    <div class="pk-table-min-width-100">QUANTITY</div>
    <div class="pk-table-min-width-100">SUBTOTAL</div>
    
</div>
<ul class="uk-nestable uk-margin-remove uk-nestable-empty">
<?php $tabindex = 1; ?>
<?php foreach ($shop['OrderItem'] as $key => $item): ?>

    <li class="uk-nestable-item check-item" data-id="<?php echo $key; ?>">
       <div class="uk-nestable-panel pk-table-fake uk-form uk-visible-hover">
        <div class="pk-table-min-width-100"><?php echo $this->Html->image('/images/small/' . $item['Product']['image'], array('class' => 'px20','width' => 100)); ?></div>
        <div class="pk-table-min-width-100">
            <strong><?php echo $this->Html->link($item['Product']['name'], array('controller' => 'products', 'action' => 'view', 'slug' => $item['Product']['slug'])); ?></strong>
            <?php
            $mods = 0;
            if(isset($item['Product']['productmod_name'])) :
            $mods = $item['Product']['productmod_id'];
            ?>
            <br />
            <small><?php echo $item['Product']['productmod_name']; ?></small>
            <?php endif; ?>
        </div>
        <div class="pk-table-min-width-100" id="price-<?php echo $key; ?>"><?php echo $item['Product']['price']; ?></div>
        <div class="pk-table-min-width-100"><?php echo $this->Form->input('quantity-' . $key, array('div' => false, 'class' => 'numeric form-control input-small', 'label' => false, 'size' => 2, 'maxlength' => 2, 'tabindex' => $tabindex++, 'data-id' => $item['Product']['id'], 'data-mods' => $mods, 'value' => $item['quantity'])); ?></div>
        <div class="pk-table-min-width-100" id="subtotal_<?php echo $key; ?>"><?php echo $item['subtotal']; ?></div>
        
   	</div>
    </li>
<?php endforeach; ?>


</ul>
<br>

<div class="row">
    <div class="col col-sm-12">
        <div class="pull-right">
        	<span class="red" id="total">Order Total:  $<?php echo $shop['Order']['total']; ?>  </span>
        <?php echo $this->Html->link('<i class="fa fa-ban"></i> &nbsp; Clear ', array('controller' => 'shop', 'action' => 'clear'), array('class' => 'uk-button uk-button-large', 'escape' => false)); ?>
        <?php echo $this->Form->button('<i class="fa fa-calculator"></i> &nbsp; Update', array('class' => 'uk-button uk-button-large', 'escape' => false));?>
        <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>


</div>
<div class="row">
    <div class="col col-sm-12 pull-right tr">
        
    
        
        <br />
       

        <?php echo $this->Html->link('<i class="fa fa-check"></i> &nbsp; Checkout', array('controller' => 'shop', 'action' => 'address'), array('class' => 'uk-button uk-button-large uk-button-primary', 'escape' => false)); ?>

        <br />
        <br />



    </div>
</div>

<br />
<br />

<?php endif; ?>
