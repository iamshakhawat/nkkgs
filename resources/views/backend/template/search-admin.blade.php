<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr class="text-center">
            <th style="width:5%">#</th>
            <th style="width:30%">Name</th>
            <th style="width:25%">Contact Details</th>
            <th style="width:25%">Address</th>
            <th style="width:15%">Manage</th>
        </tr>
    </thead>
    <tbody id="table_tbody">
        @foreach ($admins as $admin)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>
                    <div class="d-flex justify-content-start align-items-center">
                        @if ($admin->photo != '')
                            <img class="rounded-circle mr-1"
                                src="{{ asset('upload') }}/users/{{ $admin->photo }}"
                                width="50" height="50"
                                alt="{{ $admin->fname }}'s Photo">
                        @else
                            <img class="rounded-circle mr-1"
                                src="{{ asset('backend') }}/assets/img/user.jpg"
                                width="50" height="50" alt="{{ $admin->fname }}">
                        @endif
                        <div class="ml-2">
                            <p class="mb-0"><strong>{{ $admin->fname }}
                                    {{ $admin->lname }}
                                    @if ($admin->status == 1)
                                        <span
                                            style="display:inline-block;vertical-align:middle;height: 10px;width:10px;border-radius:100%;background:green"></span>
                                    @else
                                        <span
                                            style="display:inline-block;vertical-align:middle;height: 10px;width:10px;border-radius:50%;background:red"></span>
                                    @endif
                                    @if ($admin->id == Auth::user()->id)
                                        (Me)
                                    @endif
                                </strong></p>
                            <p class="mb-0">ID: {{ $admin->user_id }}</p>
                            <p class="mb-0">Blood: {{ $admin->blood_group }}</p>
                            <p class="mb-0">Gender: {{ $admin->gender }}</p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="mb-0"><strong>Email:</strong><br> <a
                            href="mailto:{{ $admin->email }}">{{ $admin->email }}</a></p>
                    <p class="mb-0"><strong>Phone:</strong> <br><a
                            href="tel:{{ $admin->email }}">{{ $admin->phone }}</a></p>
                </td>
                <td>
                    <p class="mb-0"><strong>Present:</strong> <br>
                        {{ $admin->current_address }}</p>
                    <p class="mb-0"><strong>Parmanent:</strong> <br>
                        {{ $admin->parmanent_address }}</p>
                </td>
                <td>
                    <a href="{{ route('admin.edit.admin', [$admin->id]) }}"
                        class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                    <a target="_blank"
                        href="{{ route('admin.preview.admin', [$admin->id]) }}"
                        class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>

                    <button
                        @if ($admin->id != Auth::user()->id) onclick="deletePrompt({{ $admin->id }})" data-toggle="modal"
                        data-target="#deletePrompt" @else disabled @endif
                        class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="row justify-content-center my-2">
    {{ $admins->appends('search')->links('pagination::bootstrap-4') }}
</div>