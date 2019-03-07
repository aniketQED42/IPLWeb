<?php
namespace Drupal\userform\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Logger\LoggerChannelFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SimpleFormBase extends FormBase{
    protected $loggerFactory;
    /**
     * Constructor.
     */
    public function __construct(LoggerChannelFactory $loggerFactory) {
     $this->loggerFactory = $loggerFactory->get('userform');
   }
   public static function create(ContainerInterface $container){
     return new static ($container->get('logger.factory'));
   }

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
        $this->loggerFactory->notice('Name : ' . $form_state->getValue('name') . '<br>Email : ' . $form_state->getValue('email') );
        $this->messenger()->addMessage('Name' . ': ' . $form_state->getValue('name'));
        $this->messenger()->addMessage('Email' . ': ' . $form_state->getValue('email'));
    // }
  }
}
