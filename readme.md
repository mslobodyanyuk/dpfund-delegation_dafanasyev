Design Pattern ►[ Delegation Pattern ] ► Lesson #2
==================================================

* ***Actions on the deployment of the project:***

- Making a new project dpfund-delegation_dafanasyev.loc:
																	
	sudo chmod -R 777 /var/www/DESIGN_PATTERNS/Fundamental/dpfund-delegation_dafanasyev.loc

	//!!!! .conf
	sudo cp /etc/apache2/sites-available/test.loc.conf /etc/apache2/sites-available/dpfund-delegation_dafanasyev.loc.conf
		
	sudo nano /etc/apache2/sites-available/dpfund-delegation_dafanasyev.loc.conf

	sudo a2ensite dpfund-delegation_dafanasyev.loc.conf

	sudo systemctl restart apache2

	sudo nano /etc/hosts

	cd /var/www/DESIGN_PATTERNS/Fundamental/dpfund-delegation_dafanasyev.loc

- Deploy project:

	`git clone << >>`
	
	`or Download`
	
	_+ Сut the contents of the folder up one level and delete the empty one._

	`composer install`
---

Dmitry Afanasyev

[Design Pattern ►[ Delegation Pattern ] ► Lesson #2 (11:48)]( https://www.youtube.com/watch?v=uxbmNi6XPxE&list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&index=2&ab_channel=DmitryAfanasyev )

Delegation is the basic design template in which an object externally expresses a behavior, but in reality transfers responsibility for performing that behavior to a related object.
The delegation template is a fundamental abstraction on the basis of which other templates are implemented - composition (also called aggregation), impurities (mixins) and aspects (aspects).

	composer create-project --prefer-dist laravel/laravel
	
_+ Сut the contents of the folder up one level and delete the empty one._

	php artisan make:controller FundamentalPatternsController

Error: 
_"... Permission denied"_

	sudo chmod -R 777 /var/www/DESIGN_PATTERNS/Fundamental/dpfund-propcontainer_dafanasyev.loc

Error: 
_"Target class [FundamentalPatternsController] does not exist."_
		
<https://stackoverflow.com/questions/63807930/target-class-controller-does-not-exist-laravel-8>		
		
Add route in `routes/web.php`:

```php
use App\Http\Controllers\FundamentalPatternsController;

Route::get('/', [FundamentalPatternsController::class, 'Delegation'])->name('dump');
```

	php artisan config:cache	
	php artisan config:clear

Error:
_"Class 'Debugbar' not found"_

<https://bestofphp.com/repo/barryvdh-laravel-debugbar-php-debugging-and-profiling>

	composer require barryvdh/laravel-debugbar --dev

![screenshot of sample]( https://github.com/mslobodyanyuk/dpfund-delegation_dafanasyev/blob/main/public/images/firefox1.png )

[(0:00)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=0 ) 
_"There was such a case ..."_

"There was such a case in 2013, one programmer, an American, worked for about a year. - He worked very well, was on a "good account" with the authorities, received a good salary.
And in the end it turned out that he hired an outsourcing company in China, and gave all his work to them ..." - He `Delegated` his work to other people.

[(0:50)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=50 ) We have an object, it has a certain Behavior. We "look" at an object and see its Behavior. - And in fact,
IF we look inside an object we will find out that it is NOT him that is Realizing this Behavior, but some other object OR even a group of objects to which he is Delegate it.

[(1:15)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=75 ) `Another Example`.

This is the same object-`Request` in `Laravel`, when `Request` is able to Validate data, BUT he does NOT Validate data himself, he takes `Laravel` class `Validator`
And with its help Validates. - In the same way, the same class is used by `Controller` AND WE CAN ALSO GENERATE IT AND USE IT TO VALIDATE DATA - Delegation in this way.
  
[(1:50)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=110 ) `MessengerInterface.php`

Let's start with the fact that we have a certain Interface, a certain Functional. We want to Create a specific Object Class and describe it in the Interface. We will have Abstract Messenger. There are a number of methods in this `Messenger`:

- public function setSender($value): MessengerInterface - set who will Send the message.

- public function setRecipient($value): MessengerInterface - set who will Receive the message.

- public function setMessage($value): MessengerInterface - set the message itself.

- public function send(): bool - Send a message.

[(2:40)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=160 ) And we will have two classes `EmailMessenger.php` and `SmsMessenger.php` which will Implement this Interface And Send messages in their own way and,
actually Receive messages, and so on.

[(3:00)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=180 ) `AbstractMessenger.php`

`AbstractMessenger.php` Implements `MessengerInterface` and Implements ALL methods:

- protected $sender - Sender

- protected $recipient - Recipient

- protected $message - the message itself.

And, actually, methods:

- public function setSender($value): MessengerInterface

- public function setRecipient($value): MessengerInterface
		
- public function setMessage($value): MessengerInterface

- public function send(): bool

[(3:30)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=210 ) Based on this Abstract Class, `AbstractMessenger`, we create our two Classes.

- `EmailMessenger` - the class whose instance will send the message by e-mail.

- `SmsMessenger` - the instance whose instance will send the message via SMS.

[(3:40)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=220 ) `EmailMessenger.php`

[(3:50)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=230 ) `SmsMessenger.php`

They Inherit from `AbstractMessenger.php` and overload the `send()` method in order to "tell" us in `Debugbar` that this is exactly what they did.

```php
\Debugbar::info( `Sent by ` . __METHOD__);
```

[(4:50)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=290 ) `AppMessenger.php`

A class that will Delegate some properties accordingly. Working class in the Application. We have an Application that must Send a notification. - He does not care where `AppMessenger.php` will be Sent,
by SMS, phone or mail. - This is the case of `AppMessenger.php`.
In turn, the class `AppMessenger.php`, just uses the Design Pattern `Delegation` AND All this work it Delegates OR `EmailMessenger.php`
OR `SmsMessenger.php`. - And so that nothing breaks in `AppMessenger.php` - Both `EmailMessenger.php` and `SmsMessenger.php` must Implement a certain Interface.

[(6:00)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=360 ) `__construct()`

- private $messenger - an instance of the Employee class to which we will Delegate work will fall into this variable.

In the constructor, when Creating an instance of the `AppMessenger` class, we "say" that the default Send message will be by Email. 

```php
public function __construct()
{
	$this->toEmail();
}
```

- toEmail() - initializes the variable `$this->messenger = new EmailMessenger()` Creating an instance of the class `EmailMessenger()`. To Switch we can use the `toSms()` method. - This class, `AppMessenger.php` also Implements the `MessengerInterface.php` Interface.
That is, he must have Implemented these methods.

[(7:20)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=440 ) - And already in Implementation `setSender()`, `setRecipient()` we already address `messenger` and Call its method `setSender()`.
Again, his method is `setRecipient()`, `setMessage()`, `send()`.

[(8:00)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=480 ) It turns out that we work with `AppMessenger.php`, BUT it does NOT do this work. He Delegates this work to some class.
And we can in `run-time` Switch - Send here OR Send there.

[(8:25)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=505 ) `FundamentalPatternsController.php`

Create an instance of the `AppMessenger.php` class, by default Creates an instance of `EmailMessenger`. - We set EVERYTHING accordingly for him. Then Switch the same class to `toSms()`, call the same methods, and also call the `send()` method.

[(10:05)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=605 ) `Result`

```php
\Debugbar::info($item);
```

We will see the latest state of `AppMessenger.php`:

![screenshot of sample]( https://github.com/mslobodyanyuk/dpfund-delegation_dafanasyev/blob/main/public/images/firefox2.png )

[(10:25)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=625 ) _We will move above `\Debugbar::info($item);` and we will look through a state._

[(10:30)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=630 ) `Result`. IF we use `"dump"` earlier, we will see:

![screenshot of sample]( https://github.com/mslobodyanyuk/dpfund-delegation_dafanasyev/blob/main/public/images/firefox3.png )

[(10:45)]( https://youtu.be/uxbmNi6XPxE?list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&t=645 ) `Summary`

That's ALL, this way we can Delegate a certain Behavior, NOT necessarily EVERYTHING. In this case, we have auxiliary messengers ALL Behavior Delegated. BUT it's NOT necessary, it's a special case, we may have part of the Behavior go to one class,
part of the Behavior to go to another class. - Like the same `Request`-object in `Laravel`, Validation is done by one class, the rest by another. The base class itself, `AppMessenger.php`, is a connecting link.
He is like a boss, like a leader who Delegates certain work to his employees.

#### Useful links:

Dmitry Afanasyev

[Design Pattern ►[ Delegation Pattern ] ► Lesson #2]( https://www.youtube.com/watch?v=uxbmNi6XPxE&list=PLoonZ8wII66jY9zYXsvTDj5thPpCpa58v&index=2&ab_channel=DmitryAfanasyev )

<https://ru.wikipedia.org/wiki/Шаблон_делегирования>

<https://stackoverflow.com/questions/63807930/target-class-controller-does-not-exist-laravel-8>

<https://bestofphp.com/repo/barryvdh-laravel-debugbar-php-debugging-and-profiling>