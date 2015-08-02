@foreach (Nav::$nav->where('nav', 'main')->sortBy('sort') as $chunk => $c)
  <li><a href="{{ $c['link']}}"><em class="fa {{ $c['icon']}}"></em> {{ $c['title']}}</a></li>
  @if(isset($c['submenu']))
    <ul class="nav nav-second-level">
    @foreach($c['submenu'] as $cc)
      <li><a href="{{ $cc['link']}}">{{ $cc['title']}}</a></li>
    @endforeach
    </ul>
  @endif
@endforeach