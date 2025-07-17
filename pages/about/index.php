<?php

$pageTitle = "About | Baxcalibur";
$cssFile = './pages/about/css/style.css';
$jsFile = './assets/js/script.js';

require_once COMPONENTS_PATH . '/templates/head.component.php';

?>
<main class="team-section">
  <section class="team-grid">
    <article class="team-member">
      <img src="/pages/about/img/about-us-kent.jpg" alt="Kent Valencia portrait">
      <div class="member-info">
        <h3>Kent Valencia</h3>
        <p>QA & Database</p>
      </div>
    </article>

    <article class="team-member">
      <img src="/pages/about/img/about-us-jose.jpg" alt="Jose Bonnevie portrait">
      <div class="member-info">
        <h3>Jose Bonnevie</h3>
        <p>Frontend & Designer</p>
      </div>
    </article>

    <article class="team-member">
      <img src="/pages/about/img/about-us-vince.jpg" alt="Vince Adduru portrait">
      <div class="member-info">
        <h3>Vince Adduru</h3>
        <p>Backend</p>
      </div>
    </article>

    <article class="team-member">
      <img src="/pages/about/img/about-us-sam.jpg" alt="Samuel Lagamia portrait">
      <div class="member-info">
        <h3>Samuel Lagamia</h3>
        <p>Backend</p>
      </div>
    </article>

    <article class="team-member">
      <img src="/pages/about/img/about-us-owen.jpg" alt="Owen Liangco portrait">
      <div class="member-info">
        <h3>Owen Liangco</h3>
        <p>Frontend</p>
      </div>
    </article>
  </section>
</main>

<?php
require_once COMPONENTS_PATH . '/templates/footer.component.php';
require_once COMPONENTS_PATH . '/templates/foot.component.php';
?>