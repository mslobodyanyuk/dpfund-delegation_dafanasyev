<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Fundamental\Delegation\AppMessenger;

class FundamentalPatternsController extends Controller
{
	public function Delegation()
	{
		$name = 'Делегирование (Delegation)';

		$description = AppMessenger::getDescription();

		$item = new AppMessenger();

		$item->setSender('sender@email.net')
				->setRecipient('recipient@mmail.net')
				->setMessage('Hello email messenger!')
				->send();

//		\Debugbar::info($item);

		$item->toSms()
				->setSender('1111111111111')
				->setRecipient('2222222222222222')
				->setMessage('Hello SMS messenger!')
				->send();

		\Debugbar::info($item);

		return view('dump', compact('description'));
	}
}
