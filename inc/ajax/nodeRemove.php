<?php

require_once '../../dbconfig/database.php';
require_once '../classes/NodeFromMySQLArrayGenerator.php';
require_once '../classes/NodeTreeHTMLGenerator.php';

if (isset($_POST['removableIds'])) {

    $removableIds = $_POST['removableIds'] ? $_POST['removableIds'] : 'NULL';
    $removableIdsString = implode(", ", $removableIds);

    $query = "DELETE FROM Nodes WHERE id IN (" . $removableIdsString . ")";
    $conn->query($query);

    $nodesFromDB = $conn->query("SELECT * FROM Nodes");
    $nodeFromMySQLArrayGenerator = new NodeFromMySQLArrayGenerator($nodesFromDB);

    $nodeTreeGenerator = new NodeTreeHTMLGenerator($nodeFromMySQLArrayGenerator);

    echo $nodeTreeGenerator->generateNodeTree();
}
