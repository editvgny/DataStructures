<?php

require "HashMap.php";

class Main
{
    public static function start()
    {
        $hm = new HashMap();
        $hm->addElementToHashMap(new Element(1, 1));
        print_r($hm->getHashMap());

        $hm->addElementToHashMap(new Element(2, 2));
        print_r($hm->getHashMap());

        $hm->addElementToHashMap(new Element(3, 3));
        print_r($hm->getHashMap());

        $hm->addElementToHashMap(new Element(4, 4));
        print_r($hm->getHashMap());

        $hm->addElementToHashMap(new Element(5, 5));
        print_r($hm->getHashMap());

        $hm->addElementToHashMap(new Element(6, 6));
        print_r($hm->getHashMap());

        $hm->getElementFromHashMap(new Element(3,3));

        $hm->updateElementInHahMap(1, new Element(11,11));
        print_r($hm->getHashMap());

        $hm->deleteElementFromHashMap(3);
        print_r($hm->getHashMap());
    }
}

Main::start();