<?php
    // echo "<pre>";
    // var_dump($form);
    // echo "</pre>";
?>

<?php foreach($form as $key => $input): ?>

    <?php if ($input['type'] == 'text'): ?>
        <div class="form-group">
            <label class="form-label"><?php echo $input['label']?></label>
            <input type="text" name="<?php echo $input['name']?>" class="form-control <?php echo !empty($error['fields'][$input['name']])?'is-invalid':'' ?>" value="<?php echo !empty($data[$input['name']])?$data[$input['name']]:'' ?>"  />
            <?php if (!empty($error['fields'][$input['name']])): ?>
                <div class="invalid-feedback"><?php echo $error['fields'][$input['name']]?></div>
            <?php endif?>
        </div>
    <?php endif ?>

    <?php if ($input['type'] == 'email'): ?>
        <div class="form-group">
            <label class="form-label"><?php echo $input['label']?></label>
            <input type="email" name="<?php echo $input['name']?>" class="form-control <?php echo !empty($error['fields'][$input['name']])?'is-invalid':'' ?>" value="<?php echo !empty($data[$input['name']])?$data[$input['name']]:'' ?>"  />
            <?php if (!empty($error['fields'][$input['name']])): ?>
                <div class="invalid-feedback"><?php echo $error['fields'][$input['name']]?></div>
            <?php endif?>
        </div>
    <?php endif ?>

    <?php if ($input['type'] == 'password'): ?>
        <div class="form-group">
            <label class="form-label"><?php echo $input['label']?></label>
            <input type="password" name="<?php echo $input['name']?>" class="form-control <?php echo !empty($error['fields'][$input['name']])?'is-invalid':'' ?>" value="<?php echo !empty($data[$input['name']])?$data[$input['name']]:'' ?>"  />
            <?php if (!empty($error['fields'][$input['name']])): ?>
                <div class="invalid-feedback"><?php echo $error['fields'][$input['name']]?></div>
            <?php endif?>
        </div>
    <?php endif ?>

    <?php if ($input['type'] == 'select'): ?>
        <div class="form-group">
			<label class="form-label"><?php echo $input['label']?></label>
			<select name="<?php echo $input['name']?>"  class="form-select <?php echo !empty($error['fields'][$input['name']])?'is-invalid':'' ?>" data-choices>
				<option value="" >Seleccionar</option>
				<?php foreach($input['options'] as $key => $value): ?>
					<option value="<?php echo $key?>" <?php echo (!empty($data[$input['name']]) == $key ? 'selected' : '') ?>  ><?php echo $value ?></option>
				<?php endforeach ?>
			</select>
		</div>
    <?php endif ?>

	<?php if ($input['type'] == 'checkbox'): ?>
        <div class="form-group">
			<label class="form-label mb-1">
				<?php echo $input['label']?>
			</label>
			<small class="form-text text-body-secondary">
				<?php echo $input['summary']?>
			</small>
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" name="<?php echo $input['name']?>" id="<?php echo $input['name']?>" <?php echo $data[$input['name']]?'checked':'' ?> >
				<label class="form-check-label" for="switchOne"></label>
			</div>
		</div>
    <?php endif ?>

<?php endforeach ?>



