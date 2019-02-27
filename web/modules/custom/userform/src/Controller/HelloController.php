<?php

namespace Drupal\userform\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloController extends ControllerBase {

    /**
     * Returns a render-able array for a test page.
     */
    public function content() {
      $build = [
        '#markup' => '<h1><b>' . $this->t('Hello World!'),
      ];
      return $build;
    }
  
  }