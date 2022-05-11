<?php

namespace App\Controller\Admin;

use App\Entity\TrainingCenters;
use App\Form\TraningCenterRequisitesType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TrainingCentersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TrainingCenters::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Список учебных центров')
            ->setPageTitle('edit', 'Редактирование учебного центра')
            ->setPageTitle('new', 'Создать учебный центр')
            ->setDefaultSort(['old_id' => 'ASC'])
            ->setPaginatorPageSize(30)
            ->showEntityActionsInlined();
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Основное');
        yield BooleanField::new('active', 'Активный центр');
        yield TextField::new('name', 'Название учебного центра')
            ->setColumns('col-6 col-sm-6 col-lg-6');
        yield TextField::new('phone', 'Контактный телефон')
            ->setColumns('col-6 col-sm-6 col-lg-6');
        yield TextField::new('email', 'Email')
            ->setColumns('col-6 col-sm-6 col-lg-6');
        yield TextField::new('url', 'URL адрес')
            ->setColumns('col-6 col-sm-6 col-lg-6');

        yield AssociationField::new('document', 'Формат файлов')
            ->setColumns('col-6 col-sm-6 col-lg-6')
            ->hideOnIndex();
        yield AssociationField::new('users', 'Ответственные')
            ->setColumns('col-6 col-sm-6 col-lg-6')
            ->hideOnIndex()->setDisabled();

        yield NumberField::new('old_id', 'ID в старой системе')
            ->setColumns('col-3 col-sm-3 col-lg-3')
            ->hideOnIndex();
        yield NumberField::new('site_id', 'ID на сайтах мультидвижка')
            ->setColumns('col-3 col-sm-3 col-lg-3')
            ->hideOnIndex();


        yield TextField::new('external_upload_bakalavrmagistr_id', 'ID в bakalavrmagistr.ru')
            ->setColumns('col-3 col-sm-3 col-lg-3')
            ->hideOnIndex();
        yield NumberField::new('external_upload_sdo_id', 'ID в sdo.gaps.edu.ru:')
            ->setColumns('col-3 col-sm-3 col-lg-3')
            ->hideOnIndex();

        yield FormField::addTab('Реквизиты');
        yield CollectionField::new('requisites')
            ->hideOnIndex()
            ->setColumns('col-12 col-sm-12 col-lg-12')
            ->setLabel('Реквизиты и история изменений')
            ->allowAdd()
            ->allowDelete()
            ->setEntryIsComplex(true)
            ->setEntryType(TraningCenterRequisitesType::class)
            ->setFormTypeOptions([
                'by_reference' => false,
            ]);
    }


    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa fa-plus')->setLabel('Добавить новый учебный центр');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить и продолжить редактирование');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить изменения и вернуться к списку');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить и добавить еще один учебный центр');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить изменения и вернуться к списку');
            });
    }
}
