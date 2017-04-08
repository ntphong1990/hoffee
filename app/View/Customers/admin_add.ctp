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
		$('#inputbirthday').datepicker({format: 'yyyy-mm-dd'
		});
	});

</script>
<?php echo $this->Form->create('Customer'); ?>
<div class="outer">
	<div class="inner" id="viewareaid">

		<div data-bind="template: { name: 'CustomerEditTmpl', data: mvedit }">
			<div data-bind="with: CustomerEdit">
				<div class="pageheader two-actions-header-mobile">
					<div class="col-xs-12">
						<div class="breadcrumb-new">
							<svg class="svg-next-icon svg-next-icon-size-20 svg-next-icon-header hidden-xs">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-customers"></use>
							</svg>
							<span><a class="back-list hidden-xs" data-bind="attr: { href: LinkToList }" href="/admin/customer#/list">Thêm khách hàng</a></span>
							<span class="border-row hidden-xs">/ </span>
							<span class="active" data-bind="text: Id() ? FullName : 'Thêm khách hàng'"></span>
							<div class="inline-vertical-top">

							</div>
						</div>
						<div class="header__primary-actions">
							<!--ko if : $parent.IsVisible() == true-->
							<button type="submit" class="btn btn-primary">Thêm mới</button>
							<!--/ko-->
						</div>
						<div class="header__secondary-actions">
							<!--ko if : $parent.IsVisible() == true-->

							<!--/ko-->
						</div>
					</div>
				</div>
				<div class="one-row-actions">
					<div class="max-width-1036">
						<form class="form-horizontal" role="form">
							<!-- ko if: $parent.HasError() && $parent.ErrorList().length > 0 --><!-- /ko -->
							<div class="flexbox-grid no-pd-none">
								<div class="flexbox-content flexbox-text-left">
									<h4>Thông tin chung</h4>
									<p class="note">Một số thông tin cơ bản của khách hàng .</p>
								</div>
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
												<label class="text-title-field" for="inputbirthday">Ngày sinh</label>
												<input id="inputbirthday" type="text" placeholder="Chọn ngày..." class="form-control" name="data[Customer][birthday]">
											</div>
											<div class="flexbox-grid-form-item"></div>
										</div>
										<div class="flexbox-grid-form flexbox-grid-form-no-outside-padding mb15">
											<div class="flexbox-grid-form-item">
												<label class="text-title-field" for="inputgender">Giới tính</label>
												<input type="radio" class=" hrv-radio" value="1" name="IsMale" id="IsMale1">
												Nam
												<span class="ml10">
    <input type="radio" class=" hrv-radio" value="0" name="IsMale" id="IsMale2">
 Nữ</span>
											</div>
										</div>
										<div class="flexbox-grid-form flexbox-grid-form-no-outside-padding">
											<div class="flexbox-grid-form-item">
												<label class="text-title-field label-checkbox cursor-pointer mb0">

													<input type="checkbox" class="hrv-checkbox" value="" name="">
													Nhận email quảng cáo
												</label>
											</div>
											<div class="flexbox-grid-form-item"></div>
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
														<?php foreach ($district as $key => $value){ ?>
															<option value="<?php echo $value['DevvnTinhthanhpho']['matp'];?>"><?php echo $value['DevvnTinhthanhpho']['name'];?></option>
														<?php } ?>

													</select>
												</div>
												<div class="flexbox-grid-form-item">
													<label class="text-title-field">Quận / Huyện</label>
													<select name="data[Customer][state]" class="form-control" id="CustomerState">
														<option value="" disabled selected>Chọn quận/huyện</option>
														<?php foreach ($states as $key => $value){ ?>
															<option style="display: none" value="<?php echo $value['DevvnQuanhuyen']['maqh'];?>" id="<?php echo $value['DevvnQuanhuyen']['matp'];?>"><?php echo $value['DevvnQuanhuyen']['name'];?></option>
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
										<label class="text-title-field">Ghi chú</label>
										<pre class="textareadiv common"><br class="lbr"></pre><textarea style="resize: none; height: 59px;" class="form-control textarea-auto-height" placeholder="Nhập ghi chú về khách hàng..." rows="3" name="data[Customer][note]"></textarea>
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