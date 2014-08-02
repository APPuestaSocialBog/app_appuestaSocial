<div class="complaints index">
	<h2><?php echo __('Complaints'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipology_id'); ?></th>
			<th><?php echo $this->Paginator->sort('subtipology_id'); ?></th>
			<th><?php echo $this->Paginator->sort('region_id'); ?></th>
			<th><?php echo $this->Paginator->sort('state_id'); ?></th>
			<th><?php echo $this->Paginator->sort('latitude'); ?></th>
			<th><?php echo $this->Paginator->sort('longitude'); ?></th>
			<th><?php echo $this->Paginator->sort('donde'); ?></th>
			<th><?php echo $this->Paginator->sort('que_paso'); ?></th>
			<th><?php echo $this->Paginator->sort('response'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('createdby'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modifiedby'); ?></th>
			<th><?php echo $this->Paginator->sort('deleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($complaints as $complaint): ?>
	<tr>
		<td><?php echo h($complaint['Complaint']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($complaint['User']['id'], array('controller' => 'users', 'action' => 'view', $complaint['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($complaint['Tipology']['name'], array('controller' => 'tipologies', 'action' => 'view', $complaint['Tipology']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($complaint['Subtipology']['name'], array('controller' => 'subtipologies', 'action' => 'view', $complaint['Subtipology']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($complaint['Region'][''], array('controller' => 'regions', 'action' => 'view', $complaint['Region']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($complaint['State']['name'], array('controller' => 'states', 'action' => 'view', $complaint['State']['id'])); ?>
		</td>
		<td><?php echo h($complaint['Complaint']['latitude']); ?>&nbsp;</td>
		<td><?php echo h($complaint['Complaint']['longitude']); ?>&nbsp;</td>
		<td><?php echo h($complaint['Complaint']['donde']); ?>&nbsp;</td>
		<td><?php echo h($complaint['Complaint']['que_paso']); ?>&nbsp;</td>
		<td><?php echo h($complaint['Complaint']['response']); ?>&nbsp;</td>
		<td><?php echo h($complaint['Complaint']['created']); ?>&nbsp;</td>
		<td><?php echo h($complaint['Complaint']['createdby']); ?>&nbsp;</td>
		<td><?php echo h($complaint['Complaint']['modified']); ?>&nbsp;</td>
		<td><?php echo h($complaint['Complaint']['modifiedby']); ?>&nbsp;</td>
		<td><?php echo h($complaint['Complaint']['deleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $complaint['Complaint']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $complaint['Complaint']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $complaint['Complaint']['id']), array(), __('Are you sure you want to delete # %s?', $complaint['Complaint']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Complaint'), array('action' => 'add')); ?></li>
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
