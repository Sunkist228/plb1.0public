<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PLB лизинговый брокер</title>
	<link rel="stylesheet" href="css/style.css">
	<!-- Используйте свой новый файл favicon.ico -->
	<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
	<!-- Метатеги для улучшения SEO -->
	<meta name="description"
		content="PLB лизинговый брокер предоставляет профессиональные услуги в сфере лизинга. Надежный партнер для вашего бизнеса.">
	<meta name="keywords" content="PLB, plbroker, лизинг, брокер, услуги лизинга, бизнес лизинг, финансовые услуги, Первый лизинговый брокер в России, Лидирующий лизинговый брокер, Профессиональные услуги лизинга от первого брокера, Опыт и надежность в лизинге, Как выбрать лучший лизинговый брокер: советы от экспертов, Индивидуальный подход к каждому клиенту, Первоклассный сервис от лучшего лизингового брокера, Эффективные решения в сфере лизинга, Ведущий брокер в области лизинговых сделок, Надежный партнер для вашего бизнеса: первый лизинговый брокер">
	<meta name="author" content="PLB">
	<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(96032769, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/96032769" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>

<body>

	<header>
		<img src="img/logo.svg" alt="Логотип">
		<h1>Первый лизинговый брокер</h1>
	</header>

	<nav>
		<a href="#home">Главная</a>
		<a href="#services">Услуги</a>
		<a href="#about">О нас</a>
		<a href="#contact">Контакты</a>
		<a id="contact-link" href="#contact">Оставить заявку</a>
	</nav>

	<section id="home">
		<h2>Мы сопроводим сделку от начала и до конца, и гарантируем высокий шанс её успеха.</h2>
		<p>Доверьтесь нашему опыту и профессионализму в сфере лизинга для достижения ваших бизнес-целей.</p>
	</section>

	<section id="services">
		<h2>Наши услуги</h2>
		<p>Описание услуг лизинга, предоставляемых вашей компанией. Lorem ipsum dolor sit amet, consectetur adipisicing
			elit. Iure, provident. Rem eius eum, laborum voluptatibus, asperiores maiores impedit ea unde doloribus
			animi beatae repellendus necessitatibus error expedita ullam numquam aliquid.</p>
	</section>

	<section id="about">
		<h2>О нас</h2>
		<p>Немного о истории вашей компании и вашей команде. Lorem ipsum dolor sit amet consectetur adipisicing elit.
			Saepe hic molestiae autem necessitatibus est blanditiis consequuntur deleniti similique voluptatum, optio
			velit reiciendis et magni, molestias adipisci cupiditate tempore. Beatae, illum.</p>
	</section>

	<section id="apply">
		<h2>Оставить заявку</h2>
		<!-- Добавленный блок для отображения ошибки -->
		<div id="error-message" style="display: none; color: red;"></div>

		<div id="confirmation-message">
		<p>Заявка успешно отправлена. Мы свяжемся с вами в ближайшее время.</p>
		</div>


		<form id="contact-form" action="submit_form.php" method="post">
			<label for="name">Имя:</label>
			<input type="text" id="name" name="name" pattern="[A-Za-zА-Яа-яЁё\s]+" title="Имя не должно содержать цифры"
				required>

			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>

			<label for="phone">Телефон:</label>
			<input type="tel" id="phone" name="phone" required>

			<label for="message">Сообщение:</label>
			<textarea id="message" name="message" required></textarea>

			<input type="checkbox" id="consent" name="consent" required>
			<label for="consent">Я согласен на обработку персональных данных</label>

			<button type="submit">Отправить заявку</button>
		</form>
		<!-- Блок для отображения подтверждения -->
	</section>

	<!-- Добавленный скрипт для обработки формы -->
	<!-- Добавленный скрипт для обработки формы -->
<!-- Добавленный скрипт для обработки формы -->
<!-- Добавленный скрипт для обработки формы -->
<script>
    const form = document.getElementById('application-form');
    const confirmationMessage = document.getElementById('confirmation-message');
    const errorMessage = document.getElementById('error-message');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        // Имитация отправки формы (ваш код отправки формы может быть здесь)
        const response = await fetch(form.action, {
            method: form.method,
            body: new FormData(form),
        });

        const result = await response.json();

        if (result.success) {
            // Показываем сообщение подтверждения
            form.style.display = 'none';
            confirmationMessage.style.display = 'block';
        } else {
            // Показываем сообщение об ошибке
            errorMessage.textContent = result.message;
            errorMessage.style.display = 'block';
        }
    });
</script>









	<section id="contact">
		<h2>Контакты</h2>
		<p>Свяжитесь с нами для получения дополнительной информации или консультации. Lorem ipsum dolor sit amet
			consectetur adipisicing elit. Ratione illum numquam nisi dolorum cum nihil rerum enim voluptatum, sunt
			beatae aliquid esse, asperiores iste repellat dolores dolor nostrum distinctio soluta?</p>
	</section>

	<footer>
		<p>&copy; 2023 PLB лизинговый брокер. Все права защищены.</p>
	</footer>

</body>

</html>