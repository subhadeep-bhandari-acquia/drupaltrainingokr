<?php

namespace Drupal\custom_plugin_discovery\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Plugin Discovery Controller class.
 */
class PluginDiscovery extends ControllerBase {

  /**
   * Lists all the acquia plugins present under acquia folder.
   *
   * @return array
   *   The plugins data.
   */
  public function discover() {
    $data = \Drupal::service('plugin.manager.custom_plugin_discovery.acquia_yaml')->getPlugins();
    return $data;
  }

}
