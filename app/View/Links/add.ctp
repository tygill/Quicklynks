<?php
    //echo $this->Form->create('Link',array('action'=>'add'));
    //echo $this->Form->input('url');
    //echo $this->Form->input('title');
    //echo $this->Form->end('Add');
?>
<div class="links form">
<?php echo $this->Form->create('Link');?>
    <fieldset>
        <legend><?php echo __('Please enter a url and title'); ?></legend>
    <?php
        echo $this->Form->input('url');
        echo $this->Form->input('title');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Add'));?>
</div>