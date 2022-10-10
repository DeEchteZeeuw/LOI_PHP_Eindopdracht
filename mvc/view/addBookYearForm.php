<form id="AddBookYear" method="POST">
    <label for="bookyear_year">
        Boekjaar <?php if (isset($error_year)) echo '<span class="error">' . $error_year . '</span>'; ?>
        <input type="number" min="1900" max="<?php echo date("Y"); ?>" step="1" value="<?php echo date("Y"); ?>" name="bookyear_year" id="bookyear_year" required>
    </label>
    <label for="bookyear_price">
        Bedrag <?php if (isset($error_price)) echo '<span class="error">' . $error_price . '</span>'; ?>
        <input type="number" name="bookyear_price" id="bookyear_price" required step="0.01">
    </label>
    <input type="submit" id="bookyear_submit" name="bookyear_submit" value="Toevoegen">
</form>
