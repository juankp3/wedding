<?php
// echo "<pre>";
// var_dump($form);
// echo "</pre>";
?>

<?php foreach ($form as $key => $input) : ?>

	<?php if ($input['type'] == 'text') :
		$placeholder =  isset($input['placeholder']) ? $input['placeholder'] : '';
		$required = isset($input['required']) && $input['required'] ? true : false;
		$description = isset($input['description']) ? true : '';
	?>
		<div class="form-group">
			<label class="form-label">
				<?php if ($required) : ?><span style="color: red;padding: 0px 4px;">*</span><?php endif ?><?php echo $input['label'] ?>
			</label>
			<?php if ($description) : ?>
				<small class="form-text text-body-secondary">
					<?php echo $input['description'] ?>
				</small>
			<?php endif ?>
			<input type="text" name="<?php echo $input['name'] ?>" class="form-control <?php echo !empty($error['fields'][$input['name']]) ? 'is-invalid' : '' ?>" placeholder="<?php echo $placeholder ?>" value="<?php echo !empty($data[$input['name']]) ? $data[$input['name']] : '' ?>" />
			<?php if (!empty($error['fields'][$input['name']])) : ?>
				<div class="invalid-feedback"><?php echo $error['fields'][$input['name']] ?></div>
			<?php endif ?>
		</div>
	<?php endif ?>

	<?php if ($input['type'] == 'email') : ?>
		<div class="form-group">
			<label class="form-label"><?php echo $input['label'] ?></label>
			<input type="email" name="<?php echo $input['name'] ?>" class="form-control <?php echo !empty($error['fields'][$input['name']]) ? 'is-invalid' : '' ?>" value="<?php echo !empty($data[$input['name']]) ? $data[$input['name']] : '' ?>" />
			<?php if (!empty($error['fields'][$input['name']])) : ?>
				<div class="invalid-feedback"><?php echo $error['fields'][$input['name']] ?></div>
			<?php endif ?>
		</div>
	<?php endif ?>

	<?php if ($input['type'] == 'password') : ?>
		<div class="form-group">
			<label class="form-label"><?php echo $input['label'] ?></label>
			<input type="password" name="<?php echo $input['name'] ?>" class="form-control <?php echo !empty($error['fields'][$input['name']]) ? 'is-invalid' : '' ?>" value="<?php echo !empty($data[$input['name']]) ? $data[$input['name']] : '' ?>" />
			<?php if (!empty($error['fields'][$input['name']])) : ?>
				<div class="invalid-feedback"><?php echo $error['fields'][$input['name']] ?></div>
			<?php endif ?>
		</div>
	<?php endif ?>

	<?php if ($input['type'] == 'select') : 
				$defaultValue = isset($input['defaultValue']) && $input['defaultValue'] ? true : false;
				$required = isset($input['required']) && $input['required'] ? true : false;
		
		?>
		<div class="form-group">
			<label class="form-label">
				<?php if ($required) : ?><span style="color: red;padding: 0px 4px;">*</span><?php endif ?><?php echo $input['label'] ?>
			</label>
			<select id="<?php echo $input['name'] ?>" name="<?php echo $input['name'] ?>" class="form-select <?php echo !empty($error['fields'][$input['name']]) ? 'is-invalid' : '' ?>" data-choices>
				<?php if (!$defaultValue): ?><option value="">Seleccionar</option> <?php endif ?>
				<?php foreach ($input['options'] as $key => $value) :
					$selected = isset($data[$input['name']]) && $data[$input['name']] == $key  ? 'selected' : '';
				?>
					<option value="<?php echo $key ?>" <?php echo $selected ?>>
						<?php echo $value ?>
					</option>
				<?php endforeach ?>
			</select>
		</div>
	<?php endif ?>

	<?php if ($input['type'] == 'checkbox') :
		$isActive =  isset($data[$input['name']]) && $data[$input['name']]  ? 'checked' : '';
	?>
		<div class="form-group">
			<label class="form-label mb-1">
				<?php echo $input['label'] ?>
			</label>
			<small class="form-text text-body-secondary">
				<?php echo $input['summary'] ?>
			</small>
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" name="<?php echo $input['name'] ?>" id="<?php echo $input['name'] ?>" <?php echo $isActive ?>>
				<label class="form-check-label" for="switchOne"></label>
			</div>
		</div>
	<?php endif ?>

<?php endforeach ?>
