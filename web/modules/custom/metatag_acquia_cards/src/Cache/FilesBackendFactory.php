<?php

namespace Drupal\metatag_acquia_cards\Cache;

use Drupal\Core\Cache\CacheFactoryInterface;
use Drupal\Core\File\FileSystemInterface;

class FilesBackendFactory implements CacheFactoryInterface {

  /**
   * @var \Drupal\Core\File\FileSystemInterface
   */
  protected FileSystemInterface $fileSystem;

  /**
   * Constructs the FilesBackendFactory object.
   *
   * @param \Drupal\Core\File\FileSystemInterface $file_system
   *   File System Service.
   */
  public function __construct(FileSystemInterface $file_system) {
    $this->fileSystem = $file_system;
  }

  /**
   * Gets FilesBackendFactory for the specified cache bin.
   *
   * @param $bin
   *   The cache bin for which the object is created.
   *
   * @return \Drupal\metatag_acquia_cards\Cache\FilesBackend
   *   The cache backend object for the specified cache bin.
   */
  public function get($bin) {
    return new FilesBackend($this->fileSystem, $bin);
  }

}
