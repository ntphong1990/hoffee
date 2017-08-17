
<script>
		function initIncome(){
        $('#income').css({height: '343px'}); //safari svg height fix
            Morris.Line({
                element: 'income',
                resize: true,
                data: [
                                <?php foreach($data as $value){ ?>
                                    { m: '<?php echo $value[0]['year'].'-'.$value[0]['month'];?>', a: <?php echo $value[0]['sum'];?> },
                                <?php } ?>	
                    
                ],
                xkey: 'm',
                ykeys: ['a'],
                labels: ['Income'],
                lineColors: ['#88C4EE', '#ccc']
            });
		}
		function initOutcome(){
            $('#outcome').css({height: '343px'}); //safari svg height fix
                Morris.Line({
                element: 'outcome',
                resize: true,
                data: [
                                <?php foreach($fee_data as $value){ ?>
                                    { m: '<?php echo $value[0]['year'].'-'.$value[0]['month'];?>', a: <?php echo $value[0]['sum'];?>, b: 90 },
                                <?php } ?>	
                    
                ],
                xkey: 'm',
                ykeys: ['a', 'b'],
                labels: ['Cost', ''],
                lineColors: ['#88C4EE', '#ccc']
            });
        }
        
    function _stream_layers(n, m, o) {
        if (arguments.length < 3) o = 0;
        function bump(a) {
            var x = 1 / (.1 + Math.random()),
                y = 2 * Math.random() - .5,
                z = 10 / (.1 + Math.random());
            for (var i = 0; i < m; i++) {
                var w = (i / m - y) * z;
                a[i] += x * Math.exp(-w * w);
            }
        }
        return d3.range(n).map(function() {
            var a = [], i;
            for (i = 0; i < m; i++) a[i] = o + o * Math.random();
            for (i = 0; i < 5; i++) bump(a);
            return a.map(function(d, i) {
                return {x: i, y: Math.max(0, d)};
            });
        });
    }
    function testData(stream_names, pointsCount) {
        var now = new Date().getTime(),
            day = 1000 * 60 * 60 * 24, //milliseconds
            daysAgoCount = 60,
            daysAgo = daysAgoCount * day,
            daysAgoDate = now - daysAgo,
            pointsCount = pointsCount || 45, //less for better performance
            daysPerPoint = daysAgoCount / pointsCount;
        return _stream_layers(stream_names.length, pointsCount, .1).map(function(data, i) {
            return {
                key: stream_names[i],
                values: data.map(function(d,j){
                    return {
                        x: daysAgoDate + d.x * day * daysPerPoint,
                        y: Math.floor(d.y * 100) //just a coefficient,
                    }
                })
            };
        });
    }
        function initProduct(){
             $('#product').css({height: '343px'}); //safari svg height fix
                Morris.Line({
                element: 'product',
                resize: true,
                data: [
                                <?php foreach($product_data as $value){ ?>
                                    { m: '<?php echo $value[0]['year'].'-'.$value[0]['month'];?>', a: <?php echo $value[0]['sum1'];?>, b: <?php echo $value[0]['sum2'];?> },
                                <?php } ?>	
                    
                ],
                xkey: 'm',
                ykeys: ['a', 'b'],
                labels: ['1 Lá', '2 Lá'],
                lineColors: ['#88C4EE', '#ccc']
            });
        }

		window.onload = function(){
			pageLoad();
		}
		function pageLoad(){
            $('#income').html("");
            $('#outcome').html("");
			initIncome();
            initOutcome();
            initProduct();
		}
</script>
<!--asdasdasd-->
<div class="row">
            <div class="col-lg-3 col-md-6">
                <section class="widget widget-card bg-primary text-white">
                    <div class="widget-body clearfix">
                        <div class="row">
                            <div class="col-xs-3">
                                <span class="widget-icon">
                                    <i class="glyphicon glyphicon-globe"></i>
                                </span>
                            </div>
                            <div class="col-xs-9">
                                <h6 class="no-margin">PRODUCT TOTAL</h6>
                                <p class="h2 no-margin fw-normal"><?php echo number_format($doanhthu);?> ₫</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <h6 class="no-margin">This Month</h6>
                                <p class="value5">+830</p>
                            </div>
                            <div class="col-xs-6 fs-sm">
                                <h6 class="no-margin">Last Month</h6>
                                <p class="value5">4.5%</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-md-6">
                <section class="widget widget-card bg-info text-white">
                    <div class="widget-body clearfix">
                        <div class="row">
                            <div class="col-xs-3">
                                <span class="widget-icon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                            </div>
                            <div class="col-xs-9">
                                <div class="live-tile carousel ha" data-mode="carousel" data-speed="750" data-delay="3000" data-height="57" style="height: 57px;">
                                    <div class="slide ha active" style="transition-property: transform; transition-duration: 750ms; transition-timing-function: ease; transform: translate(0%, 0%) translateZ(0px);">
                                        <h6 class="no-margin">TOTAL USERS</h6>
                                        <p class="h2 no-margin fw-normal"><?php echo number_format($count);?></p>
                                    </div>
                                    <div class="slide ha" style="transform: translate(0%, -100%) translateZ(0px); transition-duration: 750ms; transition-property: transform; transition-timing-function: ease;">
                                        <h6 class="no-margin">VISITS YESTERDAY</h6>
                                        <p class="h2 no-margin fw-normal">11,885</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <h6 class="no-margin">This Month</h6>
                                <div class="live-tile carousel ha" data-mode="carousel" data-speed="750" data-delay="3000" data-height="24" style="height: 24px;">
                                    <div class="slide ha active" style="transition-property: transform; transition-duration: 750ms; transition-timing-function: ease; transform: translate(0%, 0%) translateZ(0px);">
                                        <p class="value5">1,332</p>
                                    </div>
                                    <div class="slide ha" style="transform: translate(0%, -100%) translateZ(0px); transition-duration: 750ms; transition-property: transform; transition-timing-function: ease;">
                                        <p class="value5">20.1%</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <h6 class="no-margin">Last Month</h6>
                                <div class="live-tile carousel ha" data-mode="carousel" data-speed="750" data-delay="3000" data-height="24" style="height: 24px;">
                                    <div class="slide ha active" style="transition-property: transform; transition-duration: 750ms; transition-timing-function: ease; transform: translate(0%, 0%) translateZ(0px);">
                                        <p class="value5">217</p>
                                    </div>
                                    <div class="slide ha" style="transform: translate(0%, -100%) translateZ(0px); transition-duration: 750ms; transition-property: transform; transition-timing-function: ease;">
                                        <p class="value5">2.3%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-md-6">
                <section class="widget widget-card bg-gray">
                    <div class="widget-body clearfix">
                        <div class="live-tile fade" data-mode="fade" data-speed="750" data-delay="4000" data-height="100" style="height: 100px;">
                            <div class="bg-gray text-white fade-front" style="display: block;">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <span class="widget-icon">
                                            <i class="glyphicon glyphicon-globe"></i>
                                        </span>
                                    </div>
                                    <div class="col-xs-9">
                                        <h6 class="no-margin">INCOME</h6>
                                        <p class="h2 no-margin fw-normal"><?php echo number_format($tong);?> ₫</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h6 class="no-margin">Avg. Time</h6>
                                        <p class="value5">2:56</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <h6 class="no-margin">Last Week</h6>
                                        <p class="value5">374</p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-white fade-back">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <span class="widget-icon">
                                            <i class="glyphicon glyphicon-certificate"></i>
                                        </span>
                                    </div>
                                    <div class="col-xs-9">
                                        <h6 class="no-margin">PICKED ORDERS</h6>
                                        <p class="h2 no-margin fw-normal">13.8%</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h6 class="no-margin">Basic</h6>
                                        <p class="value5">3,692</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <h6 class="no-margin">Advanced</h6>
                                        <p class="value5">1,441</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-md-6">
                <section class="widget widget-card bg-success text-white">
                    <div class="widget-body clearfix">
                        <div class="row">
                            <div class="col-xs-3">
                                <span class="widget-icon">
                                    <i class="glyphicon glyphicon-usd"></i>
                                </span>
                            </div>
                            <div class="col-xs-9">
                                <h6 class="no-margin">FEE</h6>
                                <p class="h2 no-margin fw-normal"><?php echo number_format($chi);?> ₫</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <h6 class="no-margin">Last Month</h6>
                                <p class="value5">$83,541</p>
                            </div>
                            <div class="col-xs-6">
                                <h6 class="no-margin">Last Week</h6>
                                <p class="value5">$17,926</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
<!--sasdasdasdasd-->



 <div class="col-lg-6">
                <section class="widget">
                    <header>
                        <h5>
                             <span class="fw-semi-bold">Monthly Sale</span>
                        </h5>
                        <div class="widget-controls">
                            <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                            <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                            <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-body">
                        
                        <div id="income">
                        </div>
                    </div>
                </section>
            </div>
						 <div class="col-lg-6">
                <section class="widget">
                    <header>
                        <h5>
                             <span class="fw-semi-bold">Monthly Cost</span>
                        </h5>
                        <div class="widget-controls">
                            <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                            <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                            <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-body">
                        
                        <div id="outcome">
                        </div>
                    </div>
                </section>
            </div>


 <div class="col-lg-6">
                <section class="widget">
                    <header>
                        <h5>
                             <span class="fw-semi-bold">Products Chart</span>
                        </h5>
                        <div class="widget-controls">
                            <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                            <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                            <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-body">
                        
                        <div id="product">
                            
                        </div>
                    </div>
                </section>
            </div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Financial'), array('action' => 'add')); ?></li>
	</ul>
</div>
