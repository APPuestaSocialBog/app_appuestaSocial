<div class="complaints view">
<h2><?php echo __('Complaint'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($complaint['Complaint']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($complaint['User']['id'], array('controller' => 'users', 'action' => 'view', $complaint['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipology'); ?></dt>
		<dd>
			<?php echo $this->Html->link($complaint['Tipology']['name'], array('controller' => 'tipologies', 'action' => 'view', $complaint['Tipology']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subtipology'); ?></dt>
		<dd>
			<?php echo $this->Html->link($complaint['Subtipology']['name'], array('controller' => 'subtipologies', 'action' => 'view', $complaint['Subtipology']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo $this->Html->link($complaint['Region'][''], array('controller' => 'regions', 'action' => 'view', $complaint['Region']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($complaint['State']['name'], array('controller' => 'states', 'action' => 'view', $complaint['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($complaint['Complaint']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($complaint['Complaint']['longitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Donde'); ?></dt>
		<dd>
			<?php echo h($complaint['Complaint']['donde']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Que Paso'); ?></dt>
		<dd>
			<?php echo h($complaint['Complaint']['que_paso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Response'); ?></dt>
		<dd>
			<?php echo h($complaint['Complaint']['response']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($complaint['Complaint']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createdby'); ?></dt>
		<dd>
			<?php echo h($complaint['Complaint']['createdby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($complaint['Complaint']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifiedby'); ?></dt>
		<dd>
			<?php echo h($complaint['Complaint']['modifiedby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($complaint['Complaint']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Complaint'), array('action' => 'edit', $complaint['Complaint']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Complaint'), array('action' => 'delete', $complaint['Complaint']['id']), array(), __('Are you sure you want to delete # %s?', $complaint['Complaint']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Complaints'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Complaint'), array('action' => 'add')); ?> </li>
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
