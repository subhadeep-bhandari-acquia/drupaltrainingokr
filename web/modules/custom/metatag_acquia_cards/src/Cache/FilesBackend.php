<?php

namespace Drupal\metatag_acquia_cards\Cache;

use Drupal\Core\Cache\Cache;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\File\FileSystemInterface;

/**
 * Defines default cache implementation.
 *
 * This is Drupal's default cache implementation. It uses the files to store
 * cached data. Each cache bin corresponds to a directory by the same name.
 *
 * @ingroup cache
 */
class FilesBackend implements CacheBackendInterface {

  /**
   * @var string
   */
  protected string $bin;

  /**
   * @var \Drupal\Core\File\FileSystemInterface
   */
  protected FileSystemInterface $fileSystem;

  /**
   * Constructs a FilesBackendFactory object.
   *
   * @param \Drupal\Core\File\FileSystemInterface $file_system
   *   File System Service.
   * @param string $bin
   *   The cache bin for which the object is created.
   */
  public function __construct(FileSystemInterface $file_system, string $bin) {
    $this->fileSystem = $file_system;
    $this->bin = 'public://cache_files/cache_' . $bin . '/';;
  }

  /**
   * {@inheritdoc}
   */
  public function get($cid, $allow_invalid = FALSE) {
    $data = [];
    $path = $this->bin . $this->sanitizeCacheId($cid) . '.json';
    if (file_exists($path)) {
      $data = file_get_contents($path);
      $data = json_decode($data, true);
    }
    return $data;
  }

  /**
   * {@inheritdoc}
   */
  public function getMultiple(&$cids, $allow_invalid = FALSE) {
  }

  /**
   * {@inheritdoc}
   */
  public function set($cid, $data, $expire = Cache::PERMANENT, array $tags = []) {
    $this->fileSystem->prepareDirectory($this->bin, FileSystemInterface::CREATE_DIRECTORY);
    $destination = $this->fileSystem->createFilename($this->sanitizeCacheId($cid) . '.json', $this->bin);
    foreach ($data as $key => $val) {
      if (!str_contains($key, 'acquia:')) {
        unset($data[$key]);
      }
    }
    $this->fileSystem->saveData(json_encode($data), $destination, FileSystemInterface::EXISTS_REPLACE);
  }

  private function sanitizeCacheId($cid): array|string {
    return str_replace(
      ['https:', 'http:', '/'],
      ['', '', ''],
      $cid
    );
  }

  /**
   * {@inheritdoc}
   */
  public function setMultiple(array $items) {}

  /**
   * {@inheritdoc}
   */
  public function delete($cid) {}

  /**
   * {@inheritdoc}
   */
  public function deleteMultiple(array $cids) {}

  /**
   * {@inheritdoc}
   */
  public function deleteAll() {}

  /**
   * {@inheritdoc}
   */
  public function invalidate($cid) {}

  /**
   * {@inheritdoc}
   */
  public function invalidateMultiple(array $cids) {}

  /**
   * {@inheritdoc}
   */
  public function invalidateAll() {}

  /**
   * {@inheritdoc}
   */
  public function garbageCollection() {}

  /**
   * {@inheritdoc}
   */
  public function removeBin() {}

}
