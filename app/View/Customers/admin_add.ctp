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
                    
        if(id == '<?php echo $value['Ward']['provinceid'];?>')
            e.innerHTML += '<option value="<?php echo $value['Ward']['id'];?>"><?php echo str_replace("'", "", $value['Ward']['name']);?></option>';
        <?php } ?>
    }
    
    
    

    window.onload = function(){
        pageLoad();
    }
    function pageLoad(){
        autoHCM();
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY/MM/DD'
    });
    }
</script>
<?php echo $this->Form->create('Customer'); ?>
<div class="">
    <div class="inner" id="viewareaid">
                <div class="row head-action">
                        <div class="col-sm-12 col-lg-6">
                        
                            <span><a class="back-list hidden-xs" href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/customer/list">Quản lý khách hàng</a></span>
                            <span class="border-row hidden-xs">/ </span>
                            <span class="active">Tạo mới</span>
                        
                        </div>
                        <div class="col-sm-12 col-lg-6">
                                <button type="submit" class="btn btn-primary right">Thêm mới</button>
                        </div>

                    </div>
                
        <div data-bind="template: { name: 'CustomerEditTmpl', data: mvedit }">
            <div class="widget">
                <div class="pageheader two-actions-header-mobile">
                    <div class="row">
                
                        <div class="col-sm-8">
                                    <h4>Thông tin chung</h4>
                                
                        </div>
                        <div class="col-sm-4">
                            
                        </div>
                    </div>
                </div>
                <div class="one-row-actions">
                    <div class="max-width-1036">
                        <form class="form-horizontal" role="form">
                            <!-- ko if: $parent.HasError() && $parent.ErrorList().length > 0 --><!-- /ko -->
                            <div class="flexbox-grid no-pd-none">
                                
                                <div class="flexbox-content flexbox-right flexbox-text-right">
                                    <div class="wrapper-content pd-all-20">
                                        <div class="flexbox-grid-form flexbox-grid-form-no-outside-padding mb15">

                                            <div class="flexbox-grid-form-item">
                                                <label class="text-title-field" for="inputfirstname">Tên</label>
                                                <input type="text" class="form-control" name="data[Customer][name]" id="inputfirstname">
                                            </div>
                                            <div class="flexbox-grid-form-item">
                                                <label class="text-title-field" for="inputlastname">Họ</label>
                                                <input type="text" class="form-control" name="data[Customer][lastname]" id="inputlastname">
                                            </div>
                                        </div>
                                        <div class="flexbox-grid-form flexbox-grid-form-no-outside-padding mb15">
                                            <div class="flexbox-grid-form-item">
                                                <label class="text-title-field" for="inputemail">Địa chỉ Email</label>
                                                <input type="text" class="form-control" id="inputemail" name="data[Customer][email]">
                                            </div>
                                        </div>
                                        <div class="flexbox-grid-form flexbox-grid-form-no-outside-padding mb15">
                                            <div class="flexbox-grid-form-item">
                                                <label class="text-title-field" for="datetimepicker1">Ngày sinh</label>
                                                <input id="datetimepicker1" type="text" placeholder="Chọn ngày..." class="form-control" name="data[Customer][birthday]">
                                            </div>
                                            <div class="flexbox-grid-form-item"></div>
                                        </div>
                                        <div class="flexbox-grid-form  mb15">
                                            <div class="flexbox-grid-form-item">
                                                <label class="text-title-field" for="inputgender">Giới tính</label>
                                                <input type="radio" class=" hrv-radio" value="1" name="IsMale" id="IsMale1">
                                                Nam
                                                <span class="ml10">
    <input type="radio" class=" hrv-radio" value="0" name="IsMale" id="IsMale2">
 Nữ</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="flexbox-grid no-pd-none">
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
                                                    <input type="text" class="form-control" id="inputaddress1" name="data[Customer][address]">
                                                </div>
                                                <div class="flexbox-grid-form-item">
                                                    <label class="text-title-field" for="inputphone">Số điện thoại</label>
                                                    <input type="text" class="form-control" id="inputphone" name="data[Customer][phone]">
                                                    <span data-bind="validationMessage: Phone" class="field-validation-error" style="display: none;"></span>
                                                </div>
                                            </div>
                                            <div class="flexbox-grid-form flexbox-grid-form-no-outside-padding">
                                                <div class="flexbox-grid-form-item">
                                                    <label class="text-title-field">Tỉnh / Thành</label>
                                                    <select name="data[Customer][district]" onchange="selectDistrict(this)" class="form-control" id="CustomerDistrict">
                                                        <?php foreach ($district as $key => $value) { ?>
                                                            <option value="<?php echo $value['District']['id'];?>" <?php if ($value['District']['id'] == 79) {
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
                                                            <option style="display: none" value="<?php echo $value['Ward']['id'];?>" id="<?php echo $value['Ward']['matp'];?>"><?php echo $value['Ward']['name'];?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flexbox-grid no-pd-none">
                                <div class="flexbox-content flexbox-text-left">
                                    <h4>Ghi chú</h4>
                                    <p class="note">Nhập ghi chú về khách hàng.</p>
                                </div>
                                <div class="flexbox-content flexbox-right flexbox-text-right">
                                    <div class="wrapper-content pd-all-20">
                                        <textarea style="resize: none; height: 59px;" class="form-control textarea-auto-height" placeholder="Nhập ghi chú về khách hàng..." rows="3" name="data[Customer][note]"></textarea>
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