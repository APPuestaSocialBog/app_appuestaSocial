<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Document'); ?></dt>
		<dd>
			<?php echo h($user['User']['document']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($user['User']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createdby'); ?></dt>
		<dd>
			<?php echo h($user['User']['createdby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifiedby'); ?></dt>
		<dd>
			<?php echo h($user['User']['modifiedby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($user['User']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Complaints'), array('controller' => 'complaints', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Complaint'), array('controller' => 'complaints', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Complaints'); ?></h3>
	<?php if (!empty($user['Complaint'])): ?>
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
	<?php foreach ($user['Complaint'] as $complaint): ?>
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
