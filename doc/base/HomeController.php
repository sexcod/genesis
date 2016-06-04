<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 06/03/16
 * Time: 17:48
 */

namespace SexCode\Controller;

use SexCode\Lib\BaseController;

class HomeController extends BaseController
{

/**
* @description render a view
*/
    public function index()
    {

        $this->render('index');
    }


    
}
