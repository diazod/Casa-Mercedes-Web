<div class="estadosSaluds form">
<?php echo $this->Form->create('EstadosSalud');?>
	<fieldset>
		<legend><?php __('Add Estados Salud'); ?></legend>
	<?php
		if(isset($this->params["named"]["personaId"])){
			echo $this->Form->input('persona_id', array('value'=> $this->params["named"]["personaId"], 'type' => 'hidden'));
		}else{
			echo $this->Form->input('persona_id');
		}
		echo $this->Form->input('tipo_sangre');
		echo $this->Form->input('peso');
		echo $this->Form->input('altura');
		echo $this->Form->input('alergias');
		echo $this->Form->input('lesiones_fisicas');
		echo $this->Form->input('discapacidad');
		echo $this->Form->input('enfermedades_cronicas');
		echo $this->Form->input('otra_enfermedad');
		echo $this->Form->input('modified_user_id', array('value'=>Configure::read('id.usuario.prueba'), 'type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Estados Saluds', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Personas', true), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona', true), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>