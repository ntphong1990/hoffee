<script>
	function pageLoad(){
		  $('#tooltip-enabled, #max-length').tooltip();
        $('.selectpicker').selectpicker();
        $(".autogrow").autosize({append: "\n"});
       
        $(".select2").each(function(){
            $(this).select2($(this).data());
        });

        

        $('#datetimepicker1').datetimepicker({
            format: 'MM/DD/YYYY'
        });
        $('#datetimepicker2').datetimepicker({
					format: 'MM/DD/YYYY'
        });

        $('#colorpicker').colorpicker({color: Sing.colors['gray-light']});

        $("#mask-phone").inputmask({mask: "(999) 999-9999"});
        $("#mask-date").inputmask({mask: "99-99-9999"});
        $("#mask-int-phone").inputmask({mask: "+999 999 999 999"});
        $("#mask-time").inputmask({mask: "99:99"});

        $('#markdown').markdown();

        $('.js-slider').slider();

        // Prevent Dropzone from auto discovering this element:
        Dropzone.options.myAwesomeDropzone = false;
        $('#my-awesome-dropzone').dropzone();
        Holder.run();
        /**
         * Holder js hack. removing holder's data to prevent onresize callbacks execution
         * so they don't fail when page loaded
         * via ajax and there is no holder elements anymore
         */
        $('img[data-src]').each(function(){
            delete this.holder_data;
        });

	}
	window.onload = function(){
			pageLoad();
	}
</script>


<div class="widget">
	<div class="clearfix">
            <div class="btn-toolbar">
								<div class="btn-group">          
                        <input id="datetimepicker1" type="text" class="form-control" placeholder="Từ ngày">
                </div>
								<div class="btn-group">          
                        <input id="datetimepicker2" type="text" class="form-control"  placeholder="đến ngày">
                </div>
                <div class="btn-group">
                    <select class="selectpicker"
                                                data-style="btn-warning btn-sm"
                                                data-width="auto"
                                                tabindex="-1" id="simple-orange-select">
                                            <option class="dropdown-item" value="">Tất cả</option>
                                            <option class="dropdown-item" value="1">Bán hàng</option>
                                            <option class="dropdown-item" value="2">Khác</option>
                    </select>
                </div>
                <div class="btn-group">
                     <select class="selectpicker"
                                                data-style="btn-danger btn-sm"
                                                data-width="auto"
                                                tabindex="-1" id="simple-red-select">
                                            <option class="dropdown-item" value="">Thu/Chi</option>
                                            <option class="dropdown-item" value="1">Thu</option>
                                            <option class="dropdown-item" value="2">Chi</option>
											</select>
									
								</div>
								<div class="input-group col-md-4 col-sm-12">
                                                <input type="search" class="form-control" id="search-input">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-secondary">Search</button>
                                                </span>
                  </div>
                
            </div>
  	</div>
	<table class="table" cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($financials as $financial): ?>
	<tr>
		<td><?php echo h($financial['Financial']['id']); ?>&nbsp;</td>
		<td><?php echo h($financial['Financial']['type']); ?>&nbsp;</td>
		<td><?php echo h($financial['Financial']['value']); ?>&nbsp;</td>
		<td><?php echo h($financial['Financial']['note']); ?>&nbsp;</td>
		<td><?php echo h($financial['Financial']['created']); ?>&nbsp;</td>
		<td><?php echo h($financial['Financial']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $financial['Financial']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $financial['Financial']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $financial['Financial']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $financial['Financial']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	
	<div class="paging">
<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Financial'), array('action' => 'add')); ?></li>
	</ul>
</div>
