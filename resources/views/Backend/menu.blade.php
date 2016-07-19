		<nav class="col-sm-3">
          <ul class="nav nav-pills nav-stacked">
            <li @if(Request::segment(2) === 'post') class="active" @endif><a href="/master/post">發布文章</a></li>
            <li @if(Request::segment(2) === 'ad') class="active" @endif><a href="/master/ad">新增廣告</a></li>
            <li @if(Request::segment(2) === 'posts') class="active" @endif><a href="/master/posts">文章列表</a></li>
            <li @if(Request::segment(2) === 'ads') class="active" @endif><a href="/master/ads">廣告列表</a></li>
            <li @if(Request::segment(2) === '??') class="active" @endif><a href="#">會員中心</a></li>
            <li @if(Request::segment(1) === 'home') class="active" @endif><a href="/home">帳號設定</a></li>
          </ul>
        </nav>