<?php

/**
 * Interface NodeFromDatabaseArrayGenerator
 */
interface NodeFromDatabaseArrayGenerator
{

    /**
     * Generate Nodes Array that contains correct structure of nodes and its child nodes
     *
     * @return mixed
     */
    public function generateNodeArray();
}
