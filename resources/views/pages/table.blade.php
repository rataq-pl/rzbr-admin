<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="pages-table">
            <thead>
            <tr>
                <th>Tytuł</th>
                <th>Url</th>
                <th>Zdjęcie</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->url }}</td>
                    <td><img src="{{ asset($page->image) }}" style="max-width:150px;"/></td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['pages.destroy', $page->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('pages.show', [$page->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('pages.edit', [$page->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $pages])
        </div>
    </div>
</div>
