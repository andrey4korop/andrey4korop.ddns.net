<?php
use App\Project;
use App\Category;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Project::class, function (ModelConfiguration $model) {
    $model->setTitle('Проэкты')->setAlias('projects');
    $model->onDisplay(function () {
        $display = AdminDisplay::datatablesAsync()->paginate(10);
        $display->setHtmlAttribute('class', 'table-info table-hover');
        $display->with('category');

        $display->setColumns([
            AdminColumn::link('title')->setLabel('Заголовок')->setWidth('100px'),
            AdminColumn::image('mainImg')->setLabel('Главное изображение')->setWidth('100px'),
            AdminColumn::text('text')->setLabel('Текст')->setWidth('500px'),
           // AdminColumn::text('secondText')->setLabel('secondText'),

            //AdminColumn::text('demoUrl')->setLabel('demoUrl'),
            //AdminColumn::lists('sliderImgUrl')->setLabel('sliderImgUrl'),
            //AdminColumn::text('category.name')->setLabel('name'),

        ]);



        return $display;
    });
    // Create And Edit
   $model->onCreateAndEdit(function($id = null) {
        $form = AdminForm::panel();
        $form->setItems(
            AdminFormElement::text('title', 'Заголовок'),
            AdminFormElement::wysiwyg('text', 'Текст')->setEditor('ckeditor'),
            AdminFormElement::wysiwyg('secondText', 'Текст под изображением')->setEditor('ckeditor'),
            AdminFormElement::image('mainImg', 'Главное изображение'),
            AdminFormElement::images('sliderImgUrl', 'Изображения в слайдере'),
            AdminFormElement::text('demoUrl', 'Ссылка на Демо'),
            AdminFormElement::select('category_id','Категория')->setModelForOptions(Category::class, 'id')
            ->setDisplay('name')


        );
        $form
            ->getButtons()
            ->setSaveButtonText('Сохранить')
            ->setDeleteButtonText('Удалить')
            ->setCancelButtonText('Отменить');
        return $form;
    });
});