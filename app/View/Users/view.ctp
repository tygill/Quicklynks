<?php

echo '<h2>'.$user.'</h2>';
//echo '<pre>';
//print_r($links);
//echo '</pre>';
echo $this->Html->para(null, $this->Html->link("logout", array('controller' => 'Users', 'action' => 'logout')));
$first = true;
echo '<p>';
foreach ($links as $link) {
    if (!$first) {
        echo '&nbsp;&ndash;&nbsp;'.PHP_EOL;
    }
    $first = false;
    echo $this->Html->link($link['Link']['title'], $link['Link']['url']);
    echo '&nbsp;['.$this->Html->link('X', array('controller' => 'links', 'action' => 'delete')).']'.PHP_EOL;
}
echo '</p>';
echo $this->Html->para(null, $this->Html->link('add link', array('controller' => 'links', 'action' => 'add'))).PHP_EOL;