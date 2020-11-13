<?php

class BinarySearchTree
{
    private $rootNode;

    public function buildTree(array $values)
    {
        $start = 0;
        $end = count($values) - 1;
        $middle = $values[floor(($start + $end) / 2)];

        $node = new Node($middle);
        if ($this->rootNode == null) {
            $this->rootNode = $node;
        }

        $leftSubTree = $this->buildLeftTree($values);
        $rightSubTree = $this->buildRightTree($values);

        if (count($leftSubTree) <= 1) {
            if (count($leftSubTree) != 0) {
                $node->setLeft(new Node($leftSubTree[0]));
            }
        } else {
            $node->setLeft($this->buildTree($leftSubTree));
        }

        if (count($rightSubTree) <= 1) {
            if (count($rightSubTree) != 0) {
                $node->setRight(new Node($rightSubTree[0]));
            }
        } else {
            $node->setRight($this->buildTree($rightSubTree));
        }

        return $node;
    }

    private function buildLeftTree($values)
    {
        $leftTree = array();
        $start = 0;
        $end = count($values) - 1;
        $mid = floor(($start + $end) / 2);
        for ($i = 0; $i < $mid; $i++) {
            array_push($leftTree, $values[$i]);
        }
        return $leftTree;
    }

    private function buildRightTree($values)
    {
        $rightTree = array();
        $start = 0;
        $end = count($values) - 1;
        $mid = floor(($start + $end) / 2);
        for ($i = $mid + 1; $i < count($values); $i++) {
            array_push($rightTree, $values[$i]);
        }
        return $rightTree;
    }

    private function printTree($array)
    {
        foreach ($array as $item) {
            echo $item . " ";

        }
        echo "\n";
    }

    public function search($value)
    {
        $actualNode = $this->rootNode;
        $result = 0;

        while ($result == 0) {
            if ($value == $actualNode->getValue()) {
                $result = 1;
            }
            if ($value < $actualNode->getValue()) {
                $actualNode = $actualNode->getLeft();
                if ($actualNode == null) {
                    $result = 2;
                }
            }
            if ($value > $actualNode->getValue()) {
                $actualNode = $actualNode->getRight();
                if ($actualNode == null) {
                    $result = 2;
                }
            }
        }

        switch ($result) {
            case 1:
                echo "Element found: " . $value . "\n";
                break;
            case 2:
                echo "Element not found: " . $value . "\n";
                break;
        }
    }

    public function deleteNode($arr, $item)
    {
        $array = array_diff($arr,[$item]);

        $this->buildTree($array);
    }
}
