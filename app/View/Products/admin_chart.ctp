
<script>
    var lineChartData = {
        labels : ["January","February","March","April","May","June","July"],
        datasets : [
            {
                label: "My First dataset",
                fillColor : "rgba(220,220,220,0.2)",
                strokeColor : "rgba(220,220,220,1)",
                pointColor : "rgba(220,220,220,1)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "#fff",
                pointHighlightStroke : "rgba(220,220,220,1)",
                data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
            },
            {
                label: "My Second dataset",
                fillColor : "rgba(48, 164, 255, 0.2)",
                strokeColor : "rgba(48, 164, 255, 1)",
                pointColor : "rgba(48, 164, 255, 1)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "#fff",
                pointHighlightStroke : "rgba(48, 164, 255, 1)",
                data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
            }
        ]

    }
    window.onload = function(){
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true
        });

    };
</script>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Profit</div>
            <div class="panel-body">
                <div class="canvas-wrapper">
                    <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div><!--/.row-->

<h2>Orders</h2>

<table data-toggle="table" data-url="tables/data1.json" data-show-refresh="true"
       data-show-toggle="true" data-show-columns="true" data-search="true"
       data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
       data-sort-order="desc" class="table table-hover">
    <tr>
        <th><?php echo $this->Paginator->sort('first_name'); ?></th>
        <th><?php echo $this->Paginator->sort('last_name'); ?></th>
        <th><?php echo $this->Paginator->sort('email'); ?></th>
        <th><?php echo $this->Paginator->sort('phone'); ?></th>

        <th><?php echo $this->Paginator->sort('shipping_city'); ?></th>



        <th><?php echo $this->Paginator->sort('shipping'); ?></th>
        <th><?php echo $this->Paginator->sort('total'); ?></th>
        <th><?php echo $this->Paginator->sort('status'); ?></th>
        <th><?php echo $this->Paginator->sort('created'); ?></th>
        <th>Actions</th>
    </tr>
    <?php foreach ($orders as $order): ?>
        <tr>
            <td><?php echo h($order['Order']['first_name']); ?></td>
            <td><?php echo h($order['Order']['last_name']); ?></td>
            <td><?php echo h($order['Order']['email']); ?></td>
            <td><?php echo h($order['Order']['phone']); ?></td>

            <td><?php echo h($order['Order']['shipping_city']); ?></td>



            <td><?php echo h($order['Order']['shipping']); ?></td>
            <td><?php echo h($order['Order']['total']); ?></td>
            <td><?php echo h($order['Order']['status']); ?></td>
            <td><?php echo h($order['Order']['created']); ?></td>
            <td class="actions">
                <?php echo $this->Html->link('View', array('action' => 'view', $order['Order']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                <?php echo $this->Html->link('Edit', array('action' => 'edit', $order['Order']['id']), array('class' => 'btn btn-default btn-xs')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />
