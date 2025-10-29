<?php namespace App\Controllers;

use Config\Database;

class Academy extends BaseController
{
    private $utm_source, $utm_term, $widget;

    private function setUtmSource(array $query)
    {
        $utm_source = !empty($_COOKIE['utm_source']) ? $_COOKIE['utm_source'] : 'seo';
        if (!empty($query['utm_source'])) {
            switch ($query['utm_source']) {
                case('yandex'):
                    $utm_source = 'yandex';
                    break;
                case('google'):
                    $utm_source = 'google';
                    break;
                case('instagram'):
                    $utm_source = 'instagram';
                    break;
                case('yandex_maps'):
                    $utm_source = 'yandex_maps';
                    break;
                case('google_maps'):
                    $utm_source = 'google_maps';
                    break;
                case('visitkimods'):
                    $utm_source = 'visitkimods';
                    break;
                default:
                    $utm_source = 'seo';
            }
        }
        $this->utm_source = $utm_source;
        setcookie('utm_source', $utm_source, time() + 14 * 24 * 60 * 60, '/');
        return;
    }

    private function setTerm(array $query)
    {
        $utm_term = !empty($_COOKIE['utm_term']) ? $_COOKIE['utm_term'] : false;
        if (!empty($query['utm_term'])) {
            $utm_term = $query['utm_term'];
        }

        if ($utm_term) {
            setcookie('utm_term', $utm_term, time() + 14 * 24 * 60 * 60, '/');
        }
        $this->utm_term = $utm_term;
    }

    private function getUtm()
    {
        return $this->utm_source;
    }

    private function getTerm()
    {
        return $this->utm_term;
    }

    private function changeSalonNumber()
    {
        switch ($this->getUtm()) {
            case 'yandex':
                $phone = '+7 (499) 112-48-12';
                $phone_link = '+74991124812';
                break;
            case 'google':
                $phone = '+7 (499) 346-74-39';
                $phone_link = '+74993467439';
                break;
            case 'instagram':
                $phone = '+7 (499) 348-29-45';
                $phone_link = '+74993482945';
                break;
            case 'yandex_maps':
                $phone = '+7 (499) 112-30-68';
                $phone_link = '+74991123068';
                break;
            case 'google_maps':
                $phone = '+7 (499) 113-07-55';
                $phone_link = '+74991130755';
                break;
            case 'vk':
                $phone = '+7 (499) 322-91-45';
                $phone_link = '+74993229145';
                break;
            case 'visitkimods':
                $phone = '+7 (499) 113-66-40';
                $phone_link = '+74991136640';
                break;
            default:
                $phone = '+7 (499) 348-92-81';
                $phone_link = '+74993489281';
                break;
        }
        define('SITE_PHONE', $phone);
        define('SITE_PHONE_LINK', $phone_link);
    }

    public function __construct()
    {
        $this->setWidget($_GET);
        $this->setUtmSource($_GET);
        $this->setTerm($_GET);
        $this->changeSalonNumber();
    }

    public function index()
    {
        $data['utm'] = $this->getUtm();
        $data['service'] = [
            'slug' => 'academy',
            'title' => 'Academy',
            'ms' => [
                'title' => 'Международная академия подготовки парикмахеров <span class="color_primary">' . PROJECT_HTML . '</span>',
                'subtitle' => '5 тренинг-центров по всему миру, теперь и в России!',
                'inner_text' => 'Адаптированные курсы от создателей французских техник. <br>Обучение для парикмахеров любого уровня.',
            ],
            'welcome' => ['nail_1', 'nail_2'],
            'offer' => [
                'title' => '<span class="color_primary">Хотите пройти обучение, но сомневаетесь?</span><br>Оставьте заявку и получите подробную информацию по курсу',
                'subtitle' => 'Наши специалисты подберут для Вас оптимальный формат обучения и ответят на все ваши вопросы!',
            ],
        ];
        $data['custom_menu'] = [
            '#Welcome' => 'Об академии',
            '#Trainings' => 'Расписание',
            '#Contacts' => 'Контакты',
            '#Team' => 'Наставники',
            '/' => 'Салон',
            '/blog' => 'Блог',
        ];
        $data['widget'] = $this->widget;

        $this->mSeo['title'] = 'Международная академия парикмахеров французского бренда' . PROJECT . ' Москве';
        $this->mSeo['subject'] = 'Академия ' . PROJECT . ' в Москве';
        $this->viewHead($data);
        echo view('Academy/header', $data);
        echo view('Academy/ms', $data);
        echo view('Academy/welcome', $data);
        echo view('Academy/catalog', $data);
        echo view('Academy/trainings', $data);
        echo view('Academy/team');
        echo view('Academy/offer', $data);
        echo view('Academy/contacts');
        echo view('Academy/footer', $data);
        echo view('Academy/popup_subscribe', $data);
        echo view('Academy/popup_subscribe_widget', $data);
        echo view('Academy/foot');
    }

    //--------------------------------------------------------------------

    private function addLead($request)
    {
        $db = Database::connect();
        $builder = $db->table('leads');

        $lead = [];
        $lead['name'] = $request['name'] ?? 'undefined';
        $lead['tel'] = $request['phone'] ?? $request['tel'] ;
        $lead['salon'] = 'modshairrussia';
        $lead['service'] = 'default';
        $lead['style'] = 'default';
        $lead['url'] = $_POST['url'] ?? 'default';
        $lead['utm'] = $this->getUtm() ?? 'default';
        $lead['term'] = urldecode($this->getTerm()) ?? 'default';

        return $builder->insert($lead);
    }

    private function telegramMessage($message, $type)
    {
        switch ($type) {
            case 'leed':
                $token = '684302573:AAH_f9OFhbPzOXGeBG7YxoLOLmKMPQsh9E4';
                $chat_id = '-1001717953269';
                $msg = '*Лид форма*' . PHP_EOL;
                break;
            case 'academy':
                $token = '667336240:AAHoxjfnlAq2seHoeC_7-pvWCmO7copfYnI';
                $chat_id = '-416502600';
                $msg = '*Заявка на обучение*' . PHP_EOL;
                break;
            default:
                $token = '684302573:AAH_f9OFhbPzOXGeBG7YxoLOLmKMPQsh9E4';
                $chat_id = '-1001717953269';
                $msg = '*Лид форма*' . PHP_EOL;
        }
        $msg .= $message;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot' . $token . '/sendMessage');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'chat_id=' . $chat_id . '&text=' . urlencode($msg) . '&parse_mode=Markdown');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_exec($ch);
        curl_close($ch);
    }

    private function validateCaptcha($token) {
        $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LejgjYkAAAAAPRRi8D9yJW9nCmgbGgoS2LbHbB2&response=".$token."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        return $response['success'];
    }

    public function send()
    {
        if (!empty($_POST) && $this->validateCaptcha($_POST['token']) && $this->addLead($_POST)) {
            unset($_POST['token']);
            $telegram_message = '';
            foreach ($_POST as $key => $value) {
                $telegram_message .= '*' . $this->getFormField($key) . '*: ' . $value . PHP_EOL;
            }
            $form_name = $_POST['name'] ?? 'no_name';
            $form_phone = $_POST['phone'] ?? $_POST['tel'];
            if (!empty($_POST['subject']) && $_POST['subject'] === 'academy') {
                $this->telegramMessage($telegram_message, 'academy');
            } else {
                $this->telegramMessage($telegram_message, 'leed');
            }
            header('Content-Type: application/json');
            echo json_encode(['status' => 'ok', 'name' => $form_name, 'phone' => $form_phone]);
            exit();
        } else {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'fail']);
            exit();
        }
    }

    private function getFormField($name)
    {
        switch ($name) {
            case 'name':
                return 'Имя';
            case 'phone':
                return 'Телефон';
            case 'tel':
                return 'Телефон';
            case 'url':
                return 'URL:';
            case 'file':
                return 'Файл во вложении';
            case 'subject':
                return 'Тема';
            case 'course':
                return 'Курс';
            case 'time':
                return 'Время';
            case 'task':
                return 'Задача';
            case 'type':
                return 'Тип';
            case 'activity':
                return 'Деятельность';
            case 'products-services':
                return 'Продукты и услуги';
            case 'discount':
                return 'Скидка на первый визит';
            default:
                return 'undefined';
        }
    }

    private function setWidget(array $query)
    {
        $widget = !empty($query['widget']) ? $query['widget'] : null;
        switch ($widget) {
            case 'schedule':
                $this->widget['name'] = $widget;
                $this->widget['title'] = 'Узнать расписание трегингов в академии Mod`s Hair Paris';
                $this->widget['text'] = '
                Оставьте заявку и получите актуальное расписание тренингов в академии Mod`s Hair Paris.';
                break;
            default:
                $this->widget['name'] = '';
                $this->widget['title'] = '';
                $this->widget['text'] = '';
        }

    }
}