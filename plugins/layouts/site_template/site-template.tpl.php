<div id="page">

  <?php if (!empty($content['header'])): ?>
    <header id="header" role="banner">
      <div class="container">
        <div class="sixteen columns">
          <?php print render($content['header']); ?>
        </div>
      </div>
    </header>
  <?php endif; ?>

  <?php if (!empty($content['navigation'])): ?>
    <nav id="navigation" role="navigation">
      <div class="container">
        <div class="sixteen columns">
          <?php print render($content['navigation']); ?>
        </div>
      </div>
    </nav>
  <?php endif; ?>
  
  <?php if (!empty($content['main'])): ?>
    <div id="main" role="main">
      <div class="container">
        <div class="sixteen columns">
          <?php print render($content['main']); ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if (!empty($content['footer'])): ?>
    <footer id="footer" role="contentinfo">
      <div class="container">
        <div class="sixteen columns">
          <?php print render($content['footer']); ?>
        </div>
      </div>
    </footer>
  <?php endif; ?>

</div>
