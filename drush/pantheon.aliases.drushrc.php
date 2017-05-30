<?php
  /**
   * Pantheon drush alias file, to be placed in your ~/.drush directory or the aliases
   * directory of your local Drush home. Once it's in place, clear drush cache:
   *
   * drush cc drush
   *
   * To see all your available aliases:
   *
   * drush sa
   *
   * See http://helpdesk.getpantheon.com/customer/portal/articles/411388 for details.
   */

  $aliases['onboarding-events-project.test'] = array(
    'uri' => 'test-onboarding-events-project.pantheonsite.io',
    'db-url' => 'mysql://pantheon:d49d20e8ce10441e881d96f06e875649@dbserver.test.146f290f-c9cc-4cd5-8785-83d7258cb930.drush.in:27535/pantheon',
    'db-allows-remote' => TRUE,
    'remote-host' => 'appserver.test.146f290f-c9cc-4cd5-8785-83d7258cb930.drush.in',
    'remote-user' => 'test.146f290f-c9cc-4cd5-8785-83d7258cb930',
    'ssh-options' => '-p 2222 -o "AddressFamily inet"',
    'path-aliases' => array(
      '%files' => 'code/sites/default/files',
      '%drush-script' => 'drush',
     ),
  );
  $aliases['onboarding-events-project.dev'] = array(
    'uri' => 'dev-onboarding-events-project.pantheonsite.io',
    'db-url' => 'mysql://pantheon:3a2590eaa77440838d0b967a6baf9d36@dbserver.dev.146f290f-c9cc-4cd5-8785-83d7258cb930.drush.in:19644/pantheon',
    'db-allows-remote' => TRUE,
    'remote-host' => 'appserver.dev.146f290f-c9cc-4cd5-8785-83d7258cb930.drush.in',
    'remote-user' => 'dev.146f290f-c9cc-4cd5-8785-83d7258cb930',
    'ssh-options' => '-p 2222 -o "AddressFamily inet"',
    'path-aliases' => array(
      '%files' => 'code/sites/default/files',
      '%drush-script' => 'drush',
     ),
  );
  $aliases['onboarding-events-project.live'] = array(
    'uri' => 'live-onboarding-events-project.pantheonsite.io',
    'db-url' => 'mysql://pantheon:3a8219a6450f46859976b153a41527f3@dbserver.live.146f290f-c9cc-4cd5-8785-83d7258cb930.drush.in:19858/pantheon',
    'db-allows-remote' => TRUE,
    'remote-host' => 'appserver.live.146f290f-c9cc-4cd5-8785-83d7258cb930.drush.in',
    'remote-user' => 'live.146f290f-c9cc-4cd5-8785-83d7258cb930',
    'ssh-options' => '-p 2222 -o "AddressFamily inet"',
    'path-aliases' => array(
      '%files' => 'code/sites/default/files',
      '%drush-script' => 'drush',
     ),
  );
