<?php

namespace Drupal\metatag_acquia_cards\Plugin\metatag\Tag;

use Drupal\metatag\Plugin\metatag\Tag\MetaNameBase;

/**
 * The Twitter Cards title metatag.
 *
 * @MetatagTag(
 *   id = "acquia_cards_title",
 *   label = @Translation("Acquia Card Title"),
 *   description = @Translation("The acquia aard title."),
 *   name = "acquia:title",
 *   group = "acquia_cards",
 *   weight = 2,
 *   type = "label",
 *   secure = FALSE,
 *   multiple = FALSE,
 *   trimmable = TRUE
 * )
 */
class AcquiaCardsTitle extends MetaNameBase {
}
