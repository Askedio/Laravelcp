@foreach (Nav::$nav->where('nav', 'main')->sortBy('sort') as $chunk => $c)
  <li><a href="{{ $c['link']}}"><em class="fa {{ $c['icon']}}"></em> {{ $c['title']}}</a></li>
@endforeach
