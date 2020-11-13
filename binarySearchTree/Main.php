<?php

require_once "BinarySearchTree.php";
require_once "Node.php";

class Main
{
    public static function start()
    {
        $bst = new BinarySearchTree();

        $values = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];

        $bst->buildTree($values);
        $bst->search(9);
        $bst->search(11);
        $bst->search(2);
        $bst->search(15);
        $bst->search(4);
        $bst->search(20);
    }
}

Main::start();