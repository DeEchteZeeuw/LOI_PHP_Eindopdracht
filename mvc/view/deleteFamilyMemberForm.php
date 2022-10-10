<form method="POST">
    <label for="familymember_id">
        Familie lid:
        <input type="number" name="familymember_id" id="familymember_id" value="<?php if (isset($_GET) && isset($_GET['id'])) echo $_GET['id']; ?>" <?php if (isset($_GET) && isset($_GET['id'])) echo 'readonly'; ?> required>
    </label>

    <input type="submit" id="familymember_delete" name="familymember_delete" value="Submit">
</form>
