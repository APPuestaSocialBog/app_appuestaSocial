<div class="regions form">
<?php echo $this->Form->create('Region'); ?>
	<fieldset>
		<legend><?php echo __('Edit Region'); ?></legend>
	<?php
		echo $this->Form->input('cod_departamento');
		echo $this->Form->input('cod_municipio');
		echo $this->Form->input('nombre_departamento');
		echo $this->Form->input('nombre_municipio');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Region.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Region.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Regions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Complaints'), array('controller' => 'complaints', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Complaint'), array('controller' => 'complaints', 'action' => 'add')); ?> </li>
	</ul>
</div>
