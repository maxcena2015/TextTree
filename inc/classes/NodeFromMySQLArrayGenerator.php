<?php

require_once __DIR__ . '/../interfaces/NodeFromDatabaseArrayGenerator.php';


/**
 * Class that responsible for generating correctly structured nodes array
 * for MySQL system
 *
 * Class NodeFromMySQLArrayGenerator
 */
class NodeFromMySQLArrayGenerator implements NodeFromDatabaseArrayGenerator
{
    /**
     * contains correctly structured array of nodes
     *
     * @var array
     */
    private $nodes = array();

    /**
     * NodeFromMySQLArrayGenerator constructor.
     *
     * @param $insertedNodes
     */
    public function __construct($insertedNodes)
    {
        $this->sortNodesFromDatabase($insertedNodes);
        $this->generateNodeArray();
    }

    /**
     * setter for nodes
     *
     * @param $insertedNodes
     */
    private function setNodes($insertedNodes)
    {
        $this->nodes = $insertedNodes;
    }

    /**
     * getter for nodes
     *
     * @return array
     */
    public function getNodes() {
        return $this->nodes;
    }

    /**
     * sort nodes so parent nodes contain their child nodes
     *
     * @param   mysqli_result  $insertedNodes
     */
    private function sortNodesFromDatabase(mysqli_result $insertedNodes)
    {

        $nodes = array();
        if ($insertedNodes->num_rows > 0) {
            while ($node = $insertedNodes->fetch_assoc()) {
                $nodes[] = $node;
            }
        }

        $this->setNodes($nodes);
    }

    /**
     * generate node
     *
     * @param $id
     * @param $name
     * @param $parent
     *
     * @return array
     */
    private function treeNode($id, $name, $parent) {
        return array('id' => $id, 'name' => $name, 'parent_id' => $parent, 'children' => array());
    }

    /**
     * remove duplicated and supported nodes that were created to help in generating correctly structured
     * arrays of nodes, where parent node contain its child nodes
     *
     * @return void
     */
    private function removeDuplicatedAndSupportedNodes()
    {
        foreach ($this->nodes as $key => $value) {
            if (!isset($value['id'])) {
                unset($this->nodes[$key]);
                continue;
            }
            if ($value['parent_id'] !== null) {
                unset($this->nodes[$key]);
            }
        }
    }

    /**
     * generate $nodes field
     *
     * @return mixed|void
     */
    public function generateNodeArray()
    {

        foreach($this->nodes as $node) {
            $id = $node['id'];
            $name = $node['name'];
            $parentId = $node['parent_id'];
            $map[$id] = &$map[$parentId]['children'][];
            $map[$id] = $this->treeNode($id, $name, $parentId);
        }

        array_shift($map);

        $this->setNodes($map);
        $this->removeDuplicatedAndSupportedNodes();

    }
}
