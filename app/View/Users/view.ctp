<?php

echo '<h2>'.$user.'</h2>';
//echo '<pre>';
//print_r($links);
//echo '</pre>';
echo '<p> <a href="./logout">logout</a></p>';
$first = true;
foreach ($links as $link) {
    if (!$first) {
        echo '&nbsp;&nbsp;&ndash;&nbsp;&nbsp;';
    }
    $first = false;
    echo $this->Html->link($link['Link']['title'], $link['Link']['url']);
}