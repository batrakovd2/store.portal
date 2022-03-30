@if($appSettings['faq_block']['value'])
<!--faq-->
<div class="faq">
    <h2 class="section-title h2">Часто задаваемые вопросы</h2>
    <div class="faq-questions">

        <div class="faq-question dropdown-wrap">
            <div class="question__header press-to-show">
                <div class="question__arrow-wrap">
                    <img class='question__arrow arrow-show' src="./img/icon/arrow-down.svg"
                         alt="+">
                </div>

                <p class="question__title">Какие размеры оцинкованной полосы нужны для
                    строительства?</p>
            </div>
            <div class="question__dropdown dropdown">
                <p class="question__answer hidden-el ">
                    Для постоянных клиентов, имеющих хорошую репутацию и платежную историю,
                    мы можем предоставить
                    отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                    услуге вам всегда
                    предоставят наши менеджеры
                </p>
            </div>
        </div>
        <div class="faq-question dropdown-wrap">
            <div class="question__header press-to-show">
                <div class="question__arrow-wrap"><img class='question__arrow arrow-show '
                                                       src="./img/icon/arrow-down.svg" alt="+">
                </div>

                <p class="question__title">Какие размеры оцинкованной полосы нужны для
                    строительства?</p>
            </div>
            <div class="question__dropdown dropdown">
                <p class="question__answer hidden-el ">
                    Для постоянных клиентов, имеющих хорошую репутацию и платежную историю,
                    мы можем предоставить
                    отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                    услуге вам всегда
                    предоставят наши менеджеры Для постоянных клиентов, имеющих хорошую
                    репутацию и платежную
                    историю,
                    мы можем предоставить
                    отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                    услуге вам всегда
                    предоставят наши менеджеры
                </p>
            </div>
        </div>
        <div class="faq-question dropdown-wrap">
            <div class="question__header press-to-show">
                <div class="question__arrow-wrap"><img class='question__arrow arrow-show '
                                                       src="./img/icon/arrow-down.svg" alt="+">
                </div>

                <p class="question__title">Какие размеры оцинкованной полосы нужны для
                    строительства?</p>
            </div>
            <div class="question__dropdown dropdown">
                <p class="question__answer hidden-el ">
                    Для постоянных клиентов, имеющих хорошую репутацию и платежную историю,
                    мы можем предоставить
                    отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                    услуге вам всегда
                    предоставят наши менеджеры Для постоянных клиентов, имеющих хорошую
                    репутацию и платежную
                    историю,
                    мы можем предоставить
                    отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                    услуге вам всегда
                    предоставят наши менеджеры
                </p>
            </div>
        </div>
        <div class="faq-question dropdown-wrap">
            <div class="question__header press-to-show">
                <div class="question__arrow-wrap"><img class='question__arrow arrow-show '
                                                       src="./img/icon/arrow-down.svg" alt="+">
                </div>

                <p class="question__title">Какие размеры оцинкованной полосы нужны для
                    строительства?</p>
            </div>
            <div class="question__dropdown dropdown">
                <p class="question__answer hidden-el ">
                    Для постоянных клиентов, имеющих хорошую репутацию и платежную историю,
                    мы можем предоставить
                    отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                    услуге вам всегда
                    предоставят наши менеджеры Для постоянных клиентов, имеющих хорошую
                    репутацию и платежную
                    историю,
                    мы можем предоставить
                    отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                    услуге вам всегда
                    предоставят наши менеджеры
                </p>
            </div>
        </div>
        <div class="faq-question dropdown-wrap">
            <div class="question__header press-to-show">
                <div class="question__arrow-wrap"><img class='question__arrow arrow-show '
                                                       src="./img/icon/arrow-down.svg" alt="+">
                </div>

                <p class="question__title">Какие размеры оцинкованной полосы нужны для
                    строительства?</p>
            </div>
            <div class="question__dropdown dropdown">
                <p class="question__answer hidden-el
                  ">
                    Для постоянных клиентов, имеющих хорошую репутацию и платежную историю,
                    мы можем предоставить
                    отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                    услуге вам всегда
                    предоставят наши менеджеры Для постоянных клиентов, имеющих хорошую
                    репутацию и платежную
                    историю,
                    мы можем предоставить
                    отсрочку платежа на срок до одного месяца. Подробную информацию об этой
                    услуге вам всегда
                    предоставят наши менеджеры
                </p>
            </div>
        </div>


    </div>

    <form id='faqForm' action="send.html" method="POST" class="faq-form form">

        <h3 class='faq-form__title'>Задайте ваш вопрос</h3>
        <p id='faqFormError' class="faq-form__error error">Заполните поле</p>
        <div class="faq-form__body">
            <input name='quest' id='questInput' class="faq-form__input input" type="text"
                   placeholder="Что вас интересует?">
            <button id='faqFormBtn' class="light-btn faq-form__btn">Отправить</button>
        </div>

        <div id='faqModal' class="faq-modal__wrap">
            <div class="faq-modal__content modal modal--is-show">
                <div class="close">
                      <span class="close__word close-faq-btn">
                        Закрыть
                      </span>
                    <img src="./img/control/close-modal.svg" alt=""
                         class="close__icon close-faq-btn">
                </div>
                <div class="modal__content">
                    <h4 class="modal__title">Почти готово!</h4>
                    <p class="modal__desc">Укажите вашу электронную почту для связи с нами </p>
                    <div class='modal__form'>
                        <div class="modal__message">
                            <p class="modal__error error empty">Заполните поле</p>
                            <p class="modal__error error no-send">Произошла ошибка, данные не
                                отправлены, вы можете
                                связаться с нами по
                                телефону 8 (421) 292-97-86 или по почте hab@metall-as.ru</p>
                            <p class="modal__error error mail">Неправильно указанa номер
                                почта</p>
                        </div>
                        <div class="modal__inputs">
                            <input id="faqMail" name='email' class="modal__input input"
                                   data-type='email' type="text"
                                   placeholder="Ваша почта">
                            <input class="modal__submit light-btn" type="submit"
                                   value="Отправить">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!--faq-->
@endif
