@extends('back.layouts.app')
{{-- une section ( 2 équipes remplies au hasard )
une section ( 4 joueurs sans équipes au hasard )
une section ( 4 joueurs avec équipe )
une section ( 2 équipes non remplies au hasard )
une section ( les equipes d'europes )
une section ( les équipes hors europes )
une section ( les joueurs qui représente leur pays( meme pays dorigine que l'équipe dans la quelle ils jouent )
Une section 5 joueuses au hasard qui ont une équipe !
Une section 5 joueurs homme et qui ont une équipe ! --}}
@section('content-back')
    <h2>2 équipes remplies au hasard</h2>
    <!-- Table with outer spacing -->
    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PAYS</th>
                    <th>CONTINENT</th>
                    <th>ATTAQUANTS</th>
                    <th>CENTRAUX</th>
                    <th>DEFENSEURS</th>
                    <th>REMPLACANTS</th>
                    <th>MAX</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 0;
                @endphp
                @foreach ($equipes->shuffle() as $equipe)
                    @if ($equipe->joueurs->count() === $equipe->attaquant + $equipe->central + $equipe->defenseur + $equipe->remplacant && $count < 2)
                        <tr>
                            <td style="font-weight: 900">{{ $equipe->id }}</td>
                            <td>{{ $equipe->nom }}</td>
                            <td>{{ $equipe->pays }}</td>
                            <td>{{ $equipe->continent }}</td>
                            <td>{{ $equipe->joueurs->where('role_id', 1)->count() }} / {{ $equipe->attaquant }}</td>
                            <td>{{ $equipe->joueurs->where('role_id', 2)->count() }} / {{ $equipe->central }}</td>
                            <td>{{ $equipe->joueurs->where('role_id', 3)->count() }} / {{ $equipe->defenseur }}</td>
                            <td>{{ $equipe->joueurs->where('role_id', 4)->count() }} / {{ $equipe->remplacant }}</td>
                            <td>{{ count($equipe->joueurs) }} /
                                {{ $equipe->attaquant + $equipe->central + $equipe->defenseur + $equipe->remplacant }}
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endif
                @endforeach

            </tbody>
        </table>
    </div>


    {{-- 4 joueurs sans équipe au hasard --}}
    <h2>4 joueurs sans équipe au hasard</h2>
    <!-- Table with outer spacing -->
    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>PAYS</th>
                    <th>ROLE</th>
                    <th>EQUIPE</th>
                    <th>PHOTO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($joueurs->shuffle()->where('equipe_id', 1)->take(4)
        as $joueur)
                    <tr>
                        <td style="font-weight: 900">{{ $joueur->id }}</td>
                        <td>{{ $joueur->nom }}</td>
                        <td>{{ $joueur->prenom }}</td>
                        <td style="width: 10%">{{ $joueur->pays }}</td>
                        <td>{{ $joueur->role->nom }}</td>
                        <td>{{ $joueur->equipe->nom }}</td>

                        @if (File::exists('img/' . $joueur->photo->img))
                            <td><img style="width: 50px" src="{{ asset('img/' . $joueur->photo->img) }}" alt="">
                            </td>
                        @else
                            <td><img style="width: 50px" src="{{ $joueur->photo->img }}" alt=""></td>
                            </td>
                        @endif

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{-- 4 joueurs avec équipe au hasard --}}
    <h2>4 joueurs avec équipe au hasard</h2>
    <!-- Table with outer spacing -->
    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>PAYS</th>
                    <th>ROLE</th>
                    <th>EQUIPE</th>
                    <th>PHOTO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($joueurs->shuffle()->where('equipe_id', '!=', 1)->take(4)
        as $joueur)
                    <tr>
                        <td style="font-weight: 900">{{ $joueur->id }}</td>
                        <td>{{ $joueur->nom }}</td>
                        <td>{{ $joueur->prenom }}</td>
                        <td style="width: 10%">{{ $joueur->pays }}</td>
                        <td>{{ $joueur->role->nom }}</td>
                        <td>{{ $joueur->equipe->nom }}</td>

                        @if (File::exists('img/' . $joueur->photo->img))
                            <td><img style="width: 50px" src="{{ asset('img/' . $joueur->photo->img) }}" alt="">
                            </td>
                        @else
                            <td><img style="width: 50px" src="{{ $joueur->photo->img }}" alt=""></td>
                            </td>
                        @endif

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{-- 2 équipes non remplies au hasard --}}
    <h2>2 équipes non remplies au hasard</h2>
    <!-- Table with outer spacing -->
    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PAYS</th>
                    <th>CONTINENT</th>
                    <th>ATTAQUANTS</th>
                    <th>CENTRAUX</th>
                    <th>DEFENSEURS</th>
                    <th>REMPLACANTS</th>
                    <th>MAX</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 0;
                @endphp
                @foreach ($equipes->shuffle() as $equipe)
                    @if ($equipe->joueurs->count() < $equipe->attaquant + $equipe->central + $equipe->defenseur + $equipe->remplacant && $count < 2)
                        <tr>
                            <td style="font-weight: 900">{{ $equipe->id }}</td>
                            <td>{{ $equipe->nom }}</td>
                            <td>{{ $equipe->pays }}</td>
                            <td>{{ $equipe->continent }}</td>
                            <td>{{ $equipe->joueurs->where('role_id', 1)->count() }} / {{ $equipe->attaquant }}</td>
                            <td>{{ $equipe->joueurs->where('role_id', 2)->count() }} / {{ $equipe->central }}</td>
                            <td>{{ $equipe->joueurs->where('role_id', 3)->count() }} / {{ $equipe->defenseur }}</td>
                            <td>{{ $equipe->joueurs->where('role_id', 4)->count() }} / {{ $equipe->remplacant }}</td>
                            <td>{{ count($equipe->joueurs) }} /
                                {{ $equipe->attaquant + $equipe->central + $equipe->defenseur + $equipe->remplacant }}
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endif
                @endforeach

            </tbody>
        </table>
    </div>


    {{-- Equipes européenes --}}
    <h2>Equipes européennes</h2>
    <!-- Table with outer spacing -->
    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PAYS</th>
                    <th>CONTINENT</th>
                    <th>ATTAQUANTS</th>
                    <th>CENTRAUX</th>
                    <th>DEFENSEURS</th>
                    <th>REMPLACANTS</th>
                    <th>MAX</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipes->shuffle()->where('continent', 'EU') as $equipe)
                    <tr>
                        <td style="font-weight: 900">{{ $equipe->id }}</td>
                        <td>{{ $equipe->nom }}</td>
                        <td>{{ $equipe->pays }}</td>
                        <td>{{ $equipe->continent }}</td>
                        <td>{{ $equipe->joueurs->where('role_id', 1)->count() }} / {{ $equipe->attaquant }}</td>
                        <td>{{ $equipe->joueurs->where('role_id', 2)->count() }} / {{ $equipe->central }}</td>
                        <td>{{ $equipe->joueurs->where('role_id', 3)->count() }} / {{ $equipe->defenseur }}</td>
                        <td>{{ $equipe->joueurs->where('role_id', 4)->count() }} / {{ $equipe->remplacant }}</td>
                        <td>{{ count($equipe->joueurs) }} /
                            {{ $equipe->attaquant + $equipe->central + $equipe->defenseur + $equipe->remplacant }}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{-- Equipes hors europe --}}
    <h2>Equipes hors europe</h2>
    <!-- Table with outer spacing -->
    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PAYS</th>
                    <th>CONTINENT</th>
                    <th>ATTAQUANTS</th>
                    <th>CENTRAUX</th>
                    <th>DEFENSEURS</th>
                    <th>REMPLACANTS</th>
                    <th>MAX</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipes->shuffle()->where('continent', 'HEU') as $equipe)
                    <tr>
                        <td style="font-weight: 900">{{ $equipe->id }}</td>
                        <td>{{ $equipe->nom }}</td>
                        <td>{{ $equipe->pays }}</td>
                        <td>{{ $equipe->continent }}</td>
                        <td>{{ $equipe->joueurs->where('role_id', 1)->count() }} / {{ $equipe->attaquant }}</td>
                        <td>{{ $equipe->joueurs->where('role_id', 2)->count() }} / {{ $equipe->central }}</td>
                        <td>{{ $equipe->joueurs->where('role_id', 3)->count() }} / {{ $equipe->defenseur }}</td>
                        <td>{{ $equipe->joueurs->where('role_id', 4)->count() }} / {{ $equipe->remplacant }}</td>
                        <td>{{ count($equipe->joueurs) }} /
                            {{ $equipe->attaquant + $equipe->central + $equipe->defenseur + $equipe->remplacant }}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{-- Joueurs avec le même pays que celui de l'equipe --}}
    <h2>Joueurs avec le même pays que celui de l'equipe</h2>
    <!-- Table with outer spacing -->
    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>PAYS</th>
                    <th>ROLE</th>
                    <th>EQUIPE</th>
                    <th>PHOTO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($joueurs as $joueur)
                    @if ($joueur->pays === $joueur->equipe->pays)
                        <tr>
                            <td style="font-weight: 900">{{ $joueur->id }}</td>
                            <td>{{ $joueur->nom }}</td>
                            <td>{{ $joueur->prenom }}</td>
                            <td style="width: 10%">{{ $joueur->pays }}</td>
                            <td>{{ $joueur->role->nom }}</td>
                            <td>{{ $joueur->equipe->nom }}</td>

                            @if (File::exists('img/' . $joueur->photo->img))
                                <td><img style="width: 50px" src="{{ asset('img/' . $joueur->photo->img) }}" alt="">
                                </td>
                            @else
                                <td><img style="width: 50px" src="{{ $joueur->photo->img }}" alt=""></td>
                                </td>
                            @endif

                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- 5 joueuses avec équipe au hasard --}}
    <h2>5 joueuses avec équipe au hasard</h2>
    <!-- Table with outer spacing -->
    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>PAYS</th>
                    <th>ROLE</th>
                    <th>EQUIPE</th>
                    <th>PHOTO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($joueurs->shuffle()->where('genre', 'F')->where('equipe_id', '!=', 1)->take(5)
        as $joueur)
                    <tr>
                        <td style="font-weight: 900">{{ $joueur->id }}</td>
                        <td>{{ $joueur->nom }}</td>
                        <td>{{ $joueur->prenom }}</td>
                        <td style="width: 10%">{{ $joueur->pays }}</td>
                        <td>{{ $joueur->role->nom }}</td>
                        <td>{{ $joueur->equipe->nom }}</td>

                        @if (File::exists('img/' . $joueur->photo->img))
                            <td><img style="width: 50px" src="{{ asset('img/' . $joueur->photo->img) }}" alt="">
                            </td>
                        @else
                            <td><img style="width: 50px" src="{{ $joueur->photo->img }}" alt=""></td>
                            </td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- 5 joueurs avec équipe au hasard --}}
    <h2>5 joueurs avec équipe au hasard</h2>
    <!-- Table with outer spacing -->
    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>PAYS</th>
                    <th>ROLE</th>
                    <th>EQUIPE</th>
                    <th>PHOTO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($joueurs->shuffle()->where('genre', 'H')->where('equipe_id', '!=', 1)->take(5)
        as $joueur)
                    <tr>
                        <td style="font-weight: 900">{{ $joueur->id }}</td>
                        <td>{{ $joueur->nom }}</td>
                        <td>{{ $joueur->prenom }}</td>
                        <td style="width: 10%">{{ $joueur->pays }}</td>
                        <td>{{ $joueur->role->nom }}</td>
                        <td>{{ $joueur->equipe->nom }}</td>

                        @if (File::exists('img/' . $joueur->photo->img))
                            <td><img style="width: 50px" src="{{ asset('img/' . $joueur->photo->img) }}" alt="">
                            </td>
                        @else
                            <td><img style="width: 50px" src="{{ $joueur->photo->img }}" alt=""></td>
                            </td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
