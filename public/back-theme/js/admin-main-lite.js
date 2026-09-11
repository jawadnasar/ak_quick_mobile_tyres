/**
 * NextIn Admin — lightweight shell (sidebar, header, tooltips only)
 */
(function () {
    'use strict';

    const select = (el, all = false) => {
        el = el.trim();
        return all ? [...document.querySelectorAll(el)] : document.querySelector(el);
    };

    const on = (type, el, listener, all = false) => {
        if (all) {
            select(el, all).forEach((e) => e.addEventListener(type, listener));
        } else {
            const node = select(el, all);
            if (node) {
                node.addEventListener(type, listener);
            }
        }
    };

    const onscroll = (el, listener) => {
        if (el) {
            el.addEventListener('scroll', listener, { passive: true });
        }
    };

    if (select('.toggle-sidebar-btn')) {
        on('click', '.toggle-sidebar-btn', function () {
            select('body').classList.toggle('toggle-sidebar');
        });
    }

    if (select('.search-bar-toggle')) {
        on('click', '.search-bar-toggle', function () {
            select('.search-bar').classList.toggle('search-bar-show');
        });
    }

    const selectHeader = select('#header');
    if (selectHeader) {
        const headerScrolled = () => {
            selectHeader.classList.toggle('header-scrolled', window.scrollY > 100);
        };
        window.addEventListener('load', headerScrolled, { passive: true });
        onscroll(document, headerScrolled);
    }

    const backtotop = select('.back-to-top');
    if (backtotop) {
        const toggleBacktotop = () => {
            backtotop.classList.toggle('active', window.scrollY > 100);
        };
        window.addEventListener('load', toggleBacktotop, { passive: true });
        onscroll(document, toggleBacktotop);
    }

    if (typeof bootstrap !== 'undefined') {
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach((el) => {
            new bootstrap.Tooltip(el);
        });
    }

    document.querySelectorAll('.needs-validation').forEach((form) => {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
