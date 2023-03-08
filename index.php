<?php

require_once 'dbconfig/database.php';
require_once 'inc/classes/NodeTreeHTMLGenerator.php';
require_once 'inc/classes/NodeFromMySQLArrayGenerator.php';

$nodesFromDB = $conn->query("SELECT * FROM Nodes");
$nodeFromMySQLArrayGenerator = new NodeFromMySQLArrayGenerator($nodesFromDB);

$nodeTreeGenerator = new NodeTreeHTMLGenerator($nodeFromMySQLArrayGenerator);

?>

<html lang="">
<head>
    <title>Text Tree</title>
    <link rel="stylesheet" href="assets/styles/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles/styles.css">
</head>
<body>
    <a class="create-root-main root-add-btn btn btn-primary" href="#">Create Root</a>
    <div class="text-tree-wrapper">
        <?php echo $nodeTreeGenerator->generateNodeTree(); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/scripts/jquery-3.6.3.min.js"></script>
    <script type="text/javascript" src="assets/scripts/add-remove-nodes-scripts.js"></script>
    <script type="text/javascript" src="assets/scripts/show-hide-child-trees.js"></script>

    <?php require_once 'inc/modal/deleteModal.php'; ?>
</body>
</html>
