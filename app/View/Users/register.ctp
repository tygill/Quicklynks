<?php
    //echo $this->Form->create('User',array('action'=>'register'));
    //echo $this->Form->input('username');
    //echo $this->Form->input('password');
    //echo $this->Form->end('Register');
?>
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Please enter a username and password'); ?></legend>
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Register'));?>
</div>