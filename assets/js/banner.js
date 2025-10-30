// Banner interactions and animations
class BannerManager {
  constructor() {
    this.banners = document.querySelectorAll(".banner");
    this.init();
  }

  init() {
    this.banners.forEach((banner) => {
      this.setupBannerInteractions(banner);
      this.setupParallaxEffect(banner);
    });
  }

  setupBannerInteractions(banner) {
    // Add click effect to buttons
    const buttons = banner.querySelectorAll(".banner-btn");
    buttons.forEach((btn) => {
      btn.addEventListener("click", (e) => {
        this.createRippleEffect(e, btn);
      });
    });

    // Intersection Observer for scroll animations
    if (banner.dataset.animate === "true") {
      this.setupScrollAnimation(banner);
    }
  }

  setupParallaxEffect(banner) {
    const shapes = banner.querySelectorAll(".shape, .floating-icon");

    window.addEventListener("scroll", () => {
      const scrolled = window.pageYOffset;
      const rate = scrolled * -0.5;

      shapes.forEach((shape) => {
        shape.style.transform = `translateY(${rate}px)`;
      });
    });
  }

  setupScrollAnimation(banner) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("animate-in");
          }
        });
      },
      { threshold: 0.3 }
    );

    observer.observe(banner);
  }

  createRippleEffect(event, button) {
    const ripple = document.createElement("span");
    const rect = button.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;

    ripple.style.width = ripple.style.height = size + "px";
    ripple.style.left = x + "px";
    ripple.style.top = y + "px";
    ripple.classList.add("ripple");

    button.appendChild(ripple);

    setTimeout(() => {
      ripple.remove();
    }, 600);
  }

  // Method to update banner content dynamically
  updateBanner(bannerId, newData) {
    const banner = document.getElementById(bannerId);
    if (banner && newData) {
      if (newData.title) {
        const titleEl = banner.querySelector(".banner-title");
        if (titleEl) titleEl.textContent = newData.title;
      }
      if (newData.subtitle) {
        const subtitleEl = banner.querySelector(".banner-subtitle");
        if (subtitleEl) subtitleEl.textContent = newData.subtitle;
      }
    }
  }
}

// Initialize when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  new BannerManager();
});

// Export for use in other modules
if (typeof module !== "undefined" && module.exports) {
  module.exports = BannerManager;
}
