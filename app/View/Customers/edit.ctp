<div class="customers form">
<?php echo $this->Form->create('Customer'); ?>
    <fieldset>
        <legend><?php echo __('Edit Customer'); ?></legend>
    <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name');
        echo $this->Form->input('birthday');
        echo $this->Form->input('address');
        echo $this->Form->input('phone');
        echo $this->Form->input('lastname');
        echo $this->Form->input('email');
        echo $this->Form->input('district');
        echo $this->Form->input('state');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Customer.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Customer.id')))); ?></li>
        <li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Devvn Tinhthanhphos'), array('controller' => 'District', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Devvn Tinhthanhpho'), array('controller' => 'District', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Devvn Quanhuyens'), array('controller' => 'ward', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Devvn Quanhuyen'), array('controller' => 'ward', 'action' => 'add')); ?> </li>
    </ul>
</div>
