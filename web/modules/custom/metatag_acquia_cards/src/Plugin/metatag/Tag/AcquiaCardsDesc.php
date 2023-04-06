<?php

namespace Drupal\metatag_acquia_cards\Plugin\metatag\Tag;

use Drupal\metatag\Plugin\metatag\Tag\MetaNameBase;

/**
 * The Twitter Cards site's id metatag.
 *
 * @MetatagTag(
 *   id = "acquia_cards_site_id",
 *   label = @Translation("Acquia Card Description"),
 *   description = @Translation("The description of acquia card."),
 *   name = "acquia:desc",
 *   group = "acquia_cards",
 *   weight = 3,
 *   type = "string",
 *   secure = FALSE,
 *   multiple = FALSE
 * )
 */
class AcquiaCardsDesc extends MetaNameBase {
}
