<?php
/*
 +--------------------------------------------------------------------+
 | CiviCRM version 5                                                  |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2018                                |
 +--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +--------------------------------------------------------------------+
*/

/**
 * CiviCRM Configuration File.
 */
global $civicrm_root, $civicrm_setting, $civicrm_paths;

/**
 * Content Management System (CMS) Host:
 *
 * CiviCRM can be hosted in either Drupal 6 or 7, Joomla or WordPress.
 *
 * Settings for Backdrop CMS:
 *      define( 'CIVICRM_UF'        , 'Backdrop');
 *
 * Settings for Drupal 7.x:
 *      define( 'CIVICRM_UF'        , 'Drupal');
 *
 * Settings for Drupal 6.x:
 *      define( 'CIVICRM_UF'        , 'Drupal6');
 *
 * Settings for Joomla 1.7.x - 2.5.x:
 *      define( 'CIVICRM_UF'        , 'Joomla');
 *
 * Settings for WordPress 3.3.x:
 *      define( 'CIVICRM_UF'        , 'WordPress');
 *
 * You may have issues with images in CiviCRM. If this is the case, be sure
 * to update the CiviCRM Resource URL field to your CiviCRM root directory
 * (Administer::System Settings::Resource URLs).
 */
if (!defined('CIVICRM_UF')) {
  if (getenv('CIVICRM_UF')) {
    define('CIVICRM_UF', getenv('CIVICRM_UF'));
  }
  else {
    define('CIVICRM_UF', 'Drupal');
  }
}

/**
* Pantheon:
* Populate needed variables based on the Pantheon environment.
*/
if (!empty($_SERVER['PRESSFLOW_SETTINGS'])) {
  $env = json_decode($_SERVER['PRESSFLOW_SETTINGS'], TRUE);
  if (!empty($env['conf']['pantheon_binding'])) {
    $pantheon_db = $env['databases']['default']['default'];
    $pantheon_conf = $env['conf'];

    // Database Username and Password
    $pantheon_db_string = $pantheon_db['driver'] . '://' . $pantheon_db['username'] . ':' . $pantheon_db['password'] . '@';
    // Host
    $pantheon_db_string .= 'dbserver.' . $pantheon_conf['pantheon_environment'] . '.' . $pantheon_conf['pantheon_site_uuid'] . '.drush.in' . ':' . $pantheon_db['port'];
    // Database
    $pantheon_db_string .= '/' . $pantheon_db['database'] . '?new_link=true';
  }
}

/**
 * Content Management System (CMS) Datasource:
 *
 * Update this setting with your CMS (Drupal, Backdrop CMS, or Joomla) database username, password, server and DB name.
 * If any of these contain a single quote or backslash, escape those characters with a backslash: \' and \\, respectively.
 *
 * Datasource (DSN) format:
 *      define( 'CIVICRM_UF_DSN', 'mysql://cms_db_username:cms_db_password@db_server/cms_database?new_link=true');
 */
if (!defined('CIVICRM_UF_DSN') && CIVICRM_UF !== 'UnitTests') {
  if (isset($pantheon_conf)) {
    define('CIVICRM_UF_DSN', $pantheon_db_string);
  } else {
    define( 'CIVICRM_UF_DSN', 'mysql://cms_db_username:cms_db_password@db_server/cms_database?new_link=true');
  }
}

// %%extraSettings%%

/**
 * CiviCRM Database Settings
 *
 * Database URL (CIVICRM_DSN) for CiviCRM Data:
 * Database URL format:
 *      define( 'CIVICRM_DSN', 'mysql://crm_db_username:crm_db_password@db_server/crm_database?new_link=true');
 *
 * Drupal and CiviCRM can share the same database, or can be installed into separate databases.
 * Backdrop CMS and CiviCRM can also share the same database, or can be installed into separate databases.
 *
 * EXAMPLE: Drupal/Backdrop and CiviCRM running in the same database...
 *      DB Name = cms, DB User = cms
 *      define( 'CIVICRM_DSN'         , 'mysql://cms:YOUR_PASSWORD@localhost/cms?new_link=true');
 *
 * EXAMPLE: Drupal/Backdrop and CiviCRM running in separate databases...
 *      CMS DB Name = cms, DB User = cms
 *      CiviCRM DB Name = civicrm, CiviCRM DB User = civicrm
 *      define( 'CIVICRM_DSN'         , 'mysql://civicrm:YOUR_PASSWORD@localhost/civicrm?new_link=true');
 *
 * If your username, password, server or DB name contain a single quote or backslash, escape those characters
 * with a backslash: \' and \\, respectively.
 *
 */
if (!defined('CIVICRM_DSN')) {
  if (CIVICRM_UF === 'UnitTests' && isset($GLOBALS['_CV']['TEST_DB_DSN'])) {
    define('CIVICRM_DSN', $GLOBALS['_CV']['TEST_DB_DSN']);
  }
  if (isset($pantheon_conf)) {
    define('CIVICRM_DSN', $pantheon_db_string);
  }
  else {
    define('CIVICRM_DSN', 'mysql://crm_db_username:crm_db_password@db_server/crm_database?new_link=true');
  }
}

/**
 * CiviCRM DSN Mode
 * Used to determine if you want CiviCRM to automatically change the dsn to mysqli if its avaliable.
 * Uncomment and edit below as necessary
 */
// define ('DB_DSN_MODE', 'auto');


/**
 * CiviCRM Logging Database
 *
 * Used to point to a different database to use for logging (if desired). If unset defaults to equal CIVICRM_DSN.
 * The CIVICRM_DSN user needs to have the rights to modify the below database schema and be able to write to it.
 */
if (!defined('CIVICRM_LOGGING_DSN')) {
  define('CIVICRM_LOGGING_DSN', CIVICRM_DSN);
}

/**
 * File System Paths:
 *
 * $civicrm_root is the file system path on your server where the civicrm
 * code is installed. Use an ABSOLUTE path (not a RELATIVE path) for this setting.
 *
 * CIVICRM_TEMPLATE_COMPILEDIR is the file system path where compiled templates are stored.
 * These sub-directories and files are temporary caches and will be recreated automatically
 * if deleted.
 *
 * IMPORTANT: The COMPILEDIR directory must exist,
 * and your web server must have read/write access to these directories.
 *
 *
 * EXAMPLE - Drupal:
 * If the path to the Drupal home directory is /var/www/htdocs/drupal
 * the $civicrm_root setting would be:
 *      $civicrm_root = '/var/www/htdocs/drupal/sites/all/modules/civicrm/';
 *
 * the CIVICRM_TEMPLATE_COMPILEDIR would be:
 *      define( 'CIVICRM_TEMPLATE_COMPILEDIR', '/var/www/htdocs/drupal/sites/default/files/civicrm/templates_c/');
 *
 * EXAMPLE - Backdrop CMS:
 * If the path to the Backdrop home directory is /var/www/htdocs/backdrop
 * the $civicrm_root setting would be:
 *      $civicrm_root = '/var/www/htdocs/backdrop/modules/civicrm/';
 *
 * the CIVICRM_TEMPLATE_COMPILEDIR would be:
 *      define( 'CIVICRM_TEMPLATE_COMPILEDIR', '/var/www/htdocs/backdrop/files/civicrm/templates_c/');
 *
 * EXAMPLE - Joomla Installations:
 * If the path to the Joomla home directory is /var/www/htdocs/joomla
 * the $civicrm_root setting would be:
 *      $civicrm_root = '/var/www/htdocs/joomla/administrator/components/com_civicrm/civicrm/';
 *
 * the CIVICRM_TEMPLATE_COMPILEDIR would be:
 *      define( 'CIVICRM_TEMPLATE_COMPILEDIR', '/var/www/htdocs/joomla/media/civicrm/templates_c/');
 *
 * EXAMPLE - WordPress Installations:
 * If the path to the WordPress home directory is /var/www/htdocs/wordpress and the path to the plugin directory is /var/www/htdocs/wordpress/wp-content/plugins
 * the $civicrm_root setting would be:
 *      $civicrm_root = '/var/www/htdocs/wordpress/wp-content/plugins/civicrm/civicrm/';
 *
 * the CIVICRM_TEMPLATE_COMPILEDIR would be:
 *      define( 'CIVICRM_TEMPLATE_COMPILEDIR', '/var/www/htdocs/wordpress/wp-content/uploads/civicrm/templates_c/');
 *
 */

global $civicrm_root;

if (isset($pantheon_conf)) {
  $civicrm_root = '/srv/bindings/' . $pantheon_conf['pantheon_binding'] . '/code/profiles/civicrm_starterkit/modules/civicrm';
}
else {
  $civicrm_root = '/full/path/to/modules/civicrm';
}

if (!defined('CIVICRM_TEMPLATE_COMPILEDIR')) {
  if (isset($pantheon_conf)) {
    define('CIVICRM_TEMPLATE_COMPILEDIR', '/srv/bindings/' . $pantheon_conf['pantheon_binding'] . '/tmp/civicrm/templates_c/');
  }
  else {
    define( 'CIVICRM_TEMPLATE_COMPILEDIR', '/full/path/to/files/private/civicrm/templates_c');
  }
}

/**
 * Site URLs:
 *
 * This section defines absolute and relative URLs to access the host CMS (Backdrop, Drupal, or Joomla) resources.
 *
 * IMPORTANT: Trailing slashes should be used on all URL settings.
 *
 *
 * EXAMPLE - Drupal Installations:
 * If your site's home url is http://www.example.com/drupal/
 * these variables would be set as below. Modify as needed for your install.
 *
 * CIVICRM_UF_BASEURL - home URL for your site:
 *      define( 'CIVICRM_UF_BASEURL' , 'http://www.example.com/drupal/');
 *
 * EXAMPLE - Backdrop CMS Installations:
 * If your site's home url is http://www.example.com/backdrop/
 * these variables would be set as below. Modify as needed for your install.
 *
 * CIVICRM_UF_BASEURL - home URL for your site:
 *      define( 'CIVICRM_UF_BASEURL' , 'http://www.example.com/backdrop/');
 *
 * EXAMPLE - Joomla Installations:
 * If your site's home url is http://www.example.com/joomla/
 *
 * CIVICRM_UF_BASEURL - home URL for your site:
 * Administration site:
 *      define( 'CIVICRM_UF_BASEURL' , 'http://www.example.com/joomla/administrator/');
 * Front-end site:
 *      define( 'CIVICRM_UF_BASEURL' , 'http://www.example.com/joomla/');
 *
 */
if (!defined('CIVICRM_UF_BASEURL')) {
  // Detect if is Pantheon server
  if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
    define('CIVICRM_UF_BASEURL', $_SERVER['HTTP_X_FORWARDED_PROTO'] . '://' . $_SERVER['HTTP_X_FORWARDED_HOST'] . '/');
  } else {
    define('CIVICRM_UF_BASEURL', $_SERVER['HTTP_X_PROTO'] . $_SERVER['HTTP_HOST'] . '/');
  }
}

/**
 * Provide a default public and private CiviCRM file path on Pantheon.
 *
 * Set [civicrm.files] and [civicrm.private] since Pantheon provides a files/private
 * directory instead of using Apache to set permissions on directories.
 */
global $civicrm_paths;
if (isset($pantheon_conf)) {
  $civicrm_paths['civicrm.files']['path'] = '/srv/bindings/' . $pantheon_conf['pantheon_binding'] . '/files/civicrm';
  $civicrm_paths['civicrm.files']['url'] = CIVICRM_UF_BASEURL . 'sites/default/files/civicrm/';

  $civicrm_paths['civicrm.private']['path'] = '/srv/bindings/' . $pantheon_conf['pantheon_binding'] . '/files/private/civicrm';
  $civicrm_paths['civicrm.private']['url'] = CIVICRM_UF_BASEURL . 'sites/default/files/private/civicrm/';
} else {
  $civicrm_paths['civicrm.files']['path'] = 'path/to/files/civicrm';
  $civicrm_paths['civicrm.files']['url'] = CIVICRM_UF_BASEURL . 'sites/default/files/civicrm/';

  $civicrm_paths['civicrm.private']['path'] = '/path/to/files/private/civicrm';
  $civicrm_paths['civicrm.private']['url'] = CIVICRM_UF_BASEURL . 'sites/default/files/private/civicrm/';
}

/**
 * Define any CiviCRM Settings Overrides per http://wiki.civicrm.org/confluence/display/CRMDOC/Override+CiviCRM+Settings
 *
 * Uncomment and edit the below as appropriate.
 */

/**
 * Override File directories and URLs.
 */
if (isset($pantheon_conf)) {
  // Override the Temporary Files directory.
  $civicrm_setting['Directory Preferences']['uploadDir'] = '[civicrm.private]/upload/';

  // Override the Custom Files Upload directory.
  $civicrm_setting['Directory Preferences']['customFileUploadDir'] = '[civicrm.private]/custom/';

  // Override the Images directory.
  $civicrm_setting['Directory Preferences']['imageUploadDir'] = '[civicrm.files]/persist/contribute/';

  // Override the Image Upload URL (System Settings > Resource URLs)
  $civicrm_setting['URL Preferences']['imageUploadURL'] = '[civicrm.files]/persist/contribute/';
} else {
  // Override the Temporary Files directory.
  $civicrm_setting['Directory Preferences']['uploadDir'] = '/path/to/upload-dir';

  // Override the Custom Files Upload directory.
  $civicrm_setting['Directory Preferences']['customFileUploadDir'] = '/path/to/custom-dir';

  // Override the Images directory.
  $civicrm_setting['Directory Preferences']['imageUploadDir'] = '/path/to/image-upload-dir';

  // Override the Image Upload URL (System Settings > Resource URLs)
  $civicrm_setting['URL Preferences']['imageUploadURL'] = 'http://example.com/example-image-upload-url';
}

/**
 * Override the Resource URL
 */
if (isset($pantheon_conf)) {
  $civicrm_setting['URL Preferences']['userFrameworkResourceURL'] = '[civicrm.root]';
} else {
  $civicrm_setting['URL Preferences']['userFrameworkResourceURL'] = 'http://example.com/example-resource-url/';
}

/**
 * Extensions
 */
if (isset($pantheon_conf)) {
  // Override the Extensions directory.
  $civicrm_setting['Directory Preferences']['extensionsDir'] = '[cms.root]/sites/all/extensions/';

  // Override the Extensions Resource URL
  $civicrm_setting['URL Preferences']['extensionsURL'] = '[cms.root]/sites/all/extensions';

  // Disable automatic download / installation of Extensions on live
  if (isset($pantheon_conf) && ($pantheon_conf['pantheon_environment'] == 'live')) {
    $civicrm_setting['Extension Preferences']['ext_repo_url'] = false;
  }
} else {
  // Override the Extensions directory.
  $civicrm_setting['Directory Preferences']['extensionsDir'] = '/path/to/extensions-dir';

  // Override the Extensions Resource URL
  $civicrm_setting['URL Preferences']['extensionsURL'] = 'http://example.com/pathtoextensiondir';

  // Disable automatic download / installation of Extensions
  $civicrm_setting['Extension Preferences']['ext_repo_url'] = false;
}

/**
 * Custom Template and PHP files.
 */
if (isset($pantheon_conf)) {
  // Override the Custom Templates directory
  $civicrm_setting['Directory Preferences']['customTemplateDir'] = '[cms.root]/sites/all/civicrm_custom/custom_templates/';

  // Override the Custom PHP directory
  $civicrm_setting['Directory Preferences']['customPHPPathDir'] = '[cms.root]/sites/all/civicrm_custom/custom_php/';
} else {
  // Override the Custom Templates directory
  $civicrm_setting['Directory Preferences']['customTemplateDir'] = '/path/to/template-dir';

  // Override the Custom PHP directory
  $civicrm_setting['Directory Preferences']['customPHPPathDir'] = '/path/to/custom-php-dir';
}

/**
 * Hardcode other settings.
 */

// Override the Custom CiviCRM CSS URL (OPTIONAL).
if (isset($pantheon_conf)) {
  // $civicrm_setting['URL Preferences']['customCSSURL'] = '[cms.root]/sites/all/themes/EXAMPLETHEME/css/civicrm.css';
} else {
  // $civicrm_setting['URL Preferences']['customCSSURL'] = 'http://example.com/example-css-url';
}

// Disable display of Community Messages on home dashboard (OPTIONAL).
// $civicrm_setting['CiviCRM Preferences']['communityMessagesUrl'] = false;

// set triggers to be managed offline per CRM-18212 (OPTIONAL).
// $civicrm_setting['CiviCRM Preferences']['logging_no_trigger_permission'] = 1;

// Override the CMS root path defined by cmsRootPath.
// define('CIVICRM_CMSDIR', '/path/to/install/root/');

// Opt-out of announcements by the CiviCRM core team for releases, paid services, events, etc. Separate each preferred optout category with a comma:
//   "offers": paid service offers
//   "asks": requests for donations or membership signup/renewal to CiviCRM
//   "releases": major release announcements
//   "events": announcements of local/national upcoming events
// $civicrm_setting['CiviCRM Preferences']['communityMessagesUrl'] = 'https://alert.civicrm.org/alert?prot=1&ver={ver}&uf={uf}&sid={sid}&lang={lang}&co={co}&optout=offers,asks';


/**
 * If you are using any CiviCRM script in the bin directory that
 * requires authentication, then you also need to set this key.
 * We recommend using a 16-32 bit alphanumeric/punctuation key.
 * More info at http://wiki.civicrm.org/confluence/display/CRMDOC/Command-line+Script+Configuration
 */
if (!defined('CIVICRM_SITE_KEY')) {
  define( 'CIVICRM_SITE_KEY', '%%siteKey%%');
}

/**
 * Enable this constant, if you want to send your email through the smarty
 * templating engine(allows you to do conditional and more complex logic)
 *
 */
if (!defined('CIVICRM_MAIL_SMARTY')) {
  define( 'CIVICRM_MAIL_SMARTY', 0 );
}

/**
 * This setting logs all emails to a file. Useful for debugging any mail (or civimail) issues.
 * Enabling this setting will not send any email, ensure this is commented out in production
 * The CIVICRM_MAIL_LOG is a debug option which disables MTA (mail transport agent) interaction.
 * You must disable CIVICRM_MAIL_LOG before CiviCRM will talk to your MTA.
 */

// Pantheon: if it's not the live site then send all emails to a log file
if (isset($pantheon_conf) && $pantheon_conf['pantheon_environment'] != 'live') {
  define('CIVICRM_MAIL_LOG', '[civicrm.private]/ConfigAndLog/mail.log');
}

// if (!isset($pantheon_conf) && !defined('CIVICRM_MAIL_LOG')) {
//   define( 'CIVICRM_MAIL_LOG', '/full/path/to/files/civicrm/ConfigAndLog/mail.log');
// }


if (!defined('CIVICRM_DOMAIN_ID')) {
  define( 'CIVICRM_DOMAIN_ID', 1);
}

/**
 * Setting to define the environment in which this CiviCRM instance is running.
 * Note the setting here must be value from the option group 'Environment',
 * (see Administration > System Settings > Option Groups, Options beside Environment)
 * which by default has three option values: 'Production', 'Staging', 'Development'.
 * NB: defining a value for environment here prevents it from being set
 * via the browser.
 */
$civicrm_setting['domain']['environment'] = 'Development';
if (defined('PANTHEON_ENVIRONMENT')) {
  if (PANTHEON_ENVIRONMENT == 'live') {
    $civicrm_setting['domain']['environment'] = 'Production';
  } elseif (PANTHEON_ENVIRONMENT == 'test') {
    $civicrm_setting['domain']['environment'] = 'Staging';
  }
}

/**
 * Settings to enable external caching using a cache server.  This is an
 * advanced feature, and you should read and understand the documentation
 * before you turn it on. We cannot store these settings in the DB since the
 * config could potentially also be cached and we need to avoid an infinite
 * recursion scenario.
 *
 * @see http://civicrm.org/node/126
 */

/**
 * If you have a cache server configured and want CiviCRM to make use of it,
 * set the following constant.  You should only set this once you have your cache
 * server up and working, because CiviCRM will not start up if your server is
 * unavailable on the host and port that you specify. By default CiviCRM will use
 * an in-memory array cache
 *
 * To use the php extension memcache  use a value of 'Memcache'
 * To use the php extension memcached use a value of 'Memcached'
 * To use the php extension apc       use a value of 'APCcache'
 * To use the php extension redis     use a value of 'Redis'
 * To not use any caching (not recommended), use a value of 'NoCache'
 *
 */

if (isset($pantheon_conf['redis_client_host']) && !empty($pantheon_conf['redis_client_host'])) {
  define('CIVICRM_DB_CACHE_CLASS', 'Redis');
  define('CIVICRM_DB_CACHE_HOST', $pantheon_conf['redis_client_host']);
  define('CIVICRM_DB_CACHE_PORT', $pantheon_conf['redis_client_port']);
  define('CIVICRM_DB_CACHE_PASSWORD', $pantheon_conf['redis_client_password']);
  define('CIVICRM_DB_CACHE_TIMEOUT', 3600);
  define('CIVICRM_DB_CACHE_PREFIX', 'pantheon-redis-civicrm:');

}
else {

  if (!defined('CIVICRM_DB_CACHE_CLASS')) {
    define('CIVICRM_DB_CACHE_CLASS', 'ArrayCache');
  }

  /**
  * Change this to the IP address of your cache server if it is not on the
  * same machine (Unix).
  */
  if (!defined('CIVICRM_DB_CACHE_HOST')) {
    define('CIVICRM_DB_CACHE_HOST', 'localhost');
  }

  /**
  * Change this if you are not using the standard port for your cache server.
  *
  * The standard port for Memcache & APCCache is 11211. For Redis it is 6379.
  */
  /**
   * Change this if you are not using the standard port for your cache server.
   *
   * The standard port for Memcache & APCCache is 11211. For Redis it is 6379.
   */
  if (!defined('CIVICRM_DB_CACHE_PORT')) {
    if (CIVICRM_DB_CACHE_CLASS === 'Redis') {
      define('CIVICRM_DB_CACHE_PORT', 6379 );
    }
    else {
      define('CIVICRM_DB_CACHE_PORT', 11211);
    }
  }

  /**
  * Change this if your cache server requires a password (currently only works
  * with Redis)
  */
  if (!defined('CIVICRM_DB_CACHE_PASSWORD')) {
    define('CIVICRM_DB_CACHE_PASSWORD', '' );
  }

  /**
  * Items in cache will expire after the number of seconds specified here.
  * Default value is 3600 (i.e., after an hour)
  */
  if (!defined('CIVICRM_DB_CACHE_TIMEOUT')) {
    define('CIVICRM_DB_CACHE_TIMEOUT', 3600 );
  }

  /**
  * If you are sharing the same cache instance with more than one CiviCRM
  * database, you will need to set a different value for the following argument
  * so that each copy of CiviCRM will not interfere with other copies.  If you only
  * have one copy of CiviCRM, you may leave this set to ''.  A good value for
  * this if you have two servers might be 'server1_' for the first server, and
  * 'server2_' for the second server.
  */
  if (!defined('CIVICRM_DB_CACHE_PREFIX')) {
    define('CIVICRM_DB_CACHE_PREFIX', '');
  }

} // end Pantheon Redis check

/**
 * The cache system traditionally allowed a wide range of cache-keys, but some
 * cache-keys are prohibited by PSR-16.
 */
if (!defined('CIVICRM_PSR16_STRICT')) {
  define('CIVICRM_PSR16_STRICT', FALSE);
}

/**
 * If you have multilingual site and you are using the "inherit CMS language"
 * configuration option, but wish to, for example, use fr_CA instead of the
 * default fr_FR (for French), set one or more of the constants below to an
 * appropriate regional value.
 */
// define('CIVICRM_LANGUAGE_MAPPING_FR', 'fr_CA');
// define('CIVICRM_LANGUAGE_MAPPING_EN', 'en_CA');
// define('CIVICRM_LANGUAGE_MAPPING_ES', 'es_MX');
// define('CIVICRM_LANGUAGE_MAPPING_PT', 'pt_BR');
// define('CIVICRM_LANGUAGE_MAPPING_ZH', 'zh_TW');

/**
 * Native gettext improves performance of localized CiviCRM installations
 * significantly. However, your host must enable the locale (language).
 * On most GNU/Linux, Unix or MacOSX systems, you may view them with
 * the command line by typing: "locale -a".
 *
 * On Debian or Ubuntu, you may reconfigure locales with:
 * # dpkg-reconfigure locales
 *
 * For more information:
 * http://wiki.civicrm.org/confluence/x/YABFBQ
 */
// if (!defined('CIVICRM_GETTEXT_NATIVE')) {
// define('CIVICRM_GETTEXT_NATIVE', 1);
// }

/**
 * Configure MySQL to throw more errors when encountering unusual SQL expressions.
 *
 * If undefined, the value is determined automatically. For CiviCRM tarballs, it defaults
 * to FALSE; for SVN checkouts, it defaults to TRUE.
 */
// if (!defined('CIVICRM_MYSQL_STRICT')) {
// define('CIVICRM_MYSQL_STRICT', TRUE );
// }

if (CIVICRM_UF === 'UnitTests') {
  if (!defined('CIVICRM_CONTAINER_CACHE')) define('CIVICRM_CONTAINER_CACHE', 'auto');
  if (!defined('CIVICRM_MYSQL_STRICT')) define('CIVICRM_MYSQL_STRICT', true);
}

/**
 *
 * Do not change anything below this line. Keep as is
 *
 */

$include_path = '.'           . PATH_SEPARATOR .
                $civicrm_root . PATH_SEPARATOR .
                $civicrm_root . DIRECTORY_SEPARATOR . 'packages' . PATH_SEPARATOR .
                get_include_path( );
if ( set_include_path( $include_path ) === false ) {
   echo "Could not set the include path<p>";
   exit( );
}

if (!defined('CIVICRM_CLEANURL')) {
  if ( function_exists('variable_get') && variable_get('clean_url', '0') != '0') {
    define('CIVICRM_CLEANURL', 1 );
  }
  elseif ( function_exists('config_get') && config_get('system.core', 'clean_url') != 0) {
    define('CIVICRM_CLEANURL', 1 );
  }
  else {
    define('CIVICRM_CLEANURL', 0);
  }
}

// force PHP to auto-detect Mac line endings
ini_set('auto_detect_line_endings', '1');

// make sure the memory_limit is at least 64 MB
$memLimitString = trim(ini_get('memory_limit'));
$memLimitUnit   = strtolower(substr($memLimitString, -1));
$memLimit       = (int) $memLimitString;
switch ($memLimitUnit) {
    case 'g': $memLimit *= 1024;
    case 'm': $memLimit *= 1024;
    case 'k': $memLimit *= 1024;
}
if ($memLimit >= 0 and $memLimit < 134217728) {
    ini_set('memory_limit', '128M');
}

require_once 'CRM/Core/ClassLoader.php';
CRM_Core_ClassLoader::singleton()->register();
