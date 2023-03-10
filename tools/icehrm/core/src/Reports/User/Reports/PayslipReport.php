<?php
namespace Reports\User\Reports;

use Classes\BaseService;
use Payroll\Common\Model\Payroll;
use Payroll\Common\Model\PayrollColumn;
use Payroll\Common\Model\PayrollData;
use Payroll\Common\Model\PayslipTemplate;
use Reports\Admin\Api\PDFReportBuilder;
use Reports\Admin\Api\PDFReportBuilderInterface;

class PayslipReport extends PDFReportBuilder implements PDFReportBuilderInterface
{
    protected $employee;

    /**
     * @param mixed $employee
     */
    public function setEmployee($employee)
    {
        $this->employee = $employee;
    }

    public function getData($report, $request)
    {
        $data = $this->getDefaultData();

        if ($this->employee === null) {
            $this->employee = BaseService::getInstance()->getElement(
                'Employee',
                BaseService::getInstance()->getCurrentProfileId(),
                null,
                true
            );
        }

        $data['fields'] = array();

        $payroll = new Payroll();
        $payroll->Load("id = ?", array($request['payroll']));

        if (empty($payroll->payslipTemplate)) {
            return null;
        }

        $payslipTemplate = new PayslipTemplate();
        $payslipTemplate->Load("id = ?", array($payroll->payslipTemplate));

        if (empty($payslipTemplate->id)) {
            return null;
        }

        $fields = json_decode($payslipTemplate->data, true);

        foreach ($fields as $field) {
            if ($field['type'] == 'Payroll Column') {
                $col = new PayrollColumn();
                $col->Load("id = ?", [$field['payrollColumn']]);
                if (empty($col->id)) {
                    continue;
                }
                $payrollData = new PayrollData();
                $payrollData->Load(
                    "payroll = ? and payroll_item = ? and employee = ?",
                    [
                        $request['payroll'],
                        $col->id,
                        $this->employee->id,
                    ]
                );

                if (empty($payrollData->id)) {
                    continue;
                }

                $field['value'] = $payrollData->amount;

                if (empty($field['label'])) {
                    $field['label'] = $col->name;
                }
            }

            if ($field['status'] == 'Show') {
                $data['fields'][] = $field;
            }
        }


        $data['employeeName'] = $this->employee->first_name.' '.$this->employee->last_name;
        $data['payroll'] = $payroll;
        return $data;
    }

    public function getTemplate()
    {
        return "payslip.html";
    }
}
