'use strict';

function slideUp(target, duration = 500) {
	target.style.transitionProperty = 'height, margin, padding';
	target.style.transitionDuration = duration + 'ms';
	target.style.boxSizing = 'border-box';
	target.style.height = target.offsetHeight + 'px';
	target.offsetHeight;

	requestAnimationFrame(() => {
		target.style.overflow = 'hidden';
		target.style.height = 0;
		target.style.paddingTop = 0;
		target.style.paddingBottom = 0;
		target.style.marginTop = 0;
		target.style.marginBottom = 0;
	});

	window.setTimeout(() => {
		target.style.display = 'none';
		target.style.removeProperty('height');
		target.style.removeProperty('padding-top');
		target.style.removeProperty('padding-bottom');
		target.style.removeProperty('margin-top');
		target.style.removeProperty('margin-bottom');
		target.style.removeProperty('overflow');
		target.style.removeProperty('transition-duration');
		target.style.removeProperty('transition-property');
	}, duration);
}

function slideDown(target, duration = 500) {
	target.style.removeProperty('display');
	let display = window.getComputedStyle(target).display;

	if (display === 'none') display = 'block';

	target.style.display = display;
	let height = target.offsetHeight;
	target.style.overflow = 'hidden';
	target.style.height = 0;
	target.style.paddingTop = 0;
	target.style.paddingBottom = 0;
	target.style.marginTop = 0;
	target.style.marginBottom = 0;
	target.offsetHeight;
	target.style.boxSizing = 'border-box';

	requestAnimationFrame(() => {
		target.style.transitionProperty = "height, margin, padding";
		target.style.transitionDuration = duration + 'ms';
		target.style.height = height + 'px';
		target.style.removeProperty('padding-top');
		target.style.removeProperty('padding-bottom');
		target.style.removeProperty('margin-top');
		target.style.removeProperty('margin-bottom');
	});

	window.setTimeout(() => {
		target.style.removeProperty('height');
		target.style.removeProperty('overflow');
		target.style.removeProperty('transition-duration');
		target.style.removeProperty('transition-property');
	}, duration);
}

function slideToggle(target, duration = 500) {
	if (window.getComputedStyle(target).display === 'none') {
		return slideDown(target, duration);
	} else {
		return slideUp(target, duration);
	}
}

function getSiblings(elem) {
	let siblings = [];

	if (!elem.parentNode) {
		return siblings;
	}
	let sibling = elem.parentNode.firstChild;

	while (sibling) {
		if (sibling.nodeType === 1 && sibling !== elem) {
			siblings.push(sibling);
		}
		sibling = sibling.nextSibling;
	}
	return siblings;
}

function setTelMask() {
	[].forEach.call(document.querySelectorAll('[type="tel"]'), function (input) {
		let keyCode;

		function mask(event) {
			event.keyCode && (keyCode = event.keyCode);
			let pos = this.selectionStart;
			if (pos < 3) event.preventDefault();
			let matrix = input.placeholder,
				i = 0,
				def = matrix.replace(/\D/g, ""),
				val = this.value.replace(/\D/g, ""),
				new_value = matrix.replace(/[_\d]/g, function (a) {
					return i < val.length ? val.charAt(i++) || def.charAt(i) : a
				});
			i = new_value.indexOf("_");
			if (i != -1) {
				i < 5 && (i = 3);
				new_value = new_value.slice(0, i)
			}
			let reg = matrix.substr(0, this.value.length).replace(/_+/g,
				function (a) {
					return "\\d{1," + a.length + "}"
				}).replace(/[+()]/g, "\\$&");
			reg = new RegExp("^" + reg + "$");
			if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
			if (event.type == "blur" && this.value.length < 5) this.value = ""
		}

		input.addEventListener("input", mask, false);
		input.addEventListener("focus", mask, false);
		input.addEventListener("blur", mask, false);
		input.addEventListener("keydown", mask, false)
	});
}

function sendForms() {
	const startTime = Date.now();
	let typingSpeed = [];

	document.querySelectorAll("input, textarea").forEach((field) => {
		let lastTime = null;
		field.addEventListener("input", () => {
			const now = Date.now();
			if (lastTime) {
				typingSpeed.push(now - lastTime);
			}
			lastTime = now;
		});
	});

	document.querySelectorAll('form.js-form').forEach(function (form) {
		form.addEventListener('submit', function (e) {
			e.preventDefault();

			let formData = new FormData(form);
			const formName = form.getAttribute('name');
			const submitBtm = form.querySelector('button[type=submit]');
			const submitBtnText = submitBtm.innerHTML;

			if (formName) {
				formData.append('form_name', formName);
				formData.append('time_on_page', Date.now() - startTime);
				formData.append('typing_speed', JSON.stringify(typingSpeed));
				formData.append('action', 'send_mail');
				submitBtm.innerHTML = 'Отправляю...'
			} else {
				return;
			}

			form.classList.add('loading');

			const response = fetch(adem_ajax.url, {
				method: 'POST',
				body: formData
			})
				.then(response => response.text())
				.then(data => {
					Fancybox.close(true);
					form.reset();
					form.classList.remove('loading');
					submitBtm.innerHTML = submitBtnText;

					//if (typeof (ym) === "function") ym(metrika_number, 'reachGoal', 'metrika_ID'); // TODO отправка целей в метрику. Удалить, если не используется.

					setTimeout(function () {
						Fancybox.show([{
							src: '#modal-success',
							type: 'inline'
						}]);
					}, 100);
				})
				.catch((error) => {
					console.error('Error:', error);
				});
		});
	});
}

function showSearchForm() {
	const buttons = document.querySelectorAll('.js-search-btn');
	const form = document.querySelector('#searchform');

	buttons.forEach(function (button) {
		const icon = button.querySelector('use');
		const iconHref = icon.getAttribute('xlink:href');
		const iconHrefClose = iconHref.replace('i-search', 'i-close');

		button.addEventListener('click', function (e) {
			form.classList.toggle('active');
			button.classList.toggle('active');

			if (button.classList.contains('active')) {
				icon.setAttribute('xlink:href', iconHrefClose);
			} else {
				icon.setAttribute('xlink:href', iconHref);
			}
		});
	});
}

function initArticlesSlider() {
	const section = document.querySelector('.articles');

	if (!section) return;

	const swiper = new Swiper(section.querySelector('.swiper'), {
		slidesPerView: 'auto',
		spaceBetween: 20,
		pagination: {
			el: section.querySelector('.swiper-pagination'),
			type: 'progressbar',
		},
	});
}

function initMainHeroSlider() {
	const section = document.querySelector('.main-hero');

	if (!section) return;

	const swiper = new Swiper(section.querySelector('.swiper'), {
		slidesPerView: 1,
		spaceBetween: 0,
		loop: true,
		effect: 'creative',
		allowTouchMove: false,
		speed: 2000,
		autoplay: {
			delay: 6000
		},
		creativeEffect: {
			prev: {
				opacity: 0,
			},
			next: {
				opacity: 0,
			},
		},
		pagination: {
			el: section.querySelector('.swiper-pagination'),
			type: 'bullets',
			clickable: true,
		},
		on: {
			slideChange: function (swiper) {
				section.querySelector('.js-main-hero-nav button.active').classList.remove('active');
				section.querySelector('.js-main-hero-nav button[data-index="' + swiper.realIndex + '"]').classList.add('active');
			}
		}
	});

	section.querySelector('.js-main-hero-nav').addEventListener('click', function (e) {
		const button = e.target.closest('button');

		if (button) {
			button.classList.add('active');

			swiper.slideToLoop(+button.dataset.index);

			getSiblings(button.closest('li')).forEach(function (li) {
				li.querySelector('button').classList.remove('active');
			});
		}
	});
}

function initProductsSlider() {
	const sections = document.querySelectorAll('.products');

	if (!sections) return;

	sections.forEach(function (section) {
		const swiper = new Swiper(section.querySelector('.swiper'), {
			slidesPerView: 'auto',
			slidesPerGroup: 1,
			spaceBetween: 13,
			centerInsufficientSlides: true,
			pagination: {
				el: section.querySelector('.swiper-pagination'),
				type: 'progressbar',
			},
			navigation: {
				nextEl: section.querySelector('.arrow--next'),
				prevEl: section.querySelector('.arrow--prev'),
			},
			breakpoints: {
				577: {
					slidesPerView: 2,
					slidesPerGroup: 2,
				},
				1025: {
					slidesPerView: 3,
					slidesPerGroup: 3,
				},
				1201: {
					slidesPerView: 4,
					slidesPerGroup: 4,
				}
			},
			on: {
				init: function (e) {
					let currentIndex = 0;
					if ('max' === e.currentBreakpoint) {
						currentIndex = e.passedParams.slidesPerGroup;
					} else {
						currentIndex = e.passedParams.breakpoints[e.currentBreakpoint].slidesPerGroup;
					}
					section.querySelector('.products__count').innerHTML = formatString(currentIndex, e.slides.length);
				},
				slideChange: function (e) {
					let currentIndex = 0;
					if ('max' === e.currentBreakpoint) {
						currentIndex = e.passedParams.slidesPerGroup;
					} else {
						currentIndex = e.passedParams.breakpoints[e.currentBreakpoint].slidesPerGroup;
					}
					section.querySelector('.products__count').innerHTML = formatString(currentIndex + e.activeIndex, e.slides.length);
				}
			},
		});
	});

	function formatString(currentIndex, slidesLength) {
		return '<span>' + withLeadingZero(currentIndex) + '<span>/</span></span>' + withLeadingZero(slidesLength);
	}

	function withLeadingZero(num) {
		return num < 10 ? '0' + num : String(num);
	}
}

function initAccordion() {
	const accord_containers = document.querySelectorAll('.js-accord');

	if (!accord_containers) return;

	accord_containers.forEach(function (list) {
		list.addEventListener('click', function (e) {
			const target = e.target.closest('.js-accord-name');

			if (target) {
				target.parentElement.classList.toggle('active');
				slideToggle(target.nextElementSibling);
			}
		});
	});
}

function initDocsSlider() {
	const sections = document.querySelectorAll('.docs');

	if (!sections) return;

	sections.forEach(function (section) {
		const swiper = new Swiper(section.querySelector('.swiper'), {
			slidesPerView: 'auto',
			spaceBetween: 10,
			navigation: {
				nextEl: section.querySelector('.arrow--next'),
				prevEl: section.querySelector('.arrow--prev'),
			},
		});
	});
}

function initTabs() {
	const tabsLists = document.querySelectorAll('.js-tabs');

	if (!tabsLists) return;

	if (tabsLists) {
		tabsLists.forEach(function (tabsList) {
			tabsList.addEventListener('click', function (e) {
				const tabItem = e.target.closest('[data-tab]');

				if (tabItem && tabItem.classList.contains('active')) {
					tabsList.classList.toggle('open');
				}

				if (tabItem && !tabItem.classList.contains('active') && e.target !== tabsList) {
					const currentTab = tabsList.querySelector('.active');

					changeTab(tabItem, currentTab);
				}
			});
		})
	}

	function changeTab(tabItem, currentTabItem) {
		const tabContainers = document.querySelectorAll('[data-tab-container="' + tabItem.getAttribute('data-tab') + '"]');
		const currentTabContainers = document.querySelectorAll('[data-tab-container="' + currentTabItem.getAttribute('data-tab') + '"]');

		currentTabItem.classList.remove('active');
		tabItem.classList.add('active');

		currentTabContainers.forEach(function (currentTabContainer) {
			currentTabContainer.classList.remove('active');
		});

		tabContainers.forEach(function (tabContainer) {
			tabContainer.classList.add('active');
		});

		tabItem.parentNode.classList.remove('open');
	}
}

document.addEventListener("DOMContentLoaded", function () {
	Fancybox.bind();

	initAccordion();
	initTabs();

	initArticlesSlider();
	initDocsSlider();
	initMainHeroSlider();
	initProductsSlider();

	setTelMask();
	showSearchForm();
	sendForms();
});
