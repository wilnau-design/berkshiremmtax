document.addEventListener('DOMContentLoaded', function () {

	/* --- Mobile menu --- */
	var toggle = document.querySelector('.menu-toggle');
	var panel = document.getElementById('primary-menu-panel');
	var header = document.querySelector('.site-header');
	var navigation = header ? header.querySelector('.site-navigation') : null;

	function closeMobileMenu() {
		if (!header || !header.classList.contains('is-menu-open')) return;
		header.classList.remove('is-menu-open');
		if (toggle) toggle.setAttribute('aria-expanded', 'false');
	}

	if (toggle && panel) {
		toggle.addEventListener('click', function () {
			var isOpen = header.classList.toggle('is-menu-open');
			toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
		});

		document.addEventListener('click', function (event) {
			if (!header.classList.contains('is-menu-open')) return;
			if (toggle.contains(event.target)) return;
			if (navigation && navigation.contains(event.target)) return;
			closeMobileMenu();
		});
	}

	/* --- Bio modals --- */
	function openBioModal(id) {
		var modal = document.getElementById(id);
		if (!modal) return;
		modal.setAttribute('aria-hidden', 'false');
		modal.classList.add('is-open');
		document.body.style.overflow = 'hidden';
		var closeBtn = modal.querySelector('.bio-modal__close');
		if (closeBtn) closeBtn.focus();
	}

	function closeBioModal(modal) {
		modal.setAttribute('aria-hidden', 'true');
		modal.classList.remove('is-open');
		document.body.style.overflow = '';
		// collapse expanded section when closing
		var expanded = modal.querySelector('.bio-modal__expanded');
		var readMore = modal.querySelector('.bio-modal__read-more');
		if (expanded) expanded.setAttribute('aria-hidden', 'true');
		if (readMore) {
			readMore.setAttribute('aria-expanded', 'false');
			var readMoreLabel = readMore.querySelector('span');
			if (readMoreLabel) readMoreLabel.textContent = 'READ MORE';
		}
	}

	// Open triggers (READ BIO buttons on cards)
	document.querySelectorAll('[data-bio-target]').forEach(function (btn) {
		btn.addEventListener('click', function () {
			openBioModal(btn.dataset.bioTarget);
		});
	});

	// Per-modal wiring
	document.querySelectorAll('.bio-modal').forEach(function (modal) {
		// Close button
		var closeBtn = modal.querySelector('.bio-modal__close');
		if (closeBtn) {
			closeBtn.addEventListener('click', function () { closeBioModal(modal); });
		}

		// Backdrop click
		var backdrop = modal.querySelector('.bio-modal__backdrop');
		if (backdrop) {
			backdrop.addEventListener('click', function () { closeBioModal(modal); });
		}

		// READ MORE / READ LESS toggle
		var toggleBtn = modal.querySelector('.bio-modal__read-more');
		var expanded = modal.querySelector('.bio-modal__expanded');
		if (toggleBtn && expanded) {
			toggleBtn.addEventListener('click', function () {
				var isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
				var label = toggleBtn.querySelector('span');
				if (isExpanded) {
					expanded.setAttribute('aria-hidden', 'true');
					toggleBtn.setAttribute('aria-expanded', 'false');
					if (label) label.textContent = 'READ MORE';
				} else {
					expanded.setAttribute('aria-hidden', 'false');
					toggleBtn.setAttribute('aria-expanded', 'true');
					if (label) label.textContent = 'READ LESS';
				}
			});
		}
	});

	/* --- Scroll to top --- */
	var scrollTopBtn = document.querySelector('.scroll-top');
	if (scrollTopBtn) {
		var scrollThreshold = 400;

		function updateScrollTop() {
			var show = window.scrollY > scrollThreshold;
			scrollTopBtn.hidden = !show;
			scrollTopBtn.classList.toggle('is-visible', show);
		}

		window.addEventListener('scroll', updateScrollTop, { passive: true });
		updateScrollTop();

		scrollTopBtn.addEventListener('click', function () {
			var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
			window.scrollTo({ top: 0, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
		});
	}

	// Global Escape key
	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape') {
			if (header && header.classList.contains('is-menu-open')) {
				closeMobileMenu();
				if (toggle) toggle.focus();
			}
			var openModal = document.querySelector('.bio-modal.is-open');
			if (openModal) closeBioModal(openModal);
		}
	});
});
