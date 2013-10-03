<?php
/**
 * Test Generated example of using contact create API
 * test demonstrates the syntax to create 2 chained entities *
 */
function contact_create_example(){
$params = array(
  'first_name' => 'abc3',
  'last_name' => 'xyz3',
  'contact_type' => 'Individual',
  'email' => 'man3@yahoo.com',
  'api.contribution.create' => array(
      'receive_date' => '2010-01-01',
      'total_amount' => '100',
      'financial_type_id' => 1,
      'payment_instrument_id' => 1,
      'non_deductible_amount' => '10',
      'fee_amount' => '50',
      'net_amount' => '90',
      'trxn_id' => 15345,
      'invoice_id' => 67990,
      'source' => 'SSF',
      'contribution_status_id' => 1,
    ),
  'api.website.create' => array(
      'url' => 'http://civicrm.org',
    ),
  'api.website.create.2' => array(
      'url' => 'http://chained.org',
    ),
);

try{
  $result = civicrm_api3('contact', 'create', $params);
}
catch (CiviCRM_API3_Exception $e) {
  // handle error here
  $errorMessage = $e->getMessage();
  $errorCode = $e->getErrorCode();
  $errorData = $e->getExtraParams();
  return array('error' => $errorMessage, 'error_code' => $errorCode, 'error_data' => $errorData);
}

return $result;
}

/**
 * Function returns array of result expected from previous function
 */
function contact_create_expectedresult(){

  $expectedResult = array(
  'is_error' => 0,
  'version' => 3,
  'count' => 1,
  'id' => 1,
  'values' => array(
      '1' => array(
          'id' => '1',
          'contact_type' => 'Individual',
          'contact_sub_type' => '',
          'do_not_email' => 0,
          'do_not_phone' => 0,
          'do_not_mail' => 0,
          'do_not_sms' => 0,
          'do_not_trade' => 0,
          'is_opt_out' => 0,
          'legal_identifier' => '',
          'external_identifier' => '',
          'sort_name' => 'xyz3, abc3',
          'display_name' => 'abc3 xyz3',
          'nick_name' => '',
          'legal_name' => '',
          'image_URL' => '',
          'preferred_communication_method' => '',
          'preferred_language' => 'en_US',
          'preferred_mail_format' => 'Both',
          'hash' => '67eac7789eaee00',
          'api_key' => '',
          'first_name' => 'abc3',
          'middle_name' => '',
          'last_name' => 'xyz3',
          'prefix_id' => '',
          'suffix_id' => '',
          'email_greeting_id' => '1',
          'email_greeting_custom' => '',
          'email_greeting_display' => '',
          'postal_greeting_id' => '1',
          'postal_greeting_custom' => '',
          'postal_greeting_display' => '',
          'addressee_id' => '1',
          'addressee_custom' => '',
          'addressee_display' => '',
          'job_title' => '',
          'gender_id' => '',
          'birth_date' => '',
          'is_deceased' => 0,
          'deceased_date' => '',
          'household_name' => '',
          'primary_contact_id' => '',
          'organization_name' => '',
          'sic_code' => '',
          'user_unique_id' => '',
          'created_date' => '2013-07-28 08:49:19',
          'modified_date' => '2012-11-14 16:02:35',
          'api.contribution.create' => array(
              'is_error' => 0,
              'version' => 3,
              'count' => 1,
              'id' => 1,
              'values' => array(
                  '0' => array(
                      'id' => '1',
                      'contact_id' => '1',
                      'financial_type_id' => '1',
                      'contribution_page_id' => '',
                      'payment_instrument_id' => '1',
                      'receive_date' => '20100101000000',
                      'non_deductible_amount' => '10',
                      'total_amount' => '100',
                      'fee_amount' => '50',
                      'net_amount' => '90',
                      'trxn_id' => '15345',
                      'invoice_id' => '67990',
                      'currency' => 'USD',
                      'cancel_date' => '',
                      'cancel_reason' => '',
                      'receipt_date' => '',
                      'thankyou_date' => '',
                      'source' => 'SSF',
                      'amount_level' => '',
                      'contribution_recur_id' => '',
                      'honor_contact_id' => '',
                      'is_test' => '',
                      'is_pay_later' => '',
                      'contribution_status_id' => '1',
                      'honor_type_id' => '',
                      'address_id' => '',
                      'check_number' => '',
                      'campaign_id' => '',
                      'contribution_type_id' => '1',
                    ),
                ),
            ),
          'api.website.create' => array(
              'is_error' => 0,
              'version' => 3,
              'count' => 1,
              'id' => 1,
              'values' => array(
                  '0' => array(
                      'id' => '1',
                      'contact_id' => '1',
                      'url' => 'http://civicrm.org',
                      'website_type_id' => '',
                    ),
                ),
            ),
          'api.website.create.2' => array(
              'is_error' => 0,
              'version' => 3,
              'count' => 1,
              'id' => 2,
              'values' => array(
                  '0' => array(
                      'id' => '2',
                      'contact_id' => '1',
                      'url' => 'http://chained.org',
                      'website_type_id' => '',
                    ),
                ),
            ),
        ),
    ),
);

  return $expectedResult;
}


/*
* This example has been generated from the API test suite. The test that created it is called
*
* testCreateIndividualWithContributionDottedSyntax and can be found in
* http://svn.civicrm.org/civicrm/trunk/tests/phpunit/CiviTest/api/v3/ContactTest.php
*
* You can see the outcome of the API tests at
* http://tests.dev.civicrm.org/trunk/results-api_v3
*
* To Learn about the API read
* http://book.civicrm.org/developer/current/techniques/api/
*
* and review the wiki at
* http://wiki.civicrm.org/confluence/display/CRMDOC/CiviCRM+Public+APIs
*
* Read more about testing here
* http://wiki.civicrm.org/confluence/display/CRM/Testing
*
* API Standards documentation:
* http://wiki.civicrm.org/confluence/display/CRM/API+Architecture+Standards
*/