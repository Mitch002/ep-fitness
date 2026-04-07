/**
 * EP Fitness — Main JS
 * Sticky header shrink + scroll animations
 */

(function () {
	'use strict';

	// ── Sticky header class on scroll ──
	const header = document.querySelector('.ep-site-header');
	if (header) {
		const onScroll = () => {
			header.classList.toggle('scrolled', window.scrollY > 60);
		};
		window.addEventListener('scroll', onScroll, { passive: true });
		onScroll();
	}

	// ── Intersection Observer: animate elements into view ──
	const animateEls = document.querySelectorAll(
		'.ep-service-card, .ep-location-card, .ep-team-card, .ep-stat-number'
	);

	if (animateEls.length && 'IntersectionObserver' in window) {
		const observer = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry, i) => {
					if (entry.isIntersecting) {
						entry.target.style.animationDelay = `${i * 0.08}s`;
						entry.target.classList.add('ep-animate-up');
						observer.unobserve(entry.target);
					}
				});
			},
			{ threshold: 0.15 }
		);

		animateEls.forEach((el) => observer.observe(el));
	}

})();
