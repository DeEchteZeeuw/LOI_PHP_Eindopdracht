<form id="family_edit-form" method="POST">
    <label for="family_id">
        Familie ID
        <input type="number" name="family_id" id="family_id" value="<?php echo $family->ID; ?>" readonly required>
    </label>

    <label for="family_name">
        Naam:
        <input type="text" name="family_name" id="family_name" value="<?php echo $family->name; ?>" required>
    </label>

    <label for="family_address">
        Naam:
        <input type="text" name="family_address" id="family_address" value="<?php echo $family->address; ?>" required>
    </label>

    <input type="submit" id="family_edit" name="family_edit" value="Submit">
</form>
