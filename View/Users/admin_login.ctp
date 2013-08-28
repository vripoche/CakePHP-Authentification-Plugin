<?php
$sessionFlash = $this->Session->flash();
?>
<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('username', array('label' => 'Log in', 'placeholder' => 'Login')); ?>
<?php echo $this->Form->input('password', array('placeholder' => 'Password')); ?>
<?php if ($sessionFlash != ''): ?>
<div class="alert alert-error"><?php echo $sessionFlash; ?></div>
<?php endif; ?>
<br>
<?php echo $this->Form->button('Log in', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>&nbsp;
<?php echo $this->Form->button('Reset', array('type' => 'reset', 'class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>