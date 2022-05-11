<?php

namespace App\Controller;

use App\Entity\TrainingCenters;
use App\Entity\TrainingCentersRequisites;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransportController extends AbstractController
{
    #[Route('/transport/training_center', name: 'app_transport')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $data = file_get_contents('http://metodistam.niidpo.ru/run_transport.php?t=training_centers');
        $data = json_decode($data);
        foreach ($data as $k=>$v) {
            $entityManager = $doctrine->getManager();

            $e = new TrainingCenters();
            $e->setName(html_entity_decode($v->name));
            $e->setEmail($v->email);
            $e->setPhone($v->phone);
            $e->setUrl($v->url);
            $e->setActive(true);
            $e->setExternalUploadBakalavrmagistrId($v->external_upload_bakalavrmagistr_id);
            $e->setExternalUploadSdoId($v->external_upload_sdo_id);
            $entityManager->persist($e);
            $entityManager->flush();

            $id = $v->training_center_id;
            $center_id = $e->getId();
            unset($e);


            $data_item = file_get_contents('http://metodistam.niidpo.ru/run_transport.php?t=training_centers_item&id=' . $id);
            $data_item = json_decode($data_item);
            foreach ($data_item as $key=>$val) {
                $entityManager = $doctrine->getManager();
                $e_new = new TrainingCentersRequisites();

                $e_new->setName($val->full_name);
                $e_new->setShortName($val->short_name);
                $e_new->setCity($val->city);
                $e_new->setDirector($val->director);
                $e_new->setAboutDirector($val->director_position);
                $e_new->setAddressFact($val->address);
                $e_new->setAddressYour($val->address);
                $e_new->setDateAded(new \DateTime());

                $entityManager->persist($e_new);
                $entityManager->flush();
                $rq_id = $e_new->getId();
            }
        }





        return $this->render('transport/index.html.twig', [
            'controller_name' => 'TransportController',
        ]);
    }
}
