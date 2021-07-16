<div class="table-responsive">
    <table class="table" id="somCountryInfos-table">
        <thead>
            <tr>
                <th>Year</th>
                <th>Inflation (%)</th>
                <th>Population (mn)</th>
                <th>GDP (€ bn)</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($somCountryInfos as $somCountryInfo)
            <tr>
                <td>{{ $somCountryInfo->year }}</td>
                <td>{{ $somCountryInfo->inflation }}</td>
                <td>{{ $somCountryInfo->population }}</td>
                <td>{{ $somCountryInfo->gpd_evolution }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['somCountryInfos.destroy', $somCountryInfo->id], 'method' => 'delete'])
                    !!}
                    <div class='btn-group'>
                        <a href="{{ route('somCountryInfos.show', [$somCountryInfo->id]) }}"
                            class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('somCountryInfos.edit', [$somCountryInfo->id]) }}"
                            class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn
                        btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
