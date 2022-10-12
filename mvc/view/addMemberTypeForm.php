<form id="AddMemberType" method="POST">
    <label for="membertype_name">
        Naam <?php if (isset($error_name)) echo '<span class="error">' . $error_name . '</span>'; ?>
        <input type="text" name="membertype_name" id="membertype_name" required>
    </label>
    <label for="membertype_procentage">
        Contributie Percentage <?php if (isset($error_procentage)) echo '<span class="error">' . $error_procentage . '</span>'; ?>
        <input type="number" min="0" name="membertype_procentage" id="membertype_procentage" required step="0.01">
    </label>
    <label for="membertype_description">
        Omschrijving <?php if (isset($error_description)) echo '<span class="error">' . $error_description . '</span>'; ?>
        <textarea id="membertype_description" required name="membertype_description" rows="4" cols="50"></textarea>
    </label>
    <input type="submit" id="membertype_submit" name="membertype_submit" value="Toevoegen">
</form>
