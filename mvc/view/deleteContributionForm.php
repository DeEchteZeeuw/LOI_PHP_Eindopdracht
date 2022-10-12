<form method="POST">
    <label for="contribution_id">
        Contributie:
        <input type="number" name="contribution_id" id="contribution_id" value="<?php if (isset($_GET) && isset($_GET['id'])) echo $_GET['id']; ?>" <?php if (isset($_GET) && isset($_GET['id'])) echo 'readonly'; ?> required>
    </label>

    <input type="submit" id="contribution_delete" name="contribution_delete" value="Submit">
</form>
