<?php if ($this->pageCount > 1): ?>
<ul class="pagination_list">

    <?php if (isset($this->previous)): ?>
    <!-- Previous page link --> 
    <li class="pagination_previous">
    <a href="<?php echo html_escape($this->url(array('page' => $this->previous), null, $_GET)); ?>"><?php echo __('Previous'); ?></a>
    </li>
    <?php endif; ?>

    <!-- Numbered page links -->
    <?php foreach ($this->pagesInRange as $page): ?> 
    <?php if ($page != $this->current): ?>
    <li class="pagination_range"><a href="<?php echo html_escape($this->url(array('page' => $page), null, $_GET)); ?>"><?php echo $page; ?></a></li>
    <?php else: ?>
    <li class="pagination_current"><a href="#" class="current"><?php echo $page; ?></a></li>
    <?php endif; ?>
    <?php endforeach; ?>
    
    <?php if (isset($this->next)): ?> 
    <!-- Next page link -->
    <li class="pagination_next">
    <a class="next" href="<?php echo html_escape($this->url(array('page' => $this->next), null, $_GET)); ?>"><?php echo __('Next'); ?></a>
    </li>
    <?php endif; ?>
</ul>
<?php endif; ?>
