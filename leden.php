<?php include './inc/templates/header.php'; ?>
        <section class="text-black">
            <p>Op deze pagina kunt u verschillende familie leden aanmaken, aanpassen en of verwijderen. Kijk wel goed uit als u iemand verwijderd of aanpast is dit niet omkeerbaar. Daarom vragen wij u ook zeer goed na te denken en na te kijken welke gebruiker u update.</p>

            <?php if (isset($_GET['action']) && $_GET['action'] === 'add') { ?>
                <?php $controller->addFamilyMemberForm(); ?>
            <?php } elseif (isset($_GET['id']) && isset($_GET['action']) && ($_GET['action'] === 'update' || $_GET['action'] === 'delete')) { ?>
                <?php if ($_GET['action'] === 'update') { ?>
                    <?php $controller->editFamilyMemberForm(); ?>
                <?php } ?>
                <?php if ($_GET['action'] === 'delete') { ?>
                    <?php $controller->deleteFamilyMemberForm(); ?>
                <?php } ?>
            <?php } else { ?>
            <a href="./leden.php?action=add">
                <button class="good">Familie lid toevoegen</button>
            </a>
            <?php $controller->listFamilyMembers(); ?>
            <?php } ?>
        </section>
    </main>
    <footer class="text-center">
        <h5>&copy; 2022 - 2023 Leden Administratie Paneel</h5>
    </footer>
</body>
</html>
