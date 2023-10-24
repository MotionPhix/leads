<?php

namespace App\Livewire\Forms;

use App\Models\Contact;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Support\Str;
use Livewire\Form;

class ContactForm extends Form
{
  public ?Contact $contact;

  public $first_name = '';

  public $last_name = '';

  public $email = '';

  public $job_title = '';

  public ?string $bio;

  public function rules()
  {
    $local_contact = $this->contact ?? new Contact();

    $rule = ValidationRule::unique('contacts','email');

    return [
      'first_name' => 'required',
      'last_name' => 'required',
      'email' => ['required', 'email:rns,dns', $local_contact->id
        ? $rule->ignore($local_contact)
        : $rule
      ],
      // 'company_id' => ValidationRule::exists('companies', 'id'),
      // 'company_id' => 'required|exists:companies,id',
      // 'phones' => 'sometimes|nullable',
      // 'phones.*.type' => 'required|in:work,mobile,office',
      // 'phones.*.number' => 'required|string',
      'job_title' => 'required',
      'bio' => 'nullable|min:30',
    ];
  }

  public function messages()
  {
    $name = Str::endsWith($this->first_name, 's') ? $this->first_name . '\'' : $this->first_name . '\'s';
    $last_name_required_error = Str::length($this->first_name) ? $name . ' last name' : 'Last name';
    $email_required_error = Str::length($this->first_name) ? $name : 'contact\'s';

    return [
      'first_name.required' => 'Provide contact\'s first name',
      'last_name.required' => $last_name_required_error . ' cannot be empty',
      'email.required' => 'Fill out ' . $email_required_error . ' email address',
      'email.email' => 'That is a fake email address',
      // 'company_id.required' => 'Please pick a company',
      // 'company_id.exists' => 'Oops! We don\'t have that company yet!',
      // 'phones.*.type.required' => 'Pick a phone type',
      // 'phones.*.type.in' => 'That\'s out of bounds!',
      // 'phones.*.number.required' => 'Fill out a phone number',
      'job_title.required' => 'Fill out ' . $email_required_error . ' job position',
    ];
  }

  public function setContact(Contact $contact)
  {
    $this->contact = $contact;

    $this->first_name = $contact->first_name;

    $this->last_name = $contact->last_name;

    $this->job_title = $contact->job_title;

    $this->email = $contact->email;
  }

  public function store()
  {
    $this->validate();

    Contact::create(
      $this->only([
        'first_name',
        'last_name',
        'job_title',
        'user_id',
        'email',
      ])
    );

    $this->reset();
  }

  public function update()
  {
    $this->validate();

    $this->contact->update(
      $this->only([
        'first_name',
        'last_name',
        'job_title',
        'email',
      ])
    );
  }
}
