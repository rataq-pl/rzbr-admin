<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="contact-forms-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Content</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contactForms as $contactForm)
                <tr>
                    <td>{{ $contactForm->name }}</td>
                    <td>{{ $contactForm->email }}</td>
                    <td>{{ $contactForm->phone }}</td>
                    <td>{{ $contactForm->content }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['contactForms.destroy', $contactForm->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('contactForms.show', [$contactForm->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('contactForms.edit', [$contactForm->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $contactForms])
        </div>
    </div>
</div>
