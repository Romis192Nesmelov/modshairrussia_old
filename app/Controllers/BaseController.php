<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    public $mSeo = [
        'title' => 'Mod\'s Hair Paris',
        'description' => 'Первый французский салон красоты Mod`s Hair Paris рядом с метро Павелецкая. Обновление причесок раз в полгода. Индивидуальный подбор образа, умной стрижки и total look по каталогу. Полный комплекс салонных услуг - окрашивание волос, маникюр, педикюр, визаж.',
        'description_s' => 'Первый французский салон красоты Mod`s Hair Paris рядом с метро Павелецкая. Обновление причесок раз в полгода. Индивидуальный подбор образа, умной стрижки и total look по каталогу. Полный комплекс салонных услуг - окрашивание волос, маникюр, педикюр, визаж.',
        'subject' => 'Страница услуги Mod\'s Hair Paris',
        'keywords' => 'новый салон красоты, французский салон красоты, первый в России, Mod\'s Hair, Mod\'s Hair Russia, Mod\'s Hair Paris'
    ];

    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        helper('filesystem');
        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        // $this->session = \Config\Services::session();
    }

    protected function viewHead(array $data)
    {
        $data['seo'] = $this->mSeo;
        echo view('Templates/head', $data);
    }

    protected function viewFoot()
    {
        echo view('Templates/foot');
    }

}
