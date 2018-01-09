

<br />

<div class="woocommerce" >
    <div class="store-two_col" style="padding-top:150px">

        <?php echo $this->Form->create('User', ['url' => ['action' => 'login']]); ?>
        <?php echo $this->Form->input('username', ['class' => 'form-control','style' => 'margin : 5px', 'autofocus' => 'autofocus']); ?>
        <br />
        <?php echo $this->Form->input('password', ['class' => 'form-control','style' =>'margin : 5px']); ?>
        <br />


        <div class="form-row place-order">




            <?php echo $this->Form->button('<i class="fa fa-check"></i> &nbsp; Login', array('class' => 'button woocommerce-update_button'));?>

            <?php echo $this->Form->end(); ?>

        </div>
    </div>
</div>