<?php include './inc/templates/header.php'; ?>
        <section class="text-black">
            <p>Op deze pagina kunt u verschillende contributies toevoegen, aanpassen of verwijderen mocht dit nodig zijn. De meeste contributies worden aangemaakt door boekjaren toe te voegen, maar mocht u toch een aanpassing moeten doen dan kan dit zeker via deze pagina.</p>

            <?php if (isset($_GET['action']) && $_GET['action'] === 'add') { ?>
                <?php $controller->addContributionForm(); ?>
            <?php } elseif (isset($_GET['id']) && isset($_GET['action']) && ($_GET['action'] === 'update' || $_GET['action'] === 'delete')) { ?>
                <?php if ($_GET['action'] === 'update') { ?>
                    <?php $controller->editContributionForm(); ?>
                <?php } ?>
                <?php if ($_GET['action'] === 'delete') { ?>
                    <?php $controller->deleteContributionForm(); ?>
                <?php } ?>
            <?php } else { ?>
            <a href="./contributies.php?action=add">
                <button class="good">Contributie toevoegen</button>
            </a>
            <?php $controller->listContributies(); ?>
            <?php } ?>
        </section>
    </main>
    <footer class="text-center">
        <h5>&copy; 2022 - 2023 Leden Administratie Paneel</h5>
    </footer>
</body>
</html>
