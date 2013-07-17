; This version of the .make will build a local copy of the distribution
; using the versions of modules and patches listed.
; Modules and libraries will be in sites/all 
; This is used to test the packaging BEFORE committing
; drush make civicrm_starterkit.make

core = 7.22
api = 2

; Drupal Core
projects[drupal][version] = "7.22"

; ====== CIVICRM RELATED =========

libraries[civicrm][download][type] = get
libraries[civicrm][download][url] = "http://downloads.civicrm.org/civicrm-4.3.5-starterkit.tgz"
libraries[civicrm][destination] = modules
libraries[civicrm][directory_name] = civicrm

;PATCHES THAT SHOULD BE ADDRESSED IN FUTURE CIVICRM RELEASES
libraries[civicrm][patch][1844558] = http://drupal.org/files/1844558-run-civicrm-from-profile-dir-config-2.patch
libraries[civicrm][patch][1940074] = http://drupal.org/files/1940074-openFlashChart_tpl_javascript-4.patch
libraries[civicrm][patch][1967972] = http://drupal.org/files/1967972-bootsrap-fixes.patch

;PANTHEON RELATED PATCHES
libraries[civicrm][patch][1978142] = http://drupal.org/files/1978142-pantheon-settings-11.patch
libraries[civicrm][patch][1978796] = http://drupal.org/files/1978796-session.save-as_file.patch
libraries[civicrm][patch][1978838] =  http://drupal.org/files/1978838-pre-populate-db-settings.patch

;IMPROVING PROFILE INSTALL UX WHEN INSTALLING FROM A PROFILE
libraries[civicrm][patch][1849424] = http://drupal.org/files/1849424-use-vars-in-link.patch
libraries[civicrm][patch][] = http://drupal.org/files/1849424-pass-vars-in-link-2.patch

;PATCHES THAT ADD LIBRARIES BACK
libraries[jquery][download][type] = get
libraries[jquery][download][url] = "http://code.jquery.com/jquery-1.8.3.min.js"
libraries[jquery][destination] = "modules/civicrm/packages"
libraries[jquery][directory_name] = jquery
libraries[jquery][download][filename] = jquery-1.8.3.min.js
libraries[jquery][patch][1787976] = http://drupal.org/files/1787976-jquery-missing-files-11.patch
libraries[jquery][patch][] = http://drupal.org/files/1787976-updated-fo-4-3-3.patch
libraries[jquery][patch][] = http://drupal.org/files/textarearesizer-4.patch
; JQuery Notify and Validate were whitelisted
libraries[jquery][patch][1950068] = http://drupal.org/files/1950068-jquery-redirect.patch

libraries[jquery_validate][download][type] = get
libraries[jquery_validate][download][url] = "https://raw.github.com/jzaefferer/jquery-validation/1.9.0/jquery.validate.js"
libraries[jquery_validate][destination] = "modules/civicrm/packages/jquery"
libraries[jquery_validate][directory_name] = plugins
libraries[jquery_validate][download][filename] = jquery.validate.js

libraries[jquery_validate_min][download][type] = get
libraries[jquery_validate_min][download][url] = "https://raw.github.com/jzaefferer/jquery-validation/1.9.0/jquery.validate.js"
libraries[jquery_validate_min][destination] = "modules/civicrm/packages/jquery"
libraries[jquery_validate_min][directory_name] = plugins
libraries[jquery_validate_min][download][filename] = jquery.validate.min.js

libraries[jquery_notify][download][type] = get
libraries[jquery_notify][download][url] = "https://raw.github.com/ehynds/jquery-notify/1.5/src/jquery.notify.js"
libraries[jquery_notify][destination] = "modules/civicrm/packages/jquery"
libraries[jquery_notify][directory_name] = plugins
libraries[jquery_notify][download][filename] = jquery.validate.min.js

libraries[jquery_notify_min][download][type] = get
libraries[jquery_notify_min][download][url] = "https://raw.github.com/ehynds/jquery-notify/1.5/src/jquery.notify.min.js"
libraries[jquery_notify_min][destination] = "modules/civicrm/packages/jquery"
libraries[jquery_notify_min][directory_name] = plugins
libraries[jquery_notify_min][download][filename] = jquery.validate.min.js

libraries[jquery_ui][download][type] = get
libraries[jquery_ui][download][url] = "http://jquery-ui.googlecode.com/files/jquery-ui-1.9.0-rc.1.zip"
libraries[jquery_ui][destination] = "modules/civicrm/packages/jquery/jquery-ui-1.9.0"
libraries[jquery_ui][directory_name] = development-bundle

libraries[jstree][download][type] = get
libraries[jstree][download][url] = "https://github.com/vakata/jstree/archive/v.pre1.0.zip"
libraries[jstree][destination] = "modules/civicrm/packages/jquery/plugins"
libraries[jstree][directory_name] = jstree

; THIS IS INSANE!!!  But the alternative is adjust paths w/ patched to core CiviCRM files
; because we need just the files in /lib, this has to be done this way for 40 files in
; https://github.com/PHPIDS/PHPIDS/tree/0.6.5%2Bpl1/lib/IDS
;libraries[phpids][download][type] = get
;libraries[phpids][download][url] = "http://phpids.org/files/phpids-0.7.zip"
;libraries[phpids][destination] = "modules/civicrm/"
;libraries[phpids][directory_name] = IDS
;libraries[phpids][patch][1787984] = http://drupal.org/files/1787984-IDS-directory-fix-IDS.patch
;libraries[civicrm][patch][2010430] = https://drupal.org/files/2010430-htmlpurifier_path.patch
;libraries[civicrm][patch][1946820] = http://drupal.org/files/1946820-turn_IDS_off_in_civicrm.settings.php_.tpl_.patch

; https://github.com/PHPIDS/PHPIDS/tarball/0.6.5%2Bpl1/lib/IDS

libraries[phpids_converter][download][type] = get
libraries[phpids_converter][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Converter.php"
libraries[phpids_converter][download][filename] = Converter.php
libraries[phpids_converter][directory_name] = IDS
libraries[phpids_converter][destination] = "modules/civicrm/packages"

libraries[phpids_event][download][type] = get
libraries[phpids_event][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Event.php"
libraries[phpids_event][download][filename] = Event.php
libraries[phpids_event][directory_name] = IDS
libraries[phpids_event][destination] = "modules/civicrm/packages"

libraries[phpids_filter][download][type] = get
libraries[phpids_filter][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Filter.php"
libraries[phpids_filter][download][filename] = Filter.php
libraries[phpids_filter][directory_name] = IDS
libraries[phpids_filter][destination] = "modules/civicrm/packages"

libraries[phpids_init][download][type] = get
libraries[phpids_init][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Init.php"
libraries[phpids_init][download][filename] = Init.php
libraries[phpids_init][directory_name] = IDS
libraries[phpids_init][destination] = "modules/civicrm/packages"

libraries[phpids_monitor][download][type] = get
libraries[phpids_monitor][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Monitor.php"
libraries[phpids_monitor][download][filename] = Monitor.php
libraries[phpids_monitor][directory_name] = IDS
libraries[phpids_monitor][destination] = "modules/civicrm/packages"

libraries[phpids_report][download][type] = get
libraries[phpids_report][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Report.php"
libraries[phpids_report][download][filename] = Report.php
libraries[phpids_report][directory_name] = IDS
libraries[phpids_report][destination] = "modules/civicrm/packages"

libraries[phpids_version][download][type] = get
libraries[phpids_version][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Version.php"
libraries[phpids_version][download][filename] = Version.php
libraries[phpids_version][directory_name] = IDS
libraries[phpids_version][destination] = "modules/civicrm/packages"

libraries[phpids_default_filter_json][download][type] = get
libraries[phpids_default_filter_json][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/default_filter.json"
libraries[phpids_default_filter_json][download][filename] = default_filter.json
libraries[phpids_default_filter_json][directory_name] = IDS
libraries[phpids_default_filter_json][destination] = "modules/civicrm/packages"

libraries[phpids_default_filter_xml][download][type] = get
libraries[phpids_default_filter_xml][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/default_filter.xml"
libraries[phpids_default_filter_xml][download][filename] = default_filter.xml
libraries[phpids_default_filter_xml][directory_name] = IDS
libraries[phpids_default_filter_xml][destination] = "modules/civicrm/packages"

; Caching
libraries[phpids_apc][download][type] = get
libraries[phpids_apc][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Caching/Apc.php"
libraries[phpids_apc][download][filename] = Apc.php
libraries[phpids_apc][directory_name] = Caching
libraries[phpids_apc][destination] = "modules/civicrm/packages/IDS"

libraries[phpids_database][download][type] = get
libraries[phpids_database][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Caching/Database.php"
libraries[phpids_database][download][filename] = Database.php
libraries[phpids_database][directory_name] = Caching
libraries[phpids_database][destination] = "modules/civicrm/packages/IDS"

libraries[phpids_factory][download][type] = get
libraries[phpids_factory][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Caching/Factory.php"
libraries[phpids_factory][download][filename] = Factory.php
libraries[phpids_factory][directory_name] = Caching
libraries[phpids_factory][destination] = "modules/civicrm/packages/IDS"

libraries[phpids_file][download][type] = get
libraries[phpids_file][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Caching/File.php"
libraries[phpids_file][download][filename] = File.php
libraries[phpids_file][directory_name] = Caching
libraries[phpids_file][destination] = "modules/civicrm/packages/IDS"

libraries[phpids_interface][download][type] = get
libraries[phpids_interface][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Caching/Interface.php"
libraries[phpids_interface][download][filename] = Interface.php
libraries[phpids_interface][directory_name] = Caching
libraries[phpids_interface][destination] = "modules/civicrm/packages/IDS"

libraries[phpids_memcached][download][type] = get
libraries[phpids_memcached][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Caching/Memcached.php"
libraries[phpids_memcached][download][filename] = Memcached.php
libraries[phpids_memcached][directory_name] = Caching
libraries[phpids_memcached][destination] = "modules/civicrm/packages/IDS"

libraries[phpids_session][download][type] = get
libraries[phpids_session][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Caching/Session.php"
libraries[phpids_session][download][filename] = Session.php
libraries[phpids_session][directory_name] = Caching
libraries[phpids_session][destination] = "modules/civicrm/packages/IDS"

; Config
;libraries[phpids_config][download][type] = get
;libraries[phpids_config][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Config/Config.ini.php"
;libraries[phpids_config][download][filename] = Config.ini.php
;libraries[phpids_config][directory_name] = Config
;libraries[phpids_config][destination] = "modules/civicrm/packages/IDS"

; Filter
libraries[phpids_filter_storage][download][type] = get
libraries[phpids_filter_storage][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Filter/Storage.php"
libraries[phpids_filter_storage][download][filename] = Storage.php
libraries[phpids_filter_storage][directory_name] = Filter
libraries[phpids_filter_storage][destination] = "modules/civicrm/packages/IDS"

; Log
libraries[phpids_log_composite][download][type] = get
libraries[phpids_log_composite][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Log/Composite.php"
libraries[phpids_log_composite][download][filename] = Composite.php
libraries[phpids_log_composite][directory_name] = Log
libraries[phpids_log_composite][destination] = "modules/civicrm/packages/IDS"

libraries[phpids_log_database][download][type] = get
libraries[phpids_log_database][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Log/Database.php"
libraries[phpids_log_database][download][filename] = Database.php
libraries[phpids_log_database][directory_name] = Log
libraries[phpids_log_database][destination] = "modules/civicrm/packages/IDS"

libraries[phpids_log_email][download][type] = get
libraries[phpids_log_email][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Log/Email.php"
libraries[phpids_log_email][download][filename] = Email.php
libraries[phpids_log_email][directory_name] = Log
libraries[phpids_log_email][destination] = "modules/civicrm/packages/IDS"

libraries[phpids_log_file][download][type] = get
libraries[phpids_log_file][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Log/File.php"
libraries[phpids_log_file][download][filename] = File.php
libraries[phpids_log_file][directory_name] = Log
libraries[phpids_log_file][destination] = "modules/civicrm/packages/IDS"

libraries[phpids_log_interface][download][type] = get
libraries[phpids_log_interface][download][url] = "https://raw.github.com/PHPIDS/PHPIDS/0.6.5%2Bpl1/lib/IDS/Log/Interface.php"
libraries[phpids_log_interface][download][filename] = Interface.php
libraries[phpids_log_interface][directory_name] = Log
libraries[phpids_log_interface][destination] = "modules/civicrm/packages/IDS"

; tmp
; not sure we need this



; http://htmlpurifier.org/releases/htmlpurifier-4.5.0-standalone.tar.gz
; http://repo.or.cz/w/htmlpurifier.git/snapshot/33a1efbb2d6e234c0143523e9273afec8b84ce8d.tar.gz

libraries[htmlpurifier][download][type] = get
libraries[htmlpurifier][download][url] = "http://repo.or.cz/w/htmlpurifier.git/snapshot/33a1efbb2d6e234c0143523e9273afec8b84ce8d.tar.gz"
libraries[htmlpurifier][destination] = "modules/civicrm/packages/IDS/vendors"
libraries[htmlpurifier][directory_name] = htmlpurifier

libraries[dompdf][download][type] = get
libraries[dompdf][download][url] = "http://dompdf.googlecode.com/files/dompdf_0-6-0_beta3.tar.gz"
libraries[dompdf][destination] = "modules/civicrm/packages"
libraries[dompdf][directory_name] = dompdf

; CKEDitor and TinyMCE are included twice... really need to change that
; with a patch that allows CiviCRM to use sites/all/libraries

libraries[ckeditor-civicrm][download][type] = get
libraries[ckeditor-civicrm][download][url] = "http://download.cksource.com/CKEditor/CKEditor/CKEditor%203.6.2/ckeditor_3.6.2.tar.gz"
libraries[ckeditor-civicrm][destination] = "modules/civicrm/packages"
libraries[ckeditor-civicrm][directory_name] = ckeditor

libraries[tinymce-civicrm][download][type] = get
libraries[tinymce-civicrm][download][url] = "https://github.com/downloads/tinymce/tinymce/tinymce_3.4.8.zip"
libraries[tinymce-civicrm][destination] = "modules/civicrm/packages"
libraries[tinymce-civicrm][directory_name] = tinymce


; ====== POPULAR CONTRIB MODULES =========

projects[backup_migrate][subdir] = "contrib"
projects[backup_migrate][version] = "2.7"

projects[civicrm_cron][subdir] = "contrib"
projects[civicrm_cron][version] = "2.0-beta1"

projects[ctools][subdir] = "contrib"
projects[ctools][version] = "1.3"

projects[captcha][subdir] = "contrib"
projects[captcha][version] = "1.0"

projects[features][subdir] = "contrib"
projects[features][version] = "2.0-rc1"

projects[fontyourface][subdir] = "contrib"
projects[fontyourface][version] = "2.8"

projects[imce][subdir] = "contrib"
projects[imce][version] = "1.7"

projects[imce_wysiwyg][subdir] = "contrib"
projects[imce_wysiwyg][version] = "1.0"

projects[libraries][subdir] = "contrib"
projects[libraries][version] = "2.1"

projects[recaptcha][subdir] = "contrib"
projects[recaptcha][version] = "1.9"

projects[views][subdir] = "contrib"
projects[views][version] = "3.7"

projects[webform][subdir] = "contrib"
projects[webform][version] = "3.19"

projects[webform_civicrm][subdir] = "contrib"
projects[webform_civicrm][version] = "3.5"

projects[wysiwyg][subdir] = "contrib"
projects[wysiwyg][version] = "2.2"


; ====== DRUPAL LIBRARIES =========

libraries[ckeditor][download][type] = get
libraries[ckeditor][download][url] = "http://download.cksource.com/CKEditor/CKEditor/CKEditor%203.6.2/ckeditor_3.6.2.tar.gz"
libraries[ckeditor][destination] = libraries
libraries[ckeditor][directory_name] = ckeditor

libraries[tinymce][download][type] = get
libraries[tinymce][download][url] = "https://github.com/downloads/tinymce/tinymce/tinymce_3.5.8.zip"
libraries[tinymce][destination] = libraries
libraries[tinymce][directory_name] = tinymce