import vanillaCalendar from 'vanilla-calendar-pro';
import debounce from 'lodash.debounce';
import $ from 'jquery'

$(function () {
  localStorage.setItem('paginationPage', 2);

  $('#load-more-posts').on('click', function () {
    $(this).addClass('loading');
    searchPosts();
  });

  const clearBtn = $('.search-form__clear');

  const calendar = new vanillaCalendar('#calendar', {
    settings: {
      range: {
        disableAllDays: true,
        // eslint-disable-next-line no-undef
        enabled: post_dates_params.dates,
      },
      lang: 'define',
      visibility: {
        theme: 'dark',
        today: false,
        disabled: false,
      },
    },
    input: true,
    actions: {
      changeToInput(e, calendar) {
        if (!e.target) return;
        if (calendar.selectedDates[0]) {
          calendar.HTMLInputElement.value = calendar.selectedDates[0];
          localStorage.setItem('paginationPage', 1);
          searchPosts(true);
          calendar.hide();
          clearBtn.addClass('active');
        } else {
          calendar.HTMLInputElement.value = '';
          searchPosts(true);
          clearBtn.removeClass('active');
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

  clearBtn.on('click', () => {
    calendar.HTMLInputElement.value = '';
    searchPosts(true);
    clearBtn.removeClass('active');
  })

  $('#text-search').on('keyup keydown', debounce(() => {
    localStorage.setItem('paginationPage', 1);
    searchPosts(true)
  }, 800));

  const str = $('.top__breadcrumbs').html();
  $('.top__breadcrumbs').html(str.replace(/Богослужіння/gi, "<span class='kb-title'>Богослужіння</span>"));
});


function searchPosts(clear = false) {
  const date = $('#calendar').val();
  const text = $('#text-search').val();

  const page = parseInt(localStorage.getItem('paginationPage'));

  $.ajax({
    url: loadmore_params.ajaxurl,
    method: 'POST',
    data: {
      action: 'load_more_posts',
      post_type: $('.worship').attr('data-post-type'),
      page: !clear ? page : 1,
      date,
      text,
    },
    success: function (response) {
      if (response.success) {
        if (response.data.posts.length) {
          const newPosts = response.data.posts.map(function (post) {
            return htmlPost(post);
          });
          if (clear) {
            $('.worship__posts').html(newPosts.join(''));
          } else {
            $('.worship__posts').append(newPosts.join(''));
          }
        } else {
          $('.worship__posts').html('<h5>За вашим запитом нічого не знайдено<h5>');
        }
      } else {
        console.log('AJAX error:', response.data.message);
      }

      $('#load-more-posts').removeClass('loading');

      if (response.data.next_page) {
        $('#load-more-posts').show();
        localStorage.setItem('paginationPage', page + 1);
      } else {
        $('#load-more-posts').hide();
      }
    },
    error: function (error) {
      console.log('AJAX error:', error);
    },
  });
}

function htmlPost(post) {
  return `<div class="slide">
    <a href="${post.link}" class="slide__photo" style="background-image: url('${post.img}')"></a>
    <div class="slide__date">
      <p class="slide__date-day">${post.dateDay}</p>
      <p class="slide__date-mo">${post.dateMoAndYear}</p>
    </div>
    <a href="${post.link}" class="slide__title">${post.title}</a>
    ${post.tag ? `<p class="slide__tag">${post.tag}</p>` : ''}
    <p class="slide__description">${post.description}</p>
    <a href="${post.link}" class="slide__more">Детальніше</a>
  </div>`;
}
