<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 10/03/16
 * Time: 14:48
 */

namespace SexCode\Lib;

use Twig_Extension;
use Twig_SimpleFunction;

class Progs_Extension extends Twig_Extension
{
    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('assets', array($this, 'assetsFunction')),
        );
    }

    public function assetsFunction($link)
    {
        $assets = 'http://'.$_SERVER['HTTP_HOST'].'/'.$link;

        return $assets;
    }



    public function getName()
    {
        return 'assets';
    }
}
