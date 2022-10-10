<form method="POST">
    <label for="family_id">
        Familie:
        <input type="number" name="family_id" id="family_id" value="<?php if (isset($_GET) && isset($_GET['id'])) echo $_GET['id']; ?>" <?php if (isset($_GET) && isset($_GET['id'])) echo 'readonly'; ?> required>
    </label>

    <input type="submit" id="family_delete" name="family_delete" value="Submit">
</form>
