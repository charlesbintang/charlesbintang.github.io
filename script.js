document.addEventListener('DOMContentLoaded', () => {
    // Parallax effect for grid background
    window.addEventListener('mousemove', (e) => {
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;
        
        const grid = document.querySelector('.grid-background');
        grid.style.transform = `translate(${x * 20}px, ${y * 20}px)`;
    });

    // Reveal animations on scroll
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
            }
        });
    }, observerOptions);

    document.querySelectorAll('section').forEach(section => {
        section.classList.add('reveal-init');
        observer.observe(section);
    });

    // Simple scroll spy effect for nav links
    const navLinks = document.querySelectorAll('.nav-links a');
    const sections = document.querySelectorAll('section');

    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (pageYOffset >= (sectionTop - sectionHeight / 3)) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').includes(current)) {
                link.classList.add('active');
            }
        });
    });
});

// Add styles for reveal animation
const style = document.createElement('style');
style.textContent = `
    .reveal-init {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease-out;
    }
    .revealed {
        opacity: 1;
        transform: translateY(0);
    }
    .nav-links a.active {
        color: var(--primary);
    }
    .nav-links a.active::after {
        width: 100%;
    }
`;
document.head.appendChild(style);
