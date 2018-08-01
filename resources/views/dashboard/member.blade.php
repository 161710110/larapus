@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
   <div class="col-md-12">
      <nav aria-label="breadcrumb primary">
         <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">Home</li>
         </ol>
      </nav>
      <div class="card">
         <div class="card-header">Data Penulis</div>
         <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
               {{ session('status') }}
            </div>
            @endif
            Selamat datang di Larapus
            <table class="table">
               <tbody>
                  <tr>
                     <td class="text-muted">Buku dipinjam</td>
                     <td>
                        @if ($borrowLogs->count() == 0)
                        Tidak ada buku dipinjam
                        @endif
                        <ul>
                           @foreach ($borrowLogs as $borrowLog)
                           {{-- @if($borrowLog->is_returned == 1)
                           @else --}}
                           <li>
                                {!! Form::open(['url' => route('kembalikanbuku', $borrowLog->book_id),
                                'method' => 'put',
                                'class' => 'form-inline js-confirm',
                                'data-confirm' => "Anda yakin hendak mengembalikan " . $borrowLog->book->title . "?"] ) !!}
                                {{ $borrowLog->book->title }}
                                {!! Form::submit('Kembalikan', ['class'=>'btn btn-xs btn-default']) !!}
                                {!! Form::close() !!}
                            </li>
                            {{-- @endif --}}
                           @endforeach
                        </ul>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection