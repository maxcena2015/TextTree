<?php

require_once '../../dbconfig/database.php';
require_once '../classes/NodeFromMySQLArrayGenerator.php';
require_once '../classes/NodeTreeHTMLGenerator.php';

if (isset($_POST['nodeId']) && isset($_POST['name'])) {

    $nodeId = $_POST['nodeId'] ? $_POST['nodeId'] : 'NULL';
    $name = $_POST['name'] ? $_POST['name'] : 'NULL';

    $query = "UPDATE Nodes SET name='" . $name . "' WHERE id = " . $nodeId;
    $conn->query($query);

    $nodesFromDB = $conn->query("SELECT * FROM Nodes");
    $nodeFromMySQLArrayGenerator = new NodeFromMySQLArrayGenerator($nodesFromDB);

    $nodeTreeGenerator = new NodeTreeHTMLGenerator($nodeFromMySQLArrayGenerator);

    echo $nodeTreeGenerator->generateNodeTree();
}
