<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-striped" id="f-a-q-s-table">
            <thead>
            <tr>
                <th>Pytanie</th>
                <th colspan="3">Zarządzaj</th>
            </tr>
            </thead>
            <tbody id="sortableElement">
            @foreach($fAQS as $key=>$fAQ)
                <tr class="" id="element_{{$fAQ->id}}">
                    <td>{{ $fAQ->question }}</td>
                    <td>{{ $fAQ->answer }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['fAQS.destroy', $fAQ->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('fAQS.show', [$fAQ->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('fAQS.edit', [$fAQ->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Potwierdź usunięcie!')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $fAQS])
        </div>
    </div>
</div>
