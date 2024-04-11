<?php
$display = 1;
$num_links = 1;

$total_rows = count($list);

$curr_page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;

$position = (($curr_page-1)*$display);
$total_pages = ceil($total_rows / $display);

$start = ($curr_page > $num_links) ? $curr_page - $num_links : 1;
$end = (($curr_page + $num_links) < $total_pages) ? $curr_page + $num_links : $total_pages;
