<div class="panel-group" id="accordion">
@if(count($results) == 0)
<h3>{{ trans('lcp::default.no_results') }}</h3>
@else
@foreach($results as $index=>$data)
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#accord-{{{ $index }}}">
				{{ $data['name'] }}
			</a>
		</h4>
	</div>

	<div id="accord-{{{ $index }}}" class="panel-collapse collapse">
		<div class="panel-body">
			<table class="table">
				<thead>
					@foreach($data['columns'] as $value)
							<th>{{ $value }}</th>
					@endforeach
				</thead>
			    @foreach($data['results'] as $results)
            <tr>
              @foreach($data['columns'] as $col)
                <td>
                  @if(isset($data['actions'][$col]))
                    @if($data['actions'][$col]['method'] == "modal")
                    <a href="{{ URL::to(str_replace('?', $results[$col], $data['actions'][$col]['action'])) }}" class="modalfy"> {{ $results[$col] }} </a>

                    @elseif($data['actions'][$col]['method'] == "link")
                    <a href="{{ URL::to(str_replace('?', $results[$col], $data['actions'][$col]['action'])) }}"> {{ $results[$col] }} </a>
								
                    @endif
                  @else
                    {{ $results[$col] }} 
                  @endif
                </td>
              @endforeach
            </tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@endforeach
</div>		
@foreach($results as $index=>$data)
	<script type="text/javascript">
		$('#accord-{{ $index }}').collapse('show');
	</script>
@endforeach
@endif