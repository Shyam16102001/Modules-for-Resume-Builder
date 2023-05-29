<?php

namespace Drupal\resumeMaker\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ResumeMakerForm extends FormBase
{
  public function getFormId()
  {
    return 'resume_maker_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $current_page = $form_state->get('current_page') ?? 1;
    $stored_values = $this->getStoredValues($form_state);

    if ($current_page == 1) {
      $form['personal'] = [
        '#type' => 'fieldset',
        '#title' => $this->t('Personal Details'),
        '#tree' => TRUE,
      ];

      $form['personal']['name'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Name'),
        '#required' => TRUE,
        '#default_value' => isset($stored_values['personal']['name']) ? $stored_values['personal']['name'] : '',
      ];

      $form['personal']['email'] = [
        '#type' => 'email',
        '#title' => $this->t('Email'),
        '#required' => TRUE,
        '#default_value' => isset($stored_values['personal']['email']) ? $stored_values['personal']['email'] : '',
      ];

      $form['personal']['phone'] = [
        '#type' => 'tel',
        '#title' => $this->t('Phone Number'),
        '#required' => TRUE,
        '#default_value' => isset($stored_values['personal']['phone']) ? $stored_values['personal']['phone'] : '',
      ];

      $form['personal']['address'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Address'),
        '#required' => TRUE,
        '#default_value' => isset($stored_values['personal']['address']) ? $stored_values['personal']['address'] : '',
      ];

      $form['actions']['next'] = [
        '#type' => 'submit',
        '#value' => $this->t('Next'),
        '#submit' => ['::nextPageSubmit'],
      ];
    } elseif ($current_page == 2) {
      $form['education'] = [
        '#type' => 'fieldset',
        '#title' => $this->t('Education Qualifications'),
        '#tree' => TRUE,
      ];

      $form['education']['high_school'] = [
        '#type' => 'details',
        '#title' => $this->t('High School'),
        '#tree' => TRUE,
      ];

      $form['education']['high_school']['name'] = [
        '#type' => 'textfield',
        '#placeholder' => $this->t('School Name'),
        '#default_value' => isset($stored_values['education']['high_school']['name']) ? $stored_values['education']['high_school']['name'] : '',
      ];
      $form['education']['high_school']['marks'] = [
        '#type' => 'number',
        '#placeholder' => $this->t('Marks'),
        '#default_value' => isset($stored_values['education']['high_school']['mark']) ? $stored_values['education']['high_school']['mark'] : '',
      ];
      $form['education']['high_school']['year'] = [
        '#type' => 'number',
        '#placeholder' => $this->t('Year'),
        '#default_value' => isset($stored_values['education']['high_school']['year']) ? $stored_values['education']['high_school']['year'] : '',
      ];

      $form['education']['higher_secondary'] = [
        '#type' => 'details',
        '#title' => $this->t('Higher Secondary'),
        '#tree' => TRUE,
      ];

      $form['education']['higher_secondary']['name'] = [
        '#type' => 'textfield',
        '#placeholder' => $this->t('School Name'),
        '#default_value' => isset($stored_values['education']['higher_secondary']['name']) ? $stored_values['education']['higher_secondary']['name'] : '',
      ];
      $form['education']['higher_secondary']['marks'] = [
        '#type' => 'number',
        '#placeholder' => $this->t('Marks'),
        '#default_value' => isset($stored_values['education']['higher_secondary']['mark']) ? $stored_values['education']['higher_secondary']['mark'] : '',
      ];
      $form['education']['higher_secondary']['year'] = [
        '#type' => 'number',
        '#placeholder' => $this->t('Year'),
        '#default_value' => isset($stored_values['education']['higher_secondary']['year']) ? $stored_values['education']['higher_secondary']['year'] : '',
      ];

      $form['education']['graduation'] = [
        '#type' => 'details',
        '#title' => $this->t('Graduation'),
        '#tree' => TRUE,
      ];

      $form['education']['graduation']['name'] = [
        '#type' => 'textfield',
        '#placeholder' => $this->t('Course Name'),
        '#default_value' => isset($stored_values['education']['graduation']['name']) ? $stored_values['education']['graduation']['name'] : '',
      ];
      $form['education']['graduation']['marks'] = [
        '#type' => 'number',
        '#placeholder' => $this->t('Percentage'),
        '#default_value' => isset($stored_values['education']['graduation']['mark']) ? $stored_values['education']['graduation']['mark'] : '',
      ];
      $form['education']['graduation']['year'] = [
        '#type' => 'number',
        '#placeholder' => $this->t('Year'),
        '#default_value' => isset($stored_values['education']['graduation']['year']) ? $stored_values['education']['graduation']['year'] : '',
      ];

      $form['education']['post_graduation'] = [
        '#type' => 'details',
        '#title' => $this->t('Post Graduation'),
        '#tree' => TRUE,
      ];

      $form['education']['post_graduation']['name'] = [
        '#type' => 'textfield',
        '#placeholder' => $this->t('Course Name'),
        '#default_value' => isset($stored_values['education']['post_graduation']['name']) ? $stored_values['education']['post_graduation']['name'] : '',
      ];
      $form['education']['post_graduation']['marks'] = [
        '#type' => 'number',
        '#placeholder' => $this->t('Percentage'),
        '#default_value' => isset($stored_values['education']['post_graduation']['mark']) ? $stored_values['education']['post_graduation']['mark'] : '',
      ];
      $form['education']['post_graduation']['year'] = [
        '#type' => 'number',
        '#placeholder' => $this->t('Year'),
        '#default_value' => isset($stored_values['education']['post_graduation']['year']) ? $stored_values['education']['post_graduation']['year'] : '',
      ];

      $form['actions']['previous'] = [
        '#type' => 'submit',
        '#value' => $this->t('Previous'),
        '#submit' => ['::previousPageSubmit'],
      ];

      $form['actions']['next'] = [
        '#type' => 'submit',
        '#value' => $this->t('Next'),
        '#submit' => ['::nextPageSubmit'],
      ];
    } elseif ($current_page == 3) {

      $form['employment'] = [
        '#type' => 'fieldset',
        '#title' => $this->t('Employment Details (Internship/Full-Time)'),
        '#tree' => TRUE,
      ];

      $form['employment']['company_name'] = [
        '#type' => 'textfield',
        '#placeholder' => $this->t('Company Name'),
        '#default_value' => isset($stored_values['employment']['company_name']) ? $stored_values['employment']['company_name'] : '',
      ];

      $form['employment']['year'] = [
        '#type' => 'textfield',
        '#placeholder' => $this->t('Years'),
        '#default_value' => isset($stored_values['employment']['year']) ? $stored_values['employment']['year'] : '',
      ];

      $form['employment']['description'] = [
        '#type' => 'textfield',
        '#placeholder' => $this->t('Description'),
        '#default_value' => isset($stored_values['employment']['description']) ? $stored_values['employment']['description'] : '',
      ];

      $form['skills'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Skills'),
      ];

      $form['actions']['previous'] = [
        '#type' => 'submit',
        '#value' => $this->t('Previous'),
        '#submit' => ['::previousPageSubmit'],
      ];

      $form['actions']['submit'] = [
        '#type' => 'submit',
        '#value' => $this->t('Submit'),
      ];
    }

    return $form;
  }

  public function nextPageSubmit(array &$form, FormStateInterface $form_state)
  {
    $this->storeFormValues($form_state);
    $current_page = $form_state->get('current_page') ?? 1;

    $form_state->set('current_page', $current_page + 1);
    $form_state->setRebuild();

    $form_state->setRebuild();
  }

  public function previousPageSubmit(array &$form, FormStateInterface $form_state)
  {
    $this->storeFormValues($form_state);
    $current_page = $form_state->get('current_page') ?? 1;

    if ($current_page > 1) {
      $form_state->set('current_page', $current_page - 1);
    }

    $form_state->setRebuild();
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $current_page = $form_state->get('current_page') ?? 1;

    if ($current_page == 1) {
      $form_state->set('current_page', 2);
      $form_state->setRebuild();
    } elseif ($current_page == 2) {
      $form_state->set('current_page', 3);
      $form_state->setRebuild();
    } elseif ($current_page == 3) {
      $stored_values = $this->getStoredValues($form_state);

      $connection = mysqli_connect('localhost', 'root', '', 'resume_maker');

      if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $name = $stored_values['personal']['name'];
      $email = $stored_values['personal']['email'];
      $phone = $stored_values['personal']['phone'];
      $address = $stored_values['personal']['address'];

      $high_school_name = isset($stored_values['education']['high_school']['name']) ? $stored_values['education']['high_school']['name'] : null;
      $high_school_marks = isset($stored_values['education']['high_school']['marks']) ? $stored_values['education']['high_school']['marks'] : null;
      $high_school_year = isset($stored_values['education']['high_school']['year']) ? $stored_values['education']['high_school']['year'] : null;

      $higher_secondary_name = isset($stored_values['education']['higher_secondary']['name']) ? $stored_values['education']['higher_secondary']['name'] : null;
      $higher_secondary_marks = isset($stored_values['education']['higher_secondary']['marks']) ? $stored_values['education']['higher_secondary']['marks'] : null;
      $higher_secondary_year = isset($stored_values['education']['higher_secondary']['year']) ? $stored_values['education']['higher_secondary']['year'] : null;

      $graduation_name = isset($stored_values['education']['graduation']['name']) ? $stored_values['education']['graduation']['name'] : null;
      $graduation_marks = isset($stored_values['education']['graduation']['marks']) ? $stored_values['education']['graduation']['marks'] : null;
      $graduation_year = isset($stored_values['education']['graduation']['year']) ? $stored_values['education']['graduation']['year'] : null;

      $post_graduation_name = isset($stored_values['education']['post_graduation']['name']) ? $stored_values['education']['post_graduation']['name'] : null;
      $post_graduation_marks = isset($stored_values['education']['post_graduation']['marks']) ? $stored_values['education']['post_graduation']['marks'] : null;
      $post_graduation_year = isset($stored_values['education']['post_graduation']['year']) ? $stored_values['education']['post_graduation']['year'] : null;

      $employment_company = $form_state->getValue(['employment', 'company_name']);
      $employment_year = $form_state->getValue(['employment', 'year']);
      $employment_description = $form_state->getValue(['employment', 'description']);

      $skills = $form_state->getValue(['skills']);

      $sql = "INSERT INTO `data` (`id`, `name`, `email`, `phone`, `address`, `high_school_name`, `high_school_marks`, `high_school_year`, `higher_secondary_name`, `higher_secondary_marks`, `higher_secondary_year`, `graduation_name`, `graduation_marks`, `graduation_year`, `post_graduation_name`, `post_graduation_marks`, `post_graduation_year`, `employment_company`, `employment_year`, `employment_description`,`skills`) VALUES (NULL, '$name', '$email', '$phone', '$address', '$high_school_name', '$high_school_marks', '$high_school_year', '$higher_secondary_name', '$higher_secondary_marks', '$higher_secondary_year', '$graduation_name', '$graduation_marks', '$graduation_year', '$post_graduation_name', '$post_graduation_marks', '$post_graduation_year', '$employment_company', '$employment_year', '$employment_description','$skills')";

      if (mysqli_query($connection, $sql)) {
        $this->messenger()->addStatus($this->t('Details added successfully.'));
      } else {
        $this->messenger()->addError($this->t('Failed to add details. Please try again.'));
      }

      $id = $id = mysqli_insert_id($connection);
      
      mysqli_close($connection);

      $this->clearStoredValues($form_state);
      $form_state->set('current_page', NULL);
      $form_state->setRebuild();


      $url = "/resume/generate/" . $id;

      $response = new RedirectResponse($url);
      $response->send();
    }
  }



  private function storeFormValues(FormStateInterface $form_state)
  {
    $values = $form_state->getValues();
    $stored_values = $form_state->get('stored_values') ?? [];
    $form_state->set('stored_values', array_merge($stored_values, $values));
  }


  private function getStoredValues(FormStateInterface $form_state)
  {
    return $form_state->get('stored_values') ?? [];
  }

  private function clearStoredValues(FormStateInterface $form_state)
  {
    $form_state->set('stored_values', []);
  }
}