<?php

require_once '../../dbconfig/database.php';
require_once '../classes/NodeFromMySQLArrayGenerator.php';
require_once '../classes/NodeTreeHTMLGenerator.php';

if (isset($_POST['nodeId'])) {

    $nodeId = $_POST['nodeId'] ? $_POST['nodeId'] : 'NULL';

    $query = "INSERT INTO Nodes (parent_id) VALUES (" . $nodeId . ")";
    $conn->query($query);

    $nodesFromDB = $conn->query("SELECT * FROM Nodes");
    $nodeFromMySQLArrayGenerator = new NodeFromMySQLArrayGenerator($nodesFromDB);

    $nodeTreeGenerator = new NodeTreeHTMLGenerator($nodeFromMySQLArrayGenerator);

    echo $nodeTreeGenerator->generateNodeTree();
}
