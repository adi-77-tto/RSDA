@extends('main')

@section('content')

  {{-- ======= Hero Section ======= --}}
  <section class="donate-hero d-flex align-items-center justify-content-center text-center"
    style="background: url('{{ asset('images/donation_page.png') }}') center center / cover no-repeat; min-height:360px; position:relative;">
    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.52);"></div>
    <div class="container" style="position:relative;z-index:2;">
      <h1 class="text-white fw-bold" style="font-size:2.6rem; text-shadow:0 2px 8px rgba(0,0,0,0.5);">Support Our Cause</h1>
      <p class="text-white mt-2" style="font-size:1.05rem; max-width:600px; margin:0 auto; opacity:0.9;">
        Be a part of our mission to raise funds for impactful humanitarian causes and change lives in rural Bangladesh.
      </p>
    </div>
  </section>

  {{-- ======= Payment Methods Section ======= --}}
  <section class="bg-light py-5">
    <div class="container">
      <div class="section-title text-center mb-4">
        <h2>Payment Methods</h2>
        <p class="text-muted mt-2" style="font-size:14px;">Please donate using any of the following methods, then fill out the form below.</p>
      </div>

      @if($paymentMethods->count() > 0)
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 g-3">
          @foreach($paymentMethods as $method)
            <div class="col">
              <div class="card border-0 shadow-sm h-100 text-center py-3 px-2">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                  @if($method->icon_image)
                    <img src="{{ asset('storage/'.$method->icon_image) }}" alt="{{ $method->type }}" style="max-height:55px; max-width:80%; object-fit:contain; margin-bottom:12px;">
                  @elseif($method->type == 'bank')
                    <i class="fa-solid fa-building-columns" style="font-size:48px; color:#555; margin-bottom:12px;"></i>
                  @elseif(file_exists(public_path('img/'.$method->type.'.png')))
                    <img src="{{ asset('img/'.$method->type.'.png') }}" alt="{{ $method->type }}" style="max-height:55px; max-width:80%; object-fit:contain; margin-bottom:12px;">
                  @else
                    <i class="fa-solid fa-money-bill-wave" style="font-size:48px; color:#555; margin-bottom:12px;"></i>
                  @endif

                  <p class="mb-0 text-muted" style="font-size:11px; text-transform:uppercase; letter-spacing:.5px;">{{ ucfirst($method->type) }}</p>
                  <p class="mb-1 fw-bold" style="font-size:13px;">{{ $method->account_name }}</p>
                  <p class="mb-0 text-secondary" style="font-size:13px; font-weight:600;">{{ $method->account_number }}</p>

                  @if($method->type == 'bank' && $method->bank_details)
                    <ul class="list-unstyled text-start mt-2 mb-0" style="font-size:11px;">
                      @if(isset($method->bank_details['bank_name']))
                        <li><i class="fa fa-landmark fa-xs me-1 text-muted"></i> {{ $method->bank_details['bank_name'] }}</li>
                      @endif
                      @if(isset($method->bank_details['branch_name']))
                        <li><i class="fa fa-map-marker-alt fa-xs me-1 text-muted"></i> {{ $method->bank_details['branch_name'] }}</li>
                      @endif
                      @if(isset($method->bank_details['routing_number']))
                        <li><i class="fa fa-hashtag fa-xs me-1 text-muted"></i> Routing: {{ $method->bank_details['routing_number'] }}</li>
                      @endif
                    </ul>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <p class="text-center text-muted py-4">Payment methods will be available soon.</p>
      @endif
    </div>
  </section>

  {{-- ======= Donation Form Section ======= --}}
  <section class="bg-white py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
          <div class="card border-0 shadow">
            <div class="card-header text-dark fw-bold py-3 px-4" style="background:#f7ca44;">
              <h5 class="mb-0"><i class="fa-solid fa-hand-holding-heart me-2"></i>Submit Your Donation Information</h5>
            </div>
            <div class="card-body px-4 py-4">

              @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                  <i class="fa-solid fa-check-circle"></i> {{ session()->get('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
              @endif

              <div class="alert alert-warning d-flex gap-2 align-items-start mb-4" style="font-size:13px; background:#fff8e1; border-color:#f7ca44;">
                <i class="fa-solid fa-circle-info mt-1"></i>
                <span>Please complete your payment using any method above, then fill in this form with your transaction details. We'll verify and acknowledge your donation promptly.</span>
              </div>

              <form action="{{ route('donation.submit') }}" method="POST">
                @csrf

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold" style="font-size:13px;">Your Name <span class="text-danger">*</span></label>
                    <input type="text" name="donor_name" class="form-control @error('donor_name') is-invalid @enderror"
                      placeholder="Enter your full name" value="{{ old('donor_name') }}" required>
                    @error('donor_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold" style="font-size:13px;">Phone Number <span class="text-danger">*</span></label>
                    <input type="text" name="donor_phone" class="form-control @error('donor_phone') is-invalid @enderror"
                      placeholder="e.g., +8801XXXXXXXXX" value="{{ old('donor_phone') }}" required>
                    @error('donor_phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold" style="font-size:13px;">Payment Method Used <span class="text-danger">*</span></label>
                    <select name="payment_method_id" class="form-select @error('payment_method_id') is-invalid @enderror" required>
                      <option value="">-- Select Payment Method --</option>
                      <option value="bkash" {{ old('payment_method_id') == 'bkash' ? 'selected' : '' }}>Bkash</option>
                      <option value="nagad" {{ old('payment_method_id') == 'nagad' ? 'selected' : '' }}>Nagad</option>
                      <option value="upay" {{ old('payment_method_id') == 'upay' ? 'selected' : '' }}>Upay</option>
                      <option value="card" {{ old('payment_method_id') == 'card' ? 'selected' : '' }}>Card</option>
                    </select>
                    @error('payment_method_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold" style="font-size:13px;">Transaction ID <span class="text-danger">*</span></label>
                    <input type="text" name="transaction_id" class="form-control @error('transaction_id') is-invalid @enderror"
                      placeholder="Enter transaction / reference ID" value="{{ old('transaction_id') }}" required>
                    @error('transaction_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>
                </div>

                <div class="mb-4">
                  <label class="form-label fw-semibold" style="font-size:13px;">Donation Amount (৳) <span class="text-danger">*</span></label>
                  <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror"
                    placeholder="Enter amount in BDT" min="1" step="0.01" value="{{ old('amount') }}" required>
                  @error('amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <button type="submit" class="btn btn-warning text-dark fw-bold w-100 py-2" style="font-size:15px;">
                  <i class="fa-solid fa-paper-plane me-2"></i> Submit Donation Information
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

