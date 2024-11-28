import vanillaCalendar from 'vanilla-calendar-pro';
import debounce from 'lodash.debounce';
import $ from 'jquery'

$(function () {
  let enabledDates = [];
  $('.content-audio').each((index, element) => {
    enabledDates.push($(element).attr('data-date'));
  });

  const calendar = new vanillaCalendar('#calendar', {
    settings: {
      range: {
        disableAllDays: true,
        enabled: enabledDates,
      },
      lang: 'define',
      visibility: {
        theme: 'light',
        today: false,
        disabled: false,
      },
    },
    actions: {
      clickDay(event, self) {
        if (self.selectedDates.length) {
          $('.content-audio').each((index, element) => {
            if (self.selectedDates.includes($(element).attr('data-date'))) {
              $(element).slideDown();
            } else {
              $(element).slideUp();
            }
          })
        } else {
          $('.content-audio').each((index, element) => {
            $(element).slideDown();
          })
        }
      },
    },
    locale: {
      months: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
      weekday: ['Нд', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
    },
    CSSClasses: {
      calendar: 'content__calendar',
    },
  });
  calendar.init();

  $('.content__nav form').on('submit', (e) => {
    e.preventDefault();
  });

  $('.content__nav .search-form__input').on('keyup keydown', debounce(() => {
    const searchTerm = $('.content__nav .search-form__input').val().toLowerCase();
    $('.content-audio').each(function () {
      const text = $(this).text().toLowerCase();
      if (text.includes(searchTerm)) {
        $(this).slideDown();
      } else {
        $(this).slideUp();
      }
    });
  }, 200));
});
