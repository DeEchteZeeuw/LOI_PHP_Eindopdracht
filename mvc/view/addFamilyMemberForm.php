<form id="AddFamilyMember" method="POST">
    <label for="familymember_name">
        Naam <?php if (isset($error_name)) echo '<span class="error">' . $error_name . '</span>'; ?>
        <input type="text" name="familymember_name" id="familymember_name" required>
    </label>
    <label for="familymember_family">
        Familie <?php if (isset($error_family)) echo '<span class="error">' . $error_family . '</span>'; ?>
        <select name="familymember_family" id="familymember_family" required>
            <option value="1">{Naam}</option>
            <option value="2">{Naam}</option>
            <option value="3">{Naam}</option>
            <option value="4">{Naam}</option>
        </select>
    </label>
    <label for="familymember_birthdate">
        Geboortedatum <?php if (isset($error_birthdate)) echo '<span class="error">' . $error_birthdate . '</span>'; ?>
        <input type="date" name="familymember_birthdate" id="familymember_birthdate" required>
    </label>
    <label for="familymember_membertype">
        Familie <?php if (isset($error_membertype)) echo '<span class="error">' . $error_membertype . '</span>'; ?>
        <select name="familymember_membertype" id="familymember_membertype" required>
            <option value="1">{Naam}</option>
            <option value="2">{Naam}</option>
            <option value="3">{Naam}</option>
            <option value="4">{Naam}</option>
        </select>
    </label>
    <input type="submit" id="familymember_submit" name="familymember_submit" value="Toevoegen">
</form>
