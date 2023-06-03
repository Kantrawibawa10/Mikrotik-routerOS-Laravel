<table class="table table-borderless" id="myTable">
	<thead>
		<tr>
			<th>No</th>
			<th>Status</th>
			<th>Date & Time</th>
		</tr>
	</thead>
	<tbody>
        @php $no=1; @endphp
		@foreach($report as $item)
			<tr>
                <td>{{ $no++ }}</td>
				<td>{!!  $item->text !!}</td>
				<td>{{ date("d F Y, h:i A", strtotime($item->created_at)) }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
