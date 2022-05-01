<?php

namespace App\Controller\Admin;

use App\Entity\ApiUser;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ApiUserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ApiUser::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Список API пользователей')
            ->setPageTitle('edit', 'Редактирование API пользователя')
            ->setPageTitle('new', 'Создать  API пользователя')
            ->setDefaultSort(['name' => 'DESC'])
            ->setPaginatorPageSize(30)
            ->showEntityActionsInlined();
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Основное');
        yield TextField::new('name', 'Название');
        yield TextField::new('token', 'Токен')->hideOnIndex();

        yield FormField::addTab('Привилегии');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fa fa-plus')->setLabel('Создать нового пользователя');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить и продолжить редактирование');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить изменения и вернуться к списку');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить добавить следующего пользователя');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setIcon('fa fa-check')->setLabel('Сохранить изменения и вернуться к списку');
            });
    }
}
