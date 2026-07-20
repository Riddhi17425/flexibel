<style>
        /* Prevent page content from loading/showing until loader finishes */
        body {
            overflow: hidden;
            margin: 0;
            padding: 0;
        }
        
        body:not(.loaded) .page-content {
            display: none;
            visibility: hidden;
        }
        
        body.loaded {
            overflow: auto;
        }
        
        body.loaded .page-content {
            display: block;
            visibility: visible;
            opacity: 0;
            animation: fadeInPage 0.8s ease forwards;
        }

        #globalLoader {
            width: 100%;
            height: 100vh;
            padding: 10px;
            position: fixed;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #ccc;
            background: #000;
            z-index: 99999;
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        
        .loader-container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .loader-svg {
            width: 120px;
            height: 120px;
            display: block;
            /*filter: drop-shadow(0 0 20px rgba(192, 38, 40, 0.4));*/
            position: relative;
        }
        
        /* Enhanced glow effect behind the loader */
        .loader-container::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 160px;
            height: 160px;
            background: radial-gradient(circle, rgba(192, 38, 40, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulseGlow 2s ease-in-out infinite alternate;
            z-index: -1;
        }
        
        /* Loading text with enhanced styling */
        .loading-text {
            margin-top: 30px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 18px;
            font-weight: 300;
            color: #ccc;
            opacity: 0;
            letter-spacing: 2px;
           animation: fadeInText 0.5s ease forwards 0.3s, textPulse 2s ease-in-out infinite 1s;
        }
        
        /* More realistic path animations with bottom-to-top fill */
        .loader-svg {
            position: relative;
        }
        
        .loader-svg path {
            stroke: #c02628;         
            stroke-width: 1.5;       
            fill: transparent;       
            stroke-dasharray: 1000;  
            stroke-dashoffset: 1000;
            stroke-linecap: round;
            stroke-linejoin: round;
            animation: 
                drawRealistic 1.4s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards,
                glowPulse 2s ease-in-out infinite 2s;
            transform-origin: center;
        }
        
        /* Create a duplicate path for the fill effect */
        .loader-svg path.fill-path {
            fill: #c02628;
            stroke: none;
            mask: linear-gradient(to top, black 0%, black var(--fill-height, 0%), transparent var(--fill-height, 0%));
            -webkit-mask: linear-gradient(to top, black 0%, black var(--fill-height, 0%), transparent var(--fill-height, 0%));
            animation: 
                fillBottomToTop 0.8s cubic-bezier(0.23, 1, 0.320, 1) forwards 1.2s,
                glowPulse 2s ease-in-out infinite 2s;
        }
        
        /* Realistic drawing animation with variable speed */
        @keyframes drawRealistic {
            0% { 
                stroke-dashoffset: 1000;
                stroke-width: 0.5;
            }
            15% {
                stroke-dashoffset: 800;
                stroke-width: 1.5;
            }
            50% {
                stroke-dashoffset: 400;
                stroke-width: 2;
            }
            85% {
                stroke-dashoffset: 50;
                stroke-width: 1.5;
            }
            100% { 
                stroke-dashoffset: 0;
                stroke-width: 1.5;
            }
        }
        
        /* Bottom-to-top fill animation using CSS custom properties */
        @keyframes fillBottomToTop {
            0% { 
                --fill-height: 0%;
                opacity: 0.8;
            }
            10% {
                --fill-height: 5%;
                opacity: 0.9;
            }
            25% {
                --fill-height: 15%;
                opacity: 0.95;
            }
            50% {
                --fill-height: 45%;
                opacity: 1;
            }
            75% {
                --fill-height: 75%;
            }
            90% {
                --fill-height: 95%;
            }
            100% { 
                --fill-height: 100%;
                opacity: 1;
            }
        }
        
        /* Subtle glow pulse after completion */
        /*@keyframes glowPulse {*/
        /*    0%, 100% {*/
        /*        filter: drop-shadow(0 0 8px rgba(192, 38, 40, 0.6));*/
        /*    }*/
        /*    50% {*/
        /*        filter: drop-shadow(0 0 15px rgba(192, 38, 40, 0.9));*/
        /*    }*/
        /*}*/
        
        /* Background glow pulse */
        /*@keyframes pulseGlow {*/
        /*    0% {*/
        /*        opacity: 0.3;*/
        /*        transform: translate(-50%, -50%) scale(0.9);*/
        /*    }*/
        /*    100% {*/
        /*        opacity: 0.6;*/
        /*        transform: translate(-50%, -50%) scale(1.1);*/
        /*    }*/
        /*}*/
        
        /* Text animations */
        @keyframes fadeInText {
            to { 
                opacity: 1;
                transform: translateY(0);
            }
            from {
                opacity: 0;
                transform: translateY(10px);
            }
        }
        
        @keyframes textPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        /* Page fade in */
        @keyframes fadeInPage {
            from { 
                opacity: 0; 
                transform: translateY(30px) scale(0.98);
                filter: blur(1px);
            }
            to { 
                opacity: 1; 
                transform: translateY(0) scale(1);
                filter: blur(0);
            }
        }
        
        /* Loader hide animation with enhanced effects */
        body.loaded #globalLoader {
            opacity: 0;
            transform: scale(0.95) translateY(-20px);
            filter: blur(3px);
            pointer-events: none;
        }
        
        /* Completely hide loader after animation */
        body.animation-complete #globalLoader {
            display: none !important;
        }
        
        /* Demo page content */
        .page-content {
            padding: 60px 20px;
            max-width: 800px;
            margin: 0 auto;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }
        
        .page-content h1 {
            color: #c02628;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .page-content p {
            color: #333;
            margin-bottom: 20px;
        }
    </style>

<section id="globalLoader" aria-live="polite" aria-busy="true" aria-label="Loading website content">
        <div class="loader-container">
            <svg 
  class="loader-svg" 
  width="120" 
  height="120" 
  viewBox="-1 -1 20 20" 
  preserveAspectRatio="xMidYMid meet" 
  xmlns="http://www.w3.org/2000/svg" 
  overflow="visible"
>
<path d="M17.7607 8.30566C16.6026 8.31388 15.5133 8.55845 14.5273 8.96191L14.5254 8.96289C14.1377 9.13805 13.7604 9.32504 13.3945 9.54785C12.9815 9.79414 12.6024 10.0648 12.2588 10.3828C12.1173 10.5003 11.9654 10.6515 11.8496 10.7666C11.7483 10.8555 11.6554 10.9535 11.5664 11.0537L11.3057 11.3535C11.1042 11.5544 10.9624 11.7668 10.8115 12.0088C10.6701 12.1845 10.538 12.3742 10.4414 12.6006C10.3511 12.7688 10.2416 12.9399 10.1475 13.1387V13.1396C9.87654 13.725 9.65162 14.3361 9.5332 14.9951C9.48646 15.2622 9.43879 15.5323 9.41504 15.8262C9.39166 16.0469 9.36816 16.2604 9.36816 16.5088C9.36804 16.5404 9.35591 16.5709 9.33789 16.5928C9.31915 16.6155 9.29911 16.623 9.28711 16.623H1.19922C1.1256 16.623 1.07513 16.5884 1.05957 16.5303V16.5195C1.05958 16.0089 1.08349 15.5109 1.15332 15.002V14.999C1.20009 14.4413 1.27051 13.8852 1.39844 13.3535L1.39941 13.3506C1.49239 12.8423 1.64217 12.3458 1.7832 11.832L1.85254 11.6377L1.85449 11.6328C1.94786 11.3196 2.05233 11.0074 2.19141 10.6963H2.19238L2.19336 10.6914C2.24595 10.5433 2.29792 10.4033 2.36426 10.2607L2.43652 10.1172L2.43945 10.1084C2.49703 9.94249 2.56975 9.78236 2.64941 9.62402L2.9043 9.15137L2.90625 9.14844C3.02295 8.8048 3.14976 8.66228 3.28809 8.45605L3.28906 8.45703L3.29102 8.45215C3.67655 7.75546 4.12039 7.07161 4.63281 6.46973L4.63477 6.4668C4.83415 6.19869 5.01889 5.95761 5.2373 5.75195L5.23828 5.75293L5.24219 5.74805C6.45652 4.34387 7.91594 3.16011 9.57422 2.24316L9.5752 2.24219C9.77586 2.12487 9.98316 1.99948 10.2012 1.9082L10.2021 1.90918L10.2109 1.90234C10.3514 1.80924 10.4738 1.73229 10.6279 1.68848L10.6123 1.63086L10.6289 1.68945L10.6377 1.68555C11.1066 1.46418 11.5601 1.25553 12.0479 1.10547V1.10645L12.0547 1.10352C12.3677 0.965267 12.681 0.86038 12.9961 0.767578C13.4072 0.650822 13.8495 0.524318 14.2559 0.455078L14.2598 0.454102C14.3062 0.442569 14.3563 0.431592 14.4062 0.419922C14.4558 0.408339 14.5055 0.395508 14.5527 0.383789C15.0665 0.290986 15.5675 0.211308 16.1025 0.165039L16.1055 0.164062C16.6493 0.0965128 17.1938 0.0725573 17.7607 0.0712891V8.30566Z"/>
<path class="fill-path" fill="#C1372F" d="M17.7607 8.30566C16.6026 8.31388 15.5133 8.55845 14.5273 8.96191L14.5254 8.96289C14.1377 9.13805 13.7604 9.32504 13.3945 9.54785C12.9815 9.79414 12.6024 10.0648 12.2588 10.3828C12.1173 10.5003 11.9654 10.6515 11.8496 10.7666C11.7483 10.8555 11.6554 10.9535 11.5664 11.0537L11.3057 11.3535C11.1042 11.5544 10.9624 11.7668 10.8115 12.0088C10.6701 12.1845 10.538 12.3742 10.4414 12.6006C10.3511 12.7688 10.2416 12.9399 10.1475 13.1387V13.1396C9.87654 13.725 9.65162 14.3361 9.5332 14.9951C9.48646 15.2622 9.43879 15.5323 9.41504 15.8262C9.39166 16.0469 9.36816 16.2604 9.36816 16.5088C9.36804 16.5404 9.35591 16.5709 9.33789 16.5928C9.31915 16.6155 9.29911 16.623 9.28711 16.623H1.19922C1.1256 16.623 1.07513 16.5884 1.05957 16.5303V16.5195C1.05958 16.0089 1.08349 15.5109 1.15332 15.002V14.999C1.20009 14.4413 1.27051 13.8852 1.39844 13.3535L1.39941 13.3506C1.49239 12.8423 1.64217 12.3458 1.7832 11.832L1.85254 11.6377L1.85449 11.6328C1.94786 11.3196 2.05233 11.0074 2.19141 10.6963H2.19238L2.19336 10.6914C2.24595 10.5433 2.29792 10.4033 2.36426 10.2607L2.43652 10.1172L2.43945 10.1084C2.49703 9.94249 2.56975 9.78236 2.64941 9.62402L2.9043 9.15137L2.90625 9.14844C3.02295 8.8048 3.14976 8.66228 3.28809 8.45605L3.28906 8.45703L3.29102 8.45215C3.67655 7.75546 4.12039 7.07161 4.63281 6.46973L4.63477 6.4668C4.83415 6.19869 5.01889 5.95761 5.2373 5.75195L5.23828 5.75293L5.24219 5.74805C6.45652 4.34387 7.91594 3.16011 9.57422 2.24316L9.5752 2.24219C9.77586 2.12487 9.98316 1.99948 10.2012 1.9082L10.2021 1.90918L10.2109 1.90234C10.3514 1.80924 10.4738 1.73229 10.6279 1.68848L10.6123 1.63086L10.6289 1.68945L10.6377 1.68555C11.1066 1.46418 11.5601 1.25553 12.0479 1.10547V1.10645L12.0547 1.10352C12.3677 0.965267 12.681 0.86038 12.9961 0.767578C13.4072 0.650822 13.8495 0.524318 14.2559 0.455078L14.2598 0.454102C14.3062 0.442569 14.3563 0.431592 14.4062 0.419922C14.4558 0.408339 14.5055 0.395508 14.5527 0.383789C15.0665 0.290986 15.5675 0.211308 16.1025 0.165039L16.1055 0.164062C16.6493 0.0965128 17.1938 0.0725573 17.7607 0.0712891V8.30566Z"/>
</svg>
            <!--<div class="loading-text">Loading...</div>-->
        </div>
    </section>



<script>
  // Improved loader script with multiple safeguards
  (function() {
    const loader = document.getElementById('globalLoader');
    const path = document.querySelector('.loader-svg path');
    let animationCompleted = false;
    
    // Prevent premature hiding
    function completeLoading() {
      if (animationCompleted) return;
      animationCompleted = true;
      
      console.log('Loading animation completed');
      
      // Start fade out
      document.body.classList.add('loaded');
      
      // Update accessibility
      loader.setAttribute('aria-busy', 'false');
      
      // Complete removal after fade transition
      setTimeout(() => {
        document.body.classList.add('animation-complete');
        loader.remove(); // Completely remove from DOM
      }, 800);
    }
    
    // Wait for DOM to be fully ready
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initLoader);
    } else {
      initLoader();
    }
    
    function initLoader() {
      console.log('Initializing loader');
      
      // Primary method: Listen for animation events
      if (path) {
        let animationsCompleted = 0;
        const totalAnimations = 2; // draw + fillIn
        
        path.addEventListener('animationend', function(e) {
          console.log(`Animation ended: ${e.animationName}`);
          animationsCompleted++;
          
          // Wait for fillIn animation specifically, or if both completed
          if (e.animationName === 'fillIn' || animationsCompleted >= totalAnimations) {
            setTimeout(completeLoading, 100); // Small delay for visual completeness
          }
        });
        
        path.addEventListener('animationstart', function(e) {
          console.log(`Animation started: ${e.animationName}`);
        });
      }
      
      // Fallback 1: Timer based on total animation duration
      // draw (2.5s) + fillIn start delay (2.3s) + fillIn duration (1s) = ~3.8s
      setTimeout(() => {
        console.log('Timer fallback triggered');
        completeLoading();
      }, 2300);
      
      // Fallback 2: Page load event (in case resources take longer)
      window.addEventListener('load', function() {
        setTimeout(() => {
          console.log('Page load fallback triggered');
          completeLoading();
        }, 2000);
      });
      
      // Emergency fallback: Force completion after maximum wait time
      setTimeout(() => {
        console.log('Emergency fallback: forcing completion');
        completeLoading();
      }, 3000);
    }
  })();
</script>