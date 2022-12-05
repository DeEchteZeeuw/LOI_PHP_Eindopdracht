<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Familie</th>
            <?php if (!isset($_GET['action'])) { ?>
            <th colspan="3">&nbsp;</th>
            <?php } else { ?>
            <th>Geboortedatum</th>
            <th>Abonnement</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($FamilyMembers as $familyMember) { ?>
            <tr>
                <td><?php echo $familyMember->ID; ?></td>
                <td><?php echo $familyMember->name; ?></td>
                <td><?php echo $this->model->getFamily($familyMember->family)->name; ?></td>
                <?php if (!isset($_GET['action'])) { ?>
                <td>
                    <a href="./leden.php?action=view&id=<?php echo $familyMember->ID; ?>">    
                        <button class="primary">Bekijken</button>
                    </a>
                </td>
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
                <?php } else { ?>
                <td><?php echo $familyMember->birthdate; ?></td>
                <td><?php echo $this->model->getMemberType($familyMember->memberType)->name; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>