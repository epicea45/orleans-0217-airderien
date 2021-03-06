<?php


namespace air_de_rien\controller;


use air_de_rien\form\CalendrierFilter;
use air_de_rien\form\CalendrierForm;
use air_de_rien\model\Calendrier;
use air_de_rien\model\DB;
use air_de_rien\model\CalendrierRequete;


class CalendrierController extends Controller
{

    public function index()
    {
        $form = new CalendrierForm();
        $filter = new CalendrierFilter();
        $form->setInputFilter($filter);

        $db = new DB();
        $date = new Calendrier();
        $spectacles = $db -> findAll('spectacle');
        $dates = $db -> findAll('calendrier');
        return $this->getTwig()
            ->render('admin/CalendrierView.html.twig',
            ['dates'=>$dates,
             'date'=>$date,
             'spectacles' =>$spectacles,
            'typeAction'=>'add',
            'titreButton'=>'Ajouter',
            'form'=>$form]);
    }

    public function addDate()
    {
        $form = new CalendrierForm();
        $filter = new CalendrierFilter();
        $form->setInputFilter($filter);

        $requete = new CalendrierRequete();
        $db = new DB();
            if (!empty($_POST)) {
                $requete->addDate($_POST);
                header('Location:admin.php?route=dateListe');
            }

        $dates = $db -> findAll('calendrier');
        $spectacles = $db -> findAll('spectacle');
        $date = new Calendrier();

        return $this->getTwig()
        ->render('admin/CalendrierView.html.twig',
            ['dates'=>$dates,
             'date'=>$date,
             'titreButton'=>'Ajouter',
             'spectacles'=> $spectacles,
             'typeAction'=>'add']);
    }

    public function deleteDate()
    {
        $del = new CalendrierRequete();
        $del->deleteDate();
        header('Location:admin.php?route=dateListe');
    }

    public function updateDate($id)
    {
        $form = new CalendrierForm();
        $filter = new CalendrierFilter();
        $form->setInputFilter($filter);

        $requete = new CalendrierRequete();
        $db = new DB();

        if (!empty($_POST)) {
            $requete->updateDate($_POST);

            header('Location:admin.php?route=dateListe');
        }
        $date = $requete->findOne('calendrier', $id);
        $dates = $db -> findAll('calendrier');
        $spectacles = $db -> findAll('spectacle');

        return $this->getTwig()
        ->render('admin/CalendrierView.html.twig',
            ['date'=>$date,
             'dates'=>$dates,
             'spectacles' => $spectacles,
             'form'=>$form,
             'titreButton'=>'Modifier',
             'typeAction'=>'update'
            ]);
    }



}