<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;

/**
 * @var $this \yii\base\View
 * @var $content string
 */
// $this->registerAssetBundle('app');
?>
<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  
  <title><?php echo Html::encode($this->title); ?></title>
  <?php $this->head(); ?>
	
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  
  <!-- CSS  -->
  <link href="<?php echo $this->theme->baseUrl ?>/css/base.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo $this->theme->baseUrl ?>/css/project.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <?php $this->beginBody() ?>

  <div class="avoid-fout-indicator avoid-fout-indicator-fixed">
    <div class="progress-circular progress-circular-alt progress-circular-center">
      <div class="progress-circular-wrapper">
        <div class="progress-circular-inner">
          <div class="progress-circular-left">
            <div class="progress-circular-spinner"></div>
          </div>
          <div class="progress-circular-gap"></div>
          <div class="progress-circular-right">
            <div class="progress-circular-spinner"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <header class="header header-transparent header-waterfall">
    <ul class="nav nav-list pull-left">
      <li>
        <a data-toggle="menu" href="#menu">
          <span class="icon icon-lg">menu</span>
        </a>
      </li>
    </ul>
    <a class="header-logo margin-left-no" href="index.html">Material</a>
    <ul class="nav nav-list pull-right">
      <li>
        <a data-toggle="menu" href="#profile">
          <span class="access-hide">John Smith</span>
          <span class="avatar"><img alt="alt text for John Smith avatar" src="<?php echo $this->theme->baseUrl ?>/images/users/avatar-001.jpg"></span>
        </a>
      </li>
    </ul>
    <div class="nav-wrapper"><a id="logo-container" href="#" class="brand-logo"><?php echo Html::encode(\Yii::$app->name); ?></a>
      <?php
      echo Menu::widget([
          'options' => ['id' => "nav-mobile", 'class' => 'right side-nav'],
          'items' => [
              ['label' => 'Home', 'url' => ['site/index']],
              ['label' => 'About', 'url' => ['site/about']],
              ['label' => 'Contact', 'url' => ['site/contact']],
              ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
          ],
      ]);
      ?>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </header>
  <nav aria-hidden="true" class="menu" id="menu" tabindex="-1">
    <div class="menu-scroll">
      <div class="menu-content">
        <a class="menu-logo" href="index.html">Material</a>
        <ul class="nav">
          <li>
            <a class="waves-attach" href="ui-card.html">Cards</a>
          </li>
          <li>
            <a class="waves-attach" href="ui-collapse.html">Collapsible Regions</a>
          </li>
          <li>
            <a class="waves-attach" href="ui-dropdown.html">Dropdowns</a>
          </li>
          <li>
            <a class="waves-attach" href="ui-modal.html">Modals &amp; Toasts</a>
          </li>
          <li>
            <a class="waves-attach" href="ui-nav.html">Navs</a>
          </li>
          <li>
            <a class="waves-attach" href="ui-progress.html">Progress Bars</a>
          </li>
          <li>
            <a class="waves-attach" href="ui-tab.html">Tabs</a>
          </li>
          <li>
            <a class="waves-attach" href="ui-tile.html">Tiles</a>
          </li>
        </ul>
        <hr>
        <ul class="nav">
          <li>
            <a class="waves-attach" href="ui-button.html">Buttons</a>
          </li>
          <li>
            <a class="waves-attach" href="ui-form.html">Form Elements</a>
            <span class="menu-collapse-toggle collapsed" data-target="#form-elements" data-toggle="collapse"><i class="icon menu-collapse-toggle-close">close</i><i class="icon menu-collapse-toggle-default">add</i></span>
            <ul class="menu-collapse collapse" id="form-elements">
              <li>
                <a class="waves-attach" href="ui-form-adv.html">Form Elements <small>(materialised)</small></a>
              </li>
            </ul>
          </li>
          <li>
            <a class="waves-attach" href="ui-icon.html">Icons</a>
          </li>
          <li>
            <a class="waves-attach" href="ui-table.html">Tables</a>
          </li>
        </ul>
        <hr>
        <ul class="nav">
          <li>
            <a class="waves-attach" href="page-palette.html">Page Palettes</a>
            <span class="menu-collapse-toggle collapsed" data-target="#page-palettes" data-toggle="collapse"><i class="icon menu-collapse-toggle-close">close</i><i class="icon menu-collapse-toggle-default">add</i></span>
            <ul class="menu-collapse collapse" id="page-palettes">
              <li>
                <a class="waves-attach" href="page-palette-blue.html">Blue Palette</a>
              </li>
              <li>
                <a class="waves-attach" href="page-palette-green.html">Green Palette</a>
              </li>
              <li>
                <a class="waves-attach" href="page-palette-purple.html">Purple Palette</a>
              </li>
              <li>
                <a class="waves-attach" href="page-palette-red.html">Red Palette</a>
              </li>
              <li>
                <a class="waves-attach" href="page-palette-yellow.html">Yellow Palette</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <nav aria-hidden="true" class="menu menu-right" id="profile" tabindex="-1">
    <div class="menu-scroll">
      <div class="menu-top">
        <div class="menu-top-img">
          <img alt="John Smith" src="<?php echo $this->theme->baseUrl ?>/images/samples/landscape.jpg">
        </div>
        <div class="menu-top-info">
          <a class="menu-top-user" href="javascript:void(0)"><span class="avatar pull-left"><img alt="alt text for John Smith avatar" src="<?php echo $this->theme->baseUrl ?>/images/users/avatar-001.jpg"></span>John Smith</a>
        </div>
        <div class="menu-top-info-sub">
          <small>Some additional information about John Smith</small>
        </div>
      </div>
      <div class="menu-content">
        <ul class="nav">
          <li>
            <a class="waves-attach" href="javascript:void(0)"><span class="icon icon-lg">account_box</span>Profile Settings</a>
          </li>
          <li>
            <a class="waves-attach" href="javascript:void(0)"><span class="icon icon-lg">add_to_photos</span>Upload Photo</a>
          </li>
          <li>
            <a class="waves-attach" href="page-login.html"><span class="icon icon-lg">exit_to_app</span>Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <nav class="light-blue lighten-1" role="navigation">
    <div class="container">
      <div class="nav-wrapper"><a id="logo-container" href="#" class="brand-logo"><?php echo Html::encode(\Yii::$app->name); ?></a>
	  		<?php
						echo Menu::widget([
						    'options' => ['id' => "nav-mobile", 'class' => 'right side-nav'],
						    'items' => [
						        ['label' => 'Home', 'url' => ['site/index']],
						        ['label' => 'About', 'url' => ['site/about']],
						        ['label' => 'Contact', 'url' => ['site/contact']],
						        ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
						    ],
						]);
					?>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text"><?php echo Html::encode(\Yii::$app->name); ?></h1>
      <div class="row center">
        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
      </div>
      <div class="row center">
        <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a>
      </div>
      <br><br>

    </div>
  </div>

  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12 m12">
          <?php echo $content; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="mdi-image-flash-on"></i></h2> 
            <h5 class="center">Speeds up development</h5>

            <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="mdi-social-group"></i></h2>
            <h5 class="center">User Experience Focused</h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="mdi-action-settings"></i></h2>
            <h5 class="center">Easy to work with</h5>

            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
          </div>
        </div>
      </div>
      
    </div>
    <br><br>

    <div class="section">

    </div>
  </div>

  <footer class="orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>  


  <!--  Scripts-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="<?php echo $this->theme->baseUrl ?>/js/base.min.js"></script>
  <script src="<?php echo $this->theme->baseUrl ?>/js/project.min.js"></script>
  

  <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage(); ?>