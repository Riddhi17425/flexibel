$(document).ready(function () {
  // cusror pet aniamtion
  // Select the circle element
  const circleElement = document.querySelector('.circle');
  if (!circleElement) return; // Exit if element not found

  // Create objects to track mouse position and custom cursor position
  const mouse = { x: 0, y: 0 }; // Track current mouse position
  const previousMouse = { x: 0, y: 0 } // Store the previous mouse position
  const circle = { x: 0, y: 0 }; // Track the circle position

  // Initialize variables to track scaling and rotation
  let currentScale = 0; // Track current scale value
  let currentAngle = 0; // Track current angle value

  // Update mouse position on the 'mousemove' event
  window.addEventListener('mousemove', (e) => {
    // Get position relative to viewport
    mouse.x = e.clientX;
    mouse.y = e.clientY;
  });

  // Smoothing factor for cursor movement speed (0 = smoother, 1 = instant)
  const speed = 0.17;

  // Start animation
  const tick = () => {
    // MOVE
    // Calculate circle movement based on mouse position and smoothing
    circle.x += (mouse.x - circle.x) * speed;
    circle.y += (mouse.y - circle.y) * speed;
    // Create a transformation string for cursor translation
    const translateTransform = `translate(${circle.x}px, ${circle.y}px)`;

    // SQUEEZE
    // 1. Calculate the change in mouse position (deltaMouse)
    const deltaMouseX = mouse.x - previousMouse.x;
    const deltaMouseY = mouse.y - previousMouse.y;
    // Update previous mouse position for the next frame
    previousMouse.x = mouse.x;
    previousMouse.y = mouse.y;
    // 2. Calculate mouse velocity using Pythagorean theorem and adjust speed
    const mouseVelocity = Math.min(Math.sqrt(deltaMouseX ** 2 + deltaMouseY ** 2) * 4, 150);
    // 3. Convert mouse velocity to a value in the range [0, 0.5]
    const scaleValue = (mouseVelocity / 150) * 0.5;
    // 4. Smoothly update the current scale
    currentScale += (scaleValue - currentScale) * speed;
    // 5. Create a transformation string for scaling
    const scaleTransform = `scale(${1 + currentScale}, ${1 - currentScale})`;

    // ROTATE
    // 1. Calculate the angle using the atan2 function
    const angle = Math.atan2(deltaMouseY, deltaMouseX) * 180 / Math.PI;
    // 2. Check for a threshold to reduce shakiness at low mouse velocity
    if (mouseVelocity > 20) {
      currentAngle = angle;
    }
    // 3. Create a transformation string for rotation
    const rotateTransform = `rotate(${currentAngle}deg)`;

    // Apply all transformations to the circle element in a specific order: translate -> rotate -> scale
    circleElement.style.transform = `${translateTransform} ${rotateTransform} ${scaleTransform}`;

    // Request the next frame to continue the animation
    window.requestAnimationFrame(tick);
  }

  // Start the animation loop
  tick();


  // hero slider
$('.hero_slider').slick({
    arrows: false,
    dots: false,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 500,
    infinite: true,
    fade: true,
    cssEase: 'ease',
    slidesToShow: 1,
    slidesToScroll: 1,
    pauseOnHover: true,
});

  // $('.hero_slider').slick({
  //     arrows: false,
  //     dots: false,
  //     autoplay: false,
  //     autoplaySpeed: 3000,
  //     speed: 500,
  //     infinite: true,
  //     fade: false,
  //     cssEase: 'ease',
  //     slidesToShow: 1,
  //     slidesToScroll: 1,
  //     pauseOnHover: true,
  //     pauseOnFocus: true,
  //     waitForAnimate: true
  // });

  // // Custom nav click
  // $('.custom-nav .nav-item').click(function () {
  //     let slideIndex = $(this).data('slide');
  //     $('.hero_slider').slick('slickGoTo', parseInt(slideIndex));
  //     $('.custom-nav .nav-item').removeClass('active');
  //     $(this).addClass('active');
  // });

  // // Sync custom nav on slide change
  // $('.hero_slider').on('afterChange', function (event, slick, currentSlide) {
  //     $('.custom-nav .nav-item').removeClass('active');
  //     $('.custom-nav .nav-item[data-slide="' + currentSlide + '"]').addClass('active');
  // });

  // // Set first nav item active
  // $('.custom-nav .nav-item[data-slide="0"]').addClass('active');


  // certificate slider
  $('.certi_slider').slick({
    arrows: false,
    dots: false,
    autoplay: true,
    autoplaySpeed: 0,          // No delay between scrolls
    speed: 5000,               // Increase speed for smoother effect
    cssEase: 'linear',         // Linear easing for smooth, constant speed
    slidesToShow: 6,
    slidesToScroll: 1,
    infinite: true,
    pauseOnHover: false,
    pauseOnFocus: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
        }
      }
    ]
  });
  // expansion_slider
  let isSliderInit = false;
  function handleExpansionSlider() {
    if ($(window).width() < 992) {
      if (!isSliderInit) {
        $('.expansion_slider').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
        });
        isSliderInit = true;
      }
    } else {
      if (isSliderInit) {
        $('.expansion_slider').slick('unslick');
        isSliderInit = false;
      }
    }
  }
  $(document).ready(function () {
    handleExpansionSlider();
    $(window).on('resize', handleExpansionSlider);
  });
  // whatwe_slider
  let isSliderInit1 = false;
  function handleWhatWeSlider() {
    if ($(window).width() < 992) {
      if (!isSliderInit1) {
        $('.whatwe_slider').slick({
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
          responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
              }
            }
          ]
        });
        isSliderInit1 = true;
      }
    } else {
      if (isSliderInit1) {
        $('.whatwe_slider').slick('unslick');
        isSliderInit1 = false;
      }
    }
  }
  $(document).ready(function () {
    handleWhatWeSlider();
    $(window).on('resize', handleWhatWeSlider);
  });


  // stats counter

  // Counter Animation
  function animateCounter(counter) {
    const target = +counter.getAttribute('data-target');
    const count = +counter.innerText;
    const speed = 150; // lower = faster
    const increment = target / speed;

    if (count < target) {
      counter.innerText = Math.ceil(count + increment);
      setTimeout(() => animateCounter(counter), 20);
    } else {
      counter.innerText = target;
    }
  }

  // Intersection Observer for counter
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const counter = entry.target;
        animateCounter(counter);
        observer.unobserve(counter); // Stop observing once animation starts
      }
    });
  }, { threshold: 0.6 }); // Trigger when 50% of the element is visible

  // Start observing all counters
  document.querySelectorAll('[data-target]').forEach(counter => {
    observer.observe(counter);
  });
//Services_slider
  $('.Services_slider').slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    arrows: false,
    center: true,
    // fade: true,
     centerMode: false,            // Enable center mode
//   centerPadding: '0px',       
    dots: true,
    // autoplay: true,
    autoplaySpeed: 2000,
    pauseOnHover: false,
    pauseOnFocus: false,
    // asNavFor: '.test_face_slider',
    responsive: [
      {
        breakpoint: 576,
        settings: {
             slidesToShow:1,
          arrows: false,
          dots: true
        }
      }
    ]

  });
  // test slider
  $('.test_msg_slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    center: true,
    // fade: true,
     centerMode: true,            // Enable center mode
  centerPadding: '0px',       // Space on left/right of center slide
    dots: true,
    autoplay: true,
    autoplaySpeed: 2000,
    pauseOnHover: false,
    pauseOnFocus: false,
    // asNavFor: '.test_face_slider',
    responsive: [
      {
        breakpoint: 576,
        settings: {
            slidesToShow:1,
          arrows: false,
          dots: true
        }
      }
    ]

  });
  //   $('.test_face_slider').slick({
  //     slidesToShow: 7,
  //     slidesToScroll: 1,
  //     infinte: true,
  //     arrows:false,
  //     loop: true,
  //     asNavFor: '.test_msg_slider',
  //     centerMode: false,
  //     focusOnSelect: true,
  //     responsive: [
  //       {
  //         breakpoint: 576,
  //         settings: {
  //           slidesToShow: 4,
  //         }
  //       }
  //     ]
  //   });
  // test slider
  // product slider
  $('.products_slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    autoplay: false,
    autoplaySpeed: 2000,
    pauseOnHover: false,
    pauseOnFocus: false,
    asNavFor: '.product_face_slider',
    responsive: [
      {
        breakpoint: 992,
        settings: {
          arrows: false,
          dots: true
        }
      }
    ]

  });

  $('.product_face_slider').slick({
    slidesToShow: 4,
    arrows: false,
    infinite: false,
    focusOnSelect: false,
    responsive: [{
      breakpoint: 576,
      settings: { slidesToShow: 4 }
    }]
  });

  // Tab click → Go to corresponding slide
  $('.product_face_slider').on('click', '.slick-slide', function () {
    const index = $(this).data('slick-index');
    $('.products_slider').slick('slickGoTo', index);
    updateActiveTab(index);
  });

  // Sync active tab on slide change
  function updateActiveTab(index) {
    $('.product_face_slider .slick-slide').removeClass('active')
      .filter(`[data-slick-index="${index}"]`).addClass('active');
  }

  $('.products_slider').on('afterChange', (e, s, i) => updateActiveTab(i));

  // Set initial tab active
  updateActiveTab(0);

  // product slider
  // // what_wedo_slider
  // $('.what_wedo_slider').slick({
  //   slidesToShow: 1,
  //   slidesToScroll: 1,
  //   arrows: false,
  //   fade: true,
  //   autoplay: false,
  //   autoplaySpeed: 2000,
  //   pauseOnHover: false,      
  //   pauseOnFocus: false,
  //   asNavFor: '.what_wedo_face_slider',
  //   responsive: [
  //     {
  //       breakpoint: 576,
  //       settings: {
  //         arrows: false,
  //         dots: true
  //       }
  //     }
  //   ]

  // });
  // $('.what_wedo_face_slider').slick({
  //   slidesToShow: 4,
  //   slidesToScroll: 1,
  //   infinte: true,
  //   arrows:false,
  //   loop: true,
  //   asNavFor: '.what_wedo_slider',
  //   centerMode: false,
  //   focusOnSelect: true,
  //   responsive: [
  //     {
  //       breakpoint: 576,
  //       settings: {
  //         slidesToShow: 4,
  //       }
  //     }
  //   ]
  // });
  // product slider
  //   industries slider
  $('.industries_slider').slick({
    arrows: false,
    dots: true,
    autoplay: false,
    autoplaySpeed: 3000,
    speed: 500,
    infinite: true,
    fade: true,
    cssEase: 'ease',
    slidesToShow: 1,
    slidesToScroll: 1,
    pauseOnHover: true,
  });
  //   industries slider end
  // applications slider
  $('.applications_slider').slick({
    arrows: false,
    dots: true,
    autoplay: false,
    autoplaySpeed: 3000,
    speed: 500,
    infinite: true,
    fade: true,
    cssEase: 'ease',
    slidesToShow: 1,
    slidesToScroll: 1,
    pauseOnHover: true,
  });
  // case_studies_slider
  $('.case_studies_slider').slick({
    arrows: true,
    dots: false,
    autoplay: false,
    autoplaySpeed: 3000,
    speed: 500,
    infinite: true,
    fade: true,
    cssEase: 'ease',
    slidesToShow: 1,
    slidesToScroll: 1,
    pauseOnHover: true,
  });
  // qcprocedures_slider
  $('.qcprocedures_slider').slick({
    arrows: false,
    dots: true,
    autoplay: false,
    autoplaySpeed: 3000,
    speed: 500,
    infinite: true,
    fade: true,
    cssEase: 'ease',
    slidesToShow: 1,
    slidesToScroll: 1,
    pauseOnHover: true,
  });
});




// inquiry form
function nextStep(step) {
  document.querySelectorAll('.step-content').forEach(content => content.style.display = 'none');
  document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
  document.getElementById(`step-${step}`).style.display = 'block';
  document.querySelectorAll('.step')[step - 1].classList.add('active');
}

function prevStep(step) {
  document.querySelectorAll('.step-content').forEach(content => content.style.display = 'none');
  document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
  document.getElementById(`step-${step}`).style.display = 'block';
  document.querySelectorAll('.step')[step - 1].classList.add('active');
}
// let currentStep = 1;
// let completedSteps = new Set();

// function validateStep(step) {
//   const stepElement = document.getElementById(`step-${step}`);
//   const requiredFields = stepElement.querySelectorAll('[required]');
//   let isValid = true;

//   requiredFields.forEach(field => {
//     if (!field.value.trim()) {
//       isValid = false;
//     } else if (field.type === 'radio') {
//       const radioGroup = stepElement.querySelectorAll(`input[name="${field.name}"]`);
//       let checked = false;
//       radioGroup.forEach(radio => {
//         if (radio.checked) checked = true;
//       });
//       if (!checked) isValid = false;
//     }
//   });

//   if (isValid) {
//     completedSteps.add(step);
//     document.getElementById(`step-header-${step}`).classList.add('completed');
//   }

//   return isValid;
// }

// function nextStep(step) {
//   if (step <= currentStep) {
//     // Allow navigation to previous steps without validation
//     updateStep(step);
//     return;
//   }

//   // Validate current step before proceeding
//   if (validateStep(currentStep)) {
//     updateStep(step);
//   } else {
//     alert('Please fill all required fields before proceeding.');
//   }
// }

// function prevStep(step) {
//   updateStep(step);
// }

// function updateStep(step) {
//   // Hide all steps
//   document.querySelectorAll('.step-content').forEach(content => {
//     content.style.display = 'none';
//   });

//   // Remove active class from all steps
//   document.querySelectorAll('.step').forEach(s => {
//     s.classList.remove('active');
//   });

//   // Show the current step
//   document.getElementById(`step-${step}`).style.display = 'block';
//   document.getElementById(`step-header-${step}`).classList.add('active');

//   // Keep completed steps highlighted
//   completedSteps.forEach(completedStep => {
//     document.getElementById(`step-header-${completedStep}`).classList.add('completed');
//   });

//   currentStep = step;
// }

// function submitForm() {
//   if (validateStep(3)) {
//     alert('Form submitted successfully! Check the console for form data.');
//     const formData = new FormData(document.getElementById('stepperForm'));
//     const data = {};
//     formData.forEach((value, key) => {
//       data[key] = value;
//     });
//     console.log('Form Data:', data);
//   } else {
//     alert('Please fill all required fields before submitting.');
//   }
// }
// inquiry form

// what wedo slider
$('.what_wedo_slider').slick({
  arrows: false,
  dots: false,
  autoplay: false,
  autoplaySpeed: 3000,
  speed: 500,
  infinite: true,
  fade: false,
  cssEase: 'ease',
  slidesToShow: 1,
  slidesToScroll: 1,
  pauseOnHover: true,
  pauseOnFocus: true,
  waitForAnimate: true,
  responsive: [
      {
        breakpoint: 992,
        settings: {
          arrows: false,
          dots: true
        }
      }
    ]
});

// Custom nav click
$('.what_wedocustom_nav .nav-item').click(function () {
  let slideIndex = $(this).data('slide');
  $('.what_wedo_slider').slick('slickGoTo', parseInt(slideIndex));
  $('.what_wedocustom_nav .nav-item').removeClass('active');
  $(this).addClass('active');
});

// Sync custom nav on slide change
$('.what_wedo_slider').on('afterChange', function (event, slick, currentSlide) {
  $('.what_wedocustom_nav .nav-item').removeClass('active');
  $('.what_wedocustom_nav .nav-item[data-slide="' + currentSlide + '"]').addClass('active');
});

// Set first nav item active
$('.what_wedocustom_nav .nav-item[data-slide="0"]').addClass('active');


// category select js
$(document).ready(function () {
  $("#categoryFilter").change(function () {
    var selectedCategory = $(this).val(); // Jo category select hui
    $(".category-item .row").hide(); // Pehle sabko hide kar do

    if (selectedCategory === "all") {
      $(".category-item .row").show(); // Agar "Show All" select hai, toh sab wapas show ho
    } else {
      $("#" + selectedCategory).show(); // Sirf selected category ka section show ho
    }
  });
});

// side bar js start

document.addEventListener('DOMContentLoaded', function () {

  const offcanvasEl = document.getElementById('offcanvasExample');
  const bsOffcanvas = new bootstrap.Offcanvas(offcanvasEl);

  // Outside Header Products Click
  document.querySelector('#prod_menu .product-link')?.addEventListener('click', function (e) {
    e.preventDefault();
    // Show the offcanvas
    bsOffcanvas.show();
    // Directly show products section
    document.querySelector('#mainMenu').classList.add('d-none');
    document.querySelector('.productsSection').classList.remove('d-none');
    document.querySelector('.ServicesSection').classList.add('d-none');
  });
  // Outside Header Services Click
  document.querySelector('#Ser_menu .services-link')?.addEventListener('click', function (e) {
    e.preventDefault();
    // Show the offcanvas
    bsOffcanvas.show();
    // Directly show services section
    document.querySelector('#mainMenu').classList.add('d-none');
    document.querySelector('.ServicesSection').classList.remove('d-none');
    document.querySelector('.productsSection').classList.add('d-none');
  });
  // Inside Sidebar Products
  document.querySelector('#mainMenu .product-link')?.addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector('#mainMenu').classList.add('d-none');
    document.querySelector('.productsSection').classList.remove('d-none');
    document.querySelector('.ServicesSection').classList.add('d-none');
  });
  // Inside Sidebar Services
  document.querySelector('#mainMenu .services-link')?.addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector('#mainMenu').classList.add('d-none');
    document.querySelector('.ServicesSection').classList.remove('d-none');
    document.querySelector('.productsSection').classList.add('d-none');
  });
  // Back Button Logic
  document.querySelectorAll('.back-to-main').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.querySelector('#mainMenu').classList.remove('d-none');
      document.querySelector('.productsSection').classList.add('d-none');
      document.querySelector('.ServicesSection').classList.add('d-none');
    });
  });
  // Reset menu when sidebar closes
  offcanvasEl.addEventListener('hidden.bs.offcanvas', function () {
    document.querySelector('#mainMenu').classList.remove('d-none');
    // Hide main categories
    document.querySelector('.productsSection').classList.add('d-none');
    document.querySelector('.ServicesSection').classList.add('d-none');
    // Hide all product sub-sections
    document.querySelectorAll('.metallicSection, .rubberSection, .fabricSection, .metalSection')
      .forEach(sec => sec.classList.add('d-none'));
  });

});

// Helper: Show only the requested section
function showSection(sectionSelector) {
  document.querySelectorAll('.productsSection, .ServicesSection, .metallicSection, .rubberSection, .fabricSection, .metalSection')
    .forEach(sec => sec.classList.add('d-none'));
  document.querySelector(sectionSelector)?.classList.remove('d-none');
}

// Metallic link click
document.querySelector('.Metallic-link')?.addEventListener('click', function (e) {
  e.preventDefault();
  showSection('.metallicSection');
});

// Rubber link click
document.querySelector('.Rubber-link')?.addEventListener('click', function (e) {
  e.preventDefault();
  showSection('.rubberSection');
});

// Fabric link click
document.querySelector('.Fabric-link')?.addEventListener('click', function (e) {
  e.preventDefault();
  showSection('.fabricSection');
});

// Metal link click
document.querySelector('.Metal-link')?.addEventListener('click', function (e) {
  e.preventDefault();
  showSection('.metalSection');
});

// Back buttons to Products
document.querySelectorAll('.back-btn.back-to-products').forEach(btn => {
  btn.addEventListener('click', function () {
    showSection('.productsSection');
  });
});


// code added by jeet for dynamic 
document.addEventListener('DOMContentLoaded', function () {
    // Handle category click
    document.querySelectorAll('.category-link').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            // Hide categories list
            document.querySelector('.category-list').style.display = 'none';
 document.querySelector('.productsSection').style.display = 'none';
            // Hide all sub-product sections
            document.querySelectorAll('.sub-product-section').forEach(section => {
                section.style.display = 'none';
            });

            // Show clicked category's sub-products
            const categoryId = this.dataset.categoryId;
            const sectionToShow = document.querySelector(`.sub-products-${categoryId}`);
            if (sectionToShow) {
                sectionToShow.style.display = 'block';
            }
        });
    });

    // Handle back button click
    // document.querySelectorAll('.back-to-categories').forEach(btn => {
    //     btn.addEventListener('click', function () {
    //         // Hide all sub-product sections
    //         document.querySelectorAll('.sub-product-section').forEach(section => {
    //             section.style.display = 'none';
    //         });

    //         // Show categories list
    //         document.querySelector('.category-list').style.display = 'block';
    //         document.querySelector('.productsSection').style.display = 'block';
    //     });
    // });
    function resetToCategories() {
    document.querySelectorAll('.sub-product-section').forEach(s => s.style.display = 'none');
    document.querySelector('.category-list').style.display = 'block';
    document.querySelector('.productsSection').style.display = 'block';
}

document.querySelectorAll('.back-to-categories').forEach(btn => 
    btn.addEventListener('click', resetToCategories)
);

document.querySelectorAll('.offcanvas').forEach(sb => 
    sb.addEventListener('hidden.bs.offcanvas', resetToCategories)
);

});

// side bar js end


// model roted
// document.addEventListener("scroll", function () {
//   const model = document.getElementById("scrollModel");
//   const section = document.querySelector("#list-item-3");

//   const scrollY = window.scrollY + window.innerHeight / 2;

//   const sectionTop = section.offsetTop;
//   const sectionBottom = section.offsetTop + section.offsetHeight;

//   if (scrollY >= sectionTop && scrollY <= sectionBottom) {
//     const progress = (scrollY - sectionTop) / (sectionBottom - sectionTop);

//     // Rotation (180deg → 90deg)
//     const orbitY = 180 - (90 * progress);
//     model.setAttribute("camera-orbit", `0deg ${orbitY}deg 100%`);

//     const moveY = progress * (section.offsetHeight - 300);
//     model.style.transform = `translateY(${moveY}px)`;
//   }
// });

// homepage 3d model js
document.addEventListener("scroll", function () {

  if (window.innerWidth <= 768) return;

  const model = document.getElementById("scrollModel");
  const section = document.querySelector("#list-item-3");

  const scrollY = window.scrollY + window.innerHeight / 2;

  const sectionTop = section.offsetTop;
  const sectionBottom = section.offsetTop + section.offsetHeight;

  if (scrollY >= sectionTop && scrollY <= sectionBottom) {
    const progress = (scrollY - sectionTop) / (sectionBottom - sectionTop);

    // Rotation (180deg → 90deg)
    const orbitY = 180 - (90 * progress);
    model.setAttribute("camera-orbit", `0deg ${orbitY}deg 100%`);

    // Movement (desktop only)
    const moveY = progress * (section.offsetHeight - 700);
    model.style.transform = `translateY(${moveY}px)`;
  }
});
// document.addEventListener("scroll", function () {

//   if (window.innerWidth <= 768) return;

//   const model = document.getElementById("scrollModel");
//   const section = document.querySelector("#list-item-3");

//   const scrollY = window.scrollY + window.innerHeight / 2;

//   const sectionTop = section.offsetTop;
//   const sectionBottom = section.offsetTop + section.offsetHeight;

//   if (scrollY >= sectionTop && scrollY <= sectionBottom) {
//     const progress = (scrollY - sectionTop) / (sectionBottom - sectionTop);

//     // Rotation (180deg → 90deg)
//     const orbitY = 180 - (90 * progress);
//     model.setAttribute("camera-orbit", `0deg ${orbitY}deg 100%`);

//     // Movement (desktop only)
//     const moveY = progress * (section.offsetHeight - 500);
//     model.style.transform = `translateY(${moveY}px)`;
//   }
// });



// card click 

document.querySelectorAll(".sus_box").forEach((box) => {
  box.addEventListener("click", function () {
    document.querySelectorAll(".sus_box").forEach((b) =>
      b.classList.remove("active")
    );
    this.classList.add("active");
  });
});
// mobile slider 

$(document).ready(function () {
  function initMobileSlider() {
    if ($(window).width() < 769) {
      if (!$('.mobile_slider').hasClass('slick-initialized')) {
        $('.mobile_slider').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
          autoplay: false,
          autoplaySpeed: 2000,
          pauseOnHover: false,
          pauseOnFocus: false
        });
      }
    } else {
      if ($('.mobile_slider').hasClass('slick-initialized')) {
        $('.mobile_slider').slick('unslick'); // destroy slick on desktop
      }
    }
  }

  // Run on load
  initMobileSlider();

  // Run on resize
  $(window).on('resize', function () {
    initMobileSlider();
  });
});

// module deg
  document.addEventListener("DOMContentLoaded", function() {
    const model = document.getElementById("scrollModel");

    function setCameraOrbit() {
      if (window.innerWidth <= 768) {
        model.setAttribute("camera-orbit", "0deg 90deg 100%");
      } else {
        model.setAttribute("camera-orbit", "0deg 180deg 100%");
      }
    }

    // Run on load
    setCameraOrbit();

    // Also run on window resize
    window.addEventListener("resize", setCameraOrbit);
  });
  
//   read more js
function initReadMore() {
      // Run only for screen size <= 1281px
      if (window.innerWidth <= 1281) {
        document.querySelectorAll(".read-more-btn").forEach(button => {
          button.addEventListener("click", function () {
            const text = this.previousElementSibling.querySelector(".more-text");

            if (text.style.display === "none" || text.style.display === "") {
              text.style.display = "inline";
              this.textContent = "Read Less";
            } else {
              text.style.display = "none";
              this.textContent = "Read More";
            }
          });
        });
      }
    }

    // Initialize on page load
    initReadMore();

    // Re-initialize if window is resized
    window.addEventListener("resize", () => {
      document.querySelectorAll(".more-text").forEach(el => {
        if (window.innerWidth > 1281) {
          el.style.display = "inline"; // always show on big screens
        } else {
          el.style.display = "none"; // reset on small screens
        }
      });
    });
    
    // select2 js
     $(document).ready(function() {
    $('.nominal-select').select2({
      placeholder: "Choose an option",
      allowClear: true,
      width: '100%'
    });
  });
  
//   gsap
 gsap.registerPlugin(ScrollTrigger);

// Split text but keep HTML tags intact
function splitTextKeepHTML(element) {
  element.childNodes.forEach(node => {
    if (node.nodeType === Node.TEXT_NODE) {
      let words = node.textContent.split(/(\s+)/); // split including spaces
      words.forEach(word => {
        let span = document.createElement("span");
        span.style.display = "inline-block";
        span.style.whiteSpace = "pre"; // preserve spacing
        span.textContent = word;
        element.insertBefore(span, node);
      });
      element.removeChild(node);
    } else if (node.nodeType === Node.ELEMENT_NODE) {
      splitTextKeepHTML(node); // recursive for <b>, <i>, etc
    }
  });
}

// Apply splitting
document.querySelectorAll(".gsap_text").forEach(el => {
  splitTextKeepHTML(el);
});

// Master timeline (scroll-synced)
let tl = gsap.timeline({
  scrollTrigger: {
    trigger: ".col-lg-8",
    start: "top 80%",
    end: "bottom 20%",
    scrub: true, // scroll synced
    markers: false
  }
});

// Animate each line sequentially
document.querySelectorAll(".gsap_text").forEach((el, i) => {
  // Set initial state for spans
  gsap.set(el.querySelectorAll("span"), { opacity: 0.1 });

  // Add animation to timeline
  tl.to(
    el.querySelectorAll("span"),
    {
      opacity: 1,
      stagger: 0.04, // stagger within the line
      duration: 1, // duration for the line
      ease: "power3.out"
    },
    i * 1.2 // increased delay to ensure previous line completes
  );
});
