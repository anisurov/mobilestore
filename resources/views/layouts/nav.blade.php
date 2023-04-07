 
  <!--Default Navbar-->

  
  <nav class="navbar navbar-default" style="padding-right:30px;padding-left:30px;">
  <div class="container-fluid">

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{Request::is('/') ? "active" : "" }}"><a href="{{ url('/') }}">Home</a></li>
        <li class="{{Request::is('productentry') ? "active" : "" }}"><a href="{{ url('/productentry') }}">EntryProduct</a></li>
        <li class="{{Request::is('sellproduct') ? "active" : "" }}"><a href="{{ url('/sellproduct') }}">Sell Product</a></li>
        <li class="{{Request::is('check') ? "active" : "" }}"><a href="{{ url('/check') }}">Check Product</a></li>
        <li class="{{Request::is('reportdate') ? "active" : "" }}"><a href="{{ url('/reportdate') }}">Daily Report</a></li>
        <li class="{{Request::is('reportmonthly') ? "active" : "" }}"><a href="{{ url('/reportmonthly') }}">Datewise Report</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  