document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll('.fullscreen-section');
    const navDots = document.querySelectorAll('.nav-dot');
    const header = document.getElementById('mainHeader');

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1 // Уменьшаем порог срабатывания
    };

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Animate section content
                const content = entry.target.querySelector('.section-content');
                if (content) content.classList.add('visible');

                // Animate buttons
                const buttons = entry.target.querySelectorAll('.btn');
                buttons.forEach(btn => {
                    if (!btn.classList.contains('visible')) {
                        btn.classList.add('visible');
                    }
                });

                // Zoom background
                const bg = entry.target.querySelector('.section-bg');
                if (bg && !bg.classList.contains('zoomed')) {
                    bg.classList.add('zoomed');
                }

                // Animate benefit cards and contact form
                const cards = entry.target.querySelectorAll('.benefit-card, .contact-form');
                cards.forEach(card => {
                    if (!card.classList.contains('visible')) {
                        card.classList.add('visible');
                    }
                });

                // Update navigation dots
                const sectionId = entry.target.id;
                navDots.forEach(dot => {
                    dot.classList.toggle('active', dot.dataset.section === sectionId);
                });
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        observer.observe(section);
    });

    // Navigation dots click handler
    navDots.forEach(dot => {
        dot.addEventListener('click', function () {
            const sectionId = this.dataset.section;
            const section = document.getElementById(sectionId);

            if (section) {
                window.scrollTo({
                    top: section.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Header scroll effect
    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Form submission
    const partnerForm = document.getElementById('partnerForm');
    const successModal = document.getElementById('successModal');
    const closeModal = document.querySelector('.close-modal');

    partnerForm.addEventListener('submit', function (e) {
        e.preventDefault();

        // Form data collection
        const formData = new FormData(this);
        const formObject = {};
        formData.forEach((value, key) => formObject[key] = value);

        // Show modal instead of alert
        successModal.classList.add('show');
        this.reset();

        // Scroll to top
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Close modal handlers
    closeModal.addEventListener('click', function () {
        successModal.classList.remove('show');
    });

    // Close when clicking outside modal
    window.addEventListener('click', function (e) {
        if (e.target === successModal) {
            successModal.classList.remove('show');
        }
    });

    // Initialize first section
    const firstSection = document.querySelector('.fullscreen-section');
    if (firstSection) {
        const content = firstSection.querySelector('.section-content');
        if (content) content.classList.add('visible');

        const bg = firstSection.querySelector('.section-bg');
        if (bg) bg.classList.add('zoomed');

        const buttons = firstSection.querySelectorAll('.btn');
        buttons.forEach(btn => btn.classList.add('visible'));

        const cards = firstSection.querySelectorAll('.benefit-card, .contact-form');
        cards.forEach(card => card.classList.add('visible'));
    }
});
