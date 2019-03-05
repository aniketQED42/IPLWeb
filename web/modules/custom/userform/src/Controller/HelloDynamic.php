<?php

namespace Drupal\userform\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloDynamic extends ControllerBase {

    /**
     * Returns a render-able array for a test page.
     */
    public function content($name) {
      $build = [
        '#type' => 'markup',
        '#markup' => '<h1><b>' . $this->t('Hello @name!', array('@name' => $name)),
      ]; 
      return $build;
    }
  
  }