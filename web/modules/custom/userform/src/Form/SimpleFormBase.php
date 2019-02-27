<?php
namespace Drupal\userform\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SimpleFormBase extends FormBase{

  public function getFormId() {
    return 'userform_set';
  }

  protected function getEditableConfigNames() {
    return [
      'userform.settings'
    ];
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    // $config = $this->config('userform.settings');

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('name'),
    //   '#default_value' => $config->get('name')
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('email'),
    //   '#default_value' => $config->get('addr')
    ];

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('SAVE'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  

  public function validateForm(array &$form, FormStateInterface $form_state) {
      $name = $form_state->getValue('name');
      if(!preg_match("/^([a-zA-Z' ]+)$/",$name)){
        $form_state->setErrorByName('name',$this->t('Invaid Name!'));
      }
    }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    // foreach ($form_state->getValues() as $key => $values){
        $this->messenger()->addMessage('Name' . ': ' . $form_state->getValue('name'));
        $this->messenger()->addMessage('Email' . ': ' . $form_state->getValue('email'));
    // }
  }
}
