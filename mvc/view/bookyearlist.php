<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Boekjaar</th>
            <th>Bedrag</th>
            <th colspan="2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($BookYears as $bookYear) { ?>
            <tr>
                <td><?php echo $bookYear->ID; ?></td>
                <td><?php echo $bookYear->year; ?></td>
                <td><?php echo $bookYear->price; ?></td>
                <td>
                    <a href="./boekjaar.php?action=update&id=<?php echo $bookYear->ID; ?>">    
                        <button class="watchout">Bijwerken</button>
                    </a>
                </td>
                <td>
                    <a href="./boekjaar.php?action=delete&id=<?php echo $bookYear->ID; ?>">    
                        <button class="failure">Verwijderen</button>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>