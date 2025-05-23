<?php

return [
	'seo' => [
		'title'       => 'Контакты многопрофильного медицинского центра в Харькове Докарт',
		'description' => 'Вы найдёте нас по адресу г. Харьков, ул. Миколи Хвильового (Маяковского), 24, тел. (057) 761-61-31 и (093) 761-61-31. Частная клиника Докарт в Харькове',
	],

	'api' => [
		'store' => [
			'fatal_error' => 'К сожалению из-за ошибки мы не смогли отправить Ваше сообщение. Попробуйте позже.'
		]
	],

	'contact' => [
		'title'       => 'Связаться',
		'description' => 'Вы можете связаться с нами любым удобным для Вас способом. Мы доступны 24/7 по электронной почте. Вы также можете использовать форму быстрой связи ниже или посетить нашу клинку лично. Мы будем рады ответить на ваши вопросы.',
		'form'        => [
			'name'      => [
				'label' => 'Имя'
			],
			'surname'   => [
				'label' => 'Фамилия'
			],
			'phone'     => [
				'label' => 'Телефон'
			],
			'message'   => [
				'label' => 'Сообщение'
			],
			'agreement' => 'Заполняя данную форму, Вы соглашаетесь c условиями обработки персональных данных. Мы гарантируем конфиденциальность ваших данных!',
			'send'      => 'Отправить'
		],
	],
	'blocks'  => [
		'social_networks' => [
			'title' => 'Контакты'
		],
		'address'         => [
			'title'   => 'Адрес',
			'country' => 'Украина',
			'city'    => 'Харьков',
			'street'  => 'ул. Миколи Хвильового (Маяковского), 24',
             'full_address' => 'Украина, Харьков, ул. Миколи ',
            'only_street' => 'Хвильового (Маяковского), 24',
		],
		'time_to_work'    => [
			'title' => 'Время работы',
			'value' => 'Пн-Сб: с 09-00 до 17-00'
		],
		'phones'          => [
			'title' => 'Телефоны',
		],
	]
];
