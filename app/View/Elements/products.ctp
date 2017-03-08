
    <?php
    $i = 0;
    foreach ($products as $product):
        $i++;
    ?>



        <li class="featured_products-list-item ">

            <a href="./products/view/<?php echo $product['Product']['slug'];?> " class="product-link">

                <figure class="product-figure">

                    <img src="<?php echo Configure::read('Settings.DOMAIN').'/images/large/' . $product['Product']['image'];?>" class="product-figure-image">

                    <span class="product-icon product-icon--cart">

					<icon src="<?php echo Configure::read('Settings.DOMAIN');?>/img/cart_big.svg" class="product-icon--cart-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="31px" viewBox="0 0 35 31" version="1.1" class="injected-svg icon-svg">
	<path d="M26.7236821,26.4637758 C25.9489263,26.4637758 25.3177915,27.0949106 25.3177915,27.8696664 C25.3177915,28.6444222 25.9489263,29.2747591 26.7236821,29.2747591 C27.4984379,29.2747591 28.1295727,28.6444222 28.1295727,27.8696664 C28.1295727,27.0949106 27.4984379,26.4637758 26.7236821,26.4637758 M26.7236821,30.8705486 C25.0688484,30.8705486 23.722002,29.5245001 23.722002,27.8696664 C23.722002,26.2148326 25.0688484,24.8679863 26.7236821,24.8679863 C28.3785159,24.8679863 29.7253622,26.2148326 29.7253622,27.8696664 C29.7253622,29.5245001 28.3785159,30.8705486 26.7236821,30.8705486" id="Fill-1"></path>
	<path d="M28.9778944,22.6357161 L11.8997548,22.6357161" id="Fill-3"></path>
	<path d="M28.9778944,23.4334513 L11.8997548,23.4334513 C11.458519,23.4334513 11.10186,23.0759944 11.10186,22.6355565 C11.10186,22.1951186 11.458519,21.8376617 11.8997548,21.8376617 L28.9778944,21.8376617 C29.4183323,21.8376617 29.7757892,22.1951186 29.7757892,22.6355565 C29.7757892,23.0759944 29.4183323,23.4334513 28.9778944,23.4334513" id="Fill-5"></path>
	<path d="M11.129148,22.8426102 L5.63484463,2.39336515 L0.797974558,2.39336515 C0.357536646,2.39336515 7.97894772e-05,2.03670619 7.97894772e-05,1.59547038 C7.97894772e-05,1.15503247 0.357536646,0.797575611 0.797974558,0.797575611 L6.24682991,0.797575611 C6.60747835,0.797575611 6.92344468,1.04013562 7.01679837,1.38881563 L12.6698828,22.4285028 C12.7839818,22.8537807 12.531847,23.2918249 12.1065691,23.4059239 C12.0371523,23.4250734 11.9677354,23.4338502 11.8991165,23.4338502 C11.5472449,23.4338502 11.2248954,23.1992691 11.129148,22.8426102 Z" id="Fill-7"></path>
	<path d="M11.3042061,17.3385725 L30.0204237,17.3385725 L32.8936428,6.72258259 L8.44854074,6.72258259 L11.3042061,17.3385725 Z M30.6308132,18.934362 L10.6922208,18.934362 C10.3315724,18.934362 10.0156061,18.691802 9.92225238,18.3439199 L6.63652172,6.13214046 C6.57269014,5.89197413 6.62295751,5.63584991 6.77455751,5.4387699 C6.92535963,5.2416899 7.15914279,5.12679305 7.40728807,5.12679305 L33.9364912,5.12679305 C34.1846365,5.12679305 34.4192176,5.24248779 34.5700197,5.4395678 C34.7208218,5.63664781 34.7710892,5.89356992 34.7064597,6.13293835 L31.4007817,18.3447178 C31.3066301,18.6925999 30.9906638,18.934362 30.6308132,18.934362 L30.6308132,18.934362 Z" id="Fill-10"></path>
	<path d="M15.154208,26.4637758 C14.3794521,26.4637758 13.7483174,27.0949106 13.7483174,27.8696664 C13.7483174,28.6444222 14.3794521,29.2747591 15.154208,29.2747591 C15.9297617,29.2747591 16.5600985,28.6444222 16.5600985,27.8696664 C16.5600985,27.0949106 15.9297617,26.4637758 15.154208,26.4637758 M15.154208,30.8705486 C13.4993742,30.8705486 12.1525278,29.5245001 12.1525278,27.8696664 C12.1525278,26.2148326 13.4993742,24.8679863 15.154208,24.8679863 C16.8098396,24.8679863 18.1558881,26.2148326 18.1558881,27.8696664 C18.1558881,29.5245001 16.8098396,30.8705486 15.154208,30.8705486" id="Fill-13"></path>
	<path d="M18.2371936,17.6191921 L14.6179429,6.22844636" id="Fill-15"></path>
	<path d="M18.236635,18.417406 C17.8983276,18.417406 17.584755,18.2003786 17.4762413,17.8604755 L13.8569906,6.46972973 C13.7237422,6.05003709 13.9559296,5.60162023 14.3764201,5.4683718 C14.794517,5.33512337 15.2445296,5.56651286 15.3777781,5.9870034 L18.9978266,17.3777491 C19.1310751,17.7974418 18.8988877,18.2458586 18.4783971,18.379905 C18.3986077,18.4046397 18.3172224,18.417406 18.236635,18.417406" id="Fill-17"></path>
	<path d="M27.3414122,17.6191921 L23.7221616,6.22844636" id="Fill-19"></path>
	<path d="M27.3411729,18.417406 C27.0028655,18.417406 26.6892928,18.2003786 26.5807792,17.8604755 L22.9615285,6.46972973 C22.8282801,6.05003709 23.0604674,5.60162023 23.480958,5.4683718 C23.8982569,5.33512337 24.3490675,5.56651286 24.4823159,5.9870034 L28.1023645,17.3777491 C28.2356129,17.7974418 28.0034255,18.2458586 27.582935,18.379905 C27.5031455,18.4046397 27.4217602,18.417406 27.3411729,18.417406" id="Fill-21"></path>
</svg></icon>

				</span>

                </figure>

                <div class="content product-content">

                    <h6 class="product-suptitle">

                        Hoffee
                    </h6>

                    <h5 class="product-title"><span><?php echo $product['Product']['name'];?></span></h5>


                    <div class="pill pill--center">

                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><span><?php echo number_format($product['Product']['price']); ?> </span><span> VND</span></span>
                    </div>

                </div>

            </a>
        </li>







        <?php

    endforeach;
    ?>



