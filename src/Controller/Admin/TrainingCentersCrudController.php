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
            ->setDefaultSort(['name' => 'DESC'])
            ->setPaginatorPageSize(30)
            ->showEntityActionsInlined();
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Основное');
        yield BooleanField::new('active', 'Активный центр');
        yield TextField::new('name', 'Название учебного центра');

        yield TextField::new('phone', 'Контактный телефон');
        yield TextField::new('email', 'Email');
        yield TextField::new('url', 'URL адрес');


        yield CollectionField::new('requisites')
            ->hideOnIndex()
            ->setColumns('col-12 col-sm-12 col-lg-12')
            ->setLabel('Реквизиты')
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
            ->remove(Crud::PAGE_INDEX, Action::DELETE);
    }
}
