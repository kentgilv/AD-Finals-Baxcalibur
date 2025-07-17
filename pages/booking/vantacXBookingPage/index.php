
<?php

$pageTitle = "Vantac-X Trip | Baxcalibur";
$cssFile = './assets/css/style.css';

require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/auth.util.php';
require_once HANDLERS_PATH . '/auth.handler.php';

require_once COMPONENTS_PATH . '/templates/head.component.php';


?>
<main>
  <!-- Headline Image -->
<!-- Headline Image with Overlay -->
<section class="itinerary-headline">
  <div class="headline-overlay">
    <h1>Welcome to <span class="highlighted">VANTAC-X</span></h1>
  </div>
</section>


  <!-- Itinerary Section -->
  <section class="itinerary-section">
    <h2 class="itinerary-title">ITINERARIES</h2>

    <!-- Table 1: Guided Tour -->
    <div class="itinerary-table">
      <h3 class="itinerary-type">Pathlink Guided Traverse</h3>
      <p class="itinerary-description">A synced city exploration led by expert guides.</p>

      <div class="itinerary-columns">
        <div>
          <h4>MORNING</h4>
          <ul>
            <li>Meet at Syncpoint Terminal</li>
            <li>Explore Neon Bazaar</li>
            <li>Street food + chipware stalls</li>
            <li>Augmented city tour</li>
          </ul>
        </div>
        <div>
          <h4>AFTERNOON</h4>
          <ul>
            <li>Ride Chrome Rail</li>
            <li>Walk Chraventunnel</li>
            <li>Visit Vault Gallery</li>
            <li>Snacks at GlitchGarden Lounge</li>
          </ul>
        </div>
        <div>
          <h4>EVENING</h4>
          <ul>
            <li>Tour Noir District</li>
            <li>Drink at ByteBar</li>
            <li>Dinner at CTRL-Eat</li>
            <li>Walkthrough street holograms</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Table 2: Unguided Tour -->
    <div class="itinerary-table">
      <h3 class="itinerary-type">Solo City Loop</h3>
      <p class="itinerary-description">Explore Vantac-X with a planned route – no tour guide included.</p>

      <div class="itinerary-columns">
        <div>
          <h4>MORNING</h4>
          <ul>
            <li>Checkpoint at Synclab Entry</li>
            <li>Visit Neon Archive</li>
            <li>Optional marketplace detour</li>
          </ul>
        </div>
        <div>
          <h4>AFTERNOON</h4>
          <ul>
            <li>ChromeRail self-guided loop</li>
            <li>Lunch near Vault Terminal</li>
            <li>Access AR Exploration Zone</li>
          </ul>
        </div>
        <div>
          <h4>EVENING</h4>
          <ul>
            <li>VR Cinema Night (optional)</li>
            <li>Night market free-roam</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Table 3: Free Exploration -->
    <div class="itinerary-table">
      <h3 class="itinerary-type">Custom Freewalk</h3>
      <p class="itinerary-description">You’re in charge. Design your own Vantac-X day from start to neon-lit night.</p>

      <div class="itinerary-columns">
        <div>
          <h4>MORNING</h4>
          <ul>
            <li>Grab breakfast at any local pop-up</li>
            <li>Stroll through Neon Park or Synth Gardens</li>
          </ul>
        </div>
        <div>
          <h4>AFTERNOON</h4>
          <ul>
            <li>Free choice of museums or galleries</li>
            <li>Hover-rentals available at Plaza X</li>
          </ul>
        </div>
        <div>
          <h4>EVENING</h4>
          <ul>
            <li>Visit rooftop bars or quiet neon cafés</li>
            <li>Optional music venues or VR domes</li>
          </ul>
        </div>
      </div>
    </div>
    <form action="/handlers/booking.handler.php" method="POST">
      <input type="hidden" name="trip_id" value="1">
      <button type="submit" class="button">Book</button>
    </form>
  </section>
</main>

<?php
$jsFile = './assets/js/script.js';
require_once COMPONENTS_PATH . '/templates/footer.component.php';
require_once COMPONENTS_PATH . '/templates/foot.component.php';
?>