<div class="subtipologies index">
	<h2><?php echo __('Subtipologies'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipology_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('createdby'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modifiedby'); ?></th>
			<th><?php echo $this->Paginator->sort('deleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($subtipologies as $subtipology): ?>
	<tr>
		<td><?php echo h($subtipology['Subtipology']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($subtipology['Tipology']['name'], array('controller' => 'tipologies', 'action' => 'view', $subtipology['Tipology']['id'])); ?>
		</td>
		<td><?php echo h($subtipology['Subtipology']['name']); ?>&nbsp;</td>
		<td><?php echo h($subtipology['Subtipology']['created']); ?>&nbsp;</td>
		<td><?php echo h($subtipology['Subtipology']['createdby']); ?>&nbsp;</td>
		<td><?php echo h($subtipology['Subtipology']['modified']); ?>&nbsp;</td>
		<td><?php echo h($subtipology['Subtipology']['modifiedby']); ?>&nbsp;</td>
		<td><?php echo h($subtipology['Subtipology']['deleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $subtipology['Subtipology']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $subtipology['Subtipology']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $subtipology['Subtipology']['id']), array(), __('Are you sure you want to delete # %s?', $subtipology['Subtipology']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Subtipology'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipologies'), array('controller' => 'tipologies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipology'), array('controller' => 'tipologies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Complaints'), array('controller' => 'complaints', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Complaint'), array('controller' => 'complaints', 'action' => 'add')); ?> </li>
	</ul>
</div>
