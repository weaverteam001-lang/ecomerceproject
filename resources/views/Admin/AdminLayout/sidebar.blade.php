<!doctype html>
<html lang="en" class="remember-theme">
  <head>
    <meta charset="utf-8">
    <!--
      Available classes for <html> element:

      'dark'                  Enable dark mode - Default dark mode preference can be set in app.js file (always saved and retrieved in localStorage afterwards):
                                window.Dashmix = new App({ darkMode: "system" }); // "on" or "off" or "system"
      'dark-custom-defined'   Dark mode is always set based on the preference in app.js file (no localStorage is used)
      'remember-theme'        Remembers active color theme between pages using localStorage when set through
                                - Theme helper buttons [data-toggle="theme"]
    -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Dashmix - Bootstrap 5 Admin Template &amp; UI Framework</title>

    <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('Admin/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('Admin/media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('Admin//media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('Admin/css/dashmix.min.css')}}">

 

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <!-- END Stylesheets -->

    <!-- Load and set color theme + dark mode preference (blocking script to prevent flashing) -->
    <script src="{{ asset('Admin//js/setTheme.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  </head>

  <body>
    <!-- Page Container -->
    <!--
      Available classes for #page-container:

      SIDEBAR & SIDE OVERLAY

        'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
        'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
        'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
        'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
        'sidebar-dark'                              Dark themed sidebar

        'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
        'side-overlay-o'                            Visible Side Overlay by default

        'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

        'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

      HEADER

        ''                                          Static Header if no class is added
        'page-header-fixed'                         Fixed Header


      FOOTER

        ''                                          Static Footer if no class is added
        'page-footer-fixed'                         Fixed Footer (please have in mind that the footer has a specific height when is fixed)

      HEADER STYLE

        ''                                          Classic Header style if no class is added
        'page-header-dark'                          Dark themed Header
        'page-header-glass'                         Light themed Header with transparency by default
                                                    (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
        'page-header-glass page-header-dark'         Dark themed Header with transparency by default
                                                    (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

      MAIN CONTENT LAYOUT

        ''                                          Full width Main Content if no class is added
        'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
        'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
    -->
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
      <!-- Side Overlay-->
      <aside id="side-overlay">
        <!-- Side Header -->
        <div class="bg-image" style="background-image: url('{{ asset('Admin/media/various/bg_side_overlay_header.jpg')}};">
          <div class="bg-primary-op">
            <div class="content-header">
              <!-- User Avatar -->
              <a class="img-link me-1" href="be_pages_generic_profile.html">
                <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar10.jpg" alt="">
              </a>
              <!-- END User Avatar -->

              <!-- User Info -->
              <div class="ms-2">
                <a class="text-white fw-semibold" href="be_pages_generic_profile.html">George Taylor</a>
                <div class="text-white-75 fs-sm">Full Stack Developer</div>
              </div>
              <!-- END User Info -->

              <!-- Close Side Overlay -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <a class="ms-auto text-white" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                <i class="fa fa-times-circle"></i>
              </a>
              <!-- END Close Side Overlay -->
            </div>
          </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">
          <!-- Side Overlay Tabs -->
          <div class="block block-transparent pull-x pull-t mb-0">
            <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="so-settings-tab" data-bs-toggle="tab" data-bs-target="#so-settings" role="tab" aria-controls="so-settings" aria-selected="true">
                  <i class="fa fa-fw fa-cog"></i>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="so-people-tab" data-bs-toggle="tab" data-bs-target="#so-people" role="tab" aria-controls="so-people" aria-selected="false">
                  <i class="far fa-fw fa-user-circle"></i>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="so-profile-tab" data-bs-toggle="tab" data-bs-target="#so-profile" role="tab" aria-controls="so-profile" aria-selected="false">
                  <i class="far fa-fw fa-edit"></i>
                </button>
              </li>
            </ul>
            <div class="block-content tab-content overflow-hidden">
              <!-- Settings Tab -->
              <div class="tab-pane pull-x fade fade-up show active" id="so-settings" role="tabpanel" aria-labelledby="so-settings-tab" tabindex="0">
                <div class="block mb-0">
                  <!-- Color Themes -->
                  <!-- Toggle Themes functionality initialized in Template._uiHandleTheme() -->
                  <div class="block-content block-content-sm block-content-full bg-body">
                    <span class="text-uppercase fs-sm fw-bold">Color Themes</span>
                  </div>
                  <div class="block-content block-content-full">
                    <div class="row g-sm text-center">
                      <div class="col-4 mb-1">
                        <a class="d-block py-3 text-white fs-xs fw-semibold bg-default" data-toggle="theme" data-theme="default" href="#">
                          Default
                        </a>
                      </div>
                      <div class="col-4 mb-1">
                        <a class="d-block py-3 text-white fs-sm fw-semibold bg-xwork" data-toggle="theme" data-theme="assets/css/themes/xwork.min.css" href="#">
                          xWork
                        </a>
                      </div>
                      <div class="col-4 mb-1">
                        <a class="d-block py-3 text-white fs-sm fw-semibold bg-xmodern" data-toggle="theme" data-theme="assets/css/themes/xmodern.min.css" href="#">
                          xModern
                        </a>
                      </div>
                      <div class="col-4 mb-1">
                        <a class="d-block py-3 text-white fs-sm fw-semibold bg-xeco" data-toggle="theme" data-theme="assets/css/themes/xeco.min.css" href="#">
                          xEco
                        </a>
                      </div>
                      <div class="col-4 mb-1">
                        <a class="d-block py-3 text-white fs-sm fw-semibold bg-xsmooth" data-toggle="theme" data-theme="assets/css/themes/xsmooth.min.css" href="#">
                          xSmooth
                        </a>
                      </div>
                      <div class="col-4 mb-1">
                        <a class="d-block py-3 text-white fs-sm fw-semibold bg-xinspire" data-toggle="theme" data-theme="assets/css/themes/xinspire.min.css" href="#">
                          xInspire
                        </a>
                      </div>
                      <div class="col-4 mb-1">
                        <a class="d-block py-3 text-white fs-sm fw-semibold bg-xdream" data-toggle="theme" data-theme="assets/css/themes/xdream.min.css" href="#">
                          xDream
                        </a>
                      </div>
                      <div class="col-4 mb-1">
                        <a class="d-block py-3 text-white fs-sm fw-semibold bg-xpro" data-toggle="theme" data-theme="assets/css/themes/xpro.min.css" href="#">
                          xPro
                        </a>
                      </div>
                      <div class="col-4 mb-1">
                        <a class="d-block py-3 text-white fs-sm fw-semibold bg-xplay" data-toggle="theme" data-theme="assets/css/themes/xplay.min.css" href="#">
                          xPlay
                        </a>
                      </div>
                      <div class="col-12">
                        <a class="d-block py-3 bg-body-dark fw-semibold text-dark" href="be_ui_color_themes.html">All Color Themes</a>
                      </div>
                    </div>
                  </div>
                  <!-- END Color Themes -->

                  <!-- Sidebar -->
                  <div class="block-content block-content-sm block-content-full bg-body d-dark-none">
                    <span class="text-uppercase fs-sm fw-bold">Sidebar</span>
                  </div>
                  <div class="block-content block-content-full d-dark-none">
                    <div class="row g-sm text-center">
                      <div class="col-6 mb-1">
                        <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="sidebar_style_dark" href="javascript:void(0)">Dark</a>
                      </div>
                      <div class="col-6 mb-1">
                        <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="sidebar_style_light" href="javascript:void(0)">Light</a>
                      </div>
                    </div>
                  </div>
                  <!-- END Sidebar -->

                  <!-- Header -->
                  <div class="block-content block-content-sm block-content-full bg-body">
                    <span class="text-uppercase fs-sm fw-bold">Header</span>
                  </div>
                  <div class="block-content block-content-full">
                    <div class="row g-sm text-center mb-2">
                      <div class="col-6 mb-1 d-dark-none">
                        <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="header_style_dark" href="javascript:void(0)">Dark</a>
                      </div>
                      <div class="col-6 mb-1 d-dark-none">
                        <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="header_style_light" href="javascript:void(0)">Light</a>
                      </div>
                      <div class="col-6 mb-1">
                        <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="header_mode_fixed" href="javascript:void(0)">Fixed</a>
                      </div>
                      <div class="col-6 mb-1">
                        <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="header_mode_static" href="javascript:void(0)">Static</a>
                      </div>
                    </div>
                  </div>
                  <!-- END Header -->

                  <!-- Content -->
                  <div class="block-content block-content-sm block-content-full bg-body">
                    <span class="text-uppercase fs-sm fw-bold">Content</span>
                  </div>
                  <div class="block-content block-content-full">
                    <div class="row g-sm text-center">
                      <div class="col-6 mb-1">
                        <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="content_layout_boxed" href="javascript:void(0)">Boxed</a>
                      </div>
                      <div class="col-6 mb-1">
                        <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="content_layout_narrow" href="javascript:void(0)">Narrow</a>
                      </div>
                      <div class="col-12 mb-1">
                        <a class="d-block py-3 bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="content_layout_full_width" href="javascript:void(0)">Full Width</a>
                      </div>
                    </div>
                  </div>
                  <!-- END Content -->

                  <!-- Layout API -->
                  <div class="block-content block-content-full border-top">
                    <a class="btn w-100 btn-alt-primary" href="be_layout_api.html">
                      <i class="fa fa-fw fa-flask me-1"></i> Layout API
                    </a>
                  </div>
                  <!-- END Layout API -->
                </div>
              </div>
              <!-- END Settings Tab -->

              <!-- People -->
              <div class="tab-pane pull-x fade fade-up" id="so-people" role="tabpanel" aria-labelledby="so-people-tab" tabindex="0">
                <div class="block mb-0">
                  <!-- Online -->
                  <div class="block-content block-content-sm block-content-full bg-body">
                    <span class="text-uppercase fs-sm fw-bold">Online</span>
                  </div>
                  <div class="block-content">
                    <ul class="nav-items">
                      <li>
                        <a class="d-flex py-2" href="be_pages_generic_profile.html">
                          <div class="flex-shrink-0 mx-3 overlay-container">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar8.jpg" alt="">
                            <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-success"></span>
                          </div>
                          <div class="flex-grow-1">
                            <div class="fw-semibold">Amanda Powell</div>
                            <div class="fs-sm text-muted">Photographer</div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a class="d-flex py-2" href="be_pages_generic_profile.html">
                          <div class="flex-shrink-0 mx-3 overlay-container">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar16.jpg" alt="">
                            <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-success"></span>
                          </div>
                          <div class="flex-grow-1">
                            <div class="fw-semibold">Jack Greene</div>
                            <div class="fw-normal fs-sm text-muted">Web Designer</div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a class="d-flex py-2" href="be_pages_generic_profile.html">
                          <div class="flex-shrink-0 mx-3 overlay-container">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar6.jpg" alt="">
                            <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-success"></span>
                          </div>
                          <div class="flex-grow-1">
                            <div class="fw-semibold">Amber Harvey</div>
                            <div class="fw-normal fs-sm text-muted">Web Developer</div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <!-- Online -->

                  <!-- Busy -->
                  <div class="block-content block-content-sm block-content-full bg-body">
                    <span class="text-uppercase fs-sm fw-bold">Busy</span>
                  </div>
                  <div class="block-content">
                    <ul class="nav-items">
                      <li>
                        <a class="d-flex py-2" href="be_pages_generic_profile.html">
                          <div class="flex-shrink-0 mx-3 overlay-container">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar5.jpg" alt="">
                            <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-danger"></span>
                          </div>
                          <div class="flex-grow-1">
                            <div class="fw-semibold">Carol White</div>
                            <div class="fw-normal fs-sm text-muted">UI Designer</div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <!-- END Busy -->

                  <!-- Away -->
                  <div class="block-content block-content-sm block-content-full bg-body">
                    <span class="text-uppercase fs-sm fw-bold">Away</span>
                  </div>
                  <div class="block-content">
                    <ul class="nav-items">
                      <li>
                        <a class="d-flex py-2" href="be_pages_generic_profile.html">
                          <div class="flex-shrink-0 mx-3 overlay-container">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar9.jpg" alt="">
                            <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-warning"></span>
                          </div>
                          <div class="flex-grow-1">
                            <div class="fw-semibold">Adam McCoy</div>
                            <div class="fw-normal fs-sm text-muted">Copywriter</div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a class="d-flex py-2" href="be_pages_generic_profile.html">
                          <div class="flex-shrink-0 mx-3 overlay-container">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar8.jpg" alt="">
                            <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-warning"></span>
                          </div>
                          <div class="flex-grow-1">
                            <div class="fw-semibold">Danielle Jones</div>
                            <div class="fw-normal fs-sm text-muted">Writer</div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <!-- END Away -->

                  <!-- Offline -->
                  <div class="block-content block-content-sm block-content-full bg-body">
                    <span class="text-uppercase fs-sm fw-bold">Offline</span>
                  </div>
                  <div class="block-content">
                    <ul class="nav-items">
                      <li>
                        <a class="d-flex py-2" href="be_pages_generic_profile.html">
                          <div class="flex-shrink-0 mx-3 overlay-container">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar11.jpg" alt="">
                            <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-muted"></span>
                          </div>
                          <div class="flex-grow-1">
                            <div class="fw-semibold">Jeffrey Shaw</div>
                            <div class="fw-normal fs-sm text-muted">Teacher</div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a class="d-flex py-2" href="be_pages_generic_profile.html">
                          <div class="flex-shrink-0 mx-3 overlay-container">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar3.jpg" alt="">
                            <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-muted"></span>
                          </div>
                          <div class="flex-grow-1">
                            <div class="fw-semibold">Amanda Powell</div>
                            <div class="fw-normal fs-sm text-muted">Photographer</div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a class="d-flex py-2" href="be_pages_generic_profile.html">
                          <div class="flex-shrink-0 mx-3 overlay-container">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar5.jpg" alt="">
                            <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-muted"></span>
                          </div>
                          <div class="flex-grow-1">
                            <div class="fw-semibold">Laura Carr</div>
                            <div class="fw-normal fs-sm text-muted">Front-end Developer</div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a class="d-flex py-2" href="be_pages_generic_profile.html">
                          <div class="flex-shrink-0 mx-3 overlay-container">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar11.jpg" alt="">
                            <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-muted"></span>
                          </div>
                          <div class="flex-grow-1">
                            <div class="fw-semibold">Brian Cruz</div>
                            <div class="fw-normal fs-sm text-muted">UX Specialist</div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <!-- END Offline -->

                  <!-- Add People -->
                  <div class="block-content block-content-full border-top">
                    <a class="btn w-100 btn-alt-primary" href="javascript:void(0)">
                      <i class="fa fa-fw fa-plus me-1 opacity-50"></i> Add People
                    </a>
                  </div>
                  <!-- END Add People -->
                </div>
              </div>
              <!-- END People -->

              <!-- Profile -->
              <div class="tab-pane pull-x fade fade-up" id="so-profile" role="tabpanel" aria-labelledby="so-profile-tab" tabindex="0">
                <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                  <div class="block mb-0">
                    <!-- Personal -->
                    <div class="block-content block-content-sm block-content-full bg-body">
                      <span class="text-uppercase fs-sm fw-bold">Personal</span>
                    </div>
                    <div class="block-content block-content-full">
                      <div class="mb-4">
                        <label class="form-label">Username</label>
                        <input type="text" readonly class="form-control" id="so-profile-username-static" value="Admin">
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="so-profile-name">Name</label>
                        <input type="text" class="form-control" id="so-profile-name" name="so-profile-name" value="George Taylor">
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="so-profile-email">Email</label>
                        <input type="email" class="form-control" id="so-profile-email" name="so-profile-email" value="g.taylor@example.com">
                      </div>
                    </div>
                    <!-- END Personal -->

                    <!-- Password Update -->
                    <div class="block-content block-content-sm block-content-full bg-body">
                      <span class="text-uppercase fs-sm fw-bold">Password Update</span>
                    </div>
                    <div class="block-content block-content-full">
                      <div class="mb-4">
                        <label class="form-label" for="so-profile-password">Current Password</label>
                        <input type="password" class="form-control" id="so-profile-password" name="so-profile-password">
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="so-profile-new-password">New Password</label>
                        <input type="password" class="form-control" id="so-profile-new-password" name="so-profile-new-password">
                      </div>
                      <div class="mb-4">
                        <label class="form-label" for="so-profile-new-password-confirm">Confirm New Password</label>
                        <input type="password" class="form-control" id="so-profile-new-password-confirm" name="so-profile-new-password-confirm">
                      </div>
                    </div>
                    <!-- END Password Update -->

                    <!-- Options -->
                    <div class="block-content block-content-sm block-content-full bg-body">
                      <span class="text-uppercase fs-sm fw-bold">Options</span>
                    </div>
                    <div class="block-content">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="so-settings-status" name="so-settings-status">
                        <label class="form-check-label fw-semibold" for="so-settings-status">Online Status</label>
                      </div>
                      <p class="text-muted fs-sm">
                        Make your online status visible to other users of your app
                      </p>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="so-settings-notifications" name="so-settings-notifications">
                        <label class="form-check-label fw-semibold" for="so-settings-notifications">Notifications</label>
                      </div>
                      <p class="text-muted fs-sm">
                        Receive desktop notifications regarding your projects and sales
                      </p>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="so-settings-updates" name="so-settings-updates">
                        <label class="form-check-label fw-semibold" for="so-settings-updates">Auto Updates</label>
                      </div>
                      <p class="text-muted fs-sm">
                        If enabled, we will keep all your applications and servers up to date with the most recent features automatically
                      </p>
                    </div>
                    <!-- END Options -->

                    <!-- Submit -->
                    <div class="block-content block-content-full border-top">
                      <button type="submit" class="btn w-100 btn-alt-primary">
                        <i class="fa fa-fw fa-save me-1 opacity-50"></i> Save
                      </button>
                    </div>
                    <!-- END Submit -->
                  </div>
                </form>
              </div>
              <!-- END Profile -->
            </div>
          </div>
          <!-- END Side Overlay Tabs -->
        </div>
        <!-- END Side Content -->
      </aside>
      <!-- END Side Overlay -->

      <!-- Sidebar -->
      <!--
        Sidebar Mini Mode - Display Helper classes

        Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
        Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
          If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

        Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
        Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
        Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
      -->
      <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="bg-header-dark">
          <div class="content-header bg-white-5">
            <!-- Logo -->
            <a class="fw-semibold text-white tracking-wide" href="index.html">
              <span class="smini-visible">
                L<span class="opacity-75"></span>
              </span>
              <span class="smini-hidden">
                Like<span class="opacity-75">up</span>
              </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div class="d-flex align-items-center gap-1">
              <!-- Dark Mode -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <div class="dropdown">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-dark-mode-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="far fa-fw fa-moon" data-dark-mode-icon></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end smini-hide border-0" aria-labelledby="sidebar-dark-mode-dropdown">
                  <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout" data-action="dark_mode_off" data-dark-mode="off">
                    <i class="far fa-sun fa-fw opacity-50"></i>
                    <span class="fs-sm fw-medium">Light</span>
                  </button>
                  <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout" data-action="dark_mode_on" data-dark-mode="on">
                    <i class="far fa-moon fa-fw opacity-50"></i>
                    <span class="fs-sm fw-medium">Dark</span>
                  </button>
                  <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout" data-action="dark_mode_system" data-dark-mode="system">
                    <i class="fa fa-desktop fa-fw opacity-50"></i>
                    <span class="fs-sm fw-medium">System</span>
                  </button>
                </div>
              </div>
              <!-- END Dark Mode -->

              <!-- Options -->
              <div class="dropdown">
                <!-- <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-themes-dropdown" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-fw fa-paint-brush"></i>
                </button> -->
                <div class="dropdown-menu dropdown-menu-end fs-sm border-0" aria-labelledby="sidebar-themes-dropdown">
                  <!-- Color Themes -->
                  <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                  <!-- <div class="row g-sm text-center">
                    <div class="col-4 mb-1">
                      <a class="d-block py-3 text-white fs-xs fw-semibold bg-default rounded-1" data-toggle="theme" data-theme="default" href="#">
                        Default
                      </a>
                    </div>
                    <div class="col-4 mb-1">
                      <a class="d-block py-3 text-white fs-xs fw-semibold bg-xwork rounded-1" data-toggle="theme" data-theme="assets/css/themes/xwork.min.css" href="#">
                        xWork
                      </a>
                    </div>
                    <div class="col-4 mb-1">
                      <a class="d-block py-3 text-white fs-xs fw-semibold bg-xmodern rounded-1" data-toggle="theme" data-theme="assets/css/themes/xmodern.min.css" href="#">
                        xModern
                      </a>
                    </div>
                    <div class="col-4 mb-1">
                      <a class="d-block py-3 text-white fs-xs fw-semibold bg-xeco rounded-1" data-toggle="theme" data-theme="assets/css/themes/xeco.min.css" href="#">
                        xEco
                      </a>
                    </div>
                    <div class="col-4 mb-1">
                      <a class="d-block py-3 text-white fs-xs fw-semibold bg-xsmooth rounded-1" data-toggle="theme" data-theme="assets/css/themes/xsmooth.min.css" href="#">
                        xSmooth
                      </a>
                    </div>
                    <div class="col-4 mb-1">
                      <a class="d-block py-3 text-white fs-xs fw-semibold bg-xinspire rounded-1" data-toggle="theme" data-theme="assets/css/themes/xinspire.min.css" href="#">
                        xInspire
                      </a>
                    </div>
                    <div class="col-4 mb-1">
                      <a class="d-block py-3 text-white fs-xs fw-semibold bg-xdream rounded-1" data-toggle="theme" data-theme="assets/css/themes/xdream.min.css" href="#">
                        xDream
                      </a>
                    </div>
                    <div class="col-4 mb-1">
                      <a class="d-block py-3 text-white fs-xs fw-semibold bg-xpro rounded-1" data-toggle="theme" data-theme="assets/css/themes/xpro.min.css" href="#">
                        xPro
                      </a>
                    </div>
                    <div class="col-4 mb-1">
                      <a class="d-block py-3 text-white fs-xs fw-semibold bg-xplay rounded-1" data-toggle="theme" data-theme="assets/css/themes/xplay.min.css" href="#">
                        xPlay
                      </a>
                    </div>
                    <div class="col-12">
                      <a class="d-block py-2 bg-body-dark fs-xs fw-semibold text-dark rounded-1" href="be_ui_color_themes.html">All Color Themes</a>
                    </div>
                  </div> -->
                  <!-- END Color Themes -->
                </div>
              </div>
              <!-- END Options -->

              <!-- Close Sidebar, Visible only on mobile screens -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
                <i class="fa fa-times-circle"></i>
              </button>
              <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
          </div>
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
          <!-- Side Navigation -->
          <div class="content-side">
            <ul class="nav-main">
              <li class="nav-main-item">
                <a class="nav-main-link" href="{{route('Admin.Dashboard')}}">
                  <i class="nav-main-link-icon fa fa-location-arrow"></i>
                  <span class="nav-main-link-name">Dashboard</span>
                  <!-- <span class="nav-main-link-badge badge rounded-pill bg-primary">4</span> -->
                </a>
              </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="{{ route('Admin.category') }}">
                    <i class="nav-main-link-icon fa fa-clone"></i>
                    <span class="nav-main-link-name">Category</span>
                  </a>
                </li>
                <li class="nav-main-item">
                <a class="nav-main-link"aria-haspopup="true"  href="{{route('Admin.Subcategory')}}">
                  <i class="nav-main-link-icon fa fa-clone"></i>
                  <span class="nav-main-link-name"> Sub Category</span>
                </a>
              
              </li>
              <li class="nav-main-heading"> Add Products</li>
              <li class="nav-main-item">
                <a class="nav-main-link "aria-haspopup="true"  href="{{route('Admin.Product')}}">
                  <i class="nav-main-link-icon fa fa-border-all"></i>
                  <span class="nav-main-link-name">Product</span>
                </a>
              
              </li>
      
              @php 
                $orderCount = DB::table('orders')->count();
                @endphp
           
               
                @php 
                $messageCount = DB::table('message')->count();
                @endphp
                <a class="nav-main-link "aria-haspopup="true"  href="{{route('Admin.message')}}">
                  <i class="nav-main-link-icon fa fa-border-all"></i>
                  <span class="nav-main-link-name">Messages</span>
                    <span class="nav-main-link-badge badge rounded-pill bg-danger">{{$messageCount}}</span>
                </a>


              <li class="nav-main-item">
                <a class="nav-main-link " data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <i class="nav-main-link-icon fa fa-vector-square"></i>
                  
                  <span class="nav-main-link-name">Orders</span>
                  <span class="nav-main-link-badge badge rounded-pill bg-primary">{{$orderCount}}</span>
                </a>

                  @php
                  $Confirmed  = DB::table('orders')
                      ->where('status','Confirmed ')
                      ->count();
                  @endphp
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" aria-expanded="false" href="{{route('Admin.Confirmed')}}">
                      <span class="nav-main-link-name">Confirmed Order</span>
                   <span class="nav-main-link-badge badge rounded-pill bg-success">{{$Confirmed }}</span>
                    </a>
                
                  </li>

                  @php
                  $pendingCount = DB::table('orders')
                      ->where('status','pending')
                      ->count();
                  @endphp        
                  <li class="nav-main-item">
                    <a class="nav-main-link"  href="{{route('Admin.pendingorder')}}">
                      <span class="nav-main-link-name">Pending Order</span>
                      <span class="nav-main-link-badge badge rounded-pill bg-warning text-dark">{{$pendingCount}}</span>
                    </a>
                   
                  </li>

                  @php
                  $Cancelled = DB::table('orders')
                      ->where('status','Cancelled')
                      ->count();
                  @endphp  

                  <li class="nav-main-item">
                    <a class="nav-main-link"  href="{{route('Admin.Cancelled')}}">
                      <span class="nav-main-link-name">Cancelled Orders</span>
                      <span class="nav-main-link-badge badge rounded-pill" style="background:#dc3545; color:#fff;">{{$Cancelled}}</span>
                    </a>
                  </li>
                </ul>
              </li>

                 <li class="nav-main-item">
                <a class="nav-main-link"aria-haspopup="true"  href="{{route('Admin.Client')}}">
                  <i class="nav-main-link-icon fa fa-clone"></i>
                  <span class="nav-main-link-name">Clients</span>
                </a>
                
                
              <li class="nav-main-heading">Interface</li>
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <i class="nav-main-link-icon fa fa-flask"></i>
                  <span class="nav-main-link-name">Elements</span>
                </a>
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_ui_icons.html">
                      <span class="nav-main-link-name">Icon Packs</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_ui_grid.html">
                      <span class="nav-main-link-name">Grid</span>
                    </a>
                  </li>
                </ul>
              </li>
             


                <!-- <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_tables_styles.html">
                      <span class="nav-main-link-name">Styles</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_tables_responsive.html">
                      <span class="nav-main-link-name">Responsive</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_tables_helpers.html">
                      <span class="nav-main-link-name">Helpers</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_tables_datatables.html">
                      <span class="nav-main-link-name">DataTables</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <i class="nav-main-link-icon fa fa-sticky-note"></i>
                  <span class="nav-main-link-name">Forms</span>
                </a>
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_forms_elements.html">
                      <span class="nav-main-link-name">Elements</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_forms_layouts.html">
                      <span class="nav-main-link-name">Layouts</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_forms_input_groups.html">
                      <span class="nav-main-link-name">Input Groups</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_forms_plugins.html">
                      <span class="nav-main-link-name">Plugins</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_forms_editors.html">
                      <span class="nav-main-link-name">Editors</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                      <span class="nav-main-link-name">CKEditor 5</span>
                    </a>
                    <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="be_forms_ckeditor5_classic.html">
                          <span class="nav-main-link-name">Classic</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="be_forms_ckeditor5_inline.html">
                          <span class="nav-main-link-name">Inline</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_forms_validation.html">
                      <span class="nav-main-link-name">Validation</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-main-heading">Extend</li>
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <i class="nav-main-link-icon fa fa-wrench"></i>
                  <span class="nav-main-link-name">Components</span>
                </a>
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_chat.html">
                      <span class="nav-main-link-name">Chat</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_onboarding.html">
                      <span class="nav-main-link-name">Onboarding</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_nestable.html">
                      <span class="nav-main-link-name">Nestable</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_dialogs.html">
                      <span class="nav-main-link-name">Dialogs</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_notifications.html">
                      <span class="nav-main-link-name">Notifications</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_loaders.html">
                      <span class="nav-main-link-name">Loaders</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_charts.html">
                      <span class="nav-main-link-name">Charts</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_gallery.html">
                      <span class="nav-main-link-name">Gallery</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_sliders.html">
                      <span class="nav-main-link-name">Sliders</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_carousel.html">
                      <span class="nav-main-link-name">Carousel</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_offcanvas.html">
                      <span class="nav-main-link-name">Offcanvas</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_rating.html">
                      <span class="nav-main-link-name">Rating</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_appear.html">
                      <span class="nav-main-link-name">Appear</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_calendar.html">
                      <span class="nav-main-link-name">Calendar</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_image_cropper.html">
                      <span class="nav-main-link-name">Image Cropper</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_maps_vector.html">
                      <span class="nav-main-link-name">Vector Maps</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_comp_syntax_highlighting.html">
                      <span class="nav-main-link-name">Syntax Highlighting</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <i class="nav-main-link-icon fa fa-cog"></i>
                  <span class="nav-main-link-name">Main Menu</span>
                </a>
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                      <i class="nav-main-link-icon fa fa-inbox"></i>
                      <span class="nav-main-link-name">1.1 Item</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                      <i class="nav-main-link-icon fa fa-fire"></i>
                      <span class="nav-main-link-name">1.2 Item</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                      <i class="nav-main-link-icon fa fa-share-alt"></i>
                      <span class="nav-main-link-name">1.3 Item</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                      <span class="nav-main-link-name">Sub Level 2</span>
                      <span class="nav-main-link-badge badge rounded-pill bg-primary">3</span>
                    </a>
                    <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="#">
                          <i class="nav-main-link-icon fa fa-tag"></i>
                          <span class="nav-main-link-name">2.1 Item</span>
                          <span class="nav-main-link-badge badge rounded-pill bg-info">2</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="#">
                          <i class="nav-main-link-icon fa fa-chart-pie"></i>
                          <span class="nav-main-link-name">2.2 Item</span>
                          <span class="nav-main-link-badge badge rounded-pill bg-danger">2</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="#">
                          <i class="nav-main-link-icon fa fa-sticky-note"></i>
                          <span class="nav-main-link-name">2.3 Item</span>
                          <span class="nav-main-link-badge badge rounded-pill bg-warning">3</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                          <span class="nav-main-link-name">Sub Level 3</span>
                        </a>
                        <ul class="nav-main-submenu">
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="#">
                              <i class="nav-main-link-icon fa fa-map"></i>
                              <span class="nav-main-link-name">3.1 Item</span>
                            </a>
                          </li>
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="#">
                              <i class="nav-main-link-icon fa fa-coffee"></i>
                              <span class="nav-main-link-name">3.2 Item</span>
                            </a>
                          </li>
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="#">
                              <i class="nav-main-link-icon fa fa-user-astronaut"></i>
                              <span class="nav-main-link-name">3.3 Item</span>
                            </a>
                          </li>
                          <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                              <span class="nav-main-link-name">Sub Level 4</span>
                            </a>
                            <ul class="nav-main-submenu">
                              <li class="nav-main-item">
                                <a class="nav-main-link" href="#">
                                  <i class="nav-main-link-icon fa fa-heart"></i>
                                  <span class="nav-main-link-name">4.1 Item</span>
                                </a>
                              </li>
                              <li class="nav-main-item">
                                <a class="nav-main-link" href="#">
                                  <i class="nav-main-link-icon fa fa-search"></i>
                                  <span class="nav-main-link-name">4.2 Item</span>
                                </a>
                              </li>
                              <li class="nav-main-item">
                                <a class="nav-main-link" href="#">
                                  <i class="nav-main-link-icon fa fa-microphone"></i>
                                  <span class="nav-main-link-name">4.3 Item</span>
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="nav-main-heading">Pages</li>
              <li class="nav-main-item open">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                  <i class="nav-main-link-icon fa fa-rocket"></i>
                  <span class="nav-main-link-name">Dashboards</span>
                </a>
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_pages_dashboard_all.html">
                      <span class="nav-main-link-name">All</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link active" href="be_pages_dashboard_v1.html">
                      <span class="nav-main-link-name">Corporate v1</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_social.html">
                      <span class="nav-main-link-name">Social</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_messages.html">
                      <span class="nav-main-link-name">Messages</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_minimal.html">
                      <span class="nav-main-link-name">Minimal</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_modern.html">
                      <span class="nav-main-link-name">Modern</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_classic_boxed.html">
                      <span class="nav-main-link-name">Classic Boxed</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_banking.html">
                      <span class="nav-main-link-name">Banking</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_crypto.html">
                      <span class="nav-main-link-name">Crypto</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_hosting.html">
                      <span class="nav-main-link-name">Hosting</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_booking.html">
                      <span class="nav-main-link-name">Booking</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_gaming.html">
                      <span class="nav-main-link-name">Gaming</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_tasks.html">
                      <span class="nav-main-link-name">Tasks</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_medical.html">
                      <span class="nav-main-link-name">Medical</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_travel.html">
                      <span class="nav-main-link-name">Travel</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_social_compact.html">
                      <span class="nav-main-link-name">Social Compact</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_chat.html">
                      <span class="nav-main-link-name">Chat</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_analytics.html">
                      <span class="nav-main-link-name">Analytics</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_corporate_slim.html">
                      <span class="nav-main-link-name">Corporate Slim</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_wp_post.html">
                      <span class="nav-main-link-name">WP Post</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="db_file_hosting.html">
                      <span class="nav-main-link-name">File Hosting</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <i class="nav-main-link-icon fa fa-user-friends"></i>
                  <span class="nav-main-link-name">Auth</span>
                </a>
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_pages_auth_all.html">
                      <span class="nav-main-link-name">All</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_auth_signin.html">
                      <span class="nav-main-link-name">Sign In</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_auth_signin_box.html">
                      <span class="nav-main-link-name">Sign In Box</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_auth_signin_box_alt.html">
                      <span class="nav-main-link-name">Sign In Box Alt</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_auth_signup.html">
                      <span class="nav-main-link-name">Sign Up</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_auth_signup_box.html">
                      <span class="nav-main-link-name">Sign Up Box</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_auth_signup_box_alt.html">
                      <span class="nav-main-link-name">Sign Up Box Alt</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_auth_lock.html">
                      <span class="nav-main-link-name">Lock Screen</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_auth_lock_box.html">
                      <span class="nav-main-link-name">Lock Screen Box</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_auth_lock_box_alt.html">
                      <span class="nav-main-link-name">Lock Screen Box Alt</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_auth_reminder.html">
                      <span class="nav-main-link-name">Pass Reminder</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_auth_reminder_box.html">
                      <span class="nav-main-link-name">Pass Reminder Box</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_auth_reminder_box_alt.html">
                      <span class="nav-main-link-name">Pass Reminder Box Alt</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_auth_two_factor.html">
                      <span class="nav-main-link-name">Two Factor</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_auth_two_factor_box.html">
                      <span class="nav-main-link-name">Two Factor Box</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_auth_two_factor_box_alt.html">
                      <span class="nav-main-link-name">Two Factor Box Alt</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <i class="nav-main-link-icon fa fa-ghost"></i>
                  <span class="nav-main-link-name">Error</span>
                </a>
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_pages_error_all.html">
                      <span class="nav-main-link-name">All</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_error_400.html">
                      <span class="nav-main-link-name">400</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_error_401.html">
                      <span class="nav-main-link-name">401</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_error_403.html">
                      <span class="nav-main-link-name">403</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_error_404.html">
                      <span class="nav-main-link-name">404</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_error_500.html">
                      <span class="nav-main-link-name">500</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="op_error_503.html">
                      <span class="nav-main-link-name">503</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                  <i class="nav-main-link-icon fa fa-coffee"></i>
                  <span class="nav-main-link-name">Get Started</span>
                </a>
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="gs_backend.html">
                      <span class="nav-main-link-name">Backend</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="gs_backend_boxed.html">
                      <span class="nav-main-link-name">Backend Boxed</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="gs_landing.html">
                      <span class="nav-main-link-name">Landing</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="gs_rtl_backend.html">
                      <span class="nav-main-link-name">RTL Backend</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="gs_rtl_backend_boxed.html">
                      <span class="nav-main-link-name">RTL Backend Boxed</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="gs_rtl_landing.html">
                      <span class="nav-main-link-name">RTL Landing</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div> -->
          <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
      </nav>
      <!-- END Sidebar -->