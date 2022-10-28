<?php
include_once "header.php";
?>

<div class="root">
    <?php
    if (!isset($_GET["page"])) {
        include_once "bodies/home.php";
    } else {
        include_once "bodies/" . $_GET["page"];
    }
    ?>

</div>

<?php
include_once "footer.php";
?>