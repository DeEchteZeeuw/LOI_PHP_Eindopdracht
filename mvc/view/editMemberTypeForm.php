<form id="membertype_edit-form" method="POST">
    <label for="membertype_id">
        Abonnement ID
        <input type="number" name="membertype_id" id="membertype_id" value="<?php echo $memberType->ID; ?>" readonly required>
    </label>

    <label for="membertype_name">
        Naam:
        <input type="text" name="membertype_name" id="membertype_name" value="<?php echo $memberType->name; ?>" required>
    </label>

    <label for="membertype_procentage">
        Contributie Percentage:
        <input type="number" name="membertype_procentage" id="membertype_procentage" value="<?php echo $memberType->procentage; ?>" min="0" required step="0.01">
    </label>

    <label for="membertype_description">
        Omschrijving
        <textarea id="membertype_description" name="membertype_description" required rows="4" cols="50"><?php echo $memberType->description; ?></textarea>
    </label>

    <input type="submit" id="membertype_edit" name="membertype_edit" value="Submit">
</form>
