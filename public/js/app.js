document.addEventListener('DOMContentLoaded', function () {
  function applyTheme(theme) {
    const value = theme === 'light' ? 'light' : 'dark';
    document.body.setAttribute('data-theme', value);
    document.documentElement.setAttribute('data-theme', value);
    localStorage.setItem('sc-theme', value);

    document.querySelectorAll('.theme-option').forEach(function (button) {
      const isActive = button.getAttribute('data-theme') === value;
      button.classList.toggle('active', isActive);
    });
  }

  function formatMoney(value) {
    return new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    }).format(Number(value) || 0);
  }

  function formatPercent(value) {
    const safeValue = Number(value) || 0;
    return `${safeValue >= 0 ? '+' : ''}${safeValue.toFixed(2)}%`;
  }

  function formatMarketCap(value) {
    const safeValue = Number(value) || 0;
    if (safeValue >= 1000000000000) {
      return '$' + (safeValue / 1000000000000).toFixed(2) + 'T';
    }
    if (safeValue >= 1000000000) {
      return '$' + (safeValue / 1000000000).toFixed(2) + 'B';
    }
    if (safeValue >= 1000000) {
      return '$' + (safeValue / 1000000).toFixed(2) + 'M';
    }
    return '$' + safeValue.toFixed(2);
  }

  async function refreshMarketTable() {
    const table = document.getElementById('live-market-table');
    if (!table) return;

    try {
      const response = await fetch('/api/market', { headers: { 'Accept': 'application/json' } });
      if (!response.ok) return;

      const data = await response.json();
      if (!Array.isArray(data)) return;

      const marketMap = new Map(data.map(function (coin) {
        return [String(coin.symbol || '').toLowerCase(), coin];
      }));

      table.querySelectorAll('.live-market-row').forEach(function (row) {
        const symbol = String(row.dataset.symbol || '').toLowerCase();
        const coin = marketMap.get(symbol);
        if (!coin) return;

        const priceEl = row.querySelector('.live-price');
        const changeEl = row.querySelector('.live-change');
        const changePill = row.querySelector('.change-pill');
        const marketCapEl = row.querySelector('.live-market-cap');

        // Animate price update
        if (priceEl) {
          const oldPrice = priceEl.textContent;
          const newPrice = formatMoney(coin.price);
          if (oldPrice !== newPrice) {
            priceEl.classList.remove('price-update');
            // Trigger reflow to restart animation
            void priceEl.offsetWidth;
            priceEl.classList.add('price-update');
          }
          priceEl.textContent = newPrice;
        }

        // Animate change indicator with pulse effect
        if (changeEl && changePill) {
          const isPositive = Number(coin.change_24h) >= 0;
          const wasPositive = changePill.classList.contains('up');
          
          // Update classes
          changePill.classList.toggle('up', isPositive);
          changePill.classList.toggle('down', !isPositive);
          changePill.querySelector('i').className = 'bi ' + (isPositive ? 'bi-arrow-up-right' : 'bi-arrow-down-right');
          
          const newChange = formatPercent(coin.change_24h);
          if (changeEl.textContent !== newChange) {
            // Trigger pulse animation
            changePill.classList.remove('pulse-update');
            void changePill.offsetWidth;
            changePill.classList.add('pulse-update');
          }
          changeEl.textContent = newChange;
        }

        if (marketCapEl) {
          marketCapEl.textContent = formatMarketCap(coin.market_cap);
        }
      });
    } catch (error) {
      // Fail silently and keep the last rendered values.
    }
  }

  const savedTheme = localStorage.getItem('sc-theme') || 'dark';
  applyTheme(savedTheme);

  document.querySelectorAll('.theme-option').forEach(function (button) {
    button.addEventListener('click', function () {
      applyTheme(this.getAttribute('data-theme'));
    });
  });

  // Reveal-on-scroll for elements marked .reveal
  var revealEls = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && revealEls.length) {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });

    revealEls.forEach(function (el) { observer.observe(el); });
  } else {
    revealEls.forEach(function (el) { el.classList.add('is-visible'); });
  }

  // Stagger delay for grouped reveal items
  document.querySelectorAll('[data-reveal-group]').forEach(function (group) {
    Array.from(group.children).forEach(function (child, i) {
      child.style.transitionDelay = (i * 90) + 'ms';
    });
  });

  refreshMarketTable();
  setInterval(refreshMarketTable, 10000);

  // Hero background slider carousels
  document.querySelectorAll('[data-slider]').forEach(function (slider) {
    const slides = slider.querySelectorAll('.hero-bg-slide, .brand-slide');
    const dots = document.querySelectorAll('.brand-dot');
    let currentIndex = 0;

    if (!slides.length) return;

    function setSlide(index) {
      currentIndex = (index + slides.length) % slides.length;

      slides.forEach(function (slide, i) {
        slide.classList.toggle('active', i === currentIndex);
      });

      dots.forEach(function (dot, i) {
        dot.classList.toggle('active', i === currentIndex);
      });
    }

    dots.forEach(function (dot) {
      dot.addEventListener('click', function () {
        setSlide(Number(this.getAttribute('data-slide-index')));
      });
    });

    setInterval(function () {
      setSlide(currentIndex + 1);
    }, 4200);
  });
});
