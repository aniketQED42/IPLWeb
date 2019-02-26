<?php
namespace Drupal\userform\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class SimpleSettingForm extends ConfigFormBase {

  public function getFormId() {
    return 'userform_set';
  }

  protected function getEditableConfigNames() {
    return [
      'userform.settings'
    ];
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('userform.settings');

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('name'),
      '#default_value' => $config->get('name')
    ];

    $form['addr'] = [
      '#type' => 'textfield',
      '#title' => $this->t('addr'),
      '#default_value' => $config->get('addr')
    ];

   return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->config('userform.settings')
      ->set('name',$form_state->getValue('name'))
      ->set('addr',$form_state->getValue('addr'))
      ->save();
    parent::submitForm($form, $form_state);
  }
}
