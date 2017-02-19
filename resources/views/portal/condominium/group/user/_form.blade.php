<div class="form-group">
    <label for="Block">Selecione os integrantes:</label>
    <select data-plugin="selectpicker" class="form-control selectGroup" name="users[]" multiple data-selected-text-format="count > 3">
        @foreach($usersCondominium as $row)
            <option value="{{ $row->id }}">{{ $row->user->name }}</option>
        @endforeach
    </select>
</div>

<input type="hidden" name="group_id" value="<?php echo $groupId; ?>" />