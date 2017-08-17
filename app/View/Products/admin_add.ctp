<?php echo $this->Form->create('Product'); ?>
<div class="row head-action">
						<div class="col-sm-12 col-lg-6">
						
							<span><a class="back-list hidden-xs" href="/admin/products/index">Quản lý sản phẩm</a></span>
							<span class="border-row hidden-xs">/ </span>
							<span class="active">Tạo mới</span>
						
						</div>
						<div class="col-sm-12 col-lg-6">
							<!--ko if : $parent.IsVisible() == true-->
							<button type="submit" class="btn btn-primary right">Tạo mới</button>
							<!--/ko-->
                        </div>
</div>
<div class="row widget">
    <div class=" col-sm-8">

        
        
        <?php echo $this->Form->input('brand_id', array('class' => 'form-control')); ?>
        
        <?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
        
        <?php echo $this->Form->input('slug', array('class' => 'form-control')); ?>
        
        <?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
        
        <?php echo $this->Form->input('image', array('class' => 'form-control','type'=>'file')); ?>
        
        <?php echo $this->Form->input('price', array('class' => 'form-control')); ?>
        
        <?php echo $this->Form->input('weight', array('class' => 'form-control')); ?>
        
        <?php echo $this->Form->input('active', array('type' => 'checkbox')); ?>
        
     

        
        

    </div>
</div>


  
        <?php echo $this->Form->end(); ?>