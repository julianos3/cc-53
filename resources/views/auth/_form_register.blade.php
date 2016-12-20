<?php
$class = '';
if (!old('email')) {
    $class = "empty";
}
?>
<div class="form-group form-material floating">
    {!! Form::text('name', null, ['class'=> "form-control $class", 'id' => 'inputName']) !!}
    {!! Form::label('inputName', 'Name:', ['class' => 'floating-label']) !!}
</div>

<?php
$class = '';
if (!old('email')) {
    $class = "empty";
}
?>
<div class="form-group form-material floating">
    {!! Form::text('email', null, ['class'=> "form-control $class", 'id' => 'inputEmail']) !!}
    {!! Form::label('inputEmail', 'Email:', ['class' => 'floating-label']) !!}
</div>

<div class="form-group form-material floating">
    {!! Form::password('password', ['class'=>'form-control empty', 'id' => 'password']) !!}
    {!! Form::label('password', 'Password:', ['class' => 'floating-label']) !!}
</div>

<div class="form-group form-material floating">
    {!! Form::password('password_confirmation', ['class'=>'form-control ', 'id' => 'password_confirmation']) !!}
    {!! Form::label('password_confirmation', 'Retype Password:', ['class' => 'floating-label']) !!}
</div>