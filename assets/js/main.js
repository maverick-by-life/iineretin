'use strict';

//мобильное меню
const mobileMenu = document.querySelector('.sidebar');
const showMenuBtn = document.querySelector('.show-menu-btn');

if (showMenuBtn) {
  showMenuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('show');
    showMenuBtn.classList.toggle('active');
  });
}

// аккордеон
const questions = document.querySelectorAll('.questions__item');

if (questions.length > 0) {
  questions[0].classList.add('open');
  questions[0].querySelector('.questions__icon').innerText = '-';

  questions.forEach((question) => {
    question.addEventListener('click', () => {
      questions.forEach((item) => {
        if (item.classList.contains('open')) {
          item.classList.remove('open');
          item.querySelector('.questions__icon').innerText = '+';
        }
      });
      question.classList.add('open');
      question.querySelector('.questions__icon').innerText = '-';
    });
  });
}

// local storage
const agreeBtn = document.querySelector('.agree');
const popup = document.querySelector('.privacy-popup');

if (!localStorage.getItem('agree') && popup) {
  popup.classList.remove('hide');
}

if (popup) {
  agreeBtn.addEventListener('click', () => {
    localStorage.setItem('agree', true);
    popup.classList.add('hide');
  });
}
