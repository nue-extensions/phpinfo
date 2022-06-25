@extends('layouts.app')
@section('title', $title)

@section('css')
	<style>
	    .phpinfo-v {
	        overflow-x: auto;
	        word-wrap: break-word;
	        word-break: break-all;
	    }
	</style>
@endsection

@section('content')
	
	@include('nue::partials.breadcrumb', ['lists' => [
		'Extensions' => 'javascript:;', 
		$title => 'active'
	]])

	@foreach($info as $name => $section)
		<div class="card rounded-0">
			<div class="card-body p-0">
				<table class="table table-striped table-sm">
					<tbody>
						@foreach($section as $key => $val)
							@if (is_a($val, 'Illuminate\Support\Collection'))
								<tr>
									<td>{!! $key !!}</td>
									<td class="phpinfo-v">{!! $val[0] !!}</td>
									<td>{!! $val[1] !!}</td>
								</tr>
							@elseif(is_array($val))
								<tr>
									<td>{!! $key !!}</td>
									<td class="phpinfo-v">{!! $val[0] !!}</td>
									<td>{!! $val[1] !!}</td>
								</tr>
							@elseif(is_string($key))
								<tr>
									<td>{!! $key !!}</td>
									<td class="phpinfo-v">{!! $val !!}</td>
									<td></td>
								</tr>
							@else
								<tr>
									<td>{!! $val !!}</td>
									<td></td>
									<td></td>
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@endforeach

@endsection