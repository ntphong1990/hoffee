<div class="outer">
	<div class="inner" id="viewareaid">

		<?php echo $this->Form->create('Customer'); ?>
		<!-- ko if:ShowType() === 'List'--><!-- /ko -->
		<!-- ko if:ShowType() === 'Detail' -->
		<div data-bind="template: { name: 'CustomerDetailTmpl', data: mvdetail }">
			<div data-bind="with: CustomerDetail">
				<div class="pageheader two-actions-header-mobile">
					<div class="col-xs-12">
						<div class="breadcrumb-new">
							<svg class="svg-next-icon svg-next-icon-size-20 svg-next-icon-header hidden-xs">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-customers"></use>
							</svg>
							<span><a class="back-list hidden-xs" href="<?php echo Configure::read('Settings.DOMAIN'); ?>/admin/customers">Khách hàng</a></span>
							<!-- ko if: Id() -->
							<span class="border-row hidden-xs">/ </span>
							<span class="active" data-bind="text: Fullname"><?php echo $customer['Customer']['name']; ?></span>
							<!-- /ko -->
						</div>
						<div class="header__secondary-actions">


							<a class="btn btn-default ml10" data-bind="attr: { href: LinkEditButton }" href="<?php echo Configure::read('Settings.DOMAIN'); ?>/admin/customers/edit/<?php echo $customer['Customer']['id']; ?>">Chỉnh sửa thông tin</a>
							<!--/ko-->
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="one-row-actions">
					<div class="max-width-1200">
						<div class="flexbox-grid no-pd-none">
							<div class="flexbox-content">
								<div class="wrapper-content p-l15 p-r15">
									<ul class="nav nav-tabs panel-tab">
										<li role="presentation" class="active" data-bind="css: { active: $parent.IsTabOrder() }">
											<a class="m-none-important" data-bind="click: $parent.ChangeTabOrder">Đơn hàng</a>
										</li>

									</ul>
									<div class="tab-content clearfix p-t20">
										<div class="tab-pane clearfix active" data-bind="css: { active: $parent.IsTabOrder() }">
											<!-- ko if: $parent.mvorder() && $parent.IsInitFinishOrder() -->
											<div data-bind="template: { name: 'CustomerOrderListTmpl', data: $parent.mvorder }">
												<div class="btn-group pull-right" data-bind="template: { name: 'FilterPagingSimpleTmpl', data: Filter}">

												</div>
												<div class="clear"></div>
												<div class="table-wrap p-none">
													<table class="table">
														<thead data-bind="with: Filter">
														<tr>
															<th>Mã ĐH</th>
															<th>Ngày tạo</th>
															<th>Trạng thái thanh toán</th>
															<th>Trạng thái đơn hàng</th>
															<th>Tổng tiền</th>
														</tr>
														</thead>
														<tbody>
														<?php foreach ($orders as $order): ?>
														<tr>
															<td>
																<a href="<?php echo Configure::read('Settings.DOMAIN'); ?>/admin/orderss/view/<?php echo $order['Order']['id']; ?>" target="_blank"  class="text-underline hover-underline">#<?php echo $order['Order']['id']; ?></a>
																<a data-toggle="tooltip" data-placement="bottom" data-original-title="Đơn hàng có ghi chú." data-bind="style: { display: HasNote() == 1 ? 'inline' : 'none' }, attr: { href: Link , title:'Đơn hàng có ghi chú' }" href="/admin/order/#/detail/1007752652" title="Đơn hàng có ghi chú" style="display: none;">
																	<i class="fa fa-list-alt text-gray"></i>
																</a>
															</td>
															<td>
																<span data-bind="datelong: OrderDate"><?php echo $order['Order']['created']; ?></span>
															</td>
															<td><?php if($order['Order']['status'] == 1) {
																	echo '<span class="label fulfill_1">Đã thanh toán</span>';
																}
																if($order['Order']['status'] == 2) {
																	echo '<span class="label payment_6">Chưa thanh toán</span>';
																}
																if($order['Order']['status'] == 3) {
																	echo '<span class="label payment_5">Nháp</span>';
																}
																?></td>

															<td><?php if($order['Order']['shipping_status'] == 1) {
																	echo '<span class="label payment_3">Đang giao hàng</span>';
																}
																if($order['Order']['shipping_status'] == 2) {
																	echo '<span class="label payment_2">Đã giao</span>';
																}
																if($order['Order']['shipping_status'] == 0) {
																	echo '<span class="label payment_6">Chưa giao</span>';
																}
																?></td>
															<td class="text-right">
																<span data-bind="textMoneyWithSymbol: OrderTotal"><?php echo number_format($order['Order']['total']); ?> ₫</span>

															</td>
														</tr>
														<?php endforeach; ?>

														</tbody>
													</table>
												</div>
												<div class="clear"></div>
												<div class="btn-group pull-right" data-bind="template: { name: 'FilterPagingSimpleTmpl', data: Filter}">
												</div>
												<div class="clear"></div>
												<li class="divider"></li>
											</div>
										</div>
										<div class="tab-pane" data-bind="css: { active: $parent.IsTabAbandonedCheckout() }">
											<!-- ko if: $parent.mvAbandonedCheckout() && $parent.IsInitFinishAbandonedCheckout() -->
											<div data-bind="template: { name: 'CustomerAbandonedCheckoutListTmpl', data: $parent.mvAbandonedCheckout }">
												<!-- ko if: !Data() || Data().length == 0 -->
												<div class="text-center m-md-b">
													<svg class="svg-next-icon svg-next-icon-size-80 svg-next-icon-empty-color-filter">
														<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#next-orders-detailed"></use>
													</svg>
													<h4>Khách hàng chưa đặt đơn hàng nào !</h4>
												</div>
												<!-- /ko -->
												<!-- ko if: Data() && Data().length > 0 --><!-- /ko -->
											</div>
											<!-- /ko -->
										</div>

										<label class="bold-light m-xs-b">Ghi chú khách hàng</label>
										<div class="panel panel-default">
											<div class="panel-body">
												<pre class="textareadiv common"><br class="lbr"></pre><textarea name="data[note]" style="resize: none; height: 59px;" class="form-control border-none textarea-auto-height p-none-l" placeholder="Nhập ghi chú về khách hàng..." rows="2" data-bind="value: Notes"></textarea>
											</div>
											<div class="panel-footer text-right p-sm-r">
												<button type="submit" class="btn btn-default btn-small">Lưu ghi chú</button>
											</div>
										</div>

									</div>
								</div>


							</div>
							<div class="flexbox-content flexbox-right">

								<div data-bind="template: { name: 'CustomerAddressDetailTmpl', data: $parent.mvcadetail }">

									<div class="panel panel-default">
										<div class="panel-heading ">
											<span>Địa chỉ</span>
										</div>
										<!-- ko if: CustomerAddress().length > 0 -->
										<div class="panel-body">
											<div data-bind="if: CustomerAddress()[0].IsDefault()">
												<span class="pre-line small note">ĐỊA CHỈ GIAO HÀNG MẶC ĐỊNH</span>
											</div>
											<div class="pull-right">
												<img class="media-object img-thumbnail" width="40" data-bind="attr: { src: Thumbnail }" src="https://secure.gravatar.com/avatar/2efd8534a82578a162535ce9abd0224c.jpg?s=40&amp;d=https%3A%2F%2Fsecure.gravatar.com%2Favatar%2F18f9f20ec1a7be8020924ce0048b6ef2.jpg%3Fs%3D40">
											</div>
											<div class="address-item border-bottom p-xs-b" data-bind="with: CustomerAddress()[0]">
												<ul>
													<li class="bold-light pre-line" data-bind="text: Fullname"><?php echo $customer['Customer']['name'] . ' '.$customer['Customer']['lastname']; ?></li>
													<li data-bind="text: Company"></li>
													<li class="pre-line" data-bind="text: Address1"><?php echo $customer['Customer']['address']; ?></li>
													<li class="pre-line" data-bind="text: Address2"></li>
													<li class="normal-line">
														<span data-bind="text: City"></span>
														<span data-bind="text: ZipCode"></span>
													</li>
													<li class="normal-line">
<!--														<i data-bind="attr: { class: CountryFlagCss }" class="flag flag-vn"></i>-->
<!--														-->
<!--														<span data-bind="text: DistrictName">Quận 10</span>,-->
<!--										-->
<!--														<span data-bind="text: ProvinceName">Hồ Chí Minh</span>,-->
<!--													-->
<!--														<span data-bind="text: CountryName">Vietnam</span>-->
													</li>
													<li data-bind="if: Phone">
														<span data-bind="click2Call: Phone"><a title="Click để gọi"><i class="fa fa-phone-square cursor-pointer mr10"></i></a></span>
														<span class="note" data-bind="text: Phone"><?php echo $customer['Customer']['phone']; ?></span>
													</li>
													<li class="overflow-ellipsis">
														<i class="glyphicon glyphicon-envelope opa0_7 color-gray-icons mr10"></i>
														<a>

															<a>
																<span data-bind="text: email"><?php echo $customer['Customer']['email']; ?></span>
															</a>

														</a>
													</li>
												</ul>
											</div>
											<!-- ko if: CustomerAddress().length > 1 --><!-- /ko -->
										</div>
										<!-- /ko -->
										<!-- ko if: CustomerAddress().length === 0 --><!-- /ko -->
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading ">
										<span>Thông tin tài khoản</span>
									</div>
									<div class="panel-body">
										<ul>
											<li class="normal-line" data-bind="if: IsAcceptMarketing"></li>
											<li class="normal-line" data-bind="if: !IsAcceptMarketing()"> <i class="fa fa-bullhorn color-gray-icons note mr10"></i> Không nhận email quảng cáo</li>
											<li class="normal-line" data-bind="if: StatusName() == $parent.CustomerStatus()[0].Key">
												<i class="glyphicon glyphicon-user opa0_7 mr10 color-gray-icons"></i> Chưa có tài khoản
											</li>
											<li class="normal-line" data-bind="if: StatusName() == $parent.CustomerStatus()[1].Key || Status() == $parent.CustomerStatus()[2].Key"></li>
											<li class="normal-line" data-bind="if: StatusName() == $parent.CustomerStatus()[3].Key"></li>
											<li class="normal-line" data-bind="if: TotalSpent() > 0">
												<i class="fa fa-heart opa0_7 color-gray-icons"></i>&nbsp;&nbsp;&nbsp;<span data-bind="textMoneyWithSymbol: TotalSpent">
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>



	</div>

	<?php echo $this->Form->end();?>
</div>