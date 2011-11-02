<div id="page">
    <div class="header-wrapper clearfix">
      <header id="header" role="banner">
        <div class="container-16 clearfix">
          <div class="grid-16 clearfix">
            <?php if ($logo): ?>
              <div class="site-logo">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                  <img src="<?php print $logo; ?>" />
                </a>
              </div>
            <?php endif; ?>
            <?php if ($site_name || $site_slogan): ?>
              <hgroup>
                <h1 id="site-name">
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
                </h1>
                <?php if ($site_slogan): ?>
                  <div id="site-slogan"><?php print $site_slogan; ?></div>
                <?php endif; ?>
              </hgroup>
            <?php endif; ?>
          </div>
        </div>
      </header>
    </div>

  <?php if ($main_menu || $page['navigation']): ?>
    <div class="navigation-wrapper clearfix">
      <nav id="navigation" role="navigation" class="container-16">      <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'clearfix')), 'heading' => array('text' => t('Main menu'), 'level' => 'h2', 'class' => array('element-invisible')))); ?>
        <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'clearfix')), 'heading' => array('text' => t('Secondary menu'), 'level' => 'h2', 'class' => array('element-invisible')))); ?>
        <?php if ($page['navigation']): ?>
          <?php print render($page['navigation'])?>
        <?php endif; ?>
      </nav>
    </div>
  <?php endif; ?>

  <div class="main-wrapper clearfix">
    <div id="main" class="container-16">
      <div id="content" role="main">
        <?php if ($page['highlighted']): ?>
          <div id="highlighted"><?php print render($page['highlighted']); ?></div>
        <?php endif; ?>
        <?php print $breadcrumb; ?>
        <?php print $messages; ?>
        <?php if ($title): ?>
          <h1 class="title" id="page-title"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php if ($tabs = render($tabs)): ?>
          <nav id="tabs" role="navigation"><?php print $tabs; ?></nav>
        <?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links clearfix"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
      </div>

      <?php if ($page['sidebar_first']): ?>
        <aside id="sidebar-first" role="complementary">
          <?php print render($page['sidebar_first']); ?>
        </aside>
      <?php endif; ?>

      <?php if ($page['sidebar_second']): ?>
        <aside id="sidebar-second" role="complementary">
          <?php print render($page['sidebar_second']); ?>
        </aside>
      <?php endif; ?>

      </div>

    </div>
  </div>

  <?php if ($page['footer']): ?>
    <div class="footer-wrapper clearfix">
      <footer id="footer" role="contentinfo" class="container-16">
        <?php print render($page['footer']); ?>
      </footer>
    </div>
  <?php endif; ?>

</div>
