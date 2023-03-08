<?php

/**
 * Class that responsible for generating nodes tree in HTML
 *
 * Class NodeTreeHTMLGenerator
 */
class NodeTreeHTMLGenerator
{
    /**
     * Array that contain nodes that will be generated in HTML
     *
     * @var array
     */
    private $nodes = array();

    /**
     * NodeTreeHTMLGenerator constructor.
     *
     * @param   NodeFromDatabaseArrayGenerator  $nodeFromDatabaseArrayGenerator
     */
    public function __construct(NodeFromDatabaseArrayGenerator $nodeFromDatabaseArrayGenerator)
    {
        $this->setNodes($nodeFromDatabaseArrayGenerator);
    }

    /**
     * setter for nodes
     *
     * @param   NodeFromDatabaseArrayGenerator  $nodeFromDatabaseArrayGenerator
     * @return void
     */
    private function setNodes(NodeFromDatabaseArrayGenerator $nodeFromDatabaseArrayGenerator)
    {
        $this->nodes = $nodeFromDatabaseArrayGenerator->getNodes();
    }

    /**
     * getter for nodes
     *
     * @return array
     */
    public function getNodes()
    {
        return $this->nodes;
    }

    /**
     * Print node and its child nodes in HTML
     *
     * @param $node
     *
     * @return false|string
     */
    private function printNode($node)
    {

        ob_start();

        ?>

        <div class="root-element-wrapper" data-id="<?php echo $node['id']; ?>">
                    <div class="root-element">
                        <span class="root-child-line"></span>
                        <?php if (!empty($node['children'])) { ?>
                            <span class="root-triangle-btn opened"></span>
                        <?php } ?>
                        <span class="root-name"  data-bs-toggle="modal" data-bs-target="#renameRootModal">
                            <?php
                            if ($node['name']) {
                                echo $node['name'];
                            } else {
                                echo 'Root ' . $node['id'];
                            }
                            ?>
                        </span>
                        <a href="#" class="root-action-btn root-add-btn">+</a>
                        <a href="#" class="root-action-btn root-delete-modal-open" data-bs-toggle="modal" data-bs-target="#deleteRootModal">-</a>
                    </div>
            <div class="root-childs">
                <?php
                if (!empty($node['children'])) {
                    foreach ($node['children'] as $nodeElement) {
                        echo $this->printNode($nodeElement);
                    }
                }
                ?>
            </div>
        </div>

        <?php

        return ob_get_clean();
    }

    /**
     * Print nodes tree in HTML
     *
     * @return false|string
     */
    public function generateNodeTree()
    {
        ob_start();

        foreach ($this->getNodes() as $node) {
            echo $this->printNode($node);
        }

        return ob_get_clean();
    }

}
