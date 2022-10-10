<form id="contribution_edit-form" method="POST">
    <label for="contribution_id">
        Contributie ID
        <input type="number" name="contribution_id" id="contribution_id" value="<?php echo $contribution->ID; ?>" readonly required>
    </label>

    <label for="contribution_member">
        Lid <?php if (isset($error_member)) echo '<span class="error">' . $error_member . '</span>'; ?>
        <select name="contribution_member" id="contribution_member" required>
            <option value="1" <?php if ($contribution->member === '1') echo 'selected'; ?>>{Naam}</option>
            <option value="2">{Naam}</option>
            <option value="3">{Naam}</option>
            <option value="4">{Naam}</option>
        </select>
    </label>

    <label for="contribution_payed">
        Betaald <?php if (isset($error_payed)) echo '<span class="error">' . $error_payed . '</span>'; ?>
        <input type="number" name="contribution_payed" id="contribution_payed" value="<?php echo $contribution->payed; ?>" required step="0.01">
    </label>

    <label for="family_family">
        Soort lid:
        <select name="contribution_membertype" id="contribution_membertype" required>
            <option value="1" <?php if ($contribution->memberType === '1') echo 'selected'; ?>>{Naam}</option>
            <option value="2">{Naam}</option>
            <option value="3">{Naam}</option>
            <option value="4">{Naam}</option>
        </select>
    </label>

    <label for="contribution_bookyear">
        Boekjaar <?php if (isset($error_bookyear)) echo '<span class="error">' . $error_bookyear . '</span>'; ?>
        <select name="contribution_bookyear" id="contribution_bookyear" required>
            <option value="1" <?php if ($contribution->bookyear === '1') echo 'selected'; ?>>{Naam}</option>
            <option value="2">{Naam}</option>
            <option value="3">{Naam}</option>
            <option value="4">{Naam}</option>
        </select>
    </label>

    <input type="submit" id="contribution_edit" name="contribution_edit" value="Submit">
</form>
