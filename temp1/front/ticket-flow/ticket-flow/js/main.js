/**
 * Ticket Flow — Homepage interactions.
 * Carousel, collapsible nav and dropdowns are handled by Bootstrap's own JS
 * (loaded in index.html) — nothing to do for those here.
 */

document.addEventListener('DOMContentLoaded', () => {
  initFavoriteButtons();
  initShowMore();
  initPromoCalendar();
  initCopyLinkButtons();
  initGalleryLightbox();
  initTicketCounters();
  initTicketCountdown();
  initTooltips();
  initProfileTabs();
  initProfilePhoneInput();
});

/**
 * Favorite (heart) toggle on event cards.
 * Currently only flips local UI state via data-favorited.
 * Backend integration point: replace the TODO below with a call to your
 * favorites endpoint, e.g.
 *   POST /api/events/{eventId}/favorite   (favorite = true)
 *   DELETE /api/events/{eventId}/favorite (favorite = false)
 * Use the card's `data-event-id` attribute (see .event-card in index.html)
 * to identify which event was toggled.
 */
function initFavoriteButtons() {
  document.querySelectorAll('.favorite-btn, .favorite-toggle-link').forEach((btn) => {
    btn.addEventListener('click', (event) => {
      event.preventDefault();
      event.stopPropagation();

      const card = btn.closest('.event-card');
      const eventId = card ? card.dataset.eventId : null;
      const isFavorited = btn.getAttribute('data-favorited') === 'true';
      const nextState = !isFavorited;

      btn.setAttribute('data-favorited', String(nextState));

      const icon = btn.querySelector('img');
      if (icon) {
        icon.src = nextState
          ? 'assets/icons/icon-heart-filled.svg'
          : 'assets/icons/icon-heart.svg';
      }

      // Buttons with a visible label (e.g. the event detail page's
      // "favorite-toggle-link") update their own text; icon-only buttons
      // (event-card overlay hearts) rely on aria-label instead.
      const label = btn.querySelector('.favorite-toggle-label');
      if (label) {
        label.textContent = nextState ? 'إزالة من المفضلة' : 'إضافة إلى المفضلة';
      } else {
        btn.setAttribute('aria-label', nextState ? 'إزالة من المفضلة' : 'أضف إلى المفضلة');
      }

      // TODO: call favorites API with `eventId` and `nextState`.
      console.log('favorite toggled', { eventId, favorited: nextState });
    });
  });
}

/**
 * "أظهر المزيد" (show more) button under the categories/events list.
 * Backend integration point: this should page/load more results, e.g.
 *   GET /api/events?category=...&page=2
 * and append the returned events into #featuredEventsGrid using the same
 * markup as the existing .event-card elements.
 */
function initShowMore() {
  const showMoreBtn = document.querySelector('.btn-show-more');
  if (!showMoreBtn) return;

  showMoreBtn.addEventListener('click', () => {
    // TODO: replace with real pagination/API call.
    console.log('show more requested');
  });
}

/**
 * Promo strip calendar button — opens the native date picker so visitors
 * can jump to events on a specific date.
 * Backend integration point: on `change`, use `input.value` (YYYY-MM-DD)
 * to filter/redirect to events happening that day, e.g.
 *   GET /api/events?date=2026-08-01
 */
function initPromoCalendar() {
  const btn = document.getElementById('promoCalendarBtn');
  const input = document.getElementById('promoCalendarInput');
  if (!btn || !input) return;

  btn.addEventListener('click', () => {
    if (typeof input.showPicker === 'function') {
      input.showPicker();
    } else {
      input.focus();
    }
  });

  input.addEventListener('change', () => {
    // TODO: filter events by the selected date.
    console.log('date selected', input.value);
  });
}

/**
 * "نسخ الرابط" (copy link) item inside the share dropdown (event detail page).
 * Copies the current page URL and briefly confirms with a label swap.
 */
function initCopyLinkButtons() {
  document.querySelectorAll('.copy-link-btn').forEach((btn) => {
    btn.addEventListener('click', () => {
      const label = btn.querySelector('.copy-link-label');

      navigator.clipboard.writeText(window.location.href).then(() => {
        if (!label) return;
        const originalText = label.textContent;
        label.textContent = 'تم نسخ الرابط';
        setTimeout(() => {
          label.textContent = originalText;
        }, 1500);
      });
    });
  });
}

/**
 * Photo gallery lightbox (event detail page).
 * Clicking a `.gallery-thumb` opens `#galleryLightbox` (a Bootstrap modal)
 * showing that image full-size; the modal's own prev/next arrows and the
 * left/right arrow keys step through the rest of the gallery.
 *
 * Arrow direction follows the same convention as `.hero-carousel`: the
 * right-pointing chevron is "previous" and the left-pointing chevron is
 * "next", matching RTL reading order (older/previous content sits to the
 * right). The ArrowLeft/ArrowRight keys are mapped the same way.
 */
function initGalleryLightbox() {
  const thumbs = document.querySelectorAll('.gallery-thumb');
  const modalEl = document.getElementById('galleryLightbox');
  if (!thumbs.length || !modalEl) return;

  const images = Array.from(thumbs).map((thumb) => {
    const img = thumb.querySelector('img');
    return { src: img.src, alt: img.alt };
  });

  const lightboxImg = document.getElementById('galleryLightboxImg');
  const counter = document.getElementById('galleryLightboxCounter');
  const prevBtn = modalEl.querySelector('.gallery-lightbox-prev');
  const nextBtn = modalEl.querySelector('.gallery-lightbox-next');
  let currentIndex = 0;

  function showImage(index) {
    currentIndex = (index + images.length) % images.length;
    const image = images[currentIndex];
    lightboxImg.src = image.src;
    lightboxImg.alt = image.alt;
    counter.textContent = `${currentIndex + 1} / ${images.length}`;
  }

  thumbs.forEach((thumb, index) => {
    thumb.addEventListener('click', () => {
      showImage(Number(thumb.dataset.galleryIndex ?? index));
    });
  });

  prevBtn.addEventListener('click', () => showImage(currentIndex - 1));
  nextBtn.addEventListener('click', () => showImage(currentIndex + 1));

  modalEl.addEventListener('keydown', (event) => {
    if (event.key === 'ArrowLeft') showImage(currentIndex + 1);
    if (event.key === 'ArrowRight') showImage(currentIndex - 1);
  });
}

/**
 * Ticket selection page — quantity steppers.
 * Each `.ticket-card` carries its unit price in `data-price`; the sticky
 * bottom bar's total ticket count / price and the pay button's disabled
 * state are recomputed from all cards on every click.
 * Backend integration point: on change, this should sync the selected
 * quantities to the cart/order session, e.g.
 *   PATCH /api/orders/{orderId}/items  { ticketTypeId, quantity }
 */
function initTicketCounters() {
  const cards = document.querySelectorAll('.ticket-card');
  if (!cards.length) return;

  const totalCountEl = document.getElementById('ticketTotalCount');
  const totalPriceEl = document.getElementById('ticketTotalPrice');
  const payBtn = document.getElementById('ticketPayBtn');

  function updateTotals() {
    let totalCount = 0;
    let totalPrice = 0;

    cards.forEach((card) => {
      const qty = Number(card.querySelector('.ticket-counter-value').textContent);
      const price = Number(card.dataset.price);
      totalCount += qty;
      totalPrice += qty * price;
    });

    if (totalCountEl) totalCountEl.textContent = `${totalCount}x`;
    if (totalPriceEl) totalPriceEl.textContent = `SAR ${totalPrice.toFixed(2)}`;
    if (payBtn) payBtn.disabled = totalCount === 0;
  }

  cards.forEach((card) => {
    const valueEl = card.querySelector('.ticket-counter-value');
    const minusBtn = card.querySelector('.ticket-counter-minus');
    const plusBtn = card.querySelector('.ticket-counter-plus');

    minusBtn.addEventListener('click', () => {
      const qty = Number(valueEl.textContent);
      if (qty <= 0) return;
      valueEl.textContent = String(qty - 1);
      updateTotals();
    });

    plusBtn.addEventListener('click', () => {
      const qty = Number(valueEl.textContent);
      valueEl.textContent = String(qty + 1);
      updateTotals();
    });
  });

  updateTotals();
}

/**
 * Ticket selection page — reservation countdown.
 * Purely a front-end display timer; the real deadline (and what happens
 * when it hits zero — usually releasing the held tickets) must be driven
 * by the backend/session, e.g. GET /api/orders/{orderId}/hold-expires-at
 */
function initTicketCountdown() {
  const timerEl = document.getElementById('ticketCountdownTimer');
  if (!timerEl) return;

  const [initialMinutes, initialSeconds] = timerEl.textContent
    .split(':')
    .map(Number);
  let remainingSeconds = initialMinutes * 60 + initialSeconds;

  const intervalId = setInterval(() => {
    remainingSeconds -= 1;

    if (remainingSeconds <= 0) {
      remainingSeconds = 0;
      clearInterval(intervalId);
      // TODO: reservation hold expired — release tickets / redirect.
    }

    const minutes = Math.floor(remainingSeconds / 60);
    const seconds = remainingSeconds % 60;
    timerEl.textContent = `${minutes}:${String(seconds).padStart(2, '0')}`;
  }, 1000);
}

/**
 * Bootstrap tooltips (e.g. the payment page's "info" button on the
 * money-back guarantee add-on). Bootstrap 5 requires each trigger to be
 * instantiated explicitly — it doesn't wire these up on its own.
 */
function initTooltips() {
  document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach((el) => {
    new bootstrap.Tooltip(el);
  });
}

/**
 * Profile page tabs (معلوماتي / الإشعارات / كلمة المرور / الخطط والفواتير).
 * Each `.profile-tab`'s `data-tab` matches a `.profile-fields`' `data-panel`.
 */
function initProfileTabs() {
  const tabs = document.querySelectorAll('.profile-tab');
  const panels = document.querySelectorAll('.profile-fields[data-panel]');
  if (!tabs.length || !panels.length) return;

  tabs.forEach((tab) => {
    tab.addEventListener('click', (event) => {
      event.preventDefault();
      const target = tab.dataset.tab;

      tabs.forEach((t) => {
        const isActive = t === tab;
        t.classList.toggle('active', isActive);
        t.setAttribute('aria-selected', isActive ? 'true' : 'false');
      });
      panels.forEach((panel) => {
        panel.classList.toggle('active', panel.dataset.panel === target);
      });
    });
  });
}

/**
 * Phone number field on the profile page's "معلوماتي" tab, powered by
 * intl-tel-input (loaded via CDN in profile.html, before this file).
 * No-ops if the library or the field isn't on the page.
 */
function initProfilePhoneInput() {
  const input = document.querySelector('#profilePhone');
  if (!input || typeof window.intlTelInput !== 'function') return;

  window.intlTelInput(input, {
    initialCountry: 'sa',
    separateDialCode: true,
    loadUtils: () =>
      import('https://cdn.jsdelivr.net/npm/intl-tel-input@29.1.2/dist/js/utils.js'),
  });
}
