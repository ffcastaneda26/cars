<tr>
    <td>{{ $record->name }}</td>
    <td>{{ $record->email }}</td>
    <td>{{ $record->phone }}</td>
    <td>{{ $record->total_interested() }}</td>
    <td>
        <ul>
            @foreach ($record->interested_vehicles as $vehicle)
                <li>
                    <h6> {{ $vehicle->vin }} {{ $vehicle->model_year }} {{ $vehicle->make }}  {{ $vehicle->model }}</h6>
                </li>
               @endforeach
        </ul>
    </td>
</tr>
