<form id="AddFamilies" method="POST">
    <label for="family_name">
        Naam <?php if (isset($error_name)) echo '<span class="error">' . $error_name . '</span>'; ?>
        <input type="text" name="family_name" id="family_name" required>
    </label>
    <label for="family_address">
        Adres <?php if (isset($error_address)) echo '<span class="error">' . $error_address . '</span>'; ?>
        <input type="text" name="family_address" id="family_address" required>
    </label>
    <input type="submit" id="family_submit" name="family_submit" value="Toevoegen">
</form>
