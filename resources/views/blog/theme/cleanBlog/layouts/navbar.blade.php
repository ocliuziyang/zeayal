<nav class="navbar fixed-top navbar-toggleable-md navbar-light" id="mainNav">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            菜单 <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand page-scroll" href="/">{{ config('blog.website.title') }}</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="/">主页</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="/about">关于我</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="/post">文章</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="/contact">联系</a>
                </li>
            </ul>
            <span>中</span>/<span>en</span>
        </div>
    </div>
</nav>