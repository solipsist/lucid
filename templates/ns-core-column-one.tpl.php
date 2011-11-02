
<?php if (!empty($content['header_alpha'])): ?>
  <header class="header-alpha grid-16 alpha omega">
    <?php print render($content['header_alpha']); ?>
  </header>
<?php endif; ?>

<?php if (!empty($content['header_beta'])): ?>
  <header class="header-alpha grid-16 beta omega">
    <?php print render($content['header_alpha']); ?>
  </header>
<?php endif; ?>
<?php if (!empty($content['main'])): ?>
  <div class="main grid-12 alpha" role="main">
    <?php print render($content['main']); ?>
  </div>
<?php endif; ?>

<?php if (!empty($content['footer_alpha'])): ?>
  <footer class="footer-alpha grid-16 alpha omega">
    <?php print render($content['footer_alpha']); ?>
  </footer>
<?php endif; ?>


