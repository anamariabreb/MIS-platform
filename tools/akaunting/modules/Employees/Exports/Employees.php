<?php

namespace Modules\Employees\Exports;

use App\Abstracts\Export;
use Modules\Employees\Models\Employee as Model;

class Employees extends Export
{
    public function collection()
    {
        return Model::with(['contact', 'department'])->collectForExport($this->ids, 'contact.name');
    }

    public function map($model): array
    {
        $model->name = $model->contact->name;
        $model->email = $model->contact->email;
        $model->phone = $model->contact->phone;
        $model->address = $model->contact->address;
        $model->currency_code = $model->contact->currency_code;
        $model->enabled = $model->contact->enabled ? 1 : 0;
        $model->department = $model->department->name;
        $model->salary = $model->amount;

        return parent::map($model);
    }

    public function fields(): array
    {
        return [
            'name',
            'email',
            'phone',
            'address',
            'currency_code',
            'tax_number',
            'enabled',
            'birth_day',
            'gender',
            'department',
            'salary',
            'hired_at',
            'bank_account_number',
        ];
    }
}
