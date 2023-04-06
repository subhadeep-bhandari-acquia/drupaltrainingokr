<?php

namespace Drupal\acquia_twitter_card\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the formatter 'metatag_formatter'.
 *
 * @FieldFormatter(
 *   id = "metatag_formatter",
 *   label = @Translation("Metatag Twitter Cards"),
 *   field_types = {
 *     "text_with_summary"
 *   }
 * )
 */
class MetatagFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode): array {
    $element = [];

    foreach ($items as $delta => $item) {
      $twitter_metadata = \Drupal::service('acquia_twitter_card.get_metatags')->getMetatags($item->value);

      $element[$delta] = $twitter_metadata;
    }

    return $element;
  }

}
