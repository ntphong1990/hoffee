<script>
	function selectDistrict(ele) {
		var matp = ele.options[ele.selectedIndex].value

		var e = document.getElementById("CustomerState");
		var strUser = e.options	[e.selectedIndex].value;

		for(var i = 0 ; i < e.options.length ;i++){
			if(e[i].id == matp){
				e.options[i].style.display = 'block';
			} else {
				e.options[i].style.display = 'none';
			}
		}

	}

	function autoHCM() {
		var e = document.getElementById("CustomerState");
		var strUser = e.options	[e.selectedIndex].value;

		for(var i = 0 ; i < e.options.length ;i++){
			if(e[i].id == "79"){
				e.options[i].style.display = 'block';
			} else {
				e.options[i].style.display = 'none';
			}
		}
	}

	$( document ).ready(function() {
		autoHCM();
	});

</script>
</br>
</br>

<br />

<div class="row">
    <div class="col-sm-5">
<?php echo $this->Form->create('Customer'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Customer'); ?></legend>
	<?php
		echo $this->Form->input('name', array('class' => 'form-control'));
        echo $this->Form->input('lastname', array('class' => 'form-control'));
		echo $this->Form->input('birthday', array('class' => 'form-control','type' => 'date','minYear' => 1950));
		echo $this->Form->input('address', array('class' => 'form-control'));
		echo $this->Form->input('phone', array('class' => 'form-control'));

		echo $this->Form->input('email', array('class' => 'form-control'));


	?>
		<div class="flexbox-grid-form-item select"><select name="data[Customer][district]" onchange="selectDistrict(this)" class="form-control" id="CustomerDistrict">
				<?php foreach ($district as $key => $value){ ?>
					<option value="<?php echo $value['DevvnTinhthanhpho']['matp'];?>"><?php echo $value['DevvnTinhthanhpho']['name'];?></option>
				<?php } ?>

			</select>
		</div>

		<div class="flexbox-grid-form-item select"><select name="data[Customer][state]" class="form-control" id="CustomerState">
				<option value="" disabled selected>Chọn quận/huyện</option>
				<?php foreach ($states as $key => $value){ ?>
					<option style="display: none" value="<?php echo $value['DevvnQuanhuyen']['maqh'];?>" accessKey="asd" id="<?php echo $value['DevvnQuanhuyen']['matp'];?>"><?php echo $value['DevvnQuanhuyen']['name'];?></option>
				<?php } ?>

			</select>
		</div>

	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div></div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?></li>
	</ul>
</div>
