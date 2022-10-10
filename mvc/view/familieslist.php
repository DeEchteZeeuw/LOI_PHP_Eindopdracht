<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Adres</th>
            <th colspan="2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Families as $family) { ?>
            <tr>
                <td><?php echo $family->ID; ?></td>
                <td><?php echo $family->name; ?></td>
                <td><?php echo $family->address; ?></td>
                <td>
                    <a href="./families.php?action=update&id=<?php echo $family->ID; ?>">    
                        <button class="watchout">Bijwerken</button>
                    </a>
                </td>
                <td>
                    <a href="./families.php?action=delete&id=<?php echo $family->ID; ?>">    
                        <button class="failure">Verwijderen</button>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>