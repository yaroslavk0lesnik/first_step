<?php

return [
	'seo' => [
		'title'       => 'Залишити відгук про роботу клініки Докарт. Читати реальні відгуки',
		'description' => 'Реальні відгуки про батапрофільний медичний центр у Харкові на вул.Маяковського, 24. Відгуки про Докарт. Читати реальні відгуки про клініку Докарт у Харкові',
	],
	
	'api' => [
		'store' => [
			'fatal_error' => 'На жаль через помилку ми не змогли відправити Ваше повідомлення. Спробуйте пізніше.',
		]
	],
	
	'title' => 'Відгуки',
	'form'  => [
		'title'       => 'Залиште нам свій відгук',
		'name'        => [
			'label' => 'І\'мя',
		],
		'email'       => [
			'label'       => 'Ваш E-Mail',
			'description' => 'Ваш E-Mail буде доступним тільки персоналу клініки Докарт. E-Mail потрібен для відповіді на Ваш відгук, а також для вирішення ситуацій, коли Ви задоволені нашою роботою.',
		],
		'text'        => [
			'label'       => 'Текст відгука',
			'placeholder' => 'Напишите сюда свой отзыв'
		],
		'agreement'   => 'Заповнюючи дану форму, Ви погоджуєтесь з умовами обробки персональних даних. Ми гарантуємо конфіденційність Ваших даних!',
		'submit'      => 'Залишити відгук',
	],
	'video' => [
		'title'     => 'Відео-відгуки',
		'load_more' => 'Показати більше',
		'frame'     => [
			'close' => 'Закрити'
		]
	],
];
