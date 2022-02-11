"use strict";

const body = document.querySelector('body');
const KEY_ESC = 27;
const mobileSearchWrap = document.querySelector('#mobileSearchWrap');
const mobileSearchBtn = document.querySelector('#searchBtn');
const elWithScrollX = document.querySelector('.sections-list');
const mainCarousel = document.querySelector('#mainCarousel');
const reviews = document.querySelector('#reviews');
const slider = document.querySelector('#slider');
const mainBg = document.querySelector('.main-bg');
const footer = document.querySelector('.footer');
//обертка для кнопки ввер up-btn
const up = document.querySelector('#up');
//кнопкa ввер up-btn
const upBtn = document.querySelector('#upBtn');
const forms = document.querySelectorAll('.form');

const bgModal = document.querySelector('#shading'); // темный фон окон
const faqModal = document.querySelector('#faqModal'); // темный фон faqModalBg
const closeFaqBtns = document.querySelectorAll('.close-faq-btn');
const application = document.querySelector('#application'); // Онлайн заявка(btn)
const applicationForm = document.querySelector('#applicationForm'); // Онлайн заявка(btn)
const applicationModal = document.querySelector('#applicationModal');// онлайн заявка(окно)
const applicationThanks = document.querySelector('#applicationThanks');// успех(окно)
const order = document.querySelector('#order') // заказ(окно)
const orderForm = document.querySelector('#orderForm');
const orderQuantityInput = document.querySelector('#orderQuantity');
const incQuantityBtn = document.querySelector('#incQuantity');
const decQuantityBtn = document.querySelector('#decQuantity');
const orderPrice = document.querySelector('#orderPrice');
const orderBtns = document.querySelectorAll('.product-card__btn'); // заказ(btn);
const faqForm = document.querySelector('#faqForm');
const faqFormBtn = document.querySelector('#faqFormBtn'); // faq-form (btn)
const dropdownWraps = document.querySelectorAll('.dropdown-wrap');
const mobileMenu = document.querySelector('#mobileNav');
const mobileMenuOpenBtn = document.querySelector('#burgerBtn');
const mobileMenuCloseBtn = document.querySelector('#mobileMenuClose');
const closeBtn = document.querySelectorAll('.close-btn'); // кнопки закрытия модельных окон
const callbackFormModal = document.querySelector('#callbackFormModal')
const callbackForm = document.querySelector('#callbackForm');
const callbackClose = document.querySelectorAll('.callback-close');
const callbackOpenBtn = document.querySelector('#callbackBtn');
const sensitivity = 20; // кол пикселей для регистрации движения
let touchStart = null; // начало движение по сенсеру
let touchPosition = null; // растояние пройденое по сенсеру

const regTel = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{5,10}$/;// проверка телефона
const regMail = /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/;// Проверка на емаил

// Добовляем функцию открытия и закрытия поиска
mobileSearchBtn.addEventListener('click', showSearch);

// Добовлям фунцию для смены позиции mainBg
window.addEventListener('scroll', changePosition);
// Добовлям фунцию для отображекния эл.
// с кнопкой upBtn
window.addEventListener('scroll', showUp)

// Добовлям фунцию для прокрутки сраницы вверх
upBtn.addEventListener('click', goUp);
let timeOut;
function goUp() {
  let top = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
  if (top > 0) {
    window.scrollBy(0, -150);
    timeOut = setTimeout('goUp()', 5);
  } else clearTimeout(timeOut);
}

// Добовляем функции для проверки form
//Array.from(forms).forEach((form) => {
//  form.addEventListener('submit', (e) => {
//    e.preventDefault();
//    formCheck(form);
//  });
//});

applicationForm.addEventListener('submit', (e) => {
  e.preventDefault();
  applicationFormCheck();
});

callbackForm.addEventListener('submit', (e) => {
  e.preventDefault();
  callbackFormCheck();
});

if (faqForm) {
  faqForm.addEventListener('submit', (e) => {
    e.preventDefault()
    faqFormCheck()
  })
}
if (order) {
  //Добовляем функции для проверки формы
  orderForm.addEventListener('submit', (e) => {
    e.preventDefault()
    orderFormCheck()
  })

  //Добовляем функцию для окраничение ввода в поле количесво товоров
  orderQuantityInput.addEventListener('input', () => {

    setValueCountInput(0)
  });

  //Добовляем функцию для увеличение и уменьшения кол т оваров
  incQuantity.addEventListener('click', increase);
  decQuantity.addEventListener('click', decrease);
}

mobileMenuOpenBtn.addEventListener('click', openMobileMenu);
mobileMenuCloseBtn.addEventListener('click', closeMobileMenu);

//Карусели
if (mainCarousel) {
  mainSlider(mainCarousel, true);
}

if (reviews) {
  setHeightreviewSlide()
  mainSlider(reviews)
  window.addEventListener(`resize`, () => {
    setHeightreviewSlide()
  }, false);


}

//Начало slider
if (slider) {
  const slidesWrap = slider.querySelector('#slidesWrap'); // обертка слайдов
  const slides = slider.querySelectorAll('.slider__item'); // слайды
  //isMoving флаг для отслежевание прогресса события transitionend
  //при управлении slidesWrap стрелками
  let isMoving = false;
  let idxActiveSlide = getIndexActiveEl(slides, "slider__item--is-active"); // индех активного слайда
  const dots = slider.querySelectorAll('.slider__dot');

  const fullPicSlider = slider.querySelector('#fullPic');
  const fullPicSlides = slider.querySelectorAll('.full-pic__item');
  const fullPicCloseBtns = slider.querySelectorAll('.full-pic__close');
  slidesWrap.addEventListener('transitionend', movingEvent); // отслеживает окончание движение слайда

  const playBtns = fullPicSlider.querySelectorAll('.full-pic__play');


  const arrowPrev = slider.querySelector('#prevSlide'); // стрелка влево
  const arrowNext = slider.querySelector('#nextSlide'); // стрелка вправо

  const fullPicPrev = slider.querySelector('#fullPicPrev'); // стрелка влево
  const fullPicNext = slider.querySelector('#fullPicNext'); // стрелка вправо

  setCurrentSlide();

  setTotalSlides();

  setBgModalHeight(fullPicSlider);

  window.addEventListener(`resize`, () => {
    setBgModalHeight(fullPicSlider);
  }, false);

  arrowPrev.addEventListener('click', prevSlide);
  arrowNext.addEventListener('click', nextSlide);

  fullPicPrev.addEventListener('click', prevSlide);
  fullPicNext.addEventListener('click', nextSlide);

  slidesWrap.addEventListener('touchstart', function (e) { startTouchMove(e) });
  // Отслеживает путь и растояние
  slidesWrap.addEventListener('touchmove', function (e) { touchMove(e) });
  // Окончание движение
  slidesWrap.addEventListener('touchend', function () { touchEnd(nextSlide, prevSlide) });

  // добовляем dots функцию навигации по слайдам
  Array.from(dots).forEach((el, idx) => {
    el.addEventListener('click', () => {
      dotsManagement(idx)
    })
  });

  // Добовляем функцию на аткытие полного каруели с полным изображением текущего слайда
  Array.from(slides).forEach((el, idx) => {
    el.addEventListener('click', () => {
      showFullPicSlider(idx)
    })
  });
  // Добовляем функцию закытие FullPicSlider
  Array.from(fullPicCloseBtns).forEach((el) => {
    el.addEventListener('click', closeFullPicSlider)
  });

  // Добовляем функцию закытие FullPicSlider нажатием esc
  document.addEventListener('keydown', (e) => {
    if (e.keyCode == KEY_ESC) {
      closeFullPicSlider();
    }
  });

  fullPicPrev.addEventListener('click', () => {
    showCurrentFullPic(idxActiveSlide)
  });
  fullPicNext.addEventListener('click', () => {
    showCurrentFullPic(idxActiveSlide)
  });

  // добовляем функции play
  Array.from(playBtns).forEach((el) => {
    el.addEventListener('click', () => {
      playMovie(el)
    })
  });

  Array.from(fullPicSlides).forEach((el) => {
    const movie = el.querySelector('video');
    if (movie) {
      movie.addEventListener('click', () => {
        stopMovie(movie)
      })
    }

  });



  //вывод номера текущего слайда
  function setCurrentSlide() {
    const currentSlide = document.querySelector('#currentSlide');
    currentSlide.innerHTML = idxActiveSlide + 1;
  }

  //вывод общего количество слайдев
  function setTotalSlides() {
    const totalSlides = slider.querySelector('#totalSlide');
    totalSlides.innerHTML = slides.length;
  }

  // проверяет наличие класса в noteList
  // и возвращает индекс
  function getIndexActiveEl(noteList, className) {
    let index = 0;
    Array.from(noteList).forEach((item, idx) => {
      if (item.classList.contains(className)) {
        index = idx;
        return;
      }
    })


    return index;
  }

  // устанавливает активный класс
  function setActiveEl(noteList, idx, className) {
    Array.from(noteList).forEach((item) => {
      item.classList.remove(className);
    })
    noteList[idx].classList.add(className);
    setCurrentSlide();
  }

  // функции навигации карусалью
  function prevSlide() {

    const stepWidth = slides[1].offsetWidth;
    const coorSlidesWrap = slidesWrap.getBoundingClientRect();
    const coorCarousel = slider.getBoundingClientRect();

    if (coorSlidesWrap.left >= coorCarousel.left) {
      return;
    }
    if (isMoving) {
      return;
    }
    isMoving = true;
    idxActiveSlide -= 1;
    setActiveEl(slides, idxActiveSlide, "slider__item--is-active");
    slidesWrap.style.left = (parseInt(getComputedStyle(slidesWrap)['left'], 10) + stepWidth) + 'px';
    setActiveEl(dots, idxActiveSlide, 'slider__dot--is-activ');
    moveDots();
  }

  function nextSlide() {
    const stepWidth = slides[1].offsetWidth;

    if (idxActiveSlide + 1 >= slides.length) {
      return;
    }
    if (isMoving) {
      return;
    }
    isMoving = true;
    idxActiveSlide += 1;
    setActiveEl(slides, idxActiveSlide, "slider__item--is-active");
    slidesWrap.style.left = (parseInt(getComputedStyle(slidesWrap)['left'], 10) - stepWidth) + 'px';
    setActiveEl(dots, idxActiveSlide, 'slider__dot--is-activ');
    moveDots();
  }

  // функции навигации карусалью точками
  function dotsManagement(idx) {
    const stepWidth = slides[1].offsetWidth;
    const shift = idx * stepWidth;
    idxActiveSlide = parseInt(idx);

    setActiveEl(dots, idx, 'slider__dot--is-activ');
    setActiveEl(slides, idx, "slider__item--is-active");
    slidesWrap.style.left = -shift + 'px';
    moveDots();
  }

  // Меняет значения флага
  function movingEvent() {
    isMoving = false;
  }

  // функция прокрутки точек
  function moveDots() {
    const dotsWidth = dots[0].offsetWidth;
    const matginR = getComputedStyle(dots[0]).marginRight;
    const step = (dotsWidth + parseInt(matginR));
    const totalStep = idxActiveSlide - 1;
    const shift = totalStep * step;
    const dotsWrap = slider.querySelector('#sliderDotsWrap');
    if (idxActiveSlide < 1) {
      return;
    }

    if (dots.length - 2 < idxActiveSlide) {
      return;
    }
    dotsWrap.style.left = -shift + 'px';

  }

  function showFullPicSlider(idx) {
    fullPicSlider.classList.add('full-pic--is-active');
    showCurrentFullPic(idx);
  }

  // закрываем блок с понорозмерными эл
  function closeFullPicSlider() {
    fullPicSlider.classList.remove('full-pic--is-active')
    Array.from(fullPicSlides).forEach((el) => {
      el.classList.remove('full-pic__item--is-active');
      if (el.querySelector('video')) {
        el.querySelector('video').pause();
      }
    })
  }
  //Показать полную версию картинки и текушего слайда
  function showCurrentFullPic(idx) {
    Array.from(fullPicSlides).forEach((el) => {
      el.classList.remove('full-pic__item--is-active');
      if (el.querySelector('video')) {
        el.querySelector('video').pause();
      }
    })

    fullPicSlides[idx].classList.add('full-pic__item--is-active');
  }
}

function mainSlider(el, autoplay) {

  // слайды

  let slides = el.querySelectorAll('.main-slider__item');
  // индекс последнего слайда
  const lastIdx = slides.length - 1;
  //эл. управления
  const reviewNext = el.querySelector('.main-slider__next');
  const reviewPrev = el.querySelector('.main-slider__prev');

  //добовляем активный класс
  slides[0].classList.add('main-slider__item--is-active');
  //добовляем который переносит слайде вправо от лнка карусели
  slides[lastIdx].classList.add('main-slider__item--is-right');
  // Вырезаем последний слай и ставим его вперед
  slides[0].before(slides[lastIdx])
  if (reviewNext) {
    reviewNext.addEventListener('click', next);
  }
  if (reviewPrev) {
    reviewPrev.addEventListener('click', prev);
  }



  //Начало движения
  el.addEventListener('touchstart', function (e) { startTouchMove(e) });
  // Отслеживает путь и растояние
  el.addEventListener('touchmove', function (e) { touchMove(e) });
  // Окончание движение
  el.addEventListener('touchend', function () { touchEnd(next, prev) });

  function prev() {
    let slides = el.querySelectorAll('.main-slider__item');
    slides[0].classList.remove('main-slider__item--is-right');
    slides[0].classList.add('main-slider__item--is-active');
    slides[1].classList.remove('main-slider__item--is-active');
    setTimeout(() => {
      slides[lastIdx].classList.add('main-slider__item--is-right');
      slides[0].before(slides[lastIdx]);
    }, 200)
  }

  function next() {
    let slides = el.querySelectorAll('.main-slider__item');
    slides[1].classList.remove('main-slider__item--is-active');
    slides[1].classList.add('main-slider__item--is-right');

    slides[2].classList.add('main-slider__item--is-active');

    setTimeout(() => {
      slides[0].classList.remove('main-slider__item--is-right');
      slides[lastIdx].after(slides[0]);
    }, 200)

  }

  if (autoplay) {
    const interval = +el.getAttribute('data-interval') * 1000
    setInterval(() => {
      next()
    }, interval)
  }
}

// Запускаем видео
function playMovie(el) {
  const parent = el.closest('.full-pic__item');
  const movie = parent.querySelector('video');
  el.classList.add('full-pic__play--is-hide');
  movie.play();
}

function stopMovie(el) {
  const parent = el.closest('.full-pic__item');
  const playBtn = parent.querySelector('.full-pic__play')
  playBtn.classList.remove('full-pic__play--is-hide');
  el.pause();
}

//Конец slider


// Управление каруселью сенсером
// Начало движения
function startTouchMove(e) {
  touchStart = e.changedTouches[0].clientX;
  touchPosition = touchStart;
}

//Отслеживает джижение
function touchMove(e) {
  touchPosition = e.changedTouches[0].clientX;
}

// Конец движения
function touchEnd(next, prev) {
  let distance = touchStart - touchPosition;
  if (distance > 0 && distance >= sensitivity) {
    next();
  }
  if (distance < 0 && distance * -1 >= sensitivity) {
    prev();
  }
}


//Открытие и закрытие модульных окон

//Устанавливает высоту bgModal
setBgModalHeight(bgModal);

window.addEventListener(`resize`, () => {
  setBgModalHeight(bgModal);
  //setBgModalHeight(callbackFormBg);
  adaptDropdownsHeight();
}, false);
if (faqModal) {
  window.addEventListener(`resize`, () => {
    setBgModalHeight(faqModal);
  }, false);
}


// добовляем фунцию отктрытия окна онлайн заявки
application.addEventListener('click', () => {
  showModal(applicationModal)
});

// добовляем фунцию отктрытия окна заказ
Array.from(orderBtns).forEach((el) => {
  el.addEventListener('click', () => { showModal(order) });
});

// Добовляем функцию закрытия для модульных окон
Array.from(closeBtn).forEach((el) => {
  el.addEventListener('click', () => { closeModal(el) });
});

// Добовляем функцию открытия callbackModal
callbackOpenBtn.addEventListener('click', callbackModalOpen)

// Добовляем функцию закрытия callbackModal
Array.from(callbackClose).forEach((el) => {
  el.addEventListener('click', callbackModalClose);
});


//окно faq
if (faqModal) {
  setBgModalHeight(faqModal);
  window.addEventListener(`resize`, () => {
    setBgModalHeight(faqModal);
  }, false);

  // добовляем фунцию отктрытия окна faq
  faqFormBtn.addEventListener('click', (e) => {
    e.preventDefault();
    showFaqModal();
  })
}

// добовляем фунцию закрытия окна faq
Array.from(closeFaqBtns).forEach((el) => {
  el.addEventListener('click', () => { closeFaqModal() });
});


// Устанавливает высоту bgModal
function setBgModalHeight(idbgModal) {
  idbgModal.style.height = window.innerHeight + 'px';
}


//Функция открытия модульного faq
function showFaqModal() {
  const questInput = faqForm.querySelector('#questInput');
  const faqFormError = faqForm.querySelector('#faqFormError');
  const value = questInput.value.trim();
  faqFormError.classList.remove('error--is-show');
  if (!value) {
    faqFormError.classList.add('error--is-show');
    questInput.value = '';
    return;
  }
  faqModal.classList.add('modal--is-show')
}
//Функция закрытия модульного faq
function closeFaqModal() {
  faqModal.classList.remove('modal--is-show')
}

//callback-close Закрываем модульное окно callBack Обратная связь
// Открываем callbackModal
function callbackModalOpen() {
  callbackFormModal.classList.add('callback-form__wrap--is-show');
}
// Закрываем callbackModal
function callbackModalClose() {
  callbackFormModal.classList.remove('callback-form__wrap--is-show');
}
//Функция открытия модульного окна
function showModal(idModal) {
  bgModal.classList.add('shading--is-show');
  idModal.classList.add('modal--is-show');
  body.classList.add('is-no-scroll');
}

// Функция закрытия модульных окон
function closeModal(el) {
  const modal = el.closest('.modal');
  modal.classList.remove('modal--is-show');
  bgModal.classList.remove('shading--is-show');
  body.classList.remove('is-no-scroll');
}

function openMobileMenu() {
  mobileMenu.classList.add('mobile-menu--is-open')
}
function closeMobileMenu() {
  mobileMenu.classList.remove('mobile-menu--is-open')
}


//Добовляем функцию открывае/закрывае выподающих эл
document.onclick = function (e) {
  const el = e.target;
  if (el.closest('.press-to-show')) {
    slow(el);
  }
}


// Открываем/закрываем выподоющие эл
function slow(el) {
  const dropdownWrap = el.closest('.dropdown-wrap')
  const dropdownHeader = dropdownWrap.querySelector('.press-to-show');
  const dropdown = dropdownWrap.querySelector('.dropdown');
  const hiddenEl = dropdownWrap.querySelector('.hidden-el');
  const arrow = dropdownWrap.querySelector('.arrow-show');
  const heightHiddenEl = hiddenEl.clientHeight;
  if (dropdown.classList.contains('dropdown--is-show')) {
    dropdown.style.height = '0px';
    dropdown.classList.remove('dropdown--is-show');
    arrow.classList.remove('arrow-up');
    dropdownWrap.classList.remove('is-active');
    dropdownHeader.classList.remove('is-active')
    return;
  }
  dropdown.style.height = heightHiddenEl + 'px';
  dropdown.classList.add('dropdown--is-show');
  arrow.classList.add('arrow-up');
  dropdownWrap.classList.add('is-active');
  dropdownHeader.classList.add('is-active')
}

//Адаптирует высоту dropdown 
function adaptDropdownsHeight() {

  Array.from(dropdownWraps).forEach((el) => {
    const dropdown = el.querySelector('.dropdown');
    const hiddenEl = dropdown.querySelector('.hidden-el');

    if (dropdown.classList.contains('dropdown--is-show')) {
      const dropdownHeight = hiddenEl.clientHeight;
      dropdown.style.height = dropdownHeight + 'px';
    }
  })
}

// Валидация форм
//Устанавливает заданное число при
// условии если введеное число меньше или NaN
function setValueCountInput(value) {
  const orderPrice = orderForm.querySelector('#orderPrice')
  const price = +orderPrice.getAttribute('data-price')
  const inputValue = +orderQuantityInput.value;
  if (inputValue < 0 || isNaN(inputValue)) {
    orderQuantityInput.value = value;
    orderPrice.innerHTML = totalPrice(price, value).toLocaleString();
    return;
  }
  orderPrice.innerHTML = totalPrice(price, inputValue).toLocaleString();
}


function applicationFormCheck() {
  hideErrorMessages(applicationForm);
  applicationInputsCheck();
}

function applicationInputsCheck() {
  const error = applicationForm.querySelector('.phone')
  const inputs = applicationForm.querySelectorAll('input');
  const applicationTel = applicationForm.querySelector('#applicationTel')
  const value = applicationTel.value
  const success = regexСheck(value, regTel);
  if (isEmptyValue(inputs, applicationForm)) {
    return;
  }
  if (success) {
    applicationFormSend()
  } else {
    error.classList.add('error--is-show');
  }
}

function applicationFormSend() {
  const formData = new FormData(applicationForm);
  const xhr = new XMLHttpRequest();

  xhr.open("POST", applicationForm.action);
  xhr.send(formData);

  xhr.onload = function () {
    if (xhr.status != 200) {
      noSend(applicationForm);
      console.log('Ошибка: ' + xhr.status);
      return;
    } else {
      let response = JSON.parse(xhr.response);
      if (response == 1) {
        applicationThanks.classList.add('modal--is-show');
        applicationModal.classList.remove('modal--is-show');
        clearInputs(inputs);
        console.log("Форма отправилась");
      } else {
        noSend(applicationForm);
        console.log("Неудачная отправка");
      }
    }
  };

  xhr.onerror = function () {
    console.log('Неудачная отправка');
  };

}

function callbackFormCheck() {
  hideErrorMessages(callbackForm);
  callbackInputsCheck();
}

function callbackInputsCheck() {
  const inputs = callbackForm.querySelectorAll('input');
  const success = valueCheck(inputs, callbackForm);
  if (success) {
    callbackFormSend()
  }
}

function callbackFormSend() {
  const formData = new FormData(callbackForm);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", callbackForm.action);
  xhr.send(formData);
  xhr.onload = function () {
    if (xhr.status != 200) {
      noSend(callbackForm);
      console.log('Ошибка: ' + xhr.status);
      return;
    } else {
      let response = JSON.parse(xhr.response);
      if (response == 1) {
        bgModal.classList.add('shading--is-show')
        applicationThanks.classList.add('modal--is-show');
        callbackFormModal.classList.remove('callback-form__wrap--is-show')
        console.log("Форма отправилась");
        clearInputs(inputs);
      } else {
        noSend(callbackForm);
        console.log("Неудачная отправка");
      }
    }
  };

  xhr.onerror = function () {
    console.log('Неудачная отправка');
  };
}

function faqFormCheck() {
  hideErrorMessages(faqForm);
  faqInputsCheck();
}
function faqInputsCheck() {
  const error = faqForm.querySelector('.mail')
  const inputs = faqForm.querySelectorAll('input');
  const faqMailInput = faqForm.querySelector('#faqMail');
  const value = faqMailInput.value;
  const success = regexСheck(value, regMail);
  if (isEmptyValue(inputs, faqForm)) {
    return;
  }
  if (success) {
    faqFormSend();
  } else {
    error.classList.add('error--is-show');
  }
}

function faqFormSend() {
  const formData = new FormData(faqForm);
  const xhr = new XMLHttpRequest();
  xhr.open("POST", faqForm.action);
  xhr.send(formData);
  xhr.onload = function () {
    if (xhr.status != 200) {
      noSend(faqForm);
      console.log('Ошибка: ' + xhr.status);
      return;
    } else {
      let response = JSON.parse(xhr.response);
      if (response == 1) {
        const faqThanks = bgModal.querySelector('#faqThanks');
        bgModal.classList.add('shading--is-show');
        faqThanks.classList.add('modal--is-show');
        faqModal.classList.remove('modal--is-show');
        clearInputs(inputs);
        console.log("Форма отправилась");
      } else {
        noSend(faqForm);
        console.log("Неудачная отправка");
      }
    }
  };

  xhr.onerror = function () {
    console.log('Неудачная отправка');
  };
}
function orderFormCheck() {
  hideErrorMessages(orderForm);
  orderInputsCheck();
}

function orderInputsCheck() {
  const mailOrTel = orderForm.querySelector('#mailOrTel');
  const orderFormInputs = orderForm.querySelectorAll('.input');
  const errorMail = orderForm.querySelector('#errorMail');
  const errorTel = orderForm.querySelector('#errorTel');
  const inputMail = orderForm.querySelector('#inputMail');
  const inputTel = orderForm.querySelector('#inputTel');
  const mailValue = inputMail.value.trim();
  const telValue = inputTel.value.trim();
  const resCheckMail = regexСheck(mailValue, regMail);
  const resCheckTel = regexСheck(telValue, regTel);
  let resCheck = true;
  if (!resCheckMail) {
    if (mailValue) {
      errorMail.classList.add('error--is-show');
      resCheck = false
    }
  }

  if (!resCheckTel) {
    if (telValue) {
      errorTel.classList.add('error--is-show');
      resCheck = false
    }
  }

  if (!(mailValue || telValue)) {
    mailOrTel.classList.add('error--is-show');
    resCheck = false
  }

  if (resCheck) {
    sendOrderForm()


  }


  function sendOrderForm() {
    const formData = new FormData(orderForm);
    const xhr = new XMLHttpRequest();
    xhr.open("POST", orderForm.action);
    xhr.send(formData);
    xhr.onload = function () {
      if (xhr.status != 200) {
        noSend(orderForm);
        console.log('Ошибка: ' + xhr.status);
        return;
      } else {
        let response = JSON.parse(xhr.response);
        if (response == 1) {
          order.classList.remove('modal--is-show');
          applicationThanks.classList.add('modal--is-show');
          console.log("Форма отправилась");
          clearInputs(orderFormInputs);
        } else {
          noSend(orderForm);
          console.log("Неудачная отправка");
        }
      }
    };

    xhr.onerror = function () {
      console.log('Неудачная отправка');
    };

  }
}

function noSend(form) {
  const errorMessage = form.querySelector('.no-send');
  errorMessage.classList.add('error--is-show');
}

// Провекрка на пустое значение инпута
function isEmptyValue(inputs, form) {
  const emptyError = form.querySelector('.empty');
  let isEmpty = false;
  Array.from(inputs).forEach((el) => {
    if (!el.value.trim()) {
      emptyError.classList.add('error--is-show');
      isEmpty = true;
    }
  })
  return isEmpty;
}


// Проверка на регулярным выражением
function regexСheck(value, reg) {
  return reg.test(value)
}

// Прячем сообщения с ошибками
function hideErrorMessages(form) {
  const errorMessage = form.querySelectorAll('.error');
  Array.from(errorMessage).forEach((el) => {
    el.classList.remove('error--is-show');
  })
}


//Проверка занчение, если все значение прошли проверку
// Возвращает true иначи false
function valueCheck(inputs, form) {
  const phoneEroor = form.querySelector('.phone');
  const mailEroor = form.querySelector('.mail');
  let isSuccess = true;
  Array.from(inputs).forEach((el) => {
    const dataType = el.getAttribute('data-type');
    switch (dataType) {
      case 'tel': {
        const value = el.value;
        isSuccess = isSuccess && regexСheck(value, regTel);
        if (!isSuccess) {
          phoneEroor.classList.add('error--is-show');
        }
        break;
      };
      case 'name': {
        isSuccess = true;
        break;
      };

      case 'email': {
        const value = el.value;
        isSuccess = isSuccess && regexСheck(value, regMail);
        if (!isSuccess) {
          mailEroor.classList.add('error--is-show');
        }
        break;
      };
    }
  })

  return isSuccess;
}

//Очищаем инпуты
function clearInputs(inputs) {
  Array.from(inputs).forEach((el) => {
    if (el.type === 'submit') {
      return;
    }
    el.value = '';
  })
}


// яндеск карта
const yandexmap = document.querySelector('#yandexmap'); // блок отображающий карту
if (yandexmap) {
  let map;
  let marker;
  // Координаты
  // Для изменение координат, необходимо 
  // записать новое значенить в атребуте 
  // "data-coord" в блоке id='yandexmap'
  // певое значение ширина, второе долгота
  // через запятую
  const dataCoord = yandexmap.getAttribute('data-coord')
  const coordinates = dataCoord.split(',');

  function initMap() {
    map = new ymaps.Map("yandexmap", {
      center: coordinates,
      zoom: 16
    });
    marker = new ymaps.Placemark(coordinates, {
      hintContent: 'Расположение',
      balloonContent: 'Это наша организация'
    });
    map.geoObjects.add(marker);
  }
  ymaps.ready(initMap);
}

//возвращает ширину елемента
function getWidthEl(el) {
  return el.clientWidth;
}

//Открывает, закрывает строку тпоиска для мобильной версии
function showSearch() {
  mobileSearchWrap.classList.toggle('search-mobile--is-hide'
  );
}

// функия смены свойство position  mainBg
function changePosition() {
  const mainBgCoord = mainBg.getBoundingClientRect();
  const footerCoord = footer.getBoundingClientRect();
  // Взависимости от условия 
  if (footerCoord.y <= mainBgCoord.height) {
    // позиция absolute для прижития bg  к футеру
    mainBg.classList.add('main-bg--absolute');
  } else {
    // позиция fixed для прижития bg к top экрана
    mainBg.classList.remove('main-bg--absolute');
  }
}

// Показывает скрывает кнопку эл
// Взависимости от прокрутки страницы
function showUp() {
  const coord = body.getBoundingClientRect()
  if (coord.top < -1000) {
    up.classList.add('up--is-show')
  } else {
    up.classList.remove('up--is-show')
  }
}

// увеличевает количество товаров и вываит итоговую цену
function increase() {
  const price = +orderPrice.getAttribute('data-price');
  const quantity = +orderQuantityInput.value + 1;
  orderQuantityInput.value = quantity;
  orderPrice.innerHTML = totalPrice(price, quantity).toLocaleString();
}
// уменьшает количество товаров и вываит итоговую цену
function decrease() {
  const price = +orderPrice.getAttribute('data-price');
  const quantity = +orderQuantityInput.value - 1;
  orderQuantityInput.value = quantity;
  if (orderQuantityInput.value < 1) {
    setValueCountInput(1);
    return;
  }

  orderPrice.innerHTML = totalPrice(price, quantity).toLocaleString();
}

function setHeightreviewSlide() {
  const reviewsSlidesWrap = reviews.querySelector('.review__slider')
  const reviewsSlide = reviews.querySelector('.review__slide')
  const heightSlide = reviewsSlide.offsetHeight;
  reviewsSlidesWrap.style.height = heightSlide + 'px';
}

//умножает в возвращает результат
function totalPrice(numA, numB) {
  return numA * numB;
}