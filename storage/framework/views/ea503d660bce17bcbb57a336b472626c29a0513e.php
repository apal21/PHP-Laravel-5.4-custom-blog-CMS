<!-- defaulr navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">My Blog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo e(Request::is('/') ? "active" : ""); ?>"><a href="/">Home <span class="sr-only">(current)</span></a></li>
        <li class="<?php echo e(Request::is('about') ? "active" : ""); ?>"><a href="/about">About</a></li>
        <li class="<?php echo e(Request::is('contact') ? "active" : ""); ?>"><a href="/contact">Contact</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">

        <?php if(Auth::check()): ?>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo e(Auth::user()->name); ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><?php echo Html::linkroute('posts.index', 'Dashboard'); ?></li>
              <li><?php echo Html::linkroute('categories.index', 'Categories'); ?></li>
              <li><?php echo Html::linkroute('tags.index', 'Tags'); ?></li>
              <li role="separator" class="divider"></li>
              <li><?php echo Html::linkroute('logout', 'Log Out'); ?></li>
            </ul>
          </li>
        <?php else: ?>

          <li class="<?php echo e(Request::is('login') ? "active" : ""); ?>"><?php echo Html::linkroute('login', 'Log In'); ?></li>

        <?php endif; ?>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>