<?php
$class = '';
if (!old('email')) {
    $class = "empty";
}
?>
<div class="form-group form-material floating">
    <?php echo Form::text('name', null, ['class'=> "form-control $class", 'id' => 'inputName']); ?>

    <?php echo Form::label('inputName', 'Name:', ['class' => 'floating-label']); ?>

</div>

<?php
$class = '';
if (!old('email')) {
    $class = "empty";
}
?>
<div class="form-group form-material floating">
    <?php echo Form::text('email', null, ['class'=> "form-control $class", 'id' => 'inputEmail']); ?>

    <?php echo Form::label('inputEmail', 'Email:', ['class' => 'floating-label']); ?>

</div>

<div class="form-group form-material floating">
    <?php echo Form::password('password', ['class'=>'form-control empty', 'id' => 'password']); ?>

    <?php echo Form::label('password', 'Password:', ['class' => 'floating-label']); ?>

</div>

<div class="form-group form-material floating">
    <?php echo Form::password('password_confirmation', ['class'=>'form-control ', 'id' => 'password_confirmation']); ?>

    <?php echo Form::label('password_confirmation', 'Retype Password:', ['class' => 'floating-label']); ?>

</div>