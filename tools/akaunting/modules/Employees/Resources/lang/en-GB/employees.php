<?php

return [
    'male'   => 'Male',
    'other'  => 'Other',
    'female' => 'Female',
    'can_login' => 'Invite to Employee Portal',

    'hired_at'            => 'Hire Date',
    'birth_day'           => 'Birth Day',
    'gender'              => 'Gender',
    'bank_account_number' => 'Bank Account Number',

    'personal_information' => 'Personal Information',
    'salary'               => 'Salary',

    'salary_types' => [
        // 'hourly' => 'Hourly',
        // 'daily'  => 'Daily',
        'weekly' => 'Weekly',
        'bi-weekly' => 'Bi-Weekly',
        'monthly' => 'Monthly',
        'yearly' => 'Yearly',
        // 'contract' => 'Contract',
    ],

    'messages' => [
        'contact_missing' => 'There is no associated contact for the current user',
        'role_missing'    => 'There is no associated role for the current employee',
    ],

    'form_description' => [
        'personal_information'  => 'Here you can enter the employee\'s general information such as name,
                                  email, etc. If you click the \'Can Log in\' box, an invitation link will
                                   be sent to the employee to create an employee portal.',
        'salary'                => 'The payroll will be generated by entered information in this section.
                                  If necessary, you can edit this information on the employee profile page.',
        'attachment'            => 'Here you can attach the employee\'s resume or other required documents.',
        'setting_general'       => 'The role you selected determines the permissions that the employee will have. 
                                    Select the role that you want to assign to the employee who can log in.',
    ],

    'suggestion' => [
        'payroll'           => 'The Payroll app allows you to manage your employees\' salaries and payments.',
        'assets'            => 'Assets are the tools and types of equipment that are assigned to your team to get work done. This app helps you to track your business assets\' allocations.',
        'leaves'            => 'Plan, Track and Manage your team\'s time off without losing productive time on running business operations. Akaunting\'s leave app gives you a bird\'s eye view of the staff\'s availability and control over access permissions, with automated reminders on every approval request.',
        'expense_claims'    => 'Expense claims are typically used to process your expense reimbursements, also known as staff claims.',
    ],

    'calendar' => [
        'birth_day' => ':name\'s Birthday',
        'birth_day_description' => 'Today is :name\'s birthday. Wish him/her a happy birthday.',
        'hired_at'  => ':name\'s Hire Date',
        'hired_at_description'  => 'Today is :name\'s hire date. Wish him/her a happy hire date.',
    ],
];
