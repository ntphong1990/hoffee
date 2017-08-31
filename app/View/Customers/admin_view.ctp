
	 
	 <?php echo $this->Form->create('Customer'); ?>
		<div>
			<div class="">
				
				<div class="one-row-actions">
				<div class="row head-action">
						<div class="col-sm-12 col-lg-6">
						
							<span><a class="back-list hidden-xs" href="/admin/customer/list">Quản lý khách hàng</a></span>
							<span class="border-row hidden-xs">/ </span>
							<span class="active"><?php echo $customer['Customer']['name'].' '.$customer['Customer']['lastname'];?></span>
						
						</div>
						<div class="col-sm-12 col-lg-6">
						<div class="right">
						
						<a class="btn btn-primary" data-toggle="modal" data-target="#myModal18">
                            Thanh toán
                        </a>
                        <div class="modal fade" id="myModal18" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h5 class="modal-title text-xl-center fw-bold mt" id="myModalLabel18">Thanh toán</h5>
                                        
                                    </div>
                                    <div class="modal-body bg-gray-lighter">
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="form-group">
														<label for="own">Còn nợ</label></br>
                                                        <strong >100000 đ</strong>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
														<label for="">Thanh toán</label>
                                                        <input type="number" class="form-control input-no-border"
                                                               placeholder="Nhập số tiền">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
													
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-no-border"
                                                               placeholder="Ghi chú">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-no-border"
                                                               placeholder="City">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-no-border"
                                                               placeholder="Country">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-no-border"
                                                               placeholder="Zip">
                                                    </div>
                                                </div> -->
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-gray" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
							<a class="btn btn-default ml10" href="<?php echo Configure::read('Settings.DOMAIN'); ?>/admin/customers/edit/<?php echo $customer['Customer']['id']; ?>">Chỉnh sửa thông tin</a>
							<?php echo $this->Form->postLink('Xoá Khách', array('action' => 'delete', $customer['Customer']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $customer['Customer']['id'])); ?>
						</div>
						</div>

					</div>
								
				</div>
					<div class="max-width-1200">
						<div class="flexbox-grid no-pd-none">
							<div class="col-sm-12 col-lg-8">
								<div class="wrapper-content p-l15 p-r15">
										
									<div class="tab-content clearfix p-t20">
										<div class="widget">
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
														<?php $total = 0;?>	
														<?php foreach ($orders as $order): ?>
														<tr>
															<td>
																<a href="<?php echo Configure::read('Settings.DOMAIN'); ?>/admin/orders/view/<?php echo $order['Order']['id']; ?>" target="_blank"  class="text-underline hover-underline">#<?php echo $order['Order']['id']; ?></a>
																<a data-toggle="tooltip" data-placement="bottom" data-original-title="Đơn hàng có ghi chú." data-bind="style: { display: HasNote() == 1 ? 'inline' : 'none' }, attr: { href: Link , title:'Đơn hàng có ghi chú' }" href="/admin/order/#/detail/1007752652" title="Đơn hàng có ghi chú" style="display: none;">
																	<i class="fa fa-list-alt text-gray"></i>
																</a>
															</td>
															<td>
																<span data-bind="datelong: OrderDate"><?php echo $order['Order']['created']; ?></span>
															</td>
															<td><?php if($order['Order']['status'] == 1) {
																	echo '<span class="label label-success">Đã thanh toán</span>';
																}
																if($order['Order']['status'] == 2) {
																	echo '<span class="label label-danger">Chưa thanh toán</span>';
																}
																if($order['Order']['status'] == 3) {
																	echo '<span class="label payment_5">Nháp</span>';
																}
																?></td>

															<td><?php if($order['Order']['shipping_status'] == 1) {
																	echo '<span class="label label-success">Đang giao hàng</span>';
																}
																if($order['Order']['shipping_status'] == 2) {
																	echo '<span class="label label-success">Đã giao</span>';
																}
																if($order['Order']['shipping_status'] == 0) {
																	echo '<span class="label label-danger">Chưa giao</span>';
																}
																?></td>
															<td class="text-right">
																<span><?php echo number_format($order['Order']['total']);$total = $total + $order['Order']['total']; ?> ₫</span>

															</td>
														</tr>
														<?php endforeach; ?>
														<tr>
															<td></td>
															<td></td>
															<td></td>
															<td><strong>TẤT CẢ</strong></td>
															<td><?php echo number_format($total);?> ₫</td>
															
														</tr>
														<tr>
															<td></td>
															<td></td>
															<td></td>
															<td><strong>ĐÃ TRẢ</strong></td>
															<td><?php echo number_format($total);?> ₫</td>
															
														</tr>
														<tr>
															<td></td>
															<td></td>
															<td></td>
															<td><strong>CÒN LẠI</strong></td>
															<td>0 ₫</td>
															
														</tr>
														</tbody>
													</table>
												</div>
												
											</div>
										</div>
										

										
										<div class="panel panel-default">
										
											<div class="panel-body">
											<label class="bold-light m-xs-b">Ghi chú khách hàng</label>
												<textarea name="data[note]" style="resize: none; height: 59px;" class="form-control border-none textarea-auto-height p-none-l" placeholder="Nhập ghi chú về khách hàng..." rows="2" data-bind="value: Notes"><?php echo $customer['Customer']['note'];?></textarea>
											</div>
											<div class="panel-body">
												<button type="submit" class="btn btn-default btn-small">Lưu ghi chú</button>
											</div>
										</div>

									</div>
								</div>


							</div>
							<div class="col-sm-12 col-lg-4">

								<div class="widget">

									<div class="panel panel-default">
										<div class="panel-heading ">
											<span>Địa chỉ</span>
										</div>
										<!-- ko if: CustomerAddress().length > 0 -->
										<div class="panel-body">
											<div>
												<span class="pre-line small note">ĐỊA CHỈ GIAO HÀNG MẶC ĐỊNH</span>
											</div>
											<div class="pull-right">
												<img class="media-object img-thumbnail" width="40" data-bind="attr: { src: Thumbnail }" src="https://secure.gravatar.com/avatar/2efd8534a82578a162535ce9abd0224c.jpg?s=40&amp;d=https%3A%2F%2Fsecure.gravatar.com%2Favatar%2F18f9f20ec1a7be8020924ce0048b6ef2.jpg%3Fs%3D40">
											</div>
											<div class="address-item border-bottom p-xs-b">
												<ul>
													<li class="bold-light pre-line"><strong><?php echo $customer['Customer']['name'] . ' '.$customer['Customer']['lastname']; ?></strong></li>
													<li class="pre-line" data-bind="text: Address1"><?php echo $customer['Customer']['address']; ?></li>
													
												
													<li data-bind="if: Phone">
														<span data-bind="click2Call: Phone"><a title="Click để gọi"><i class="fa fa-phone-square cursor-pointer mr10"></i></a></span>
														<span class="note" data-bind="text: Phone"><?php echo $customer['Customer']['phone']; ?></span>
													</li>
													<li class="overflow-ellipsis">
														<i class="glyphicon glyphicon-envelope opa0_7 color-gray-icons mr10"></i>
														<a>

															<a>
																<span><?php echo $customer['Customer']['email']; ?></span>
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

								
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>



	</div>

	<?php echo $this->Form->end();?>
</div>