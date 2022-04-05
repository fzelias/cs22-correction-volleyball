@extends('back.layouts.app')

@section('content-back')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Equipes</h3>
                    <p class="text-subtitle text-muted">For equipe to check they list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Equipes</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success mb-0 mt-2">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger mb-0 mt-2">
            {{ session()->get('error') }}
        </div>
    @endif

        <section class="section">
            <div class="row text-center" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
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
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($equipes as $equipe)
                                                <tr>
                                                    <td style="font-weight: 900">{{ $equipe->id - 1 }}</td>
                                                    <td>{{ $equipe->nom }}</td>
                                                    <td>{{ $equipe->pays }}</td>
                                                    <td>{{ $equipe->continent }}</td>
                                                     <td>{{ $equipe->joueurs->where("role_id", 1)->count() }} / {{ $equipe->attaquant }}</td>
                                                     <td>{{ $equipe->joueurs->where("role_id", 2)->count() }} / {{ $equipe->central }}</td>
                                                     <td>{{ $equipe->joueurs->where("role_id", 3)->count() }} / {{ $equipe->defenseur }}</td>
                                                     <td>{{ $equipe->joueurs->where("role_id", 4)->count() }} / {{ $equipe->remplacant }}</td>
                                                     <td>{{ count($equipe->joueurs) }} / {{ $equipe->attaquant + $equipe->central + $equipe->defenseur + $equipe->remplacant }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="{{ route('equipe.show', $equipe->id) }}"
                                                                class="btn btn-warning ms-2">Read</a>
                                                            <a href="{{ route('equipe.edit', $equipe->id) }}"
                                                                class="btn btn-primary mx-2">Edit</a>
                                                            <form action="{{ route('equipe.destroy', $equipe->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method("delete")
                                                                <button class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
