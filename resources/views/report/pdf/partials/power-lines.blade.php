<div class="h5" style="color:{{$reportPdf->firstCorePower->color}}">
	{{$reportPdf->firstCorePower->power}}
</div>
<div class="write-lines">
	@foreach(range(1, 6) as $i)
		<div class="line-small"></div>
	@endforeach
</div>
<div class="h5" style="color:{{$reportPdf->secondCorePower->color}}">
	{{$reportPdf->secondCorePower->power}}
</div>
<div class="write-lines">
	@foreach(range(1, 6) as $i)
		<div class="line-small"></div>
	@endforeach
</div>
<div class="h5" style="color:{{ $reportPdf->firstSupportPower->color }}">
	{{ $reportPdf->firstSupportPower->power }}
</div>
<div class="write-lines">
	@foreach(range(1, 6) as $i)
		<div class="line-small"></div>
	@endforeach
</div>
<div class="h5" style="color:{{ $reportPdf->secondSupportPower->color }}">
	{{ $reportPdf->secondSupportPower->power }}
</div>
<div class="write-lines">
	@foreach(range(1, 6) as $i)
		<div class="line-small"></div>
	@endforeach
</div>
