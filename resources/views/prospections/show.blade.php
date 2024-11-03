@extends('layout')
@section('title')

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Enregistrer une Prospection
          </div>
          <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $prospection->titre }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>Description :</strong> {{ $prospection->description }}</p>
                    <p><strong>Date :</strong> {{ $prospection->date }}</p>
                    <p><strong>Statut :</strong> {{ $prospection->is_active ? 'Actif' : 'Inactif' }}</p>
                    <p><strong>Prospect :</strong> {{ $prospection->prospect->nom ?? 'N/A'}}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('prospections.index') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
            </div>
        </div>
        </div>
      </div>
  </div>
  {{-- <div class="col-md-12">
    <div class="card card-profile">
      <img src="{{  asset('admin/assets/img/slide-11.jpg')}}" alt="Image placeholder" class="card-img-top">
      <div class="row justify-content-center">
        <div class="col-4 col-lg-4 order-lg-2">
          <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
            <a href="javascript:;">
              <img src="{{ asset('admin/assets/img/slide-11.jpg')}}" class="rounded-circle img-fluid border border-2 border-white">
            </a>
          </div>
        </div>
      </div>
      <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
        <div class="d-flex justify-content-between">
          <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
          <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a>
          <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
          <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a>
        </div>
      </div>
      <div class="card-body pt-0">
        <div class="row">
          <div class="col">
            <div class="d-flex justify-content-center">
              <div class="d-grid text-center">
                <span class="text-lg font-weight-bolder">22</span>
                <span class="text-sm opacity-8">Friends</span>
              </div>
              <div class="d-grid text-center mx-4">
                <span class="text-lg font-weight-bolder">10</span>
                <span class="text-sm opacity-8">Photos</span>
              </div>
              <div class="d-grid text-center">
                <span class="text-lg font-weight-bolder">89</span>
                <span class="text-sm opacity-8">Comments</span>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center mt-4">
          <h5>
            Mark Davis<span class="font-weight-light">, 35</span>
          </h5>
          <div class="h6 font-weight-300">
            <i class="ni location_pin mr-2"></i>Bucharest, Romania
          </div>
          <div class="h6 mt-4">
            <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
          </div>
          <div>
            <i class="ni education_hat mr-2"></i>University of Computer Science
          </div>
        </div>
      </div>
    </div>
  </div> --}}
@endsection
@section('content')
