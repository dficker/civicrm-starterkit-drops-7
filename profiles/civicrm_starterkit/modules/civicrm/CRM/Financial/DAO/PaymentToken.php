<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2019
 *
 * Generated from xml/schema/CRM/Financial/PaymentToken.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:3b1f3c099b464b808e36b41673b98c1a)
 */

/**
 * Database access object for the PaymentToken entity.
 */
class CRM_Financial_DAO_PaymentToken extends CRM_Core_DAO {

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_payment_token';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = FALSE;

  /**
   * Payment Token ID
   *
   * @var int
   */
  public $id;

  /**
   * FK to Contact ID for the owner of the token
   *
   * @var int
   */
  public $contact_id;

  /**
   * @var int
   */
  public $payment_processor_id;

  /**
   * Externally provided token string
   *
   * @var string
   */
  public $token;

  /**
   * Date created
   *
   * @var timestamp
   */
  public $created_date;

  /**
   * Contact ID of token creator
   *
   * @var int
   */
  public $created_id;

  /**
   * Date this token expires
   *
   * @var datetime
   */
  public $expiry_date;

  /**
   * Email at the time of token creation. Useful for fraud forensics
   *
   * @var string
   */
  public $email;

  /**
   * Billing first name at the time of token creation. Useful for fraud forensics
   *
   * @var string
   */
  public $billing_first_name;

  /**
   * Billing middle name at the time of token creation. Useful for fraud forensics
   *
   * @var string
   */
  public $billing_middle_name;

  /**
   * Billing last name at the time of token creation. Useful for fraud forensics
   *
   * @var string
   */
  public $billing_last_name;

  /**
   * Holds the part of the card number or account details that may be retained or displayed
   *
   * @var string
   */
  public $masked_account_number;

  /**
   * IP used when creating the token. Useful for fraud forensics
   *
   * @var string
   */
  public $ip_address;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_payment_token';
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
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'contact_id', 'civicrm_contact', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'payment_processor_id', 'civicrm_payment_processor', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'created_id', 'civicrm_contact', 'id');
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
        'payment_token_id' => [
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Token ID'),
          'description' => ts('Payment Token ID'),
          'required' => TRUE,
          'where' => 'civicrm_payment_token.id',
          'table_name' => 'civicrm_payment_token',
          'entity' => 'PaymentToken',
          'bao' => 'CRM_Financial_DAO_PaymentToken',
          'localizable' => 0,
        ],
        'contact_id' => [
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contact ID'),
          'description' => ts('FK to Contact ID for the owner of the token'),
          'required' => TRUE,
          'where' => 'civicrm_payment_token.contact_id',
          'table_name' => 'civicrm_payment_token',
          'entity' => 'PaymentToken',
          'bao' => 'CRM_Financial_DAO_PaymentToken',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ],
        'payment_processor_id' => [
          'name' => 'payment_processor_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Processor ID'),
          'required' => TRUE,
          'where' => 'civicrm_payment_token.payment_processor_id',
          'table_name' => 'civicrm_payment_token',
          'entity' => 'PaymentToken',
          'bao' => 'CRM_Financial_DAO_PaymentToken',
          'localizable' => 0,
          'FKClassName' => 'CRM_Financial_DAO_PaymentProcessor',
        ],
        'token' => [
          'name' => 'token',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Token'),
          'description' => ts('Externally provided token string'),
          'required' => TRUE,
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_payment_token.token',
          'table_name' => 'civicrm_payment_token',
          'entity' => 'PaymentToken',
          'bao' => 'CRM_Financial_DAO_PaymentToken',
          'localizable' => 0,
        ],
        'created_date' => [
          'name' => 'created_date',
          'type' => CRM_Utils_Type::T_TIMESTAMP,
          'title' => ts('Created Date'),
          'description' => ts('Date created'),
          'where' => 'civicrm_payment_token.created_date',
          'default' => 'CURRENT_TIMESTAMP',
          'table_name' => 'civicrm_payment_token',
          'entity' => 'PaymentToken',
          'bao' => 'CRM_Financial_DAO_PaymentToken',
          'localizable' => 0,
        ],
        'created_id' => [
          'name' => 'created_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Created ID'),
          'description' => ts('Contact ID of token creator'),
          'where' => 'civicrm_payment_token.created_id',
          'table_name' => 'civicrm_payment_token',
          'entity' => 'PaymentToken',
          'bao' => 'CRM_Financial_DAO_PaymentToken',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ],
        'expiry_date' => [
          'name' => 'expiry_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Expiry Date'),
          'description' => ts('Date this token expires'),
          'where' => 'civicrm_payment_token.expiry_date',
          'table_name' => 'civicrm_payment_token',
          'entity' => 'PaymentToken',
          'bao' => 'CRM_Financial_DAO_PaymentToken',
          'localizable' => 0,
        ],
        'email' => [
          'name' => 'email',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Email'),
          'description' => ts('Email at the time of token creation. Useful for fraud forensics'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_payment_token.email',
          'table_name' => 'civicrm_payment_token',
          'entity' => 'PaymentToken',
          'bao' => 'CRM_Financial_DAO_PaymentToken',
          'localizable' => 0,
        ],
        'billing_first_name' => [
          'name' => 'billing_first_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Billing First Name'),
          'description' => ts('Billing first name at the time of token creation. Useful for fraud forensics'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_payment_token.billing_first_name',
          'table_name' => 'civicrm_payment_token',
          'entity' => 'PaymentToken',
          'bao' => 'CRM_Financial_DAO_PaymentToken',
          'localizable' => 0,
        ],
        'billing_middle_name' => [
          'name' => 'billing_middle_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Billing Middle Name'),
          'description' => ts('Billing middle name at the time of token creation. Useful for fraud forensics'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_payment_token.billing_middle_name',
          'table_name' => 'civicrm_payment_token',
          'entity' => 'PaymentToken',
          'bao' => 'CRM_Financial_DAO_PaymentToken',
          'localizable' => 0,
        ],
        'billing_last_name' => [
          'name' => 'billing_last_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Billing Last Name'),
          'description' => ts('Billing last name at the time of token creation. Useful for fraud forensics'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_payment_token.billing_last_name',
          'table_name' => 'civicrm_payment_token',
          'entity' => 'PaymentToken',
          'bao' => 'CRM_Financial_DAO_PaymentToken',
          'localizable' => 0,
        ],
        'masked_account_number' => [
          'name' => 'masked_account_number',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Masked Account Number'),
          'description' => ts('Holds the part of the card number or account details that may be retained or displayed'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_payment_token.masked_account_number',
          'table_name' => 'civicrm_payment_token',
          'entity' => 'PaymentToken',
          'bao' => 'CRM_Financial_DAO_PaymentToken',
          'localizable' => 0,
        ],
        'ip_address' => [
          'name' => 'ip_address',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('IP Address'),
          'description' => ts('IP used when creating the token. Useful for fraud forensics'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_payment_token.ip_address',
          'table_name' => 'civicrm_payment_token',
          'entity' => 'PaymentToken',
          'bao' => 'CRM_Financial_DAO_PaymentToken',
          'localizable' => 0,
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'payment_token', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'payment_token', $prefix, []);
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
    $indices = [];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}
