<?php if (!empty($content['tertiary'])): ?>
  <div class="lucid-layout-onecol-region lucid-layout-region-tertiary">
  <?php print render($content['tertiary']); ?>
  </div>
<?php endif; ?>
</div>

<div class="lucid-layout-onecol-wrapper">
<?php if (!empty($content['primary'])): ?>
  <div class="lucid-layout-onecol-region lucid-layout-region-primary">
  <?php print render($content['primary']); ?>
  </div>
<?php endif; ?>

<?php if (!empty($content['secondary'])): ?>
  <div class="lucid-layout-onecol-region lucid-layout-region-secondary">
  <?php print render($content['secondary']); ?>
  </div>
<?php endif; ?>
