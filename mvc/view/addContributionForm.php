<form id="AddContribution" method="POST">
    <label for="contribution_member">
        Familie <?php if (isset($error_member)) echo '<span class="error">' . $error_member . '</span>'; ?>
        <select name="contribution_member" id="contribution_member" required>
            <option value="1">{Naam}</option>
            <option value="2">{Naam}</option>
            <option value="3">{Naam}</option>
            <option value="4">{Naam}</option>
        </select>
    </label>
    <label for="contribution_payed">
        Betaald <?php if (isset($error_payed)) echo '<span class="error">' . $error_payed . '</span>'; ?>
        <input type="number" name="contribution_payed" id="contribution_payed" required step="0.01">
    </label>
    <label for="contribution_bookyear">
        Familie <?php if (isset($error_bookyear)) echo '<span class="error">' . $error_bookyear . '</span>'; ?>
        <select name="contribution_bookyear" id="contribution_bookyear" required>
            <option value="1">{Naam}</option>
            <option value="2">{Naam}</option>
            <option value="3">{Naam}</option>
            <option value="4">{Naam}</option>
        </select>
    </label>
    <input type="submit" id="contribution_submit" name="contribution_submit" value="Toevoegen">
</form>
