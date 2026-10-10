@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-header__title">Profile</h1>
    </div>
</div>

@if (array_filter($data))
    <div class="form-narrow">
        <div class="panel">
            <div class="panel__body">
                <table class="dt">
                    <tbody>
                        <tr>
                            <th>Nama</th>
                            <td class="dt__strong">{{ $data['name'] }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td class="dt__strong">{{ $data['class'] }}</td>
                        </tr>
                        <tr>
                            <th>NPM</th>
                            <td class="dt__mono">{{ $data['npm'] }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="stack-form-actions">
                    <a href="{{ route('profile') }}" class="btn btn--secondary">Ubah Data</a>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="form-narrow">
        <div class="panel">
            <div class="panel__body">
                <form action="{{ route('profile') }}" method="GET">
                    <div class="field">
                        <label for="name" class="field__label">Nama</label>
                        <input type="text" id="name" name="name" value="{{ $data['name'] }}" class="field__control">
                    </div>

                    <div class="field">
                        <label for="npm" class="field__label">NPM</label>
                        <input type="text" id="npm" name="npm" value="{{ $data['npm'] }}" class="field__control">
                    </div>

                    <div class="field">
                        <label for="class" class="field__label">Kelas</label>
                        <input type="text" id="class" name="class" value="{{ $data['class'] }}" class="field__control">
                    </div>

                    <div class="stack-form-actions">
                        <button type="submit" class="btn btn--primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
@endsection
