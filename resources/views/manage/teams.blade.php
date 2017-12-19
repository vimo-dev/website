<h2 class="text-left" style="width: 100%;"> Teams </h2>

<table class="table table-striped table-bordered table-hover table-sm" id="teams-table">
    <thead><tr><th>ID</th><th>Tag</th><th>Name</th><th></th></tr></thead>
    <tbody>
        @if(isset($tabletoedit) && isset($id))
            @foreach ($teams as $team)
                <tr>
                    @if(($team->id == $id) && ($tabletoedit == 'teams'))
                        <form class="form-horizontal" method="POST" action="{{ route('saveTeam', [$team->id]) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <td>{{ $team->id }}</td>
                            <td><input id="tag" type="text" class="form-control" name="tag" value="{{ $team->tag }}" required autofocus></td>
                            <td><input id="name" type="text" class="form-control" name="name" value="{{ $team->name }}" required></td>
                            <td><button type="submit" class="btn btn-block edit-button">Save</button></td>
                        </form>
                    @else
                        <td>{{ $team->id }}</td><td>{{ $team->tag }}</td><td>{{ $team->name }}</td>
                        <td><a class="btn btn-block edit-button" href="/manage/edit/teams/{{ $team->id }}" role="button">Edit</a></td>
                    @endif
                </tr>
            @endforeach
        @else
            @foreach ($teams as $team)
                <tr>
                    <td>{{ $team->id }}</td><td>{{ $team->tag }}</td><td>{{ $team->name }}</td>
                    <td><a class="btn btn-block edit-button" href="/manage/edit/teams/{{ $team->id }}" role="button">Edit</a></td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

<div class="collapse border rounded" style="padding: 10px;" id="create-team">
    <h3 class="text-left" style="width: 100%;"> Create a Team </h3>
    <p>Add users after creating the team.</p>
    <form class="form-horizontal" method="POST" action="{{ route('createTeam') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <label for="name">Name</label>
        <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
        <label for="tag">Tag</label>
        <input id="tag" type="text" class="form-control" name="tag" value="" required autofocus>
        <button type="submit" class="btn edit-button" style="margin-top: 10px;">Create</button>
    </form>
</div>
<div style="width: 100%;"><button class="btn edit-button float-right" type="button" data-toggle="collapse" data-target="#create-team" aria-expanded="false" aria-controls="create-team">+</div>               
