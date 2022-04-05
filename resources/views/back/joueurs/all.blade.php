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
                    <h3>Joueurs</h3>
                    <p class="text-subtitle text-muted">For joueur to check they list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Joueurs</li>
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
                                                <th>PRENOM</th>
                                                <th>PAYS</th>
                                                <th>ROLE</th>
                                                <th>EQUIPE</th>
                                                <th>PHOTO</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($joueurs as $joueur)
                                                <tr>
                                                    <td style="font-weight: 900">{{ $joueur->id }}</td>
                                                    <td>{{ $joueur->nom }}</td>
                                                    <td>{{ $joueur->prenom }}</td>
                                                    <td style="width: 10%">{{ $joueur->pays }}</td>
                                                    <td>{{ $joueur->role->nom }}</td>
                                                    <td>{{ $joueur->equipe->nom }}</td>

                                                    @if (File::exists('img/' . $joueur->photo->img))
                                                        <td><img style="width: 50px"
                                                                src="{{ asset('img/' . $joueur->photo->img) }}" alt="">
                                                        </td>
                                                    @else
                                                        <td><img style="width: 50px" src="{{ $joueur->photo->img }}"
                                                                alt=""></td>
                                                        </td>
                                                    @endif

                                                    <td class="mx-auto">
                                                        <div class="d-flex">
                                                            <a href="{{ route('joueur.show', $joueur->id) }}"
                                                                class="btn btn-warning ms-2">Read</a>
                                                            <a href="{{ route('joueur.edit', $joueur->id) }}"
                                                                class="btn btn-primary mx-2">Edit</a>
                                                            <form action="{{ route('joueur.destroy', $joueur->id) }}"
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
