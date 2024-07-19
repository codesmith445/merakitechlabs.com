/*!
* Start Bootstrap - Freelancer v7.0.7 (https://startbootstrap.com/theme/freelancer)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-freelancer/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});



// Original Code For Filtering Data
// for Filtering data

/**
   * Porfolio isotope and filter
   */
// window.addEventListener('load', () => {
//     let portfolioContainer = select('.portfolio-container');
//     if (portfolioContainer) {
//       let portfolioIsotope = new Isotope(portfolioContainer, {
//         itemSelector: '.portfolio-item',
//         layoutMode: 'fitRows'
//       });

//       let portfolioFilters = select('#portfolio-flters li', true);

//       on('click', '#portfolio-flters li', function(e) {
//         e.preventDefault();
//         portfolioFilters.forEach(function(el) {
//           el.classList.remove('filter-active');
//         });
//         this.classList.add('filter-active');

//         portfolioIsotope.arrange({
//           filter: this.getAttribute('data-filter')
//         });

//       }, true);
//     }

//   });

// $(document).ready(function(){

//   $(".filter-button").click(function(){
//       var value = $(this).attr('data-filter');
      
//       if(value == "all")
//       {
//           //$('.filter').removeClass('hidden');
//           $('.filter').show('1000');
//       }
//       else
//       {
// //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
// //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
//           $(".filter").not('.'+value).hide('3000');
//           $('.filter').filter('.'+value).show('3000');
          
//       }
//   });
  
//   if ($(".filter-button").removeClass("active")) {
// $(this).removeClass("active");
// }
// $(this).addClass("active");

// });


//  this is the orinal code of data filter to filter posts all
// $(document).ready(function(){
//     $(".filter-button").click(function(){
//         var value = $(this).attr('data-filter');
        
//         if(value == "all") {
//             $('.filter').hide(); // Hide all initially
//             $('.filter').slice(0, 6).show('1000'); // Show only the first 6
//         } else {
//             $(".filter").not('.'+value).hide('3000');
//             $('.filter').filter('.'+value).show('3000');
//         }
//     });
  
//     if ($(".filter-button").removeClass("active")) {
//         $(this).removeClass("active");
//     }
//     $(this).addClass("active");
    
//     // Initial load - show only the first 6 posts of "all" category
//     $('.filter').hide();
//     $('.filter').slice(0, 6).show();
//   });



// code to show all posts not limitation
// $(document).ready(function(){
//     // Function to handle filtering
//     function filterPosts(value) {
//         if(value == "all") {
//             $('.portfolio-item').show('1000'); // Show all posts
//         } else {
//             $(".portfolio-item").not('.'+value).hide('3000');
//             $('.portfolio-item').filter('.'+value).show('3000');
//         }
//     }

//     // Event listener for filter buttons
//     $(".filter-button").click(function(){
//         var value = $(this).attr('data-filter');
//         filterPosts(value);

//         // Remove active class from all buttons and add to the clicked button
//         $(".filter-button").removeClass("active");
//         $(this).addClass("active");
//     });

//     // Initial load - show all posts
//     filterPosts('all');
// });



$(document).ready(function(){
    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');

        // Hide all "View" links initially
        $('#view-all, #view-php, #view-javascript, #view-laravel, #view-nodejs').hide();

        if(value == "all") {
            $('.filter').hide(); // Hide all initially
            $('.filter').slice(0, 6).show('1000'); // Show only the first 6
            $('#view-all').show(); // Show "View All" link
        } else if (value == "php") {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            $('#view-php').show(); // Show "View PHP" link
        } else if (value == "javascript") {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            $('#view-javascript').show(); // Show "View Javascript" link
        } else if (value == "laravel") {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            $('#view-laravel').show(); // Show "View Laravel" link
        } else if (value == "nodejs") {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            $('#view-nodejs').show(); // Show "View Nodejs" link
        } else if (value == "python") {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            $('#view-python').show(); // Show "View Python" link
        }
    });

    // Initial load - show only the first 6 posts of "all" category and "View All" link
    $('.filter').hide();
    $('.filter').slice(0, 6).show();
    $('#view-all').show();
});

// Contact Form Modal Livewire

window.addEventListener('modalClosed', event => {
    $('#contactModal').modal('hide'); // Hide the modal using Bootstrap's hide method
    $('.modal-backdrop').remove(); // Remove the modal backdrop manually
});

// End Contact Form Modal Livewire


// Contact Form Success Modal Livewire

window.addEventListener('showSuccessModal', event => {
    // Show the success modal
    $('#successModal').modal('show');
    // Close the contact modal
    $('#contactModal').modal('hide');
});

// End Contact Form Success Modal Livewire
