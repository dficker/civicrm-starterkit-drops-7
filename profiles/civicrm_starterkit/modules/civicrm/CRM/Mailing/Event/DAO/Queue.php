<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2019
 *
 * Generated from xml/schema/CRM/Mailing/Event/Queue.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:10e0744e0adb4393d37a8fbbbe585e4b)
 */

/**
 * Database access object for the Queue entity.
 */
class CRM_Mailing_Event_DAO_Queue extends CRM_Core_DAO {

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_mailing_event_queue';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = FALSE;

  /**
   * @var int
   */
  public $id;

  /**
   * FK to Job
   *
   * @var int
   */
  public $job_id;

  /**
   * FK to Email
   *
   * @var int
   */
  public $email_id;

  /**
   * FK to Contact
   *
   * @var int
   */
  public $contact_id;

  /**
   * Security hash
   *
   * @var string
   */
  public $hash;

  /**
   * FK to Phone
   *
   * @var int
   */
  public $phone_id;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_mailing_event_queue';
    parent::__construct();
  }

  /**
   * Returns foreign keys and entity references.
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  public static function getReferenceColumns() {
    if (!isset(Civi::$statics[__CLASS__]['links'])) {
      Civi::$statics[__CLASS__]['links'] = static::createReferenceColumns(__CLASS__);
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'job_id', 'civicrm_mailing_job', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'email_id', 'civicrm_email', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'contact_id', 'civicrm_contact', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'phone_id', 'civicrm_phone', 'id');
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'links_callback', Civi::$statics[__CLASS__]['links']);
    }
    return Civi::$statics[__CLASS__]['links'];
  }

  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  public static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = [
        'id' => [
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Mailing Event Queue ID'),
          'required' => TRUE,
          'where' => 'civicrm_mailing_event_queue.id',
          'table_name' => 'civicrm_mailing_event_queue',
          'entity' => 'Queue',
          'bao' => 'CRM_Mailing_Event_BAO_Queue',
          'localizable' => 0,
        ],
        'job_id' => [
          'name' => 'job_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Job ID'),
          'description' => ts('FK to Job'),
          'required' => TRUE,
          'where' => 'civicrm_mailing_event_queue.job_id',
          'table_name' => 'civicrm_mailing_event_queue',
          'entity' => 'Queue',
          'bao' => 'CRM_Mailing_Event_BAO_Queue',
          'localizable' => 0,
          'FKClassName' => 'CRM_Mailing_DAO_MailingJob',
        ],
        'email_id' => [
          'name' => 'email_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Email ID'),
          'description' => ts('FK to Email'),
          'where' => 'civicrm_mailing_event_queue.email_id',
          'default' => 'NULL',
          'table_name' => 'civicrm_mailing_event_queue',
          'entity' => 'Queue',
          'bao' => 'CRM_Mailing_Event_BAO_Queue',
          'localizable' => 0,
          'FKClassName' => 'CRM_Core_DAO_Email',
        ],
        'contact_id' => [
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contact ID'),
          'description' => ts('FK to Contact'),
          'required' => TRUE,
          'where' => 'civicrm_mailing_event_queue.contact_id',
          'table_name' => 'civicrm_mailing_event_queue',
          'entity' => 'Queue',
          'bao' => 'CRM_Mailing_Event_BAO_Queue',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ],
        'hash' => [
          'name' => 'hash',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Security Hash'),
          'description' => ts('Security hash'),
          'required' => TRUE,
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_mailing_event_queue.hash',
          'table_name' => 'civicrm_mailing_event_queue',
          'entity' => 'Queue',
          'bao' => 'CRM_Mailing_Event_BAO_Queue',
          'localizable' => 0,
        ],
        'phone_id' => [
          'name' => 'phone_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Phone ID'),
          'description' => ts('FK to Phone'),
          'where' => 'civicrm_mailing_event_queue.phone_id',
          'default' => 'NULL',
          'table_name' => 'civicrm_mailing_event_queue',
          'entity' => 'Queue',
          'bao' => 'CRM_Mailing_Event_BAO_Queue',
          'localizable' => 0,
          'FKClassName' => 'CRM_Core_DAO_Phone',
        ],
      ];
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'fields_callback', Civi::$statics[__CLASS__]['fields']);
    }
    return Civi::$statics[__CLASS__]['fields'];
  }

  /**
   * Return a mapping from field-name to the corresponding key (as used in fields()).
   *
   * @return array
   *   Array(string $name => string $uniqueName).
   */
  public static function &fieldKeys() {
    if (!isset(Civi::$statics[__CLASS__]['fieldKeys'])) {
      Civi::$statics[__CLASS__]['fieldKeys'] = array_flip(CRM_Utils_Array::collect('name', self::fields()));
    }
    return Civi::$statics[__CLASS__]['fieldKeys'];
  }

  /**
   * Returns the names of this table
   *
   * @return string
   */
  public static function getTableName() {
    return self::$_tableName;
  }

  /**
   * Returns if this table needs to be logged
   *
   * @return bool
   */
  public function getLog() {
    return self::$_log;
  }

  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &import($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'mailing_event_queue', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &export($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'mailing_event_queue', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of indices
   *
   * @param bool $localize
   *
   * @return array
   */
  public static function indices($localize = TRUE) {
    $indices = [
      'index_hash' => [
        'name' => 'index_hash',
        'field' => [
          0 => 'hash',
        ],
        'localizable' => FALSE,
        'sig' => 'civicrm_mailing_event_queue::0::hash',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}
