<div id=":20h" class="ii gt adP adO"><div id=":20g" class="a3s aXjCH m1587c2e06f1d3f66"><u></u>







        <div bgcolor="" link="#c6d4df" alink="#9DB7D0" vlink="#6d93b8" text="#d7d7d7" style="font-family:Helvetica,Arial,sans-serif;font-size:14px;color:#d7d7d7">
            <table style="width:538px;background-color:#393836" align="center" cellspacing="0" cellpadding="0" border="0">
                <tbody><tr>
                    <td style="height:65px;background-color:#000000;border-bottom:1px solid #4d4b48">
                        <a  href="http://hoffee.vn">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 110 30" style="width: 110px; height: 30px;" width="110" height="30"><defs><style>.cls-1{fill:#0a4e9b;}</style></defs><title>Artboard 1</title><path class="cls-1" d="M16.43,25V15.33H7.72V25H5V5H5A2.73,2.73,0,0,1,7.72,7.73V13h8.71V7.73A2.73,2.73,0,0,1,19.15,5h0V25Z"></path><path class="cls-1" d="M24.78,7.53V22.47A2.52,2.52,0,0,0,27.3,25h7.84a2.52,2.52,0,0,0,2.51-2.52V7.53A2.52,2.52,0,0,0,35.14,5H27.3A2.52,2.52,0,0,0,24.78,7.53ZM27.5,21.35V7.46h6a1.47,1.47,0,0,1,1.47,1.47V21.24a1.3,1.3,0,0,1-1.3,1.3H28.69A1.19,1.19,0,0,1,27.5,21.35Z"></path><path class="cls-1" d="M46.06,7.46V13h7a2.32,2.32,0,0,1-2.31,2.32H46.06V25H43.34V5H55.65A2.45,2.45,0,0,1,53.2,7.46Z"></path><path class="cls-1" d="M62,7.46V13h7a2.32,2.32,0,0,1-2.31,2.32H62V25H59.27V5H71.58a2.45,2.45,0,0,1-2.45,2.46Z"></path><path class="cls-1" d="M78.85,7.46V13h6.58a2.32,2.32,0,0,1-2.31,2.32H78.85v7.21h9V25H76.13V5H88a2.45,2.45,0,0,1-2.45,2.46Z"></path><path class="cls-1" d="M95.82,7.46V13h6.58a2.32,2.32,0,0,1-2.31,2.32H95.82v7.21h9V25H93.1V5H105a2.45,2.45,0,0,1-2.45,2.46Z"></path></svg>

                        </a>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#17212e">
                        <table width="470" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-left:5px;padding-right:5px;padding-bottom:10px">
                            <tbody><tr bgcolor="#17212e">
                                <td style="padding-top:32px">
					<span style="font-family:Helvetica,Arial,sans-serif;font-size:24px;color:#66c0f4;font-weight:bold">
						Hello <?php echo $shop['Order']['first_name'];?>				</span><br>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-family:Helvetica,Arial,sans-serif;font-size:14px;color:#c6d4df;padding-top:16px">
                                    <h3 style="margin-bottom:0px">Thank you for your recent purchase for Hoffee</h3>
                                    			   </td>
                            </tr>
                            <tr><td style="padding-top:10px"></td></tr>
                            <tr>
                                <td>
                                    <table width="470" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-bottom:10px">
                                        <thead>
                                        <tr>
                                            <td style="width:140px"></td>
                                            <td style="width:500px"></td>
                                            <td style="width:130px"></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr><td style="padding-top:5px" colspan="3"></td></tr>
                                        <?php foreach ($shop['OrderItem'] as $key => $item): ?>
                                        <tr style="background-color:#111822">
                                            <td colspan="2" style="font-size:12px;color:#c6d4df;padding:10px">
                                                <div>
                                                    <?php echo $item['quantity'];?> - <?php echo $item['Product']['name'];?>													</div>
                                            </td>
                                            <td style="font-family:Helvetica,Arial,sans-serif;font-size:14px;color:#c6d4df;padding-right:15px;text-align:right;padding-top:10px;padding-bottom:10px">
                                                <?php echo $item['subtotal']; ?></span> VND											</td>
                                        </tr>
                                        <?php endforeach;?>
                                        <tr><td style="padding-top:10px" colspan="3"></td></tr>
                                        <tr><td style="background-color:#111822;padding-top:10px" colspan="3"></td></tr>
                                        <tr style="background-color:#111822;vertical-align:top">
                                            <td style="padding-left:10px" colspan="3">
                                                <table style="width:100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                    <tbody><tr>
                                                        <td style="font-family:Helvetica,Arial,sans-serif;font-size:12px;color:#61696d;width:250px">
                                                            Address: <?php echo $shop['Order']['billing_address'];?>																											</td>
                                                        <td style="font-family:Helvetica,Arial,sans-serif;font-size:12px;color:#66c0f4;width:120px;text-align:right;padding-right:5px">Total:</td>
                                                        <td style="font-family:Helvetica,Arial,sans-serif;font-size:12px;color:#66c0f4;padding-right:15px;text-align:right"><?php echo $shop['Order']['total'];?> VND</td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                        </tr>
                                        <tr style="background-color:#111822;vertical-align:top">
                                            <td style="padding-left:10px" colspan="3">
                                                <table style="width:100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                    <tbody><tr>
                                                        <td style="font-family:Helvetica,Arial,sans-serif;font-size:12px;color:#61696d;width:250px">
                                                           																										</td>
                                                        <td style="font-family:Helvetica,Arial,sans-serif;font-size:12px;color:#c6d4df;text-align:right;width:120px;padding-right:5px"></td>
                                                        <td style="font-family:Helvetica,Arial,sans-serif;font-size:12px;color:#c6d4df;padding-right:15px;text-align:right"></td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                        </tr>
                                        <tr style="background-color:#111822;vertical-align:top">
                                            <td style="padding-left:10px" colspan="3">
                                                <table style="width:100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                    <tbody><tr>
                                                        <td style="font-family:Helvetica,Arial,sans-serif;font-size:12px;color:#61696d;width:250px">
                                                            Date issued: <?php echo date('M d Y G:i');?>																											</td>
                                                        <td style="font-family:Helvetica,Arial,sans-serif;font-size:12px;color:#c6d4df;text-align:right;width:120px;padding-right:5px"></td>
                                                        <td style="font-family:Helvetica,Arial,sans-serif;font-size:12px;color:#c6d4df;padding-right:15px;text-align:right"></td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                        </tr>
                                        <tr style="background-color:#111822;vertical-align:top">
                                            <td style="padding-left:10px" colspan="3">
                                                <table style="width:100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                                    <tbody><tr>
                                                        <td style="font-family:Helvetica,Arial,sans-serif;font-size:12px;color:#61696d;width:250px">
                                                           																											</td>
                                                        <td style="font-family:Helvetica,Arial,sans-serif;font-size:12px;color:#c6d4df;text-align:right;width:120px;padding-right:5px"></td>
                                                        <td style="font-family:Helvetica,Arial,sans-serif;font-size:12px;color:#c6d4df;padding-right:15px;text-align:right"></td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                        </tr>

                                        <tr><td style="background-color:#111822;padding-top:10px" colspan="3"></td></tr>


                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-family:Helvetica,Arial,sans-serif;font-size:12px;color:#61696d;padding-top:10px">
                                    This email message will serve as your receipt. 		   </td>
                            </tr>
                            <tr>
                                <td style="font-family:Helvetica,Arial,sans-serif;font-size:12px;color:#61696d;padding-top:16px">
                                    We will contact you via phone as soon as possible.
                                </td>
                            </tr>
                            <tr>
                                <td style="font-family:Helvetica,Arial,sans-serif;font-size:12px;color:#61696d;padding-top:20px">
                                    The <span class="il">Hoffee</span> Support Team<br>
                                </td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr>
                <tr style="background-color:#17212e">
                    <td style="padding-top:50px">
                    </td>
                </tr>
                <tr style="background-color:#000000">
                    <td style="padding:12px 24px">
                        <table cellpadding="0" cellspacing="0">
                            <tbody><tr>
                                <td width="92">
                                    <img src="https://ci4.googleusercontent.com/proxy/IHzYs4Fk-P7UZ1YcB6Tkq65fai9JnoAT2ahgIjsunSydPWxVzc4vDpTCbkBmYdfeceZJ8fQM3uZrw-QC-5ZYvRjYVNjvREOLTSj5NLgv_wyGVt5cuj0OtEp934Ta=s0-d-e1-ft#http://store.akamai.steamstatic.com/public/images/logo_valve_footer.jpg" width="92" height="26" alt="Valve®" class="CToWUd">
                                </td>
                                <td style="font-size:11px;color:#595959;padding-left:12px">
                                   			</td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr>
                </tbody>
                </table>



        </div></div></div>