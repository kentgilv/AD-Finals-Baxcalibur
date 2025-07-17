<?php

$pageTitle = "Zephyra Trip | Baxcalibur";
$cssFile = './assets/css/style.css';

require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/auth.util.php';
require_once HANDLERS_PATH . '/auth.handler.php';

require_once COMPONENTS_PATH . '/templates/head.component.php';
?>
<main>
  <!-- Headline Image with Overlay -->
  <section class="itinerary-headline">
    <div class="headline-overlay">
      <h1>Welcome to <span class="highlighted">ZEPHYRA</span></h1>
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
            <li>Meet at Zephyra Core Station</li>
            <li>Explore Neon Bazaar</li>
            <li>Hologram history walk</li>
            <li>Breakfast at Core Café</li>
          </ul>
        </div>
        <div>
          <h4>AFTERNOON</h4>
          <ul>
            <li>SkyTram ride through tech district</li>
            <li>Visit the Glimmer Vault</li>
            <li>Lightshow walkthrough experience</li>
            <li>Snacks at Synth Bites</li>
          </ul>
        </div>
        <div>
          <h4>EVENING</h4>
          <ul>
            <li>Dinner at CTRL-Eat Lounge</li>
            <li>Tour Noir District</li>
            <li>Street holograms and music</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Table 2: Unguided Tour -->
    <div class="itinerary-table">
      <h3 class="itinerary-type">Solo City Loop</h3>
      <p class="itinerary-description">Explore Zephyra with a structured plan — no tour guide needed.</p>

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
      <p class="itinerary-description">You’re in charge. Craft your own Zephyra experience from start to neon-lit night.</p>

      <div class="itinerary-columns">
        <div>
          <h4>MORNING</h4>
          <ul>
            <li>Get coffee from any corner synthbar</li>
            <li>Roam parks or fusion hubs</li>
          </ul>
        </div>
        <div>
          <h4>AFTERNOON</h4>
          <ul>
            <li>Visit art domes, local exhibits, or media museums</li>
            <li>Rent hoverboards or walk the skyline deck</li>
          </ul>
        </div>
        <div>
          <h4>EVENING</h4>
          <ul>
            <li>Enjoy street foods or neon-lit cafés</li>
            <li>Catch a music set or drift through open lounges</li>
          </ul>
        </div>
      </div>
    </div>
    <form action="/handlers/booking.handler.php" method="POST">
      <input type="hidden" name="trip_id" value="3">
      <button type="submit" class="button">Book</button>
    </form>
  </section>
  </main>
<?php
$jsFile = './assets/js/script.js';
require_once COMPONENTS_PATH . '/templates/footer.component.php';
require_once COMPONENTS_PATH . '/templates/foot.component.php';
?>