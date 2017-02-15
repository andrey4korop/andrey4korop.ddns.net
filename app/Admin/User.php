<?php

use App\User;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(User::class, function (ModelConfiguration $model) {
    $model->setTitle('Пользователи')->setAlias('users');
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->paginate(10);
        $display->setHtmlAttribute('class', 'table-info table-hover');


        $display->setColumns([
            AdminColumn::text('name')->setLabel('Имя'),
            AdminColumn::text('email')->setLabel('Email'),
            

        ]);



        return $display;
    });
    // Create And Edit
   $model->onCreateAndEdit(function($id = null) {
        $form = AdminForm::panel();
        $form->setItems(
            AdminFormElement::text('name', 'Имя'),
            AdminFormElement::text('email', 'Email')



        );
        $form
            ->getButtons()
            ->setSaveButtonText('Сохранить')
            ->setDeleteButtonText('Удалить')
            ->setCancelButtonText('Отменить');
        return $form;
    });
});