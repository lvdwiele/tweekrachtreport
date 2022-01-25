<?php
/** @var App\Tweekracht\Dto\ReportPdfDto $reportPdf */
$powers = [
    $reportPdf->firstCorePower,
    $reportPdf->secondCorePower,
    $reportPdf->firstSupportPower,
    $reportPdf->secondSupportPower,
];
?>
<div class="table">
	@foreach($powers as $power)
		<table>
			<tr>
				<td style="color: {{ $power->color }}">
					{{ $power->power }}
				</td>
				<td class="td-0">0</td>
				<td class="td-1">1</td>
				<td class="td-2">2</td>
				<td class="td-3">3</td>
				<td class="td-4">4</td>
				<td class="td-5">5</td>
				<td class="td-6">6</td>
			</tr>
		</table>
	@endforeach
</div>
