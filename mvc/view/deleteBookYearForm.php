<form method="POST">
    <label for="bookyear_id">
        Boekjaar:
        <input type="number" name="bookyear_id" id="bookyear_id" value="<?php if (isset($_GET) && isset($_GET['id'])) echo $_GET['id']; ?>" <?php if (isset($_GET) && isset($_GET['id'])) echo 'readonly'; ?> required>
    </label>

    <input type="submit" id="bookyear_delete" name="bookyear_delete" value="Submit">
</form>
