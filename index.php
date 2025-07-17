<?php

$pageTitle = "Home | Baxcalibur";
$cssFile = './assets/css/style.css';
require_once COMPONENTS_PATH . '/templates/head.component.php';



?>
<main>
  <!-- Hero Section -->
  <section id="heroSection" class="hero-section">
    <div class="hero-content">
      <!-- Hero Image -->
      <div class="hero-image">
        <img src="./assets/img/baxcalibur-logo-large.png" height="250px" alt="Baxcalibur Logo" />
      </div>
      <!-- Hero Text -->
      <div class="hero-text">
        <h1>
          Travel the<span class="violet-text">World</span>. In
          <span class="violet-text">Glitch</span> Mode
        </h1>
        <a id="getStartedBtn" href="" title="Click Here to Get Started">Get Started</a>
      </div>
    </div>
  </section>
  <!-- Explore Section -->
  <img class="under-headline" src="./assets/img/under-headline.png">

  <section id="exploreSection" class="explore-section">
    <div class="explore-section-content">
      <div class="explore-zonescapes">
        <span class="explore-zonescape-span1">EXPLORE</span>
        <span class="explore-zonescape-span2">ZONESCAPES</span>
      </div>

      <!-- First Rectangle -->
      <div class="first-rectangle">
        <div class="rectangle-content">
          <div class="rectangle-date">
            <div class="first-date">NOV 2069</div>
            <div class="first-day">30</div>
          </div>
          <div class="rectangle-details">
            <div class="first-liner">Chromehaven - Crystallax</div>
            <div class="first-place">VANTAC-X</div>
            <div class="first-brief">Stealth hovercar, ultra-silent and fast.</div>
          </div>
        </div>
      </div>

      <!-- Second Rectangle -->
      <div class="second-rectangle">
        <div class="rectangle-content">
          <div class="rectangle-date">
            <div class="second-date">AUG 3XZ0</div>
            <div class="second-day">02</div>
          </div>
          <div class="rectangle-details">
            <div class="second-liner">Chromehaven - Vanta Vergx</div>
            <div class="second-place">LUMINA EDGE</div>
            <div class="second-brief">Military-modified aerial unit.</div>
          </div>
        </div>
      </div>

      <!-- Third Rectangle -->
      <div class="third-rectangle">
        <div class="rectangle-content">
          <div class="rectangle-date">
            <div class="third-date">AEZ 5XH0</div>
            <div class="third-day">69</div>
          </div>
          <div class="rectangle-details">
            <div class="third-liner">Chromehaven - Nethelion</div>
            <div class="third-place">ZEPHYRA</div>
            <div class="third-brief">Sleek luxury cruiser, only for upper-tier skyways.</div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
$jsFile = './assets/js/script.js';
require_once COMPONENTS_PATH . '/templates/footer.component.php';
require_once COMPONENTS_PATH . '/templates/foot.component.php';
?>