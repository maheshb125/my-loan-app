@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table>
                    <thead>
                        <tr>
                        @foreach ($emiDetails->first() as $attribute => $value)
                            <th class="px-2 py-2">{{ $attribute }}</th>
                        @endforeach
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($emiDetails as $record)                         
                    <tr>
                        @foreach ($record as $key => $value)
                            <td class="px-2 py-2 ">{{ $value }}</td>
                        @endforeach
                    </tr>
                    @endforeach

                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
