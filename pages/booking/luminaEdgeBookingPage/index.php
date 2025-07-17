<?php
$pageTitle = "Lumina Edge Trip | Baxcalibur";
$cssFile = './assets/css/style.css';

require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/auth.util.php';
require_once HANDLERS_PATH . '/auth.handler.php';

require_once COMPONENTS_PATH . '/templates/head.component.php';


?>
<main>
  <!-- Headline Image -->
  <section class="itinerary-headline">
    <div class="headline-overlay">
      <h1>Welcome to <span class="highlighted">LUMINA EDGE</span></h1>
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
            <li>Meet at Radiant Terminal</li>
            <li>Explore Skylume District</li>
            <li>Cyber café breakfast</li>
            <li>Augmented skyline tour</li>
          </ul>
        </div>
        <div>
          <h4>AFTERNOON</h4>
          <ul>
            <li>GlidePod scenic ride</li>
            <li>Walk through LightVein Tunnels</li>
            <li>Visit Neon Relics Museum</li>
            <li>Snack at Volt Vista Café</li>
          </ul>
        </div>
        <div>
          <h4>EVENING</h4>
          <ul>
            <li>Stroll across Skystep Promenade</li>
            <li>Dinner at Pulsebyte Grill</li>
            <li>Guided holo-light show</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Table 2: Unguided Tour -->
    <div class="itinerary-table">
      <h3 class="itinerary-type">Solo City Loop</h3>
      <p class="itinerary-description">Explore Lumina Edge with a planned route – no tour guide included.</p>

      <div class="itinerary-columns">
        <div>
          <h4>MORNING</h4>
          <ul>
            <li>Checkpoint at LightCore</li>
            <li>Self-tour at Neon Archive</li>
            <li>Optional stops at cyber stalls</li>
          </ul>
        </div>
        <div>
          <h4>AFTERNOON</h4>
          <ul>
            <li>Ride the GlowRail loop</li>
            <li>Lunch at Nexus Café</li>
            <li>Check out holo-exhibits</li>
          </ul>
        </div>
        <div>
          <h4>EVENING</h4>
          <ul>
            <li>Watch lights at Prism Plaza</li>
            <li>Free-roam at night arcade</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Table 3: Free Exploration -->
    <div class="itinerary-table">
      <h3 class="itinerary-type">Custom Freewalk</h3>
      <p class="itinerary-description">You’re in charge. Design your own Lumina Edge day from start to nightfall.</p>

      <div class="itinerary-columns">
        <div>
          <h4>MORNING</h4>
          <ul>
            <li>Grab coffee at a corner sky café</li>
            <li>Explore kinetic art installations</li>
          </ul>
        </div>
        <div>
          <h4>AFTERNOON</h4>
          <ul>
            <li>Visit any gallery, museum, or VR dome</li>
            <li>Hoverboard rentals at Fusion Strip</li>
          </ul>
        </div>
        <div>
          <h4>EVENING</h4>
          <ul>
            <li>Chill at neon lounges or rooftop decks</li>
            <li>Optional: attend a pulse rave or laser show</li>
          </ul>
        </div>
      </div>
    </div>
    <form action="/handlers/booking.handler.php" method="POST">
      <input type="hidden" name="trip_id" value="2">
      <button type="submit" class="button">Book</button>
    </form>
  </section>
</main>
<?php
$jsFile = './assets/js/script.js';
require_once COMPONENTS_PATH . '/templates/footer.component.php';
require_once COMPONENTS_PATH . '/templates/foot.component.php';
?>