
<div class="dataTables_paginate paging_bootstrap">
 
    <ul class="pagination no-margin"> 
    
        <li class="prev disabled page-item">
    <?php echo $this->Paginator->prev('Previous', array('class' => 'page-link'), null, array('class' => 'page-link')); ?>
        </li>
        <li class="page-item">
    <?php echo $this->Paginator->numbers(array('separator' => ' ','class' => 'page-link')); ?>
        </li>
        <li class="next page-item">
            <?php echo $this->Paginator->next('Next', array('class' => 'page-link'), null, array('class' => 'page-link')); ?>
        </li>   
    </ul>
</div>

