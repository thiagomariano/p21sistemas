<?php

namespace AllBlacks\Forms;

use Kris\LaravelFormBuilder\Form;

class ClientForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => 'Nome',
                'rules' => 'required|max:255'
            ])->add('email', 'text', [
                'label' => 'E-mail',
                'rules' => 'required|max:255'
            ])->add('telephone', 'text', [
                'label' => 'Telefone',
                'rules' => 'required|max:15'
            ])
            ->add('document', 'text', [
                'label' => 'Documento',
                'rules' => 'required|max:14'
            ])->add('postcode', 'text', [
                'label' => 'CEP',
                'rules' => 'required|max:9'
            ])->add('address', 'text', [
                'label' => 'Endereço',
                'rules' => 'required|max:255'
            ])->add('district', 'text', [
                'label' => 'Distrito',
                'rules' => 'required|max:255'
            ])->add('city', 'text', [
                'label' => 'Cidade',
                'rules' => 'required|max:255'
            ])->add('state', 'text', [
                'label' => 'Estado',
                'rules' => 'required|max:2'
            ])->add('active', 'select', [
                'label' => 'Ativo',
                'choices' => [0 => 'Sim', 1 => 'Não'],
                'selected' => $this->model ? $this->model->active : null,
            ]);
    }
}
