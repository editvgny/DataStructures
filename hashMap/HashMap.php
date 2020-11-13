<?php

require "Element.php";

class HashMap
{
    private $hashMap = array();
    private $size = 2;

    public function addElementToHashMap(Element $element)
    {
        if (count($this->hashMap) == 0) {
            $this->hashMap = $this->fillHashmapWithArrays($this->hashMap);
            $index = $this->generateIndexFromHashedKey($this->getHashedKey($element->getKey()));
            array_push($this->hashMap[$index], $element);
        } else {
            $index = $this->generateIndexFromHashedKey($this->getHashedKey($element->getKey()));
            array_push($this->hashMap[$index], $element);
        }

        foreach ($this->hashMap as $subMap) {
            if (count($this->hashMap) == count($subMap)) {
                $doubleSizedHashMap = array();
                $this->size = $this->size * 2;
                $this->repositionOldElements($doubleSizedHashMap);
            }
        }
        return $this->hashMap;
    }

    private function getHashedKey($key)
    {
        return crc32($key);
    }

    private function generateIndexFromHashedKey($hashedKey)
    {
        return $hashedKey % $this->size;
    }

    private function fillHashmapWithArrays($hashMap)
    {
        for ($i = 0; $i < $this->size; $i++) {
            $hashMap[$i] = array();
        }
        return $hashMap;
    }

    private function repositionOldElements($newArray)
    {
        $newArray = $this->fillHashmapWithArrays($newArray);
        foreach ($this->hashMap as $subMap) {
            foreach ($subMap as $element) {
                $index = $this->generateIndexFromHashedKey($this->getHashedKey($element->getKey()));
                array_push($newArray[$index], $element);
                $this->hashMap = $newArray;
                $this->getHashMap();
            }
        }
    }

    public function getHashMap()
    {
        return $this->hashMap;
    }

    public function getElementFromHashMap(Element $elementToSearch)
    {
        $index = $this->generateIndexFromHashedKey($this->getHashedKey($elementToSearch->getKey()));
        for ($i = 0; $i < count($this->hashMap[$index]); $i++) {
            if ($elementToSearch->getKey() == $this->hashMap[$index][$i]->getKey()) {
                echo "\nThe element found in hashmap: ";
                print_r($this->hashMap[$index][$i]);
                echo "\n";
            }
        }
    }

    public function deleteElementFromHashMap($elementKeyToDelete)
    {
        $index = $this->generateIndexFromHashedKey($this->getHashedKey($elementKeyToDelete));
        for ($i = 0; $i < count($this->hashMap[$index]); $i++) {
            if ($elementKeyToDelete == $this->hashMap[$index][$i]->getKey()) {
                unset($this->hashMap[$index][$i]);
                echo "The element deleted from hashmap.";
            }
        }
    }

    public function updateElementInHahMap($elementKeyToUpdate, Element $newElement)
    {
        $index = $this->generateIndexFromHashedKey($this->getHashedKey($elementKeyToUpdate));
        for ($i = 0; $i < count($this->hashMap[$index]); $i++) {
            if ($elementKeyToUpdate == $this->hashMap[$index][$i]->getKey()) {
                echo "\nThe element updated in hashmap.\n";
                $this->hashMap[$index][$i]->setKey($newElement->getKey());
                $this->hashMap[$index][$i]->setValue($newElement->getValue());
            }
        }
    }

    public function printHashMap()
    {
        print_r($this->getHashMap());
    }
}
