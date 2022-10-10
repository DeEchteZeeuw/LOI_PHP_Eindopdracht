<form id="familymember_edit-form" method="POST">
    <label for="familymember_id">
        Familie Lid ID
        <input type="number" name="familymember_id" id="familymember_id" value="<?php echo $familyMember->ID; ?>" readonly required>
    </label>

    <label for="familymember_name">
        Naam:
        <input type="text" name="familymember_name" id="familymember_name" value="<?php echo $familyMember->name; ?>" required>
    </label>

    <label for="family_family">
        Familie:
        <select name="familymember_family" id="familymember_family" required>
            <option value="1" <?php if ($familyMember->family === '1') echo 'selected'; ?>>{Naam}</option>
            <option value="2">{Naam}</option>
            <option value="3">{Naam}</option>
            <option value="4">{Naam}</option>
        </select>
    </label>

    <label for="familymember_birthdate">
        Geboortedatum:
        <input type="date" name="familymember_birthdate" id="familymember_birthdate" value="<?php echo $familyMember->birthdate; ?>" required>
    </label>

    <label for="family_family">
        Soort lid:
        <select name="familymember_membertype" id="familymember_membertype" required>
            <option value="1" <?php if ($familyMember->memberType === '1') echo 'selected'; ?>>{Naam}</option>
            <option value="2">{Naam}</option>
            <option value="3">{Naam}</option>
            <option value="4">{Naam}</option>
        </select>
    </label>

    <input type="submit" id="familymember_edit" name="familymember_edit" value="Submit">
</form>
