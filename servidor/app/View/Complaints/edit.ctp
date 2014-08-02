<div class="complaints form">
<?php echo $this->Form->create('Complaint'); ?>
	<fieldset>
		<legend><?php echo __('Edit Complaint'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('tipology_id');
		echo $this->Form->input('subtipology_id');
		echo $this->Form->input('region_id');
		echo $this->Form->input('state_id');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
		echo $this->Form->input('donde');
		echo $this->Form->input('que_paso');
		echo $this->Form->input('response');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Complaint.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Complaint.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Complaints'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipologies'), array('controller' => 'tipologies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipology'), array('controller' => 'tipologies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subtipologies'), array('controller' => 'subtipologies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subtipology'), array('controller' => 'subtipologies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
	</ul>
</div>
