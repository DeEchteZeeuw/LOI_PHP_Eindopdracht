<form id="bookyear_edit-form" method="POST">
    <label for="bookyear_id">
        Boekjaar ID
        <input type="number" name="bookyear_id" id="bookyear_id" value="<?php echo $bookyear->ID; ?>" readonly required>
    </label>

    <label for="bookyear_year">
        Prijs:
        <input type="number" name="bookyear_year" id="bookyear_year" value="<?php echo $bookyear->year; ?>" required readonly>
    </label>

    <label for="bookyear_price">
        Prijs:
        <input type="number" name="bookyear_price" id="bookyear_price" value="<?php echo $bookyear->price; ?>" required step="0.01">
    </label>

    <input type="submit" id="bookyear_edit" name="bookyear_edit" value="Submit">
</form>
