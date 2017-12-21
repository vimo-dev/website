<h2 class="text-center"> Users </h2>

<table class="table table-striped table-bordered table-hover table-sm" id="users-table">
    <thead><tr><th>ID</th><th>Username</th><th>Full Name</th><th>Email</th><th>Website-Rolle</th><th>Team</th><th>Team-Rolle</th><th>Ingame-Rolle</th>
    <th>Land</th><th>Geburtsdatum</th><th></th></tr></thead>
    <tbody>
        @if(isset($tabletoedit) && isset($id))
            @foreach ($users as $user)
                <tr>
                    @if(($user->id == $id) && ($tabletoedit == 'users'))
                        <form class="form-horizontal" method="POST" action="{{ route('saveUser', [$user->id]) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <td>{{ $user->id }}</td><td>{{ $user->username }}</td><td>{{ $user->name }}</td><td>{{ $user->email }}</td>
                            <td><input id="siterole_id" type="number" class="form-control" name="siterole_id" value="{{ $user->siterole_id }}" min="0" required autofocus></td>
                            <td><input id="team_id" type="number" class="form-control" name="team_id" value="{{ $user->team_id }}" min="0"></td>
                            <td><input id="teamrole_id" type="number" class="form-control" name="teamrole_id" value="{{ $user->teamrole_id }}" min="0"></td>
                            <td><input id="ingamerole_id" type="number" class="form-control" name="ingamerole_id" value="{{ $user->ingamerole_id }}" min="0"></td>
                            <td>{{ $user->country }}</td><td>{{ $user->date_of_birth }}</td>
                            <td><button type="submit" class="btn btn-block edit-button">Save</button></td>
                        </form>
                    @else
                        <td>{{ $user->id }}</td><td>{{ $user->username }}</td><td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td><td>{{ $user->siterole_id }}</td><td>{{ $user->team_id }}</td>
                        <td>{{ $user->teamrole_id }}</td><td>{{ $user->ingamerole_id }}</td>
                        <td>{{ $user->country }}</td><td>{{ $user->date_of_birth }}</td>
                        <td><a class="btn btn-block edit-button" href="/manage/edit/users/{{ $user->id }}" role="button">Edit</a></td>
                    @endif
                </tr>
            @endforeach
        @else
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td><td>{{ $user->username }}</td><td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td><td>{{ $user->siterole_id }}</td><td>{{ $user->team_id }}</td>
                    <td>{{ $user->teamrole_id }}</td><td>{{ $user->ingamerole_id }}</td>
                    <td>{{ $user->country }}</td><td>{{ $user->date_of_birth }}</td>
                    <td><a class="btn btn-block edit-button" href="/manage/edit/users/{{ $user->id }}" role="button">Edit</a></td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>