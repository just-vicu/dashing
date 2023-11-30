@extends('layouts.main')

@section('content')
    <div class="collapse" id="loan-schedule-calculator">
        <div class="pb-3">
            @include('partials.loan-form')
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col">
            <h5>
                Loan schedule
            </h5>
        </div>
        <div class="col-md-auto">
            <button type="button"
                    class="btn btn-secondary btn-sm"
                    data-bs-toggle="collapse"
                    data-bs-target="#loan-schedule-calculator"
                    aria-expanded="false"
                    aria-controls="loan-schedule-calculator"
            >
                Recalculate
            </button>
            <button type="button" class="btn btn-success btn-sm ms-2">
                Save schedule
            </button>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body text-bg-light">
            <div class="row">
                <div class="col col-md-6">
                    Amount: <b>5000 AED</b>
                </div>
                <div class="col col-md-6">
                    Annual interest rate: <b>1.7 %</b>
                </div>
                <div class="col col-md-6">
                    Loan term: <b>36 months</b>
                </div>
                <div class="col col-md-6">
                    Additional amount to monthly payment: <b>50 AED</b>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered mt-4">
        <thead>
        <tr>
            <th>Date</th>
            <th>Principal</th>
            <th>Interest</th>
            <th>Extra payment</th>
            <th>Remaining balance</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                Nov 2023
            </td>
            <td>
                500 AED
            </td>
            <td>
                1300 AED
            </td>
            <td>
                15 AED
            </td>
            <th>
                15000 AED
            </th>
        </tr>
        </tbody>
    </table>
@endsection