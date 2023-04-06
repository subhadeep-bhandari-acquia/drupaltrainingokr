<?php

namespace Drupal\acquia_twitter_card\Service;

use Drupal\Core\Field\FieldItemListInterface;

/**
 * Service implementation of the formatter 'metatag_formatter'.
 */
class GetMetatags {

  /**
   * {@inheritdoc}
   */
  public function getMetatags($content): array {
    $element = [];

    $reg_url = '/https?\:\/\/[^\" ]+/i';
    preg_match_all($reg_url, $content, $urls);
    if ($urls) {
      $meta_tags = \Drupal::cache('acquia_cards_metatag_storage')->get($urls[0][0]);
      if (empty($meta_tags)) {
        $meta_tags = get_meta_tags($urls[0][0]);
        \Drupal::cache('acquia_cards_metatag_storage')->set($urls[0][0], $meta_tags);
      }
      $twitter_metadata = [
        'desc' => $meta_tags['acquia:desc'],
        'title' => $meta_tags['acquia:title'],
        'image' => $meta_tags['acquia:image'],
      ];

      $element = [
        '#theme' => 'acquia_twitter_card',
        '#twitter_metadata' => $twitter_metadata,
      ];
    }

    return $element;
  }

}
