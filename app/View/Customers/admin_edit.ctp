<script>
	function selectDistrict(ele) {
		//var matp = ele.options[ele.selectedIndex].value

		matp = $('#CustomerDistrict').val();
		addOption(matp);

	}

	function autoHCM() {
		var e = document.getElementById("CustomerState");
		var strUser = e.options	[e.selectedIndex].value;

		addOption(79);
	}


	function  addOption(id) {
		var e = document.getElementById("CustomerState");
		e.innerHTML = '<option value="" disabled selected>Chọn quận/huyện</option>';
		<?php foreach ($states as $key => $value) { ?>
        if(id == <?php echo $value['Ward']['matp'];?>)
            e.innerHTML += '<option value="<?php echo $value['Ward']['maqh'];?>" <?php if ($this->request->data['Customer']['state'] == $value['Ward']['maqh']) {
                echo 'selected';
}?>><?php echo str_replace("'", "", $value['Ward']['name']);?></option>';
        <?php } ?>
    }

    function pageLoad(){
    autoHCM();
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD'
    });
        
    }
    window.onload = function(){
             pageLoad();
    }
</script>




<?php echo $this->Form->create('Customer'); ?>
<div class="outer">
    <div class="inner" id="viewareaid">

        <div>
            <div>
            
                    <div class="row head-action">
                        <div class="col-sm-12 col-lg-6">
                        
                            <span><a class="back-list hidden-xs" href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/customer/list">Quản lý khách hàng</a></span>
                            <span class="border-row hidden-xs">/ </span>
                            <span class="active"><?php echo $this->request->data['Customer']['name'].' '.$this->request->data['Customer']['lastname'];?></span>
                        
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <!--ko if : $parent.IsVisible() == true-->
                            <button type="submit" class="btn btn-primary right">Cập nhật</button>
                            <!--/ko-->
                        </div>

                    </div>
            
                <div class="one-row-actions">
                    <div class="max-width-1036">
                        <form class="form-horizontal" role="form">
                            <!-- ko if: $parent.HasError() && $parent.ErrorList().length > 0 --><!-- /ko -->
                            <div class="widget">
                                <div class="flexbox-content flexbox-text-left">
                                    <h4>Thông tin chung</h4>
                                    <p class="note">Một số thông tin cơ bản của khách hàng .</p>
                                </div>
                                <div class="flexbox-content flexbox-right flexbox-text-right">
                                    <div class="wrapper-content pd-all-20">
                                        <div class="flexbox-grid-form flexbox-grid-form-no-outside-padding mb15">

                                            <div class="flexbox-grid-form-item">
                                                <label class="text-title-field" for="inputfirstname">Tên</label>
                                                <input type="text" class="form-control" name="data[Customer][name]" id="inputfirstname" value="<?php echo $this->request->data['Customer']['name'];?>">
                                            </div>
                                            <div class="flexbox-grid-form-item">
                                                <label class="text-title-field" for="inputlastname">Họ</label>
                                                <input type="text" class="form-control" name="data[Customer][lastname]" id="inputlastname" value="<?php echo $this->request->data['Customer']['lastname'];?>">
                                            </div>
                                        </div>
                                        <div class="flexbox-grid-form flexbox-grid-form-no-outside-padding mb15">
                                            <div class="flexbox-grid-form-item">
                                                <label class="text-title-field" for="inputemail">Địa chỉ Email</label>
                                                <input type="text" class="form-control" id="inputemail" name="data[Customer][email]" value="<?php echo $this->request->data['Customer']['email'];?>">
                                            </div>
                                        </div>
                                        <div class="flexbox-grid-form flexbox-grid-form-no-outside-padding mb15">
                                            <div class="flexbox-grid-form-item">
                                                <label class="text-title-field" for="datetimepicker1">Ngày sinh</label>
                                                <input id="datetimepicker1" type="text" placeholder="Chọn ngày..." class="form-control" name="data[Customer][birthday]" value="<?php echo $this->request->data['Customer']['birthday'];?>">
                                            </div>
                                            <div class="flexbox-grid-form-item"></div>
                                        </div>
                                        <div class="flexbox-grid-form flexbox-grid-form-no-outside-padding mb15">
                                            <div class="head-action">
                                                <label class="text-title-field" for="inputgender">Giới tính</label>
                                                <input type="radio" <?php if ($this->request->data['Customer']['gender'] == 1) {
                                                    echo 'checked';
}?> class=" hrv-radio" value="1" name="IsMale" id="IsMale1">
                                                Nam
                                                <span class="ml10">
    <input type="radio" class=" hrv-radio" value="0" <?php if ($this->request->data['Customer']['gender'] == 0) {
        echo 'checked';
}?> name="IsMale" id="IsMale2">
 Nữ</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="flexbox-content flexbox-text-left">
                                    <h4>Địa chỉ</h4>
                                    <p class="note">Địa chỉ chính của khách hàng này.</p>
                                </div>
                                <div class="flexbox-content flexbox-right flexbox-text-right">
                                    <div class="wrapper-content pd-all-20">
                                        <div data-bind="with: $parent.CustomerAddress()[0]">
                                            <div class="flexbox-grid-form flexbox-grid-form-no-outside-padding mb15">
                                                <div class="flexbox-grid-form-item">
                                                    <label class="text-title-field" for="inputaddress1">Địa chỉ</label>
                                                    <input type="text" class="form-control" id="inputaddress1" name="data[Customer][address]" value="<?php echo $this->request->data['Customer']['address'];?>">
                                                </div>
                                                <div class="flexbox-grid-form-item">
                                                    <label class="text-title-field" for="inputphone">Số điện thoại</label>
                                                    <input type="text" class="form-control" id="inputphone" name="data[Customer][phone]" value="<?php echo $this->request->data['Customer']['phone'];?>">
                                                    <span data-bind="validationMessage: Phone" class="field-validation-error" style="display: none;"></span>
                                                </div>
                                            </div>
                                            <div class="flexbox-grid-form flexbox-grid-form-no-outside-padding">
                                                <div class="flexbox-grid-form-item">
                                                    <label class="text-title-field">Tỉnh / Thành</label>
                                                    <select name="data[Customer][district]" onchange="selectDistrict(this)" class="form-control" id="CustomerDistrict">
                                                        <?php foreach ($district as $key => $value) { ?>
                                                            <option value="<?php echo $value['District']['matp'];?>" <?php if ($this->request->data['Customer']['district'] == $value['District']['matp']) {
                                                                echo 'selected';
}?>><?php echo $value['District']['name'];?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                                <div class="flexbox-grid-form-item">
                                                    <label class="text-title-field">Quận / Huyện</label>
                                                    <select name="data[Customer][state]" class="form-control" id="CustomerState">
                                                        <option value="" disabled selected>Chọn quận/huyện</option>
                                                        <?php foreach ($states as $key => $value) { ?>
                                                            <option style="display: none" value="<?php echo $value['Ward']['maqh'];?>" id="<?php echo $value['Ward']['matp'];?>" <?php if ($this->request->data['Customer']['state'] == $value['Ward']['maqh']) {
                                                                echo 'selected';
}?>><?php echo $value['Ward']['name'];?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="flexbox-content flexbox-text-left">
                                    <h4>Ghi chú</h4>
                                    <p class="note">Nhập ghi chú về khách hàng.</p>
                                </div>
                                <div class="flexbox-content flexbox-right flexbox-text-right">
                                    <div class="wrapper-content pd-all-20">
                                        <label class="text-title-field">Ghi chú</label>
                                        <textarea style="resize: none; height: 59px;" class="form-control textarea-auto-height" placeholder="Nhập ghi chú về khách hàng..." rows="3" name="data[Customer][note]"><?php echo $this->request->data['Customer']['note'];?></textarea>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /ko -->
        <!-- ko if:ShowType() === 'New' --><!-- /ko -->


    </div>

    <!-- end .inner -->
</div>
<?php echo $this->Form->end(); ?>