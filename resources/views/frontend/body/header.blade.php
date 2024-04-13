<div class="wrapper col1" >
  <div id="topbar" class="clear">
    <ul>
    @if(Auth::check())
    <li><a href="#">{{Auth::user()->email}}</a></li>
@else
    Guest User
@endif
      
    </ul>
    <form action="#" method="post" id="search">
      <fieldset>
      @if(Auth::check())
    {{ Auth::user()->phone }}
@else
    Guest User Phone
@endif
      </fieldset>
    </form>
  </div>
</div>