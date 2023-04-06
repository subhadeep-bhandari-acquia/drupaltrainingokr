<?php

namespace Drupal\metatag_acquia_cards\Plugin\metatag\Tag;

use Drupal\metatag\Plugin\metatag\Tag\MetaNameBase;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * The Twitter Cards Type-tag.
 *
 * @MetatagTag(
 *   id = "acquia_cards_type",
 *   label = @Translation("Acquia Card Image"),
 *   description = @Translation("Image link of acquia card."),
 *   name = "acquia:image",
 *   group = "acquia_cards",
 *   weight = 1,
 *   type = "string",
 *   secure = FALSE,
 *   multiple = FALSE
 * )
 */
class AcquiaCardsImage extends MetaNameBase {
}
