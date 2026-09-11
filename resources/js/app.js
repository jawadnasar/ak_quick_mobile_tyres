import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('mobileNav', () => ({
    open: false,
    toggle() {
        this.open = !this.open;
        document.body.classList.toggle('overflow-hidden', this.open);
    },
    close() {
        this.open = false;
        document.body.classList.remove('overflow-hidden');
    },
}));

Alpine.data('counter', (target, suffix = '') => ({
    current: 0,
    target,
    suffix,
    started: false,
    init() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    this.animate();
                    observer.unobserve(this.$el);
                }
            });
        }, { threshold: 0.3 });
        observer.observe(this.$el);
    },
    animate() {
        if (this.started) return;
        this.started = true;
        const duration = 2000;
        const start = performance.now();
        const tick = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            this.current = Math.floor(this.target * eased);
            if (progress < 1) requestAnimationFrame(tick);
            else this.current = this.target;
        };
        requestAnimationFrame(tick);
    },
}));

Alpine.data('faq', () => ({
    active: null,
    toggle(index) {
        this.active = this.active === index ? null : index;
    },
}));

Alpine.data('portfolioFilter', () => ({
    active: 'all',
    setFilter(filter) {
        this.active = filter;
    },
    matches(categoryId) {
        return this.active === 'all' || String(this.active) === String(categoryId);
    },
}));

Alpine.data('scrollHeader', () => ({
    scrolled: false,
    init() {
        this.scrolled = window.scrollY > 20;
        window.addEventListener('scroll', () => {
            this.scrolled = window.scrollY > 20;
        }, { passive: true });
    },
}));

Alpine.start();
