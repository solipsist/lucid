<?php if (!empty($content['header_alpha'])): ?>
  <header class="header-alpha grid-16 alpha omega">
    <div class="inner clearfix">
      <?php print render($content['header_alpha']); ?>
    </div>
  </header>
<?php endif; ?>

<?php if (!empty($content['header_beta']) || !empty($content['main']) || !empty($content['aside_alpha']) || !empty($content['footer_alpha']) || !empty($content['footer_beta'])): ?>
  <div class="page-main grid-12 alpha">
<?php endif; ?>

  <?php if (!empty($content['header_beta'])): ?>
    <header class="header-beta grid-16 alpha omega">
      <div class="inner clearfix">
        <?php print render($content['header_beta']); ?>
      </div>
    </header>
  <?php endif; ?>

  <?php if (!empty($content['main'])): ?>
    <div class="main grid-12 alpha">
      <div class="inner clearfix">
        <?php print render($content['main']); ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if (!empty($content['aside_alpha'])): ?>
    <aside class="aside-alpha grid-4 omega">
      <div class="inner clearfix">
        <?php print render($content['aside_alpha']); ?>
      </div>
    </aside>
  <?php endif; ?>

  <?php if (!empty($content['footer_alpha'])): ?>
    <footer class="footer-alpha grid-16 alpha omega">
      <div class="inner clearfix">
        <?php print render($content['footer_alpha']); ?>
      </div>
    </footer>
  <?php endif; ?>

<?php if (!empty($content['header_beta']) || !empty($content['main']) || !empty($content['aside_alpha'])): ?>
  </div>
<?php endif; ?>

<?php if (!empty($content['aside_beta'])): ?>
  <aside class="aside-beta grid-4 omega">
    <div class="inner clearfix">
      <?php print render($content['aside_beta']); ?>
    </div>
  </aside>
<?php endif; ?>

<?php if (!empty($content['footer_beta'])): ?>
  <footer class="footer-beta grid-16 alpha omega">
    <div class="inner clearfix">
      <?php print render($content['footer_beta']); ?>
    </div>
  </footer>
<?php endif; ?>