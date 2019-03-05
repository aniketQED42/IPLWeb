<?php

namespace Drupal\userform\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;
/**
 * Provides a 'article' block.
 *
 * @Block(
 *   id = "article_block",
 *   admin_label = @Translation("Custom Block"),
 *   category = @Translation("Custom article block example")
 * )
 */
class CustomBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\userform\Form\SimpleFormBase');
    return $form;
   }
}