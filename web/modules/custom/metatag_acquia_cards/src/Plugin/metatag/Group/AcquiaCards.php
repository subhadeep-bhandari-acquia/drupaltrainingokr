<?php

namespace Drupal\metatag_acquia_cards\Plugin\metatag\Group;

use Drupal\metatag\Plugin\metatag\Group\GroupBase;

/**
 * The TwitterCards group.
 *
 * @MetatagGroup(
 *   id = "acquia_cards",
 *   label = @Translation("Acquia Cards"),
 *   description = @Translation("A set of meta tags specially for controlling the summaries displayed when content is shared on <a href='https://twitter.com/'>Twitter</a>."),
 *   weight = 4
 * )
 */
class AcquiaCards extends GroupBase {
  // Inherits everything from Base.
}
