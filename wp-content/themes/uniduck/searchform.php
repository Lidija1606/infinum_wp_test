<form role="search" method="get" action="<?php echo home_url('/'); ?>">
    <input type="search" class="form-control" placeholder="Search blog" value="<?php echo get_search_query() ?>" name="s" title="Search" />
</form>