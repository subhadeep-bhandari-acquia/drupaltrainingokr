<?php

namespace Drupal\custom_plugin_discovery;

use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Plugin\Discovery\ContainerDerivativeDiscoveryDecorator;
use Drupal\Core\Plugin\Discovery\YamlDiscovery;

/**
 * AcquiaYamlManager class.
 */
class AcquiaYamlManager extends DefaultPluginManager {

  /**
   * AcquiaYamlManager constructor.
   */
  public function __construct(ModuleHandlerInterface $module_handler) {
    $this->moduleHandler = $module_handler;
  }

  /**
   * {@inheritdoc}
   */
  protected function getDiscovery() {
    if (!isset($this->discovery)) {
      $directories = array_map(fn($val) => $val . '/acquia', $this->moduleHandler->getModuleDirectories());
      $yaml_discovery = new YamlDiscovery('acquia', $directories);
      $this->discovery = new ContainerDerivativeDiscoveryDecorator($yaml_discovery);
    }
    return $this->discovery;
  }

  /**
   * {@inheritdoc}
   */
  public function getPlugins() {
    $plugins = [];
    foreach ($this->getDefinitions() as $plugin => $plugin_data) {
      $data['module'] = $plugin_data['provider'];
      $data['id'] = $plugin_data['id'];
      $data['title'] = $plugin_data['title'];
      $plugins[] = $data;
    }

    $header = [
      ['data' => 'Module Name'],
      ['data' => 'Plugin ID'],
      ['data' => 'Plugin Title'],
    ];

    return [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $plugins,
      '#empty' => t('No content has been found.'),
    ];
  }

}
