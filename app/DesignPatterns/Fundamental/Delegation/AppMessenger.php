<?php

namespace App\DesignPatterns\Fundamental\Delegation;

use App\DesignPatterns\Fundamental\Delegation\Interfaces\MessengerInterface;
use App\DesignPatterns\Fundamental\Delegation\Messengers\EmailMessenger;
use App\DesignPatterns\Fundamental\Delegation\Messengers\SmsMessenger;

class AppMessenger implements MessengerInterface
{
	private $messenger;

	public function __construct()
	{
		$this->toEmail();
	}

	static public function getDescription()
	{
        $description = [
                        'name' => 'Делегирование (Delegation)',
                        'url' => 'App\Http\Controllers\FundamentalPatternsController@Delegation',

                        'description' => "Делегирование (англ. Delegation) — основной шаблон проектирования,".
                                        "в котором объект внешне выражает некоторое поведение, но в реальности".
                                        "передаёт ответственность за выполнение этого поведения связанному объекту.
                                        Шаблон делегирования является фундаментальной абстракцией, на основе".
                                        "которой реализованы другие шаблоны - композиция (также называемая агрегацией),".
                                        "примеси (mixins) и аспекты (aspects).",

                        'url_wiki' => 'https://ru.wikipedia.org/wiki/Шаблон_делегирования',
                        ];

        return $description;
	}

	public function toEmail()
	{
		$this->messenger = new EmailMessenger();

		return $this;
	}

	public function toSms()
	{
		$this->messenger = new SmsMessenger();

		return $this;
	}

	public function setSender($value): MessengerInterface
	{
		$this->messenger->setSender($value);

		return $this->messenger;
	}

	public function setRecipient($value): MessengerInterface
	{
		$this->messenger->setRecipient($value);

		return $this->messenger;
	}

	public function setMessage($value): MessengerInterface
	{
		$this->messenger->setMessage($value);

		return $this->messenger;
	}

	public function send(): bool
	{
		return $this->messenger->send();
	}


}
