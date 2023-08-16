<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="testimonials-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Starscount</th>
                <th>Realurl</th>
                <th>Content</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ $testimonial->starsCount }}</td>
                    <td>{{ $testimonial->realURL }}</td>
                    <td>{{ $testimonial->content }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['testimonials.destroy', $testimonial->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('testimonials.show', [$testimonial->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('testimonials.edit', [$testimonial->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $testimonials])
        </div>
    </div>
</div>
