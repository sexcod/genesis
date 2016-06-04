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
* @descriptionrender a view
*/

    public function index()
    {

        $this->render('index');
    }

/**
* @description get all registers
* @return array
*/
    public function list()
    {

       
    }
    
    /**
* @description insert a register
* 
*/

        public function insert()
    {

       
    }
    
 /**
* @description update a register
* @param  int id
*/

    
        public function update($id)
    {

      
    }
    
    /**
* @description delete a register
* @return array
*/
    
        public function delete($id)
    {

       
    }
    
    
    
}
