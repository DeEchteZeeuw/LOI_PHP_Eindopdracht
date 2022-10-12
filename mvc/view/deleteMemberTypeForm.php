<form method="POST">
    <label for="membertype_id">
        Abonnement:
        <input type="number" name="membertype_id" id="membertype_id" value="<?php if (isset($_GET) && isset($_GET['id'])) echo $_GET['id']; ?>" <?php if (isset($_GET) && isset($_GET['id'])) echo 'readonly'; ?> required>
    </label>

    <input type="submit" id="membertype_delete" name="membertype_delete" value="Submit">
</form>
