document.addEventListener('DOMContentLoaded', function () {
    const transitionLink = document.querySelector('.transition-link');
    const transitionOverlay = document.getElementById('transition-overlay');
  
    transitionLink.addEventListener('click', function (event) {
      // Prevent the default link behavior
      event.preventDefault();
  
      // Show the transition overlay
      transitionOverlay.style.display = 'block';
  
      // Delay for a brief moment (e.g., 1 second)
      setTimeout(function () {
        // Navigate to the target page
        window.location.href = transitionLink.getAttribute('href');
      }, 1000); // Adjust the delay time as needed
    });
  });
   