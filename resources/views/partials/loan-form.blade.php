<div class="card">
    <h5 class="card-header">
        Loan Calculator
    </h5>
    <div class="card-body">
        <form action="{{ url('loan-report') }}" class="loan-form" method="get">
            <div class="row gy-3">
                <div class="col col-md-6">
                    <label for="loan-amount" class="form-label">
                        Amount
                    </label>
                    <div class="input-group has-validation">
                        <input type="number" name="amount" class="form-control is-invalid" id="loan-amount" min="1">
                        <div class="input-group-text" id="loan-amount-currency">
                            AED
                        </div>
                        <div class="invalid-feedback">
                            Please enter the loan amount.
                        </div>
                    </div>
                </div>
                <div class="col col-md-6">
                    <label for="loan-rate" class="form-label">
                        Annual interest rate
                    </label>
                    <div class="input-group">
                        <input type="number" name="rate" class="form-control" id="loan-rate" min="0" max="100">
                        <div class="input-group-text" id="loan-rate-percentage">
                            %
                        </div>
                    </div>
                </div>
                <div class="col col-md-6">
                    <label for="loan-term" class="form-label">
                        Loan term
                    </label>
                    <div class="input-group">
                        <input type="number" name="term" class="form-control" id="loan-term" min="1" max="360">
                        <div class="input-group-text" id="loan-term-months">
                            month(s)
                        </div>
                    </div>
                </div>
                <div class="col col-md-6">
                    <label for="loan-additional-amount" class="form-label">
                        Additional amount to monthly payment
                    </label>
                    <div class="input-group">
                        <input type="number" name="additional_amount" class="form-control" id="loan-additional-amount"
                               min="1">
                        <div class="input-group-text" id="loan-additional-amount-currency">
                            AED
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-right mt-3">
                <button type="button" class="btn btn-primary">
                    Calculate
                </button>
            </div>
        </form>
    </div>
</div>