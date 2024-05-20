document.addEventListener("DOMContentLoaded", function() {
    var links = document.querySelectorAll('nav ul li a');
    
    links.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            var targetId = this.getAttribute('href').substring(1);
            var targetElement = document.getElementById(targetId);
            smoothScroll(targetElement);
            
            // Menutup menu setelah item dipilih
            document.querySelector('nav ul').classList.remove('show-nav');
        });
    });

    function getTargetPosition(target) {
        var offsetTop = 0;
        while(target) {
            offsetTop += target.offsetTop;
            target = target.offsetParent;
        }
        return offsetTop;
    }

    function smoothScroll(target) {
        var targetPosition = getTargetPosition(target);
        var startPosition = window.pageYOffset;
        var distance = targetPosition - startPosition;
        var duration = 800;
        var start = null;

        window.requestAnimationFrame(step);

        function step(timestamp) {
            if (!start) start = timestamp;
            var progress = timestamp - start;
            window.scrollTo(0, easeInOutQuad(progress, startPosition, distance, duration));
            if (progress < duration) window.requestAnimationFrame(step);
        }

        function easeInOutQuad(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        }
    }
});

document.querySelector('.nav-toggle').addEventListener('click', function() {
    document.querySelector('nav ul').classList.toggle('show-nav');
});
