  <!-- Footer -->
      <footer id="page-footer" class="bg-body-light">
        <div class="content py-0">
          <div class="row fs-sm">
            <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end">
              Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://pixelcave.com" target="_blank">pixelcave</a>
            </div>
            <div class="col-sm-6 order-sm-1 text-center text-sm-start">
              <a class="fw-semibold" href="https://pixelcave.com/products/dashmix" target="_blank">Likeup</a> &copy; <span data-toggle="year-copy"></span>
            </div>
          </div>
        </div>
      </footer>
      <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!--
      Dashmix JS

      Core libraries and functionality
      webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="{{ asset('Admin/js/dashmix.app.min.js')}}"></script>

    <!-- jQuery (required for jQuery Sparkline plugin) -->
    <script src="{{ asset('Admin/js/lib/jquery.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('Admin/js/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('Admin/js/plugins/chart.js/chart.umd.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('Admin/js/pages/be_pages_dashboard_v1.min.js')}}"></script>

    <!-- Page JS Helpers (jQuery Sparkline plugin) -->
    <script>Dashmix.helpersOnLoad(['jq-sparkline']);</script>
  </body>
</html>
