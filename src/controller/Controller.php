<?php
/**
 * Created by PhpStorm.
 * User: fanny
 * Date: 05/04/17
 * Time: 10:35
 */

namespace air_de_rien\controller;
use Twig_Environment;
use Twig_Extension_Debug;
use Twig_Loader_Filesystem;


class Controller
{
    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * @return Twig_Environment
     */
    public function getTwig()
    {
        return $this->twig;
    }

    /**
     * @param Twig_Environment $twig
     * @return Controller
     */
    public function setTwig($twig)
    {
        $this->twig = $twig;
        return $this;
    }





    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(dirname(dirname(__DIR__)).'/src/view');
        $twig = new Twig_Environment($loader,[
            'cache' => false, // __DIR__.'tmp'
            'debug' => true,
        ]);
        $twig->addExtension ( new Twig_Extension_Debug ());
        $this->setTwig($twig);

    }

    /**
     * function permettant de faire le rendu d'une vue
     * @param $path
     * @param $param
     * @return string
     */
    public function render ($path, $param)
    {
        // transforme un tableau de clé / valeur en variable
        // ex ['eleve'=>'toto', 'ecole'=>'orléans'] sera transformé en $eleve='toto' et $ecole='orleans'
        // du coup, dans le fichier $path appelé ensuite, on peut utiliser directement les variables $eleve et $ecole
        extract($param);

        // crée un buffer (tampon) , c'est à dire met en "pause" l'affichage de php
        ob_start();
        // si on ne fait pas de mise en tampon, le fichier $path s'affiche au moment de require (comme si on faisait un echo), ce qui n'est pas voulu
        require '../src/view/'.$path;
        // récupère tout ce qui a été mis en tampon et l'enregistre dans la variable buffer
        $buffer = ob_get_clean();

        return $buffer;
    }



}

