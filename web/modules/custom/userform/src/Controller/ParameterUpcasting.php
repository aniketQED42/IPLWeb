<?php

namespace Drupal\userform\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\user\UserInterface;
use Drupal\node\NodeInterface;

class ParameterUpcasting extends ControllerBase {

    /**
     * Returns a render-able array for a test page.
     */
    public function content(NodeInterface $node) {
    //   $node = Node::load($nodeid);
    $author = $node->getOwner();
    $author_name = $author->getUsername();
      $build = [
        '#type' => 'markup',
        '#markup' => '<h1><b>' . t('Hello @aname!', array('@aname' => $author_name)),
      ]; 
      return $build;
    }
  
  }