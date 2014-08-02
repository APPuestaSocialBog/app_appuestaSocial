<div class="tipologies form">
<?php echo $this->Form->create('Tipology'); ?>
	<fieldset>
		<legend><?php echo __('Add Tipology'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('createdby');
		echo $this->Form->input('modifiedby');
		echo $this->Form->input('deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tipologies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Complaints'), array('controller' => 'complaints', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Complaint'), array('controller' => 'complaints', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subtipologies'), array('controller' => 'subtipologies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subtipology'), array('controller' => 'subtipologies', 'action' => 'add')); ?> </li>
	</ul>
</div>
