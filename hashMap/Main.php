<?php

require "HashMap.php";

class Main
{
    public static function start()
    {
        $hm = new HashMap();
        $hm->addElementToHashMap(new Element(1, 1));
        $hm->printHashMap();

        $hm->addElementToHashMap(new Element(2, 2));
        $hm->printHashMap();

        $hm->addElementToHashMap(new Element(3, 3));
        $hm->printHashMap();

        $hm->addElementToHashMap(new Element(4, 4));
        $hm->printHashMap();

        $hm->addElementToHashMap(new Element(5, 5));
        $hm->printHashMap();

        $hm->addElementToHashMap(new Element(6, 6));
        $hm->printHashMap();

        $hm->getElementFromHashMap(new Element(3,3));
        $hm->printHashMap();

        $hm->updateElementInHahMap(1, new Element(11,11));
        $hm->printHashMap();

        $hm->deleteElementFromHashMap(3);
        $hm->printHashMap();
    }
}

Main::start();