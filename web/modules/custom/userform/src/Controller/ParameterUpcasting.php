<?php

namespace Drupal\userform\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\user\UserInterface;

class ParameterUpcasting extends ControllerBase {

    /**
     * Returns a render-able array for a test page.
     */
    public function content($nodeid) {
      $node = Node::load($nodeid);
      $build = [
        '#type' => 'markup',
        '#markup' => '<h1><b>' . t('Hello @aname!', array('@aname' => $node->getOwner()->getDisplayName())),
      ]; 
      return $build;
    }
  
  }