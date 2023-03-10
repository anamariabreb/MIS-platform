<?php
namespace Documents\Admin\Api;

use Classes\AbstractModuleManager;
use Classes\SystemTasks\SystemTasksService;

class DocumentsAdminManager extends AbstractModuleManager
{

    public function initialize()
    {
        SystemTasksService::getInstance()->registerTaskCreator((new DocumentTaskCreator()));
    }

    public function initializeUserClasses()
    {
    }

    public function initializeFieldMappings()
    {
        $this->addFileFieldMapping('EmployeeDocument', 'attachment', 'name');
    }

    public function initializeDatabaseErrorMappings()
    {
        $this->addDatabaseErrorMapping(
            'CONSTRAINT `Fk_EmployeeDocuments_Documents` FOREIGN KEY',
            'Can not delete Document Type, users have already uploaded these types of documents'
        );
    }

    public function setupModuleClassDefinitions()
    {

        $this->addModelClass('Document');
        $this->addModelClass('CompanyDocument');
        $this->addModelClass('EmployeeDocument');
        $this->addModelClass('PayslipDocument');
        $this->addModelClass('EmployeeDocumentNotification');
    }
}
