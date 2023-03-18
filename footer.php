<!-- footer -->
<footer class="footer" role="contentinfo">
  <div class="content-wrap">
    <ul class="meta">
      <?php if(is_active_sidebar('footer-sidebar-1')){ ?>
          <li class="widget social-wrap"><?php dynamic_sidebar('footer-sidebar-1'); ?></li>
      <?php } if(is_active_sidebar('footer-sidebar-2')){ ?>
          <li class="widget"><?php dynamic_sidebar('footer-sidebar-2'); ?></li>
      <?php } if(is_active_sidebar('footer-sidebar-3')){ ?>
        <li class="widget"><?php dynamic_sidebar('footer-sidebar-3'); ?></li>
      <?php } if(is_active_sidebar('footer-sidebar-4')){ ?>
        <li class="widget"><?php dynamic_sidebar('footer-sidebar-4'); ?></li>
    <?php } ?>
    </ul>
    <!-- copyright -->
    <div class="copyright">
      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
    </div>
    <!-- /copyright -->
  </div>
</footer>
      </div>
<!-- /footer -->

<?php wp_footer(); ?>

</body>
</html>
