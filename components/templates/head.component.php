<?php
// Shared head section used in multiple pages.
// Loads meta, title, fonts, icons, styles, and navbar.
// Expects $pageTitle to be defined before inclusion.

require_once UTILS_PATH . "/htmlEscape.util.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlEscape($pageTitle ?? 'Baxcalibur') ?></title>

    <!-- Favicon -->
    <link rel="icon" href="/assets/img/baxcalibur-logo.png" type="image/png" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Funnel+Sans:ital,wght@0,300..800;1,300..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <!-- Global CSS -->
    <link rel="stylesheet" href="/assets/css/style.css" />
    <?php if (!empty($cssFile))
        echo "<link rel=\"stylesheet\" href=\"{$cssFile}\">\n"; ?>
</head>

<body>
    <?php if ($pageTitle == "Home | Baxcalibur" || $pageTitle == "About | Baxcalibur")
        require_once COMPONENTS_PATH . "/templates/headerNav.component.php";

        elseif ($pageTitle == "Login | Baxcalibur" || $pageTitle == "Signup | Baxcalibur")
            require_once COMPONENTS_PATH . "/templates/loginSignupHeaderNav.component.php";
        elseif ($pageTitle == "Dashboard | Baxcalibur")
            require_once COMPONENTS_PATH . "/templates/userHeaderNav.component.php";
        elseif ($pageTitle == "Admin Dashboard | Baxcalibur")
            require_once COMPONENTS_PATH . "/templates/adminHeaderNav.component.php";
        elseif ($pageTitle == "Trips | Baxcalibur")
            require_once COMPONENTS_PATH . "/templates/userHeaderNav.component.php";
        elseif ($pageTitle == "Vantac-X Trip | Baxcalibur")
            require_once COMPONENTS_PATH . "/templates/userHeaderNav.component.php";
        elseif ($pageTitle == "Lumina Edge Trip | Baxcalibur")
            require_once COMPONENTS_PATH . "/templates/userHeaderNav.component.php";
        elseif ($pageTitle == "Zephyra Trip | Baxcalibur")
            require_once COMPONENTS_PATH . "/templates/userHeaderNav.component.php";
    ?>