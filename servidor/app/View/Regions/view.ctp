<div class="regions view">
<h2><?php echo __('Region'); ?></h2>
	<dl>
		<dt><?php echo __('Cod Departamento'); ?></dt>
		<dd>
			<?php echo h($region['Region']['cod_departamento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cod Municipio'); ?></dt>
		<dd>
			<?php echo h($region['Region']['cod_municipio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Departamento'); ?></dt>
		<dd>
			<?php echo h($region['Region']['nombre_departamento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Municipio'); ?></dt>
		<dd>
			<?php echo h($region['Region']['nombre_municipio']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Region'), array('action' => 'edit', $region['Region']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Region'), array('action' => 'delete', $region['Region']['id']), array(), __('Are you sure you want to delete # %s?', $region['Region']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Complaints'), array('controller' => 'complaints', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Complaint'), array('controller' => 'complaints', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Complaints'); ?></h3>
	<?php if (!empty($region['Complaint'])): ?>
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
	<?php foreach ($region['Complaint'] as $complaint): ?>
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
