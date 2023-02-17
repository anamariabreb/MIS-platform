<?php
/**
 * Created by PhpStorm.
 * User: Thilina
 * Date: 8/19/17
 * Time: 6:11 PM
 */

namespace Qualifications\Common\Model;

use Classes\ModuleAccess;
use Model\BaseModel;

class EmployeeCertification extends BaseModel
{
    public $table = 'EmployeeCertifications';

    public function getAdminAccess()
    {
        return array("get","element","save","delete");
    }

    public function getManagerAccess()
    {
        return array("get","element","save","delete");
    }

    public function getUserAccess()
    {
        return array("get");
    }

    public function getUserOnlyMeAccess()
    {
        return array("element","save","delete");
    }

    public function getModuleAccess()
    {
        return [
            new ModuleAccess('qualifications', 'admin'),
            new ModuleAccess('employees', 'admin'),
            new ModuleAccess('employees', 'user'),
        ];
    }
}
