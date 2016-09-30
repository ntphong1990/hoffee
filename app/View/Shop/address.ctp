<?php echo $this->set('title_for_layout', 'Address'); ?>

<?php $this->Html->addCrumb('Address'); ?>

<?php echo $this->Html->script(array('shop_address.js'), array('inline' => false)); ?>

<h3 >Address</h3>

<?php echo $this->Form->create('Order'); ?>

<hr>

<div class="uk-grid">
    <div class="uk-width-1-3">

        <?php echo $this->Form->input('first_name', array('class' => 'uk-form-width-large')); ?>
        <br />
        <?php echo $this->Form->input('last_name', array('class' => 'uk-form-width-large')); ?>
        <br />
        <?php echo $this->Form->input('email', array('class' => 'uk-form-width-large')); ?>
        <br />
        <?php echo $this->Form->input('phone', array('class' => 'uk-form-width-large')); ?>
        <br />
        <br />

    </div>
    <div class="uk-width-1-3">

        <?php echo $this->Form->input('billing_address', array('class' => 'uk-form-width-large')); ?>
        <br />
        <?php echo $this->Form->input('billing_address2', array('class' => 'uk-form-width-large')); ?>
        <br />
        <?php echo $this->Form->input('billing_city', array('class' => 'uk-form-width-large')); ?>
        <br />
        
        <?php echo $this->Form->input('sameaddress', array('type' => 'checkbox', 'label' => 'Copy Billing Address to Shipping')); ?>

    </div>
    <div class="uk-width-1-3">

        <?php echo $this->Form->input('shipping_address', array('class' => 'uk-form-width-large')); ?>
        <br />
        <?php echo $this->Form->input('shipping_address2', array('class' => 'uk-form-width-large')); ?>
        <br />
        <?php echo $this->Form->input('shipping_city', array('class' => 'uk-form-width-large')); ?>
        <br />
        
        <br />

    </div>
</div>

<br />

<?php echo $this->Form->button('<i class="fa fa-check"></i> &nbsp; Continue', array('class' => 'uk-button uk-button-large uk-button-primary'));?>
<?php echo $this->Form->end(); ?>

