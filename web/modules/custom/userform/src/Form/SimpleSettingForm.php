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

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('email'),
      '#default_value' => $config->get('email')
    ];

   return parent::buildForm($form, $form_state);
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    $name = $form_state->getValue('name');
    if(!preg_match("/^([a-zA-Z' ]+)$/",$name)){
      $form_state->setErrorByName('name',$this->t('Invaid Name!'));
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->config('userform.settings')
      ->set('name',$form_state->getValue('name'))
      ->set('email',$form_state->getValue('email'))
      ->save();
    parent::submitForm($form, $form_state);
  }
}
