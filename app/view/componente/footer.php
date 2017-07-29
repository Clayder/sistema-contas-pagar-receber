<!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?= baseUrl("bower_components/gentelella/vendors/jquery/dist/jquery.min.js"); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?= baseUrl("bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>
    <!-- FastClick -->
    <script src="<?= baseUrl("bower_components/gentelella/vendors/fastclick/lib/fastclick.js"); ?>"></script>
    <!-- NProgress -->
    <script src="<?= baseUrl("bower_components/gentelella/vendors/nprogress/nprogress.js"); ?>"></script>

     <!-- jQuery custom content scroller -->
    <script src="<?= baseUrl("bower_components/gentelella/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"); ?>"></script>

    <?php foreach ($arrayScriptFooter as $script): ?>
      <?php echo $script; ?>
    <?php endforeach; ?>

      <!-- Custom Theme Scripts -->
    <script src="<?= baseUrl("bower_components/gentelella/build/js/custom.min.js"); ?>"></script>
  

  </body>
</html>