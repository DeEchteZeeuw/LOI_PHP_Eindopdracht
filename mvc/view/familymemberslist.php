<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Familie</th>
            <th>Geboortedatum</th>
            <th>Soort lid</th>
            <th colspan="2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($FamilyMembers as $familyMember) { ?>
            <tr>
                <td><?php echo $familyMember->ID; ?></td>
                <td><?php echo $familyMember->name; ?></td>
                <td><?php echo $familyMember->family; ?></td>
                <td><?php echo $familyMember->birthdate; ?></td>
                <td><?php echo $familyMember->memberType; ?></td>
                <td>
                    <a href="./leden.php?action=update&id=<?php echo $familyMember->ID; ?>">    
                        <button class="watchout">Bijwerken</button>
                    </a>
                </td>
                <td>
                    <a href="./leden.php?action=delete&id=<?php echo $familyMember->ID; ?>">    
                        <button class="failure">Verwijderen</button>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>