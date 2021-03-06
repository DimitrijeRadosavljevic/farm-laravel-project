@extends('layouts.app')

@section('content')
    <div class="container">

        @include('partials.errors')
        @include('partials.sessions')

        <form method="POST" action="{{route('animals.update', [$owner->id, $animal->id])}}">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>ID broj:</label>
                        <input type="number" class="form-control" name="id_number" value="{{$animal->id_number}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Identifikacioni broj:</label>
                        <input type="number" class="form-control" name="identification_number" value="{{$animal->identification_number}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="hb">HB:</label>
                        <input type="text" class="form-control" name="hb"  value="{{$animal->hb}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>RB:</label>
                        <input type="text" class="form-control" name="rb"  value="{{$animal->rb}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Datum rodjenja:</label>
                        <input type="date" class="form-control" name="birth_day" value="{{$animal->birth_day}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Vrsta:</label>
                        <select name="breed_id" class="form-control">
                            @foreach($breeds as $breed)
                                <option value="{{$breed->name}}" {{$breed->id==$animal->breed_id ? 'selected' : ''}}>{{$breed->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <p class="mb-2">Pol:</p>
                        <label class="radio-inline"><input type="radio" name="gender" value="1" {{$animal->gender ? 'checked' : ''}}>Musko</label>
                        <label class="radio-inline"><input type="radio" name="gender" value="0" {{!$animal->gender ? 'checked' : ''}}>Zensko</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Uzrast pri prvom pripustu(dani)</label>
                        <input type="number" class="form-control" name="days_in_first_mating" value="{{$animal->days_in_first_mating}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Vrsta Rodjenja</label>
                        <input type="text" class="form-control" name="birth_type" value="{{$animal->birth_type}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Broj sisa L</label>
                        <input type="number" class="form-control" name="left_tits" value="{{$animal->left_tits}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Broj sisa D</label>
                        <input type="number" class="form-control" name="right_tits" value="{{$animal->right_tits}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Selekcijski broj</label>
                        <input type="text" class="form-control" name="selection_mark" value="{{$animal->selection_mark}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="from-group">
                        <label>Registracioni Broj</label>
                        <input type="number" class="form-control" name="registration_number" value="{{$animal->registration_number}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tetovar</label>
                        <input type="number" class="form-control" name="tattoo_number" value="{{$animal->tattoo_number}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Datum iskljucenja</label>
                        <input type="date" class="form-control" name="exclusion_date" value="{{$animal->exclusion_date}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Razlog iskljucenja</label>
                        <input type="text" class="form-control" name="exclusion_reason" value="{{$animal->exclusion_reason}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>ID broj oca</label>
                        <input type="number" class="form-control" name="id_father" value="{{$animal->getFather()}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>ID broj majke</label>
                        <input type="number" class="form-control" name="id_mother" value="{{$animal->getMother()}}">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Unesi</button>
        </form>

        <form method="POST" action="{{route('animals.destroy', $animal->id)}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger custom-delete">Obrisi</button>
        </form>
        <a class="btn btn-primary" href="{{route('animals.show', $animal->id)}}">Nazad</a>
    </div>

@endsection
