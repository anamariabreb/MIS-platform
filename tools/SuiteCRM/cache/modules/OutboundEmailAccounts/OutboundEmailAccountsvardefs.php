<?php 
 $GLOBALS["dictionary"]["OutboundEmailAccounts"]=array (
  'table' => 'outbound_email',
  'audited' => true,
  'inline_edit' => false,
  'massupdate' => false,
  'duplicate_merge' => false,
  'fields' => 
  array (
    'SecurityGroups' => 
    array (
      'name' => 'SecurityGroups',
      'type' => 'link',
      'relationship' => 'securitygroups_outboundemailaccounts',
      'module' => 'SecurityGroups',
      'bean_name' => 'SecurityGroup',
      'source' => 'non-db',
      'vname' => 'LBL_SECURITYGROUPS',
    ),
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'comment' => 'Unique identifier',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'dbType' => 'varchar',
      'len' => 255,
      'unified_search' => false,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'required' => true,
      'importable' => false,
      'duplicate_merge' => 'enabled',
      'merge_filter' => 'selected',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'exportable' => false,
    ),
    'type' => 
    array (
      'name' => 'type',
      'vname' => 'LBL_TYPE',
      'type' => 'enum',
      'len' => 15,
      'display' => 'readonly',
      'options' => 'dom_outbound_email_account_types',
      'required' => true,
      'default' => 'user',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'user_id' => 
    array (
      'name' => 'user_id',
      'vname' => 'LBL_USER_ID',
      'type' => 'id',
      'required' => false,
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'owner' => 
    array (
      'name' => 'owner',
      'type' => 'link',
      'relationship' => 'outbound_email_owner_user',
      'link_type' => 'one',
      'source' => 'non-db',
      'vname' => 'LBL_OWNER',
      'duplicate_merge' => 'disabled',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'owner_name' => 
    array (
      'name' => 'owner_name',
      'rname' => 'name',
      'id_name' => 'user_id',
      'vname' => 'LBL_OWNER_NAME',
      'join_name' => 'owner',
      'type' => 'relate',
      'link' => 'owner',
      'table' => 'users',
      'isnull' => 'true',
      'module' => 'Users',
      'dbType' => 'varchar',
      'len' => '255',
      'source' => 'non-db',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'smtp_from_name' => 
    array (
      'name' => 'smtp_from_name',
      'vname' => 'LBL_SMTP_FROM_NAME',
      'type' => 'varchar',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'smtp_from_addr' => 
    array (
      'name' => 'smtp_from_addr',
      'vname' => 'LBL_SMTP_FROM_ADDR',
      'type' => 'varchar',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'reply_to_name' => 
    array (
      'name' => 'reply_to_name',
      'vname' => 'LBL_REPLY_TO_NAME',
      'type' => 'varchar',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'reply_to_addr' => 
    array (
      'name' => 'reply_to_addr',
      'vname' => 'LBL_REPLY_TO_ADDR',
      'type' => 'varchar',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'signature' => 
    array (
      'name' => 'signature',
      'vname' => 'LBL_SIGNATURE',
      'type' => 'wysiwyg',
      'dbType' => 'text',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'mail_sendtype' => 
    array (
      'name' => 'mail_sendtype',
      'vname' => 'LBL_MAIL_SENDTYPE',
      'type' => 'varchar',
      'len' => 8,
      'required' => true,
      'default' => 'SMTP',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'mail_smtptype' => 
    array (
      'name' => 'mail_smtptype',
      'vname' => 'LBL_MAIL_SENDTYPE',
      'type' => 'varchar',
      'len' => 20,
      'required' => true,
      'default' => 'other',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'mail_smtpserver' => 
    array (
      'name' => 'mail_smtpserver',
      'vname' => 'LBL_MAIL_SMTPSERVER',
      'type' => 'varchar',
      'len' => 100,
      'required' => false,
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'mail_smtpport' => 
    array (
      'name' => 'mail_smtpport',
      'vname' => 'LBL_MAIL_SMTPPORT',
      'type' => 'varchar',
      'len' => 5,
      'default' => 25,
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'mail_smtpuser' => 
    array (
      'name' => 'mail_smtpuser',
      'vname' => 'LBL_MAIL_SMTPUSER',
      'type' => 'varchar',
      'len' => 100,
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'mail_smtppass' => 
    array (
      'name' => 'mail_smtppass',
      'vname' => 'LBL_MAIL_SMTPPASS',
      'type' => 'password',
      'dbType' => 'varchar',
      'len' => 100,
      'display' => 'writeonly',
      'required' => false,
      'sensitive' => true,
      'api-visible' => false,
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'mail_smtpauth_req' => 
    array (
      'name' => 'mail_smtpauth_req',
      'vname' => 'LBL_MAIL_SMTPAUTH_REQ',
      'type' => 'bool',
      'default' => 0,
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'mail_smtpssl' => 
    array (
      'name' => 'mail_smtpssl',
      'vname' => 'LBL_MAIL_SMTPSSL',
      'type' => 'enum',
      'options' => 'email_settings_for_ssl',
      'len' => 1,
      'default' => 0,
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'group' => 'created_by_name',
      'comment' => 'Date record created',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'group' => 'modified_by_name',
      'comment' => 'Date record last modified',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'group' => 'modified_by_name',
      'dbType' => 'id',
      'reportable' => false,
      'comment' => 'User who last modified record',
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'modified_by_name' => 
    array (
      'name' => 'modified_by_name',
      'vname' => 'LBL_MODIFIED_NAME',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'rname' => 'user_name',
      'table' => 'users',
      'id_name' => 'modified_user_id',
      'module' => 'Users',
      'link' => 'modified_user_link',
      'duplicate_merge' => 'disabled',
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'group' => 'created_by_name',
      'comment' => 'User who created record',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'created_by_name' => 
    array (
      'name' => 'created_by_name',
      'vname' => 'LBL_CREATED',
      'type' => 'relate',
      'reportable' => false,
      'link' => 'created_by_link',
      'rname' => 'user_name',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'created_by',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'importable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
      'comment' => 'Record deletion indicator',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'outbound_email_created_by',
      'vname' => 'LBL_CREATED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'outbound_email_modified_user',
      'vname' => 'LBL_MODIFIED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO_ID',
      'group' => 'assigned_user_name',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'isnull' => 'false',
      'dbType' => 'id',
      'comment' => 'User ID assigned to record',
      'duplicate_merge' => 'disabled',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'link' => 'assigned_user_link',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'rname' => 'user_name',
      'type' => 'relate',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'outbound_email_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'duplicate_merge' => 'enabled',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'table' => 'users',
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'password_change' => 
    array (
      'required' => false,
      'name' => 'password_change',
      'vname' => 'LBL_PASSWORD',
      'type' => 'function',
      'source' => 'non-db',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'function' => 
      array (
        'name' => 'OutboundEmailAccounts::getPasswordChange',
        'returns' => 'html',
        'include' => 'modules/OutboundEmailAccounts/OutboundEmailAccounts.php',
      ),
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
    'sent_test_email_btn' => 
    array (
      'required' => false,
      'name' => 'sent_test_email_btn',
      'vname' => 'LBL_SEND_TEST_EMAIL',
      'type' => 'function',
      'source' => 'non-db',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'function' => 
      array (
        'name' => 'OutboundEmailAccounts::getSendTestEmailBtn',
        'returns' => 'html',
        'include' => 'modules/OutboundEmailAccounts/OutboundEmailAccounts.php',
      ),
      'reportable' => false,
      'massupdate' => false,
      'inline_edit' => false,
      'importable' => false,
      'exportable' => false,
      'unified_search' => false,
    ),
  ),
  'relationships' => 
  array (
    'securitygroups_outboundemailaccounts' => 
    array (
      'lhs_module' => 'SecurityGroups',
      'lhs_table' => 'securitygroups',
      'lhs_key' => 'id',
      'rhs_module' => 'OutboundEmailAccounts',
      'rhs_table' => 'outbound_email',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'securitygroups_records',
      'join_key_lhs' => 'securitygroup_id',
      'join_key_rhs' => 'record_id',
      'relationship_role_column' => 'module',
      'relationship_role_column_value' => 'OutboundEmailAccounts',
    ),
    'outbound_email_owner_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'OutboundEmailAccounts',
      'rhs_table' => 'outbound_email',
      'rhs_key' => 'user_id',
      'relationship_type' => 'one-to-many',
    ),
    'outbound_email_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'OutboundEmailAccounts',
      'rhs_table' => 'outbound_email',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'outbound_email_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'OutboundEmailAccounts',
      'rhs_table' => 'outbound_email',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'outbound_email_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'OutboundEmailAccounts',
      'rhs_table' => 'outbound_email',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'optimistic_locking' => true,
  'unified_search' => false,
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'outbound_email_pk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
  ),
  'custom_fields' => false,
  'templates' => 
  array (
    'security_groups' => 'security_groups',
  ),
);