<div class="subtipologies view">
<h2><?php echo __('Subtipology'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($subtipology['Subtipology']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipology'); ?></dt>
		<dd>
			<?php echo $this->Html->link($subtipology['Tipology']['name'], array('controller' => 'tipologies', 'action' => 'view', $subtipology['Tipology']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($subtipology['Subtipology']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($subtipology['Subtipology']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createdby'); ?></dt>
		<dd>
			<?php echo h($subtipology['Subtipology']['createdby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($subtipology['Subtipology']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifiedby'); ?></dt>
		<dd>
			<?php echo h($subtipology['Subtipology']['modifiedby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($subtipology['Subtipology']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Subtipology'), array('action' => 'edit', $subtipology['Subtipology']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Subtipology'), array('action' => 'delete', $subtipology['Subtipology']['id']), array(), __('Are you sure you want to delete # %s?', $subtipology['Subtipology']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Subtipologies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subtipology'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipologies'), array('controller' => 'tipologies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipology'), array('controller' => 'tipologies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Complaints'), array('controller' => 'complaints', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Complaint'), array('controller' => 'complaints', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Complaints'); ?></h3>
	<?php if (!empty($subtipology['Complaint'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Tipology Id'); ?></th>
		<th><?php echo __('Subtipology Id'); ?></th>
		<th><?php echo __('Region Id'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('Latitude'); ?></th>
		<th><?php echo __('Longitude'); ?></th>
		<th><?php echo __('Donde'); ?></th>
		<th><?php echo __('Que Paso'); ?></th>
		<th><?php echo __('Response'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Createdby'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modifiedby'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($subtipology['Complaint'] as $complaint): ?>
		<tr>
			<td><?php echo $complaint['id']; ?></td>
			<td><?php echo $complaint['user_id']; ?></td>
			<td><?php echo $complaint['tipology_id']; ?></td>
			<td><?php echo $complaint['subtipology_id']; ?></td>
			<td><?php echo $complaint['region_id']; ?></td>
			<td><?php echo $complaint['state_id']; ?></td>
			<td><?php echo $complaint['latitude']; ?></td>
			<td><?php echo $complaint['longitude']; ?></td>
			<td><?php echo $complaint['donde']; ?></td>
			<td><?php echo $complaint['que_paso']; ?></td>
			<td><?php echo $complaint['response']; ?></td>
			<td><?php echo $complaint['created']; ?></td>
			<td><?php echo $complaint['createdby']; ?></td>
			<td><?php echo $complaint['modified']; ?></td>
			<td><?php echo $complaint['modifiedby']; ?></td>
			<td><?php echo $complaint['deleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'complaints', 'action' => 'view', $complaint['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'complaints', 'action' => 'edit', $complaint['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'complaints', 'action' => 'delete', $complaint['id']), array(), __('Are you sure you want to delete # %s?', $complaint['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Complaint'), array('controller' => 'complaints', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
